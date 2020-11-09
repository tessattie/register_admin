<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Products Controller
 *
 * @property \App\Model\Table\ProductsTable $Products
 *
 * @method \App\Model\Entity\Product[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index($id=false)
    {
        $products = $this->Products->find("all", array("order" => array("category_id ASC", 'Products.name ASC')))->contain(['Categories']);

        $this->set(compact('products','id'));
    }

    /**
     * View method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $product = $this->Products->get($id, [
            'contain' => ['Categories', 'Rates', 'Suppliers', 'Customers', 'Orders', 'Sales', 'Journals'],
        ]);

        $this->set('product', $product);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->loadModel("Suppliers");
        $product = $this->Products->newEntity();
        if ($this->request->is('post')) {
            $product = $this->Products->patchEntity($product, $this->request->getData());
            if ($id = $this->Products->save($product)) {
                $product = $this->Products->get($id['id']);
                $this->update_suppliers($product, $this->request->getData()['supplier_id']);
                return $this->redirect(['action' => 'edit', $id['id']]);
            }
        }
        $categories = $this->Products->Categories->find('all', ['order' => ['name ASC']]);
        $achat = $this->Rates->get(1);
        $vente = $this->Rates->get(2);
        $devises = $this->Rates->find('list');
        $suppliers = $this->Suppliers->find("all", array("order"=> array("name ASC"), "conditions" => array("status" => 1)));
        $this->set(compact('product', 'devises', 'categories', 'rates', 'suppliers', 'customers', 'orders', 'sales', 'achat', 'vente'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->loadModel("Suppliers");
        if($id == null){
            $product = $this->Products->find("all", array("order" => array("name ASC")))->contain(['Suppliers'])->first();
        }else{
            $product = $this->Products->get($id, [
                'contain' => ['Suppliers', 'Customers', 'Sales'],
            ]);
        }
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            $product = $this->Products->patchEntity($product, $this->request->getData());
            // debug($this->request->getData());die();
            if ($ident = $this->Products->save($product)) {
                $this->update_suppliers($product, $this->request->getData()['supplier_id']);
            }else{

            }
        }
        if($id == null){
            $product = $this->Products->find("all", array("order" => array("name ASC")))->contain(['Suppliers'])->first();
        }else{
            $product = $this->Products->get($id, [
                'contain' => ['Suppliers'],
            ]);
        }
        $neighbors = $this->neighbors($product->name);
        $categories = $this->Products->Categories->find('all', ['order' => ['name ASC']]);
        $suppliers = $this->Suppliers->find("all", array("order"=> array("name ASC"), "conditions" => array("status" => 1)));
        $achat = $this->Rates->get(1);
        $vente = $this->Rates->get(2);
        $this->set(compact('product', 'categories', 'neighbors', 'achat', 'vente', 'suppliers'));
    }

    public function update_suppliers($product, $suppliers){
        $this->loadModel("ProductsSuppliers");
        // update and add new suppliers
        foreach($suppliers as $key => $supplier){

            $product_supplier = $this->ProductsSuppliers->find("all", 
                array("conditions" => array("product_id" => $product->id, 'supplier_id' => $supplier)
            ));

            if($product_supplier->count() == 0){
                $ps = $this->ProductsSuppliers->newEntity(); 
                $ps->supplier_id = $supplier;
                $ps->product_id = $product->id;
                $this->ProductsSuppliers->save($ps);
            }

        }

        // delete those that were unselected
        $all = $this->ProductsSuppliers->find("all", 
            array("conditions" => array("product_id" => $product->id)
        ));
        foreach($all as $ps){
            if(!in_array($ps->supplier_id, $suppliers)){
                $this->ProductsSuppliers->delete($ps);
            }
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $product = $this->Products->get($id);
        if ($this->Products->delete($product)) {
            $this->Flash->success(__('The product has been deleted.'));
        } else {
            $this->Flash->error(__('The product could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function find(){
        if ($this->request->is(['patch', 'post', 'put'])){

            if(!empty($this->request->getData()['name'])){
                $product = $this->Products->find("all", array("conditions" => array("name" => $this->request->getData()['name'])))->first();
            }

            if(!empty($this->request->getData()['barcode'])){
                $product = $this->Products->find("all", array("conditions" => array("barcode" => $this->request->getData()['barcode'])))->first();
            }

            if(!empty($product)){
                return $this->redirect(['action' => 'edit', $product->id]); 
            }else{
                $this->Flash->error(__('Aucun produit trouvé'));
                return $this->redirect(['action' => 'edit']); 
            }
        }
        $this->Flash->error(__('Aucune donnée reçu'));
        return $this->redirect(['action' => 'edit']); 
    }

    public function neighbors($value)
    {
        $previous = $this->Products->find()
            ->where(['LOWER(name) <' => strtolower($value)])
            ->order(['name' => 'DESC'])
            ->first();

        $next = $this->Products->find()
            ->where(['LOWER(name) >' => strtolower($value)])
            ->order(['name' => 'ASC'])
            ->first();

        $neighbors =  [
            'previous' => $previous,
            'next' => $next
        ];
        return $neighbors;
    }

    public function search(){
        if($this->request->is(['ajax'])){
            $search_term = $this->request->getData()['search'];
            $supplier = $this->request->getData()['supplier'];
            
            $products = $this->Products->find("all", array("conditions" => array("name LIKE" => "%".$search_term."%")))->matching('ProductsSuppliers', function ($q) use ($supplier) {
                    return $q->where(['ProductsSuppliers.supplier_id' => $supplier]);
            });
            echo json_encode($products->toArray());
        }
        die();
    }

    public function get(){
        if($this->request->is(['ajax'])){
            $id = $this->request->getData()['search'];
            $product = $this->Products->get($id);

            echo json_encode($product);
        }
        die(); 
    }

    public function barcode(){
        if($this->request->is(['ajax'])){
            $barcode = $this->request->getData()['search'];
            $product = $this->Products->find('all', array("conditions" => array("barcode" => $barcode)))->first();
            echo json_encode($product);
        }
        die(); 
    }
}

    