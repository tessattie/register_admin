<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Suppliers Controller
 *
 * @property \App\Model\Table\SuppliersTable $Suppliers
 *
 * @method \App\Model\Entity\Supplier[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SuppliersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users'],
        ];
        $suppliers = $this->paginate($this->Suppliers);

        $this->set(compact('suppliers'));
    }

    /**
     * View method
     *
     * @param string|null $id Supplier id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $supplier = $this->Suppliers->get($id, [
            'contain' => ['Users', 'Rates', 'Products', 'Journals', 'Orders'],
        ]);

        $this->set('supplier', $supplier);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $supplier = $this->Suppliers->newEntity();
        if ($this->request->is('post')) {
            $supplier = $this->Suppliers->patchEntity($supplier, $this->request->getData());
            // $supplier->user_id = $this->Auth->user()['id'];
            $supplier->user_id = 1;
            if ($this->Suppliers->save($supplier)) {
                $this->Flash->success(__('The supplier has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The supplier could not be saved. Please, try again.'));
        }
        $this->set("types", $this->Suppliers->types);
        $this->set(compact('supplier', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Supplier id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        if($id == null){
            $supplier = $this->Suppliers->find("all", array("order" => array("name ASC")))->contain(['ProductsSuppliers' => ['Products' => ['Rates']], 'Orders' => ['Stocks', 'Rates'], 'Spayments' => ['Rates'] ])->first();
        }else{
            $supplier = $this->Suppliers->get($id, [
            'contain' => ['ProductsSuppliers' => ['Products' => ['Rates']], 'Orders' => ['Stocks', 'Rates'], 'Spayments' => ['Rates']],
            ]);
        }

        // debug($supplier); die();
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            $supplier = $this->Suppliers->patchEntity($supplier, $this->request->getData());
            if ($this->Suppliers->save($supplier)) {
                $this->Flash->success(__('The supplier has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The supplier could not be saved. Please, try again.'));
        }
        $neighbors = $this->neighbors($supplier->name);
        $this->set("types", $this->Suppliers->types);
        $this->set(compact('supplier', 'neighbors'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Supplier id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $supplier = $this->Suppliers->get($id);
        if ($this->Suppliers->delete($supplier)) {
            $this->Flash->success(__('The supplier has been deleted.'));
        } else {
            $this->Flash->error(__('The supplier could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function neighbors($value)
    {
        $previous = $this->Suppliers->find()
            ->where(['LOWER(name) <' => strtolower($value)])
            ->order(['name' => 'DESC'])
            ->first();

        $next = $this->Suppliers->find()
            ->where(['LOWER(name) >' => strtolower($value)])
            ->order(['name' => 'ASC'])
            ->first();

        $neighbors =  [
            'previous' => $previous,
            'next' => $next
        ];
        return $neighbors;
    }

    public function find(){
        if ($this->request->is(['patch', 'post', 'put'])){

            if(!empty($this->request->getData()['name'])){
                $supplier = $this->Suppliers->find("all", array("conditions" => array("name" => $this->request->getData()['name'])))->first();
            }

            if(!empty($this->request->getData()['code'])){
                $supplier = $this->Suppliers->find("all", array("conditions" => array("code" => $this->request->getData()['code'])))->first();
            }

            if(!empty($supplier)){
                return $this->redirect(['action' => 'edit', $supplier->id]); 
            }else{
                $this->Flash->error(__('Aucune catégorie trouvée'));
                return $this->redirect(['action' => 'edit']); 
            }
        }
        $this->Flash->error(__('Aucune donnée reçu'));
        return $this->redirect(['action' => 'edit']); 
    }

    public function product(){
        if ($this->request->is(['patch', 'post', 'put'])){

            if(!empty($this->request->getData()['name'])){
                $product = $this->Suppliers->ProductsSuppliers->Products->find("all", array("conditions" => array("name" => $this->request->getData()['name'])))->first();
            }

            if(!empty($this->request->getData()['barcode'])){
                $product = $this->Suppliers->ProductsSuppliers->Products->find("all", array("conditions" => array("barcode" => $this->request->getData()['barcode'])))->first();
            }

            if(!empty($product)){
                $sp = $this->Suppliers->ProductsSuppliers->find("all", array("conditions" => array("product_id" => $product->id, "supplier_id" => $this->request->getData()['supplier_id'])));
                if($sp->count() == 0){
                    $ps = $this->Suppliers->ProductsSuppliers->newEntity();
                    $ps->supplier_id = $this->request->getData()['supplier_id'];
                    $ps->product_id = $product->id; 
                    $this->Suppliers->ProductsSuppliers->save($ps);
                }
            }
            return $this->redirect(['action' => 'edit', $this->request->getData()['supplier_id']]); 
        }
    }

    public function remove($id){
        $this->request->allowMethod(['post', 'delete', 'get']);
        $sp = $this->Suppliers->ProductsSuppliers->get($id);
        $supplier_id = $sp->supplier_id;
        if ($this->Suppliers->ProductsSuppliers->delete($sp)) {
            $this->Flash->success(__('Produit supprimé'));
        } else {
            $this->Flash->error(__('Impossible de supprimer. Réessayez ou contactez votre administrateur'));
        }
        return $this->redirect(['action' => 'edit', $supplier_id]);
    }
}
