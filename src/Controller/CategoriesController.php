<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Categories Controller
 *
 * @property \App\Model\Table\CategoriesTable $Categories
 *
 * @method \App\Model\Entity\Category[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CategoriesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index($id=false)
    {
        $categories = $this->Categories->find("all", array("order" => array("name ASC")));

        $this->set(compact('categories','id'));
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $category = $this->Categories->newEntity();
        if ($this->request->is('post')) {
            $category = $this->Categories->patchEntity($category, $this->request->getData());
            if ($id = $this->Categories->save($category)) {
                $this->Flash->success(__('Catégorie '. $category->name." sauvegardée"));
                return $this->redirect(['action' => 'index', $id['id']]);
            }
            $this->Flash->error(__('Nous ne pouvons pas créer cette catégorie. Réessayez avec des valeurs différentes'));
        }
        $this->set(compact('category'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Category id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        if($id == null){
            $category = $this->Categories->find("all", array("order" => array("name ASC")))->first();
        }else{
            $category = $this->Categories->get($id, [
                'contain' => [],
            ]);
        }
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            $category = $this->Categories->patchEntity($category, $this->request->getData());
            if ($id = $this->Categories->save($category)) {
                $this->Flash->success(__('Categorie '. $category->name." sauvegardée"));

                return $this->redirect(['action' => 'edit', $id['id']]);
            }
            $this->Flash->error(__('Nous n\'avons pas pû mettre à jour. Réessayez.'));
        }
        $neighbors = $this->neighbors($category->name);
        $this->set(compact('category', 'neighbors'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Category id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete', 'get']);
        $category = $this->Categories->get($id);
        if ($this->Categories->delete($category)) {
            $this->Flash->success(__('Catégorie supprimée'));
        } else {
            $this->Flash->error(__('Nous ne pouvons pas supprimer cette catégorie'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function neighbors($value)
    {
        $previous = $this->Categories->find()
            ->where(['LOWER(name) <' => strtolower($value)])
            ->order(['name' => 'DESC'])
            ->first();

        $next = $this->Categories->find()
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
                $category = $this->Categories->find("all", array("conditions" => array("name" => $this->request->getData()['name'])))->first();
            }

            if(!empty($this->request->getData()['code'])){
                $category = $this->Categories->find("all", array("conditions" => array("code" => $this->request->getData()['code'])))->first();
            }

            if(!empty($category)){
                return $this->redirect(['action' => 'edit', $category->id]); 
            }else{
                $this->Flash->error(__('Aucune catégorie trouvée'));
                return $this->redirect(['action' => 'edit']); 
            }
        }
        $this->Flash->error(__('Aucune donnée reçu'));
        return $this->redirect(['action' => 'edit']); 
    }
}
