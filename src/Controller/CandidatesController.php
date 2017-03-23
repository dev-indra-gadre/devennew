<?php 
namespace App\Controller;
use Cake\ORM\TableRegistry;
use Cake\Auth\DefaultPasswordHasher;
use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
use Cake\Collection\Collection;
use Cake\Database\Schema\Table;
use Cake\Routing\Router;



class CandidatesController extends AppController{

	public function index(){

     $conditions=array();
 	$this->paginate['Candidates'] = [
			'limit' => 10,
			'order' => ['Candidates.id' => 'DESC'],
			//'contain' => ['Options'],
			'conditions' => $conditions
		];
		$this->set('candidates', $this->paginate($this->Candidates));

	}
	  public function edit($id=null){
	  		if(!$id){ //add
			if ($this->request->is('post')) {
				 // debug($this->request->data); exit;
				$this->request->data['name'] = preg_replace('/\s+/', ' ', $this->request->data['name']);
		        $this->request->data['address'] = preg_replace('/\s+/', ' ', $this->request->data['address']);
		        $data = $this->Candidates->newEntity($this->request->data);
	            if ($this->Candidates->save($data)) {
	                $this->Flash->success('Candidate has been saved.');
	                $this->redirect(array('action' => 'index'));
	            } else {
	                $this->Flash->error('Unable to add candidate.');
	            }
	        }
	        $this->set('addedit', 0);
		}else{ //edit
			// $candidate = $this->Candidate->findById($id);
			$candidate = $this->Candidates->find('all', 
				                           [ 'conditions' => ['Candidates.id' => $id],
        									'contain' => false
        								]);
             $candidate =$candidate->toArray();
			// debug($candidate); exit;
		    if (!$candidate) {
		        throw new NotFoundException(__('Invalid candidate'));
		    }

		    if ($this->request->is('post') || $this->request->is('put')) {
		       
		       $this->request->data['name'] = preg_replace('/\s+/', ' ', $this->request->data['name']);
		        $this->request->data['address'] = preg_replace('/\s+/', ' ', $this->request->data['address']);
		        $candidateId = $this->Candidates->get($id);
               $candidate= $this->Candidates->patchEntity($candidateId, $this->request->data);
		        if ($this->Candidates->save($candidate)) {

		              $this->Flash->success('Candidate has been updated.');
		            $this->redirect(array('action' => 'index'));
		        } else {
		           $this->Flash->error('Unable to update candidate.');
		        }
		    }

		    if (!$this->request->data) {
		        $this->request->data = $candidate[0];
		      //  echo "<pre>"; print_r($this->request->data);
		    }
		    $this->set('addedit', 1);
		}

	  }
	public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $candidate = $this->Candidates->get($id);
        if ($this->Candidates->delete($candidate)) {
            $this->Flash->success('The Candidate  has been deleted.');
        } else {
             $this->Flash->error('The Question could not be deleted. Please, try again.');
        }
        
        return $this->redirect(['action' => 'index']);
    }
}

?>