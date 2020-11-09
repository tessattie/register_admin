<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;

/**
 * Stocks Controller
 *
 * @property \App\Model\Table\StocksTable $Stocks
 *
 * @method \App\Model\Entity\Stock[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class StocksController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index($id = null)
    {
        $from = $this->request->session()->read("from")." 00:00:00";
        $to = $this->request->session()->read("to")." 23:59:59";
        $conn = ConnectionManager::get('default');
        $orders = $this->Stocks->Orders->find("all", array("order" => array("Orders.created ASC"), "conditions" => array('Orders.created >=' => $from, "Orders.created <=" => $to)))->contain(['Stocks', 'Suppliers', "Rates"]);

        $this->set(compact('orders', 'id'));
    }

    /**
     * View method
     *
     * @param string|null $id Stock id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $stock = $this->Stocks->get($id, [
            'contain' => ['Products', 'Suppliers', 'Users', 'Rates'],
        ]);

        $this->set('stock', $stock);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($order=false, $supplier_id = false)
    {
        $stock = $this->Stocks->newEntity();
        $supplier = false;
        if(!empty($supplier_id)){
            $supplier = $this->Stocks->Orders->Suppliers->get($supplier_id);
            $products = $this->Stocks->Products->find("all", array("conditions" => array("status" => 1)))->contain(['Rates'])->matching('ProductsSuppliers', function ($q) use ($supplier_id) {
                    return $q->where(['ProductsSuppliers.supplier_id' => $supplier_id]);
            });
        }
        if ($this->request->is('post')) {
            // debug($this->request->getData()); die();
            $neworder = $this->Stocks->Orders->newEntity(); 
            $neworder->order_number = $this->request->getData()['code'];
            $neworder->rate_id = $this->request->getData()['rate_id'];
            $neworder->purchase_rate = $this->request->getData()['purchase_rate'];
            $neworder->supplier_id = $this->request->getData()['supplier_id'];
            $neworder->user_id = 1;
            $neworder->fees = $this->request->getData()['fees'];
            
            if($order != 0){
                $neworder->status = 1;
                $neworder->type = 2; // : receiving
            }else{
                $neworder->status = 2;
                $neworder->type = $this->request->getData()['type']; // : receiving
            }
            if($ord = $this->Stocks->Orders->save($neworder)){
                for($i=0; $i < count($this->request->getData()['quantity']); $i++){
                    $stock = $this->Stocks->newEntity(); 
                    $stock->order_id = $ord['id'];
                    $stock->product_id = $this->request->getData()['product_id'][$i];
                    $stock->quantity = $this->request->getData()['quantity'][$i];
                    $stock->cost = number_format($this->request->getData()['cost'][$i],6);
                    $stock->user_id = 1;
                    $stock->rate_id = $ord['rate_id'];
                    if($order != false){
                       $stock->real_quantity =0;
                   }else{
                        $stock->real_quantity = $this->request->getData()['quantity'][$i];
                   }
                    $stock->used = $stock->real_quantity;
                    if($this->Stocks->save($stock)){

                    }else{
                        debug($stock->errors());
                    }
                }
                $ord = $this->Stocks->Orders->get($ord['id']);
                $ord->total = $this->total($ord->id);
                $ord->real_total = $this->realtotal($ord->id);
                $this->Stocks->Orders->save($ord);
            }

            return $this->redirect(['action' => 'index']);
            // TODO : export in PDF when ready with the rest
        }
        $suppliers = $this->Stocks->Orders->Suppliers->find('all', ['order' => ['name ASC']]);
        $rates = $this->Stocks->Orders->Rates->find('list');

        $this->set("types", $this->Stocks->types);
        $this->set(compact('stock', 'products', 'suppliers', 'supplier', 'rates', 'order'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Stock id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null, $supplier_id = null)
    {
        $order = $this->Stocks->Orders->get($id, ['contain' => ['Stocks' => ['Products'], 'Suppliers', 'Rates']]);
        $products = $this->Stocks->Products->find("all", array("conditions" => array("status" => 1)))->contain(['Rates'])->matching('ProductsSuppliers', function ($q) use ($supplier_id) {
                    return $q->where(['ProductsSuppliers.supplier_id' => $supplier_id]);
            });
        if ($this->request->is(['patch', 'post', 'put'])) {
            // debug($this->request->getData()); die();
            $order->status = 2;
            $order->fees = $this->request->getData()['fees'];
            $this->Stocks->Orders->save($order);
            
            for($i=0; $i < count($this->request->getData()['real_quantity']); $i++){
                if(!empty($this->request->getData()['id'][$i])){
                    $stock = $this->Stocks->get($this->request->getData()['id'][$i]);
                    $stock->real_quantity = $this->request->getData()['real_quantity'][$i];
                    $stock->cost = $this->request->getData()['cost'][$i];
                }else{
                    $stock = $this->Stocks->newEntity(); 
                    $stock->order_id = $order->id;
                    $stock->product_id = $this->request->getData()['product_id'][$i];
                    $stock->quantity = 0;
                    $stock->cost = number_format($this->request->getData()['cost'][$i],6);
                    $stock->user_id = 1;
                    $stock->real_quantity = $this->request->getData()['real_quantity'][$i];
                    $stock->used = 0;
                }
                $this->Stocks->save($stock);
            }
            $ord = $this->Stocks->Orders->get($id);
            $ord->total = $this->total($ord->id);
            $ord->real_total = $this->realtotal($ord->id);
            $this->Stocks->Orders->save($ord);
            return $this->redirect(['action' => 'index']);
            //TODO : export in PDF to see the resume
        }
        $suppliers = $this->Stocks->Orders->Suppliers->find('list', ['order' => ['name ASC']]);
        $rates = $this->Stocks->Orders->Rates->find('list');
        $this->set(compact('order', 'products', 'suppliers', 'users', 'rates'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Stock id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $stock = $this->Stocks->get($id);
        if ($this->Stocks->delete($stock)) {
            $this->Flash->success(__('The stock has been deleted.'));
        } else {
            $this->Flash->error(__('The stock could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function post($id){
        $order = $this->Stocks->Orders->get($id, ['contain' => ['Stocks']]);
        $topost = [];
        if($order->status == 2){
            foreach($order->stocks as $stock){
                $topost[$stock->id] = array("product_id" => $stock->product_id, "quantity" => $stock->real_quantity);
            }
        }
        
        foreach($topost as $key => $value){
            $stock = $this->Stocks->get($key); 
            $product = $this->Stocks->Products->get($value['product_id']);
            $product->stock = $product->stock + $value['quantity'];
            $product->last_cost = $product->cost;
            $cost = $stock->cost;
            if($stock->rate_id != $product->rate_id){
                if($stock->rate_id == 1){
                    $product->cost = $cost/$order->purchase_rate;
                }else{
                    $product->cost = $cost*$order->purchase_rate;
                }
            }else{
                $product->cost = $cost;
            }
            $this->Stocks->Products->save($product);
        }

        $order->status = 3;
        $order->total = $this->total($order->id);
        $order->real_total = $this->realtotal($order->id);
        $this->Stocks->Orders->save($order);
        $this->recalculate($order->supplier_id);
        $this->Flash->success(__('Stock mis à jour'));
        return $this->redirect(['controller' => 'Orders', 'action' => 'view', $id]);
    }

    public function cancel($id){
        $order = $this->Stocks->Orders->get($id);
        $topost = [];
        if($order->status == 3){
            foreach($order->stocks as $stock){
                $topost[$stock->id] = array("product_id" => $stock->product_id, "quantity" => $stock->real_quantity);
            }        
            foreach($topost as $key => $value){
                $stock = $this->Stocks->get($key); 
                $product = $this->Stocks->Products->get($value['product_id']);
                $product->stock = $product->stock - $value['quantity'];
                $product->last_cost = $product->cost;
                $cost = $stock->cost;
                if($stock->rate_id != $product->rate_id){
                    if($stock->rate_id == 1){
                        $product->cost = $cost/$stock->purchase_rate;
                    }else{
                        $product->cost = $cost*$stock->purchase_rate;
                    }
                }else{
                    $product->cost = $cost;
                }
                $this->Stocks->Products->save($product);
            }
        }
        $order->status = 4;
        $order->total = $this->total($order->id);
        $order->real_total = $this->realtotal($order->id);
        $this->Stocks->Orders->save($order);
        $this->Flash->success(__('Commande annulée'));
        return $this->redirect(['controller' => 'Orders', 'action' => 'view', $id]);
    }

    public function activate($id){
        $order = $this->Stocks->Orders->get($id);

        $order->status = 2;
        $this->Stocks->Orders->save($order);
        $this->Flash->success(__('Commande réctivée'));
        return $this->redirect(['controller' => 'Orders', 'action' => 'view', $id]);
    }

    public function update($product_id){
        $product = $this->Stocks->Products->get($product_id);
        $query = $this->Stocks->find();
        $stock_quantity = $query->select(['sum' => $query->func()->sum('real_quantity')])
        ->innerJoinWith('Orders')
        ->where(['Stocks.product_id' => $product->id, 'Orders.status' => 3]);
        foreach($stock_quantity as $quantity){
            if(!empty($quantity->sum)){
                $product->stock = $quantity->sum;
                $this->Stocks->Products->save($product);
            }else{
                $product->stock = 0;
                $this->Stocks->Products->save($product);
            }
        }
        return $this->redirect(['controller' => 'Products', 'action' => 'edit', $product_id]);
    }


    private function total($order_id, $receiving = 0){
        $order = $this->Stocks->Orders->get($order_id, ['contain' => ['Stocks']]); 
        $total = 0;
        foreach($order->stocks as $item){
            $total = $total + $item->quantity*$item->cost; 
        }
        $total = $total + $order->fees;
        return $total;
    }

    private function realtotal($order_id, $receiving = 0){
        $order = $this->Stocks->Orders->get($order_id, ['contain' => ['Stocks']]); 
        $total = 0;
        foreach($order->stocks as $item){
            $total = $total + $item->cost*$item->real_quantity;
        }
        $total = $total + $order->fees;
        return $total;
    }

    public function updateall(){
        $this->Stocks->Products->find("all"); 
        foreach($products as $product){
            $this->update($product->id);
        }
        die("DONE UPDATING STOCK FOR ALL PRODUCTS");
    }
}
