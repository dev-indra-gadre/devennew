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
 * Users Controller
 *
 * @property App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController {

	// public function beforeFilter() {
	//     parent::beforeFilter();
	//     $this->response->header('Access-Control-Allow-Origin','*');
	//     $this->response->header('Access-Control-Allow-Methods','*');
	//     $this->response->header('Access-Control-Allow-Headers','X-Requested-With');
	// }

  public function index(){

     $conditions=array();
  $this->paginate['Users'] = [
      'limit' => 10,
      'order' => ['Users.id' => 'DESC'],
      //'contain' => ['Options'],
      'conditions' => $conditions
    ];
    $this->set('users', $this->paginate($this->Users));

  }

  public function add() {
    $user = $this->Users->newEntity($this->request->data);
    if ($this->request->is('post')) {
       $newpassword = (new DefaultPasswordHasher)->hash($this->request->data['password']);
       echo "<pre>";  print_r($newpassword); exit;
      if ($this->Users->save($user)) {
          echo "<pre>"; print_r($this->request->data); exit;
        $this->Flash->success('The user has been saved.');
        return $this->redirect(['action' => 'index']);
      } else {
        $this->Flash->error('The user could not be saved. Please, try again.');
      }
    }
    $this->set(compact('user'));
  }

  function dashboard(){
    // $psw='admin';
    //   $newpassword = (new DefaultPasswordHasher)->hash($psw);
    //    echo "<pre>";  print_r($newpassword); exit;

  }

public function edit($id=null){

    if(!$id){ //add
      if ($this->request->is('post')) {
        $this->User->create();
            $this->request->data['username'] = preg_replace('/\s+/', ' ', $this->request->dat['username']);
            $this->request->data['password'] = (new DefaultPasswordHasher)->hash($this->request->data['password']);
            $this->request->data['candidate_id'] = $this->request->data['candidate_id'];
            $this->request->data['admin'] = 0;
           //echo "<pre>"; print_r($this->request->data); exit;
            $data = $this->Users->newEntity($this->request->data);
              if ($this->Users->save($data)) {

                  $this->Flash->success('User has been saved.');
                  $this->redirect(array('action' => 'index'));
              } else {
                  $this->Flash->error('Unable to add User.');
              }
          }
          $this->set('addedit', 0);
          $candidatesres = $this->Users->Candidates->find('list',['keyField' => 'id','valueField'=> 'name']);
    $candidates=array();
    foreach($candidatesres as $key=>$result){
    $user = $this->Users->find('all', ['conditions' => ['Users.candidate_id' => $key],'contain' => false]);
    $user =$user->toArray();
        if(empty($user[0])){  $candidates[$key]=$result;}
        }

    
    
    }else{ //edit
      // $candidate = $this->Candidate->findById($id);
      $user = $this->Users->find('all', [
                          'conditions' => ['Users.id' => $id],
                          'contain' => false
                        ]);
      $user=$user->toArray();
        if (!$user[0]) {
            throw new NotFoundException(__('Invalid user'));
        }

        if ($this->request->is('post') || $this->request->is('put')) {
            $this->User->id = $id;
            //debug($this->request->data); exit;
            $this->request->data['User']['username'] = preg_replace('/\s+/', ' ', $this->request->data['User']['username']);
            $passwordnew = $this->User->find('first',array('conditions'=>array('User.id'=>$id)));
                $topass = $passwordnew['User']['password'];

               if($this->request->data['User']['password']==''){$this->request->data['User']['password'] =$topass; }else{
             $this->request->data['User']['password'] = AuthComponent::password($this->request->data['User']['password']);
                }
                $this->request->data['User']['candidate_id'] = $this->request->data['User']['candidate_id'];
 

            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash('User has been updated.');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Unable to update User.');
            }
        }

        if (!$this->request->data) {
            $this->request->data = $user[0];
        }
        $this->set('addedit', 1);
         $candidates=array();
          $candidates = $this->Users->Candidates->find('list',['keyField' => 'id','valueField'=> 'name']);
         // $candidates =$candidates->toArray();

    }
  

    
    // debug($candidates);


        $this->set('candidates', $candidates);

  }

function login(){
	
	//$this->layout = 'login';
	
	//$this->loadModel('Users');
	
	
	
	if ($this->request->is('post')) {

    echo "<pre>"; print_r($this->request->data);
    $user = $this->Auth->identify();
          if ($user) {
             $this->Auth->setUser($user);
  echo 'login success..!';
 //  echo "<pre>"; print_r($this->Auth->user()); exit;
 //  echo "<pre>"; print_r($this->Auth->user); exit;
 // echo "<pre>";  print_r($this->Auth->request); exit;
  return $this->redirect(['controller'=>'users','action'=>'dashboard']);
  
  }


     exit;
		//date_default_timezone_set('Asia/Kolkata');
		// $now = date('Y-m-d h:i:s a');
  //       $findUserid = $this->Users->find('all',[
 	// 					'conditions' => [
 	// 						'Users.username' => $this->request->data['username']
 	// 					]]);
  //       $findUserid = $findUserid->toArray();
  //       if(empty($findUserid)){
  //       	//User Log Details
	 //        $data = [
	 //        	'status' => 'invalid user',
	 //        	'datetime' => $now,
	 //        	'ip_address' => $this->request->env('REMOTE_ADDR'),
	 //        	'device' => $this->request->env('HTTP_USER_AGENT')
	 //        ];
		// 	$userlogDetails = TableRegistry::get('UserLogs');
		// 	$details = $userlogDetails->newEntity($data);
	 //        $userlogDetails->save($details);
	 //        $this->Flash->error(
  //               __('Username or password is incorrect'),
  //               'default',
  //               [],
  //               'auth'
  //           );
  //       } else{
  //       	$user = $this->Auth->identify();
  //       	if ($user) {
  //       //User Log Details
  //       $data = [
  //       	'school_detail_id' => $user['school_detail_id'],
  //       	'user_id' => $findUserid[0]['id'],
  //       	'status' => 'login success',
  //       	'datetime' => $now,
  //       	'ip_address' => $this->request->env('REMOTE_ADDR'),
  //       	'device' => $this->request->env('HTTP_USER_AGENT')
  //       ];
		// $userlogDetails = TableRegistry::get('UserLogs');
		// $details = $userlogDetails->newEntity($data);
  //       $userlogDetails->save($details);

  //       //find school classes data
 	// 	$query = $this->SchoolClasses->find('all',['conditions' => ['SchoolClasses.school_detail_id' => $user['school_detail_id'] ]]) ; 
 	// 	$schooldata = $query->toArray();
 	// 	//find school bank details
 	// 	$query1 = $this->SchoolBankDetails->find('all',[
 	// 					'conditions' => [
 	// 						'SchoolBankDetails.school_detail_id' => $user['school_detail_id']],
 	// 					'contain' => ['SchoolDetails']
 	// 					]) ; 
 	// 	$schoolBankDetail = $query1->toArray();

 	// 	//find subjects data
 	// 	$query2 = $this->Subjects->find('all',[
 	// 					'conditions' => [
 	// 						'Subjects.school_detail_id' => $user['school_detail_id']],
 						 
 						
 	// 					]) ; 
 	// 	$subjects = $query2->toArray();

 	// 	//find classsubjects data
 	// 	$query3 = $this->ClassSubjects->find('all',[
 	// 					'conditions' => [
 	// 						'ClassSubjects.school_detail_id' => $user['school_detail_id']],
 						 
 						
 	// 					]) ; 
 	// 	$Classsubjects = $query3->toArray();

 	// 	//find fees types data
 	// 	$query4 = $this->FeesTypes->find('all',[
 	// 					'conditions' => [
 	// 						'FeesTypes.school_detail_id' => $user['school_detail_id']],
 						 
 						
 	// 					]) ; 
 	// 	$feesTypes = $query4->toArray();

 	// 	//find exam types data
 	// 	$query5 = $this->ExamTypes->find('all',[
 	// 					'conditions' => [
 	// 						'ExamTypes.school_detail_id' => $user['school_detail_id']],
 						 
 						
 	// 					]) ; 
 	// 	$examTypes = $query5->toArray();
 	// 	//find grades types data
 	// 	$query6 = $this->Grades->find('all',[
 	// 					'conditions' => [
 	// 						'Grades.school_detail_id' => $user['school_detail_id']],
 						 
 						
 	// 					]) ; 
 	// 	$grades = $query6->toArray();

 	// 	//find school admission code  data
 	// 	$query7 = $codeTable->find('all',[
 	// 					'conditions' => [
 	// 						'SchoolAdmissionCodes.school_detail_id' => $user['school_detail_id']],
 						 
 						
 	// 					]) ; 
 	// 	$codes = $query7->toArray();

  //       	if($user['role_id'] == 5){
  //       		$action = 'index';
  //       		$controller = 'users';
  //        	}elseif($user['reset_status'] == 1 && empty($schoolBankDetail)) {
  //        		$action = 'registration';
  //       		$controller = 'school_details';
  //        	}elseif($user['reset_status'] == 1 && !empty($schoolBankDetail) && empty($schooldata) && $user['role_id'] != 4){
  //        		$action = 'step1';
  //       		$controller = 'school_classes';
  //        	}elseif($user['reset_status'] == 1  && !empty($schooldata) && empty($subjects) && $user['role_id'] != 4){
  //        		$action = 'step2';
  //       		$controller = 'school_classes';
  //        	}elseif($user['reset_status'] == 1 && !empty($subjects) && empty($Classsubjects) && $user['role_id'] != 4){
  //        		$action = 'step3';
  //       		$controller = 'school_classes';
  //        	}elseif($user['reset_status'] == 1 && !empty($Classsubjects) && empty($feesTypes) && $user['role_id'] != 4){
  //        		$action = 'step4';
  //       		$controller = 'fees_types';
  //        	}elseif($user['reset_status'] == 1 && !empty($feesTypes) && (empty($examTypes) || empty($grades)) && $user['role_id'] != 4){
  //        		$action = 'step6';
  //       		$controller = 'school_classes';
  //        	}elseif($user['reset_status'] == 1 && (!empty($examTypes) || !empty($grades)) && empty($codes) && $user['role_id'] != 4){
  //        		$action = 'step7';
  //       		$controller = 'school_classes';
  //        	}elseif($user['reset_status'] == 1 && !empty($codes) && $user['role_id'] != 4){
  //        		$action = 'dashboard';
  //       		$controller = 'users';
  //        	}elseif($user['reset_status'] == 1 && !empty($schooldata) && $user['role_id'] == 4){
  //        		$action = 'parent_dashboard';
  //       		$controller = 'users';
  //        	}
  //        	else {
  //       		$action = 'reset_password';
  //       		$controller = 'users';
  //       	}

  //           $this->Auth->setUser($user);
            
  //           return $this->redirect(['controller' => $controller,'action' => $action]);
  //       } else {
  //           $this->Flash->error(
  //               __('Username or password is incorrect'),
  //               'default',
  //               [],
  //               'auth'
  //           );
  //           //User Log Details
	 //        $data = [
	 //        	'school_detail_id' => $user['school_detail_id'],
	 //        	'user_id' => $findUserid[0]['id'],
	 //        	'status' => 'login failed',
	 //        	'datetime' => $now,
	 //        	'ip_address' => $this->request->env('REMOTE_ADDR'),
	 //        	'device' => $this->request->env('HTTP_USER_AGENT')
	 //        ];
		// 	$userlogDetails = TableRegistry::get('UserLogs');
		// 	$details = $userlogDetails->newEntity($data);
	 //        $userlogDetails->save($details);
  //       }
  //       }
    }
    
}

	public function logout() {
	    return $this->redirect($this->Auth->logout());
	}


}
