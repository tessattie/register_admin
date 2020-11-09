<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ProductsSuppliers Controller
 *
 * @property \App\Model\Table\ProductsSuppliersTable $ProductsSuppliers
 *
 * @method \App\Model\Entity\ProductsSupplier[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductsSuppliersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Products', 'Suppliers'],
        ];
        $productsSuppliers = $this->paginate($this->ProductsSuppliers);

        $this->set(compact('productsSuppliers'));
    }

    /**
     * View method
     *
     * @param string|null $id Products Supplier id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $productsSupplier = $this->ProductsSuppliers->get($id, [
            'contain' => ['Products', 'Suppliers'],
        ]);

        $this->set('productsSupplier', $productsSupplier);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $productsSupplier = $this->ProductsSuppliers->newEntity();
        if ($this->request->is('post')) {
            $productsSupplier = $this->ProductsSuppliers->patchEntity($productsSupplier, $this->request->getData());
            if ($this->ProductsSuppliers->save($productsSupplier)) {
                $this->Flash->success(__('The products supplier has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The products supplier could not be saved. Please, try again.'));
        }
        $products = $this->ProductsSuppliers->Products->find('list', ['limit' => 200]);
        $suppliers = $this->ProductsSuppliers->Suppliers->find('list', ['limit' => 200]);
        $this->set(compact('productsSupplier', 'products', 'suppliers'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Products Supplier id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $productsSupplier = $this->ProductsSuppliers->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $productsSupplier = $this->ProductsSuppliers->patchEntity($productsSupplier, $this->request->getData());
            if ($this->ProductsSuppliers->save($productsSupplier)) {
                $this->Flash->success(__('The products supplier has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The products supplier could not be saved. Please, try again.'));
        }
        $products = $this->ProductsSuppliers->Products->find('list', ['limit' => 200]);
        $suppliers = $this->ProductsSuppliers->Suppliers->find('list', ['limit' => 200]);
        $this->set(compact('productsSupplier', 'products', 'suppliers'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Products Supplier id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $productsSupplier = $this->ProductsSuppliers->get($id);
        if ($this->ProductsSuppliers->delete($productsSupplier)) {
            $this->Flash->success(__('The products supplier has been deleted.'));
        } else {
            $this->Flash->error(__('The products supplier could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
