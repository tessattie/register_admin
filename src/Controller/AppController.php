<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\Log\Log;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        define("ROOT_DIREC", "/register_admin");
        define("PHOTO_PATH", "C:/wamp/www/register_admin");

        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false,
        ]);
        $this->loadComponent('Flash');

        /*
         * Enable the following component for recommended CakePHP security settings.
         * see https://book.cakephp.org/3/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
    }

    public function beforeFilter(Event $event){
        $this->loadModel("Configurations"); $this->loadModel("Rates"); 
        $configuration = $this->Configurations->get(1);
        $htg = $this->Rates->get(1);
        $usd = $this->Rates->get(2);
        if(empty($this->request->session()->read("from"))){
            $this->request->session()->write("from", date("Y-m-d"));
        }

        if(empty($this->request->session()->read("to"))){
            $this->request->session()->write("to", date("Y-m-d"));
        }
        $this->set("filterfrom", $this->request->session()->read("from"));
        $this->set("filterto", $this->request->session()->read("to"));
        $this->set("htg", $htg);
        $this->set("usd", $usd);
        $this->set("store", $configuration);
        $this->set('status', array(0 => "Inactif", 1 => "Actif"));
        $this->set('rates', $this->Configurations->Rates->find('list')->toArray());
        $this->set("types", array(1 => "SIMPLE", 2 => "SQFT"));
    }

    public function setDates(){
        if ($this->request->is(['put', 'patch', 'post'])){
            if(!empty($this->request->getData()["from"])){
                $this->request->session()->write("from", $this->request->getData()["from"]);
            }

            if(!empty($this->request->getData()["to"])){
                $this->request->session()->write("to", $this->request->getData()["to"]);
            }
        }
        return $this->redirect($this->referer());
    }

    protected function checkfile($file, $name, $directory = ""){
        $allowed_extensions = array('jpg', "JPG", "jpeg", "JPEG", "png", "PNG", 'gif');
        if(!$file['error']){
            $extension = explode("/", $file['type'])[1];
            if(in_array($extension, $allowed_extensions)){
                // $dossier = '/var/www/html/app/webroot/img'.$directory.'/';
                $dossier = PHOTO_PATH.'/webroot/img'.$directory.'/';
                $file_name =$dossier . $name . "." . $extension;
                $db_name = ROOT_DIREC.'/webroot/img'.$directory.'/'. $name . "." . $extension;
                if(move_uploaded_file($file['tmp_name'], $file_name)){
                    return $db_name;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    public function recalculate($supplier_id){
        $this->loadModel("Suppliers");
        $supplier = $this->Suppliers->get($supplier_id);

        $query = $this->Suppliers->Orders->find();
        $usd = $query->select(['sum' => $query->func()->sum('real_total')])
        ->where(['supplier_id' => $supplier->id, 'status' => 3, 'rate_id' => 2]);

        $query = $this->Suppliers->Orders->find();
        $htg = $query->select(['sum' => $query->func()->sum('real_total')])
        ->where(['supplier_id' => $supplier->id, 'status' => 3, 'rate_id' => 1]);


        $query = $this->Suppliers->Spayments->find();
        $phtg = $query->select(['sum' => $query->func()->sum('amount')])
        ->where(['supplier_id' => $supplier->id, 'rate_id' => 1]);

        $query = $this->Suppliers->Spayments->find();
        $pusd = $query->select(['sum' => $query->func()->sum('amount')])
        ->where(['supplier_id' => $supplier->id, 'rate_id' => 2]);


        if(empty($phtg->toArray()[0]['sum'])){
            $pmt_htg = 0;
        }else{
            $pmt_htg = $phtg->toArray()[0]['sum'];
        }
        // debug($usd->toArray()[0]['sum']);
        if(empty($pusd->toArray()[0]['sum'])){
            $pmt_usd = 0;
        }else{
            $pmt_usd = $pusd->toArray()[0]['sum'];
        }

        if(empty($htg->toArray()[0]['sum'])){
            $supplier->balance_htg = 0 - $pmt_htg;
        }else{
            $supplier->balance_htg = $htg->toArray()[0]['sum'] - $pmt_htg;
        }
        // debug($usd->toArray()[0]['sum']);
        if(empty($usd->toArray()[0]['sum'])){
            $supplier->balance_usd = 0 - $pmt_usd;
        }else{
            $supplier->balance_usd = $usd->toArray()[0]['sum'] - $pmt_usd;
        }

        
        $this->Suppliers->save($supplier);

        return $this->redirect(['controller' => "Suppliers", 'action' => 'edit', $supplier_id]);
    }
}
