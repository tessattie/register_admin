<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Spayments Controller
 *
 * @property \App\Model\Table\SpaymentsTable $Spayments
 *
 * @method \App\Model\Entity\Spayment[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SpaymentsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Rates', 'Suppliers'],
        ];
        $spayments = $this->paginate($this->Spayments);

        $this->set(compact('spayments'));
    }

    /**
     * View method
     *
     * @param string|null $id Spayment id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $spayment = $this->Spayments->get($id, [
            'contain' => ['Users', 'Rates', 'Suppliers'],
        ]);

        $this->set('spayment', $spayment);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $spayment = $this->Spayments->newEntity();
        if ($this->request->is('post')) {
            $spayment = $this->Spayments->patchEntity($spayment, $this->request->getData());
            $spayment->user_id = 1; 
            $supplier = $spayment->supplier_id;
            if ($this->Spayments->save($spayment)) {
                $this->recalculate($supplier);
                $this->Flash->success(__('Paiement sauvegardé'));
                return $this->redirect(['controller' => 'Suppliers', 'action' => 'edit', $supplier]);
            }else{
               $this->Flash->error(__('Impossible de sauvegarder le paiement. Réessayez.')); 
            }
            
        }
        return $this->redirect(['controller' => 'Suppliers', 'action' => 'edit', $supplier]);
    }

    /**
     * Edit method
     *
     * @param string|null $id Spayment id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $spayment = $this->Spayments->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $spayment = $this->Spayments->patchEntity($spayment, $this->request->getData());
            if ($this->Spayments->save($spayment)) {
                $this->Flash->success(__('The spayment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The spayment could not be saved. Please, try again.'));
        }
        $users = $this->Spayments->Users->find('list', ['limit' => 200]);
        $rates = $this->Spayments->Rates->find('list', ['limit' => 200]);
        $suppliers = $this->Spayments->Suppliers->find('list', ['limit' => 200]);
        $this->set(compact('spayment', 'users', 'rates', 'suppliers'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Spayment id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $spayment = $this->Spayments->get($id);
        if ($this->Spayments->delete($spayment)) {
            $this->Flash->success(__('The spayment has been deleted.'));
        } else {
            $this->Flash->error(__('The spayment could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
