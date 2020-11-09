<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Configurations Controller
 *
 * @property \App\Model\Table\ConfigurationsTable $Configurations
 *
 * @method \App\Model\Entity\Configuration[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ConfigurationsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Rates'],
        ];
        $configuration = $this->Configurations->get(1);
        $rates = $this->Configurations->Rates->find('list');
        $this->set(compact('configuration', 'rates'));
    }

    public function update(){
        if($this->request->is('ajax')){

            $configuration = $this->Configurations->get(1);

            if($this->request->getData()['field_name'] == 'name'){
              $configuration->name = $this->request->getData()['new_value'];
            } 
            if($this->request->getData()['field_name'] == 'address'){
              $configuration->address = $this->request->getData()['new_value'];
            } 
            if($this->request->getData()['field_name'] == 'phone'){
              $configuration->phone = $this->request->getData()['new_value'];
            } 
            if($this->request->getData()['field_name'] == 'email'){
              $configuration->email = $this->request->getData()['new_value'];
            } 
            if($this->request->getData()['field_name'] == 'website'){
              $configuration->website = $this->request->getData()['new_value'];
            } 
            if($this->request->getData()['field_name'] == 'checks'){
              $configuration->checks = $this->request->getData()['new_value'];
            } 
            if($this->request->getData()['field_name'] == 'rate_id'){
              $configuration->rate_id = $this->request->getData()['new_value'];
            } 

            if($this->request->getData()['field_name'] == 'enter_rate_id'){
              $configuration->enter_rate_id = $this->request->getData()['new_value'];
            } 
            if($this->request->getData()['field_name'] == 'customer_rate_id'){
              $configuration->customer_rate_id = $this->request->getData()['new_value'];
            } 
            if($this->Configurations->save($configuration)){
                // $this->log("[Configurations] - [".date("Y-m-d H:i:s")."] - [Field : ".$this->request->getData()['field_name']." - Old Value : ".$this->request->getData()['old_value']." - New Value : ".$this->request->getData()['new_value']."]");
            }
        }
        die();
    }

    public function logo(){
        if ($this->request->is(['patch', 'post', 'put'])){
            $configuration = $this->Configurations->get(1);
            if(!empty($this->request->getData()['featured_image']['tmp_name'])){
                $file = $this->checkFile($this->request->getData()['featured_image'], "logo", "");
                if($file != false){
                    $configuration->logo = $file;
                }
            }else{
                $configuration->logo = "";
            }
            $this->Configurations->save($configuration);
        }

        return $this->redirect(['action' => 'index']);
    }

    public function remove(){
        $configuration = $this->Configurations->get(1);
        $configuration->logo = "";
        $this->Configurations->save($configuration);

        return $this->redirect(['action' => 'index']);
    }
}
