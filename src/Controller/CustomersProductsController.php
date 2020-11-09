<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CustomersProducts Controller
 *
 * @property \App\Model\Table\CustomersProductsTable $CustomersProducts
 *
 * @method \App\Model\Entity\CustomersProduct[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CustomersProductsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Customers', 'Products'],
        ];
        $customersProducts = $this->paginate($this->CustomersProducts);

        $this->set(compact('customersProducts'));
    }

    /**
     * View method
     *
     * @param string|null $id Customers Product id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $customersProduct = $this->CustomersProducts->get($id, [
            'contain' => ['Customers', 'Products'],
        ]);

        $this->set('customersProduct', $customersProduct);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $customersProduct = $this->CustomersProducts->newEntity();
        if ($this->request->is('post')) {
            $customersProduct = $this->CustomersProducts->patchEntity($customersProduct, $this->request->getData());
            if ($this->CustomersProducts->save($customersProduct)) {
                $this->Flash->success(__('The customers product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The customers product could not be saved. Please, try again.'));
        }
        $customers = $this->CustomersProducts->Customers->find('list', ['limit' => 200]);
        $products = $this->CustomersProducts->Products->find('list', ['limit' => 200]);
        $this->set(compact('customersProduct', 'customers', 'products'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Customers Product id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $customersProduct = $this->CustomersProducts->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $customersProduct = $this->CustomersProducts->patchEntity($customersProduct, $this->request->getData());
            if ($this->CustomersProducts->save($customersProduct)) {
                $this->Flash->success(__('The customers product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The customers product could not be saved. Please, try again.'));
        }
        $customers = $this->CustomersProducts->Customers->find('list', ['limit' => 200]);
        $products = $this->CustomersProducts->Products->find('list', ['limit' => 200]);
        $this->set(compact('customersProduct', 'customers', 'products'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Customers Product id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $customersProduct = $this->CustomersProducts->get($id);
        if ($this->CustomersProducts->delete($customersProduct)) {
            $this->Flash->success(__('The customers product has been deleted.'));
        } else {
            $this->Flash->error(__('The customers product could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
