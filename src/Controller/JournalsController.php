<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Journals Controller
 *
 * @property \App\Model\Table\JournalsTable $Journals
 *
 * @method \App\Model\Entity\Journal[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class JournalsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['OrdersProducts', 'Products', 'ProductsSales', 'Suppliers', 'Users'],
        ];
        $journals = $this->paginate($this->Journals);

        $this->set(compact('journals'));
    }

    /**
     * View method
     *
     * @param string|null $id Journal id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $journal = $this->Journals->get($id, [
            'contain' => ['OrdersProducts', 'Products', 'ProductsSales', 'Suppliers', 'Users'],
        ]);

        $this->set('journal', $journal);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $journal = $this->Journals->newEntity();
        if ($this->request->is('post')) {
            $journal = $this->Journals->patchEntity($journal, $this->request->getData());
            if ($this->Journals->save($journal)) {
                $this->Flash->success(__('The journal has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The journal could not be saved. Please, try again.'));
        }
        $ordersProducts = $this->Journals->OrdersProducts->find('list', ['limit' => 200]);
        $products = $this->Journals->Products->find('list', ['limit' => 200]);
        $productsSales = $this->Journals->ProductsSales->find('list', ['limit' => 200]);
        $suppliers = $this->Journals->Suppliers->find('list', ['limit' => 200]);
        $users = $this->Journals->Users->find('list', ['limit' => 200]);
        $this->set(compact('journal', 'ordersProducts', 'products', 'productsSales', 'suppliers', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Journal id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $journal = $this->Journals->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $journal = $this->Journals->patchEntity($journal, $this->request->getData());
            if ($this->Journals->save($journal)) {
                $this->Flash->success(__('The journal has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The journal could not be saved. Please, try again.'));
        }
        $ordersProducts = $this->Journals->OrdersProducts->find('list', ['limit' => 200]);
        $products = $this->Journals->Products->find('list', ['limit' => 200]);
        $productsSales = $this->Journals->ProductsSales->find('list', ['limit' => 200]);
        $suppliers = $this->Journals->Suppliers->find('list', ['limit' => 200]);
        $users = $this->Journals->Users->find('list', ['limit' => 200]);
        $this->set(compact('journal', 'ordersProducts', 'products', 'productsSales', 'suppliers', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Journal id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $journal = $this->Journals->get($id);
        if ($this->Journals->delete($journal)) {
            $this->Flash->success(__('The journal has been deleted.'));
        } else {
            $this->Flash->error(__('The journal could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
