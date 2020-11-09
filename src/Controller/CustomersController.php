<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Customers Controller
 *
 * @property \App\Model\Table\CustomersTable $Customers
 *
 * @method \App\Model\Entity\Customer[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CustomersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index($id=false)
    {
        $customers = $this->Customers->find('all', array("order" => array("name ASC"), "conditions" => array("id <>" => 1)));
        $this->set(compact('customers', 'id'));
    }

    /**
     * View method
     *
     * @param string|null $id Customer id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $customer = $this->Customers->get($id, [
            'contain' => ['Users', 'Products', 'Payments', 'Sales'],
        ]);
        $this->set('customer', $customer);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $start = 4000;
        $customer = $this->Customers->newEntity();
        $customer_number = $this->Customers->find("all")->count() + $start;
        if ($this->request->is('post')){
            $customer = $this->Customers->patchEntity($customer, $this->request->getData());
            // $customer->user_id = $this->Auth->user()['id'];
            $customer->user_id = 1;
            if ($id = $this->Customers->save($customer)) {
                $this->Flash->success(__('Utilisateur '. $customer->name." sauvegardé"));
                return $this->redirect(['action' => 'edit', $id['id']]);
            }
            $this->Flash->error(__('Nous ne pouvons pas créer ce client. Réessayez avec des valeurs différentes'));
        }
        $this->set(compact('customer', 'customer_number'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Customer id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        if($id == null){
            $customer = $this->Customers->find("all", array("order" => array("name ASC")))->first();
        }else{
            $customer = $this->Customers->get($id, [
                'contain' => ['Products'],
            ]);
        }
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            $customer = $this->Customers->patchEntity($customer, $this->request->getData());
            if ($id = $this->Customers->save($customer)) {
                $this->Flash->success(__('Client '. $customer->name." sauvegardé"));

                return $this->redirect(['action' => 'index', $id['id']]);
            }
            $this->Flash->error(__('Nous n\'avons pas pû mettre à jour. Réessayez.'));
        }
        $neighbors = $this->neighbors($customer->name);
        $users = $this->Customers->Users->find('list', ['limit' => 200]);
        $products = $this->Customers->Products->find('list', ['limit' => 200]);
        $this->set(compact('customer', 'users', 'products', 'neighbors'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Customer id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete', 'get']);
        $customer = $this->Customers->get($id);
        if ($this->Customers->delete($customer)) {
            $this->Flash->success(__('Client supprimé'));
        } else {
            $this->Flash->error(__('Nous ne pouvons pas supprimer ce client'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function neighbors($value)
    {
            $previous = $this->Customers->find()
                ->where(['LOWER(name) <' => strtolower($value)])
                ->order(['name' => 'DESC'])
                ->first();

            $next = $this->Customers->find()
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
                $customer = $this->Customers->find("all", array("conditions" => array("name" => $this->request->getData()['name'])))->first();
            }

            if(!empty($this->request->getData()['code'])){
                $customer = $this->Customers->find("all", array("conditions" => array("customer_number" => $this->request->getData()['code'])))->first();
            }

            if(!empty($customer)){
                return $this->redirect(['action' => 'edit', $customer->id]); 
            }else{
                $this->Flash->error(__('Aucun produit trouvé'));
                return $this->redirect(['action' => 'edit']); 
            }
        }
        $this->Flash->error(__('Aucune donnée reçu'));
        return $this->redirect(['action' => 'edit']); 
    }
}
