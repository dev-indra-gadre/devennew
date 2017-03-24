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
 * Questions Controller
 *
 * @property App\Model\Table\UsersTable $Users
 */

class QuestionsController extends AppController{

 public function index(){
//  	$questions = $this->Questions->find('all',[
// 								        	'fields' => ['Questions.id','Questions.name','Questions.created'],
// 								        	'contain' => ['Options']
// 							        	]);

// $questions=$questions->toArray();
//  	echo "<pre>"; print_r($questions); exit;
// $this->set(compact('questions'));
$conditions=array();
 	$this->paginate['Questions'] = [
			'limit' => 10,
			'order' => ['Questions.id' => 'DESC'],
			'contain' => ['Options'],
			'conditions' => $conditions
		];
		$this->set('questions', $this->paginate($this->Questions));
       

 }

  public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $question = $this->Questions->get($id);
        if ($this->Questions->delete($question)) {
            $this->Flash->success('The Question  has been deleted.');
        } else {
             $this->Flash->error('The Question could not be deleted. Please, try again.');
        }
        
        return $this->redirect(['action' => 'index']);
    }

public function ajaxCorrectOption(){
     	$this->viewBuilder()->layout("ajax");
	 	$OptionNumber = $this->request->data['OptionNumber'];
        $correct_option = $this->request->data['correct_option'];
	 	
	 	$OptionNumberArrayResponse =array();
	 	if($OptionNumber >=1){
		$OptionNumberArray = range(1,$OptionNumber); 
       
	  }

	$this->set(get_defined_vars());
     }



     public function ajaxOptionDashboard(){
     	$this->viewBuilder()->layout("ajax");
	 	$QuestionId=$this->request->data['QuestionId'];
	 	$OptionNumber = $this->request->data['OptionNumber'];
	 	$OptionNumberArrayResponse =array();
	 	if($OptionNumber >=1){
		$OptionNumberArray = range(1,$OptionNumber); 
        
        $question = $this->Questions->find('all', ['fields' => ['Questions.id','Questions.name','Questions.correct_option_id'],
        									'conditions' => ['Questions.id' => $QuestionId],
        									'contain' => [
        										'Options' => [
        											'fields' => ['Options.id','Options.question_id','Options.name','Options.mark']
        										]
        									]
        								]);
		   $question =$question->toArray();
		   foreach($OptionNumberArray as $key=>$num){
          	 if(!empty($question[0]['options'][$key]->id)){
          	 $OptionNumberArrayResponse[$key]['id']=$question[0]['options'][$key]->id;
         	 $OptionNumberArrayResponse[$key]['name']=$question[0]['options'][$key]->name;
         	 $OptionNumberArrayResponse[$key]['mark']=$question[0]['options'][$key]->mark;
         	 $OptionNumberArrayResponse[$key]['question_id']=$question[0]['options'][$key]->question_id;
         	}else{
         	 $OptionNumberArrayResponse[$key]['id']=null;
         	 $OptionNumberArrayResponse[$key]['name']=null;
         	 $OptionNumberArrayResponse[$key]['mark']=null;
         	 $OptionNumberArrayResponse[$key]['question_id']=null;

         	}

          }
	  }

	$this->set(get_defined_vars());
     }
      

    public function add(){

    	  if ($this->request->is('post')) {
    	  //	echo "<pre>"; print_r($this->request->data); exit;
   
			//Save data
			$this->request->data['name'] = preg_replace('/\s+/', ' ', $this->request->data['name']);
			$this->request->data['number_of_option'] = preg_replace('/\s+/', ' ', $this->request->data['number_of_option']);
            $data = array('name' => $this->request->data['name'],'number_of_option'=>$this->request->data['number_of_option']);
            $data = $this->Questions->newEntity($data);
			if(!$this->Questions->save($data)){
				 $this->Flash->error('Unable to save question.');
                $this->redirect($this->referer());
			}
				$questionid = $data->id;
			    unset($data);
  
             // exit;
            $options =$this->request->data['Option'];
    	  	  foreach($options as $key =>$result){
    	  	  	$option_name = preg_replace('/\s+/', ' ', $result['name']);
    	  	  	$mark = preg_replace('/\s+/', ' ', $result['mark']);
    	  	    $data = array(
				          'name' => $option_name,
			              'question_id' => $questionid,
			              'mark' => $mark  );
			// $optionsTable = TableRegistry::get('Options');
   //          $option = $optionsTable->newEntity($data);
    	  	   $option= $this->Questions->Options->newEntity($data);
			if($this->Questions->Options->save($option)){
			    $optionid[$key] = $option->id;

			}
			else{
				 $this->Flash->error('Unable to save Option'.$key);
                $this->redirect(array('action' => 'index'));
			}
			unset($data);
	
    	  	  }
    	  

    	  	// exit;

			$correct_option_num = $this->request->data['correct_option'];
			// Update Question tbl by adding correct_option_id
			$data = array('id' => $questionid, 'correct_option_id' => $optionid[$correct_option_num]);
            $que =$this->Questions->get($questionid);
            $que = $this->Questions->patchEntity($que,$data);
        //  $que->correct_option_id = $optionid[$correct_option_num];
			if ($this->Questions->save($que)) {


			    $this->Flash->success('Question has been saved.');
			   
                $this->redirect(array('action' => 'index'));
            } else {
                 $this->Flash->error('Unable to add question.');
            }
            	//  debug($optionid); exit;
            unset($data);
        }

    }

     public function edit($id = null) {
	    if (!$id) {
	        throw new NotFoundException(__('Invalid post'));
	    }

	    // $question = $this->Question->findById($id);

	    $question = $this->Questions->find('all', ['fields' => ['Questions.id','Questions.name','Questions.correct_option_id','Questions.number_of_option'],
        									'conditions' => ['Questions.id' => $id],
        									'contain' => [
        										'Options' => [
        											'fields' => ['Options.id','Options.question_id','Options.name','Options.mark']
        										]
        									]
        								]);
	    //debug($question);
	    $question =$question->toArray();
	    
	    if (!$question) {
	        throw new NotFoundException(__('Invalid question'));
	    }
	    // $optionsids = $this->Question->Option->findAllByQuestionId($id);
	    // debug($optionsids); exit;

	    if ($this->request->is('post') || $this->request->is('put')) {   
	     if (!$this->request->data['Option']) {
	       $this->Flash->error('Options Not Selected.');
	        return $this->redirect(['action' => 'edit/'.$id]);
	    }

//debug($question[0]->options); exit;
//debug($this->request->data); exit;
 if(count($this->request->data['Option']) < count($question[0]->options)){
 	$sr=1;
 	foreach($question[0]->options as $key=> $result){

    if(count($this->request->data['Option'])<$sr){
    	
    	$entity = $this->Questions->Options->get($result->id);
 $result = $this->Questions->Options->delete($entity);
    } 
 	
    $sr++;
 	}
 }

//exit;


 $optionid=array();

    $options =$this->request->data['Option'];
    	  	  foreach($options as $key =>$result){

    	  	  	$option_name = preg_replace('/\s+/', ' ', $result['name']);
    	  	  	$option_mark = preg_replace('/\s+/', ' ', $result['mark']);
    	  	  	 $data = array(
				          'name' => $option_name,
			              'question_id' => $id,
			              'mark' => $option_mark);
    	  	    if(empty($result['id'])){

    	  	 
            $option = $this->Questions->newEntity($data);
    	  	   
			//$optionsTable = TableRegistry::get('Options');
           // $option = $optionsTable->newEntity($data);
			if($this->Questions->Options->save($option)){
			    $optionid[$key] = $option->id;
	
			}
			else{
				 $this->Flash->error('Unable to save Option'.$key);
                $this->redirect(array('action' => 'index'));
			}
			unset($data);
		}  else {
    	  	   
			// $optionsTable = TableRegistry::get('Options');
            $optionId =$result['id']; 
             $opt =$this->Questions->Options->get($optionId);
             $opt = $this->Questions->patchEntity($opt,$data);
            if ($this->Questions->Options->save($opt)) {
              $optionid[$key] = $opt->id;
            }
			else{
				 $this->Flash->error('Unable to save Option'.$key);
                $this->redirect(array('action' => 'index'));
			}
			unset($data);
			 
		}
	
    	  	  }
    	  	 

    	  	  	$this->request->data['name'] = preg_replace('/\s+/', ' ', $this->request->data['name']);
			$this->request->data['number_of_option'] = preg_replace('/\s+/', ' ', $this->request->data['number_of_option']);
			$correct_option_number =$this->request->data['correct_option'];
			$correct_option_id = $optionid[$correct_option_number];
			$data = array(
				          'name' => $this->request->data['name'],
				          'number_of_option' => $this->request->data['number_of_option'],
				          'correct_option_id'=> $correct_option_id);
		//	$questionTable = TableRegistry::get('Questions');
            $que = $this->Questions->get($id); // 
            $que = $this->Questions->patchEntity($que,$data);
        	if (!$this->Questions->save($que)) {
				$this->Flash->error('Unable to update question.');
                $this->redirect(array('action' => 'edit', $id));
			}else{
            unset($data);
            $this->Flash->success('Question has been saved.');
            $this->redirect(array('action' => 'index'));
		     
			}
			

	    }

	    if (!$this->request->data) {// debug($question);  exit;

	    	// debug($question[0]->options); exit;
	       //$this->request->data = $question;
	        $this->request->data['name'] = $question[0]->name;
	         $this->request->data['id'] = $question[0]->id;
	        $this->request->data['correct_option'] = $question[0]->correct_option_id;
            $this->request->data['number_of_option'] = $question[0]->number_of_option;
	        $this->set('correct_option_id', $question[0]->correct_option_id);
	        $options_select = array(); $i = 1;
	        foreach($question[0]->options as $option){
	        	//debug($option->id);
	        	 $this->request->data['Option'][$i]['id'] =$option->id;
	        	 $this->request->data['Option'][$i]['name'] =$option->name;
	        	 $this->request->data['Option'][$i]['mark'] =$option->mark;
	        	$options_select[$option->id] = $i++;
	        }
          // debug($this->request->data); //exit;
	        //debug($question[0]->options); exit;
	        $this->set('options_select', $options_select); //Option['.$ii.'][name]
    

	    }
	}

}
?>