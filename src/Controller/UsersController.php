<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index($id=false)
    {
        $users = $this->Users->find('all', array("order" => array('Users.name ASC')))->contain(['Roles']);
        // $users = $this->paginate($this->Users);
        $this->set(compact('users', "id"));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Roles', 'Cards', 'Customers', 'Journals', 'Orders', 'Payments', 'Sales', 'Suppliers', 'Transactions'],
        ]);

        $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($id = $this->Users->save($user)) {
                $this->Flash->success(__('Utilisateur '. $user->name." sauvegardé"));

                return $this->redirect(['action' => 'index', $id['id']]);
            }
            $this->Flash->error(__('Nous ne pouvons pas créer cet utilisateur. Réessayez avec des valeurs différentes'));
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $cards = $this->Users->Cards->find('list', ['limit' => 200]);
        $this->set(compact('user', 'roles', 'cards'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        if($id == null){
            $user = $this->Users->find("all", array("order" => array("name ASC")))->first();
        }else{
            $user = $this->Users->get($id, [
                'contain' => [],
            ]);
        }
        $password = $user->password;
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if(empty($this->request->getData()['password'])){
                $user->password = $password;
            }
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Informations mises à jour'));
            }else{
                $this->Flash->error(__('Nous n\'avons pas pû mettre à jour. Réessayez.'));
            }
        }
        $neighbors = $this->neighbors($user->name);
        // debug($neighbors); die();
        $roles = $this->Users->Roles->find('list');
        $this->set(compact('user', 'roles', 'cards', 'neighbors'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete', 'get']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('Utilisateur supprimé'));
        } else {
            $this->Flash->error(__('Nous ne pouvons pas supprimer cet utilisateur'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function neighbors($value)
    {
        $previous = $this->Users->find()
            ->where(['LOWER(name) <' => strtolower($value)])
            ->order(['name' => 'DESC'])
            ->first();

        $next = $this->Users->find()
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
                $user = $this->Users->find("all", array("conditions" => array("name" => $this->request->getData()['name'])))->first();
            }

            if(!empty($this->request->getData()['code'])){
                $user = $this->Users->find("all", array("conditions" => array("code" => $this->request->getData()['code'])))->first();
            }

            if(!empty($user)){
                return $this->redirect(['action' => 'edit', $user->id]); 
            }else{
                $this->Flash->error(__('Aucun utilisateur trouvé'));
                return $this->redirect(['action' => 'edit']); 
            }
        }
        $this->Flash->error(__('Aucune donnée reçu'));
        return $this->redirect(['action' => 'edit']); 
    }
}
