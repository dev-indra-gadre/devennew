<?php 
namespace App\Controller;
use Cake\ORM\TableRegistry;
use Cake\Auth\DefaultPasswordHasher;
use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
use Cake\Collection\Collection;
use Cake\Database\Schema\Table;
use Cake\Routing\Router;

/**
 * Permissions Controller
 *
 * @property App\Model\Table\UsersTable $Users
 */
  class  PermissionsController extends AppController {

  	public function index(){

  	 $designation = array('0'=>'Customer',
			                 '1'=>'Admin');
     $this->set(compact('designation'));
     if ($this->request->is('post')) {
     
$permission=$this->request->data;
unset($permission['Permission']['designation_id']);
foreach($permission['Permission'] as $key1=> $permission1){
//debug($permission1);exit;
	


	foreach($permission1 as $key2=>$permission2){

if(isset($permission1[$key2]['edit'])){
	$edit=$permission1[$key2]['edit'];
} else{
	$edit=0;
}
if(isset($permission1[$key2]['view'])){
	$view=$permission1[$key2]['view'];
} else{
	$view=0;
}
if(isset($permission1[$key2]['order'])){
	$order=$permission1[$key2]['order'];
} else{
	$order=0;
}
	 	$designation_id = $this->request->data['designation_id'];

$data[]=array(
		//	"company_registration_id"=>$company_registration_id,
			"designation_id"=>$designation_id,
			//"division_id"=>$division_id,
			//"designation_id"=>$designation_id,
			//"sidebar_link"=>$permission1[$key2]['sidebar_link'],
			
			"view"=>$view,
			"edit"=>$edit,
			"controller"=>$permission1[$key2]['controller'],
			"action"=>$permission1[$key2]['action'],
			"module"=>$permission1[$key2]['module'],
			"title_link"=>$permission1[$key2]['title_link'],
			//"main_link"=>$permission1[$key2]['main_link'],
			"sidebar_link"=>$permission1[$key2]['sidebar_link'],
			"order_sequence"=>$order,
	);

	}
}


//debug($data); exit;
$this->Permissions->deleteAll(['Permission.designation_id'=>$designation_id]);
 $data = $this->Permissions->newEntities($data);
$this->Permissions->saveMany($data);
//exit;
//$this->Session->setFlash('The Permission has been updated successfully.', 'flash_success');
			return $this->redirect(['action' => 'index']);
  //exit;




     }

  	}

  	 public function dashboardPermission() {
	 //	$this->layout='ajax';
	 	$this->viewBuilder()->layout("ajax");
	 	
	 //	$company_id = $this->data['company_id'];
	 	$designation_id = $this->request->data['designation_id'];

	   // echo "<pre>"; print_r($designation_id);
		
	$this->set(get_defined_vars());
		
	}

}

?>