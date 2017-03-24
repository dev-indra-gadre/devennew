<?php 
namespace App\Controller;
use Cake\ORM\TableRegistry;
use Cake\Auth\DefaultPasswordHasher;
use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
use Cake\Collection\Collection;
use Cake\Database\Schema\Table;
use Cake\Routing\Router;

class QuizzesController extends AppController{

	public function index(){

		// $quizzes = $this->Quiz->find('all',array(
		//     			'contain' => array(
		//     				'Candidate' => array(
		//     					'fields' => array('Candidate.name')
		//     				)
		//     			)
		//     		)); 
		// //debug($quizzes);
  //       $this->set('quizzes', $this->Quiz->find('all',array(array('Quiz.created' => 'desc'))));    


        $conditions=array();
 	$this->paginate['Quizzes'] = [
			'limit' => 10,
			'order' => ['Quizzes.id' => 'DESC'],
			//'contain' => ['Options'],
			'conditions' => $conditions
		];
		$this->set('quizzes', $this->paginate($this->Quizzes));  

	}
	 public function generate(){
    	 if ($this->request->is('post')) {  
         $candidatelistresponse =$this->request->data['data']['Quiz']['Candidate'];
         //debug($this->request->data); exit;
         $candidatelist=array();
         foreach($candidatelistresponse as $key=> $result){
         	if(!empty($result['candidate_id'])){
         	$candidatelist[$key]=$result['candidate_id'];
           }
         }
         $selected_question_list_response =$this->request->data['data']['Quiz']['Question'];
         $selected_question_list=array();
          foreach( $selected_question_list_response as $key=> $result){
         	if(!empty($result['question_id'])){

         	$selected_question_list[$key]=$result['question_id'];
           }
         }
           
                    if($this->request->data['data']['Quiz']['question_selection']=='random'){
         	$total_questions = $this->request->data['data']['Quiz']['total_questions'];
         }else
         {
         		$total_questions = count($selected_question_list);
         }
        
    	// exit;

			
			//debug($quiz_questions); exit;

			$candidate_id = $this->request->data['data']['Quiz']['candidate_id'];
			
			$quiz_name = $this->request->data['quiz_name'];
			$quiz_time = $this->request->data['quiz_time'];

			$characters = 'abcdefghijklmnopqrstuvwxyz0123456789';

			do{
				$string = '';
				for ($i = 0; $i < 4; $i++) {
				    $string .= $characters[rand(0, strlen($characters) - 1)];
				}
				$quiz_code = $string; //debug($quiz_code);
				$data = array('code' => $quiz_code);
				//$this->Quiz->set($data);
			}while($i < 4);		//exit;	


			$this->request->data['code'] = $quiz_code;
			$data = array('candidate_id' => $candidate_id,'quiz_name' => $quiz_name,'quiz_time' => $quiz_time, 'code' => $quiz_code, 'total_questions' => $total_questions);
 
		//	exit;
			  $data = $this->Quizzes->newEntity($data);
			if (!$this->Quizzes->save($data)) {
				debug('Unable to add quiz.');
				exit;   
			}
		$quizid = $data->id;
			unset($data);

			
			// $quiz_questions = $this->Quiz->QuizQuestion->Question->find('list', array( 
			// 															'fields' => array('id')	,
			// 															'order' => 'rand()',
			// 															'limit' => $total_questions
			// 														));

			
			$data_candidate = array();
			foreach($candidatelist as $quiz_candidate){
				$i = 1;
				  if($this->request->data['data']['Quiz']['question_selection']=='random'){
				$quiz_questions = $this->Quizzes->QuizzQuestions->Questions->find('list', [ 
																		'keyField' => 'id',
																		'valueField'=> 'name',
																		'order' => 'rand()',
																		'limit' => $total_questions
																	]);
       //       $quiz_questions = $quiz_questions->toArray();
		     // debug($quiz_questions);
			}else{
				$quiz_questions =$selected_question_list;
			}
			foreach($quiz_questions as $key=> $quiz_question){
			//	debug($quiz_question);
				$data[] = array(
					'candidate_id'=>$quiz_candidate,
					'quizz_id' => $quizid, 
					'question_id' => $key,
					'position' => $i++
					);
			}
		//	exit;
			$data_candidate[] = array('candidate_id'=>$quiz_candidate,'quizz_id' => $quizid);
		}
		
			// $QuizzQuestions = TableRegistry::get('QuizzQuestions');
            
             $entities = $this->Quizzes->QuizzQuestions->newEntities($data);
			if ($this->Quizzes->QuizzQuestions->saveMany($entities)) {
			// $QuizzCandidates = TableRegistry::get('QuizzCandidates');
             $entities = $this->Quizzes->QuizzCandidates->newEntities($data_candidate);
			 $this->Quizzes->QuizzCandidates->saveMany($entities);
			 $this->Flash->success('Quiz has been saved.');
             $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error('Unable to add quiz.');
            }
			unset($data);
    	}
    	if (!$this->request->data) { //debug($quiz); exit;    		
    		$candidates = $this->Quizzes->Candidates->find('list',['keyField' => 'id','valueField'=> 'name']);    		   		  		

	    //	debug($candidates->toArray());
	    	$this->set('candidates', $candidates);

	     						        
	    $questions_count = $this->Quizzes->QuizzQuestions->Questions->find()->count();
	    //	$questions_count = 10;
	    	$i = 1;	    	
	    	while($questions_count){
	    		$questions[$i]= $i;
	    		$i++;
	    		$questions_count--;
	    	}
	    	$question_list = $this->Quizzes->QuizzQuestions->Questions->find('list',['keyField' => 'id','valueField'=> 'name']);
	    	$this->set(compact('questions','question_list'));	    		        
	    }
    }

        public function appear(){
    	$candidate_id =$this->request->session()->read('Auth.User.candidate_id'); 

       $this->request->session()->delete('form.params.quiz');
    	 
    	if ($this->request->is('post')) {  

    		//$quiz_id = $this->Quizzes->field('id',['code' => $this->request->data['code']]);

    		$quizInfo = $this->Quizzes->find('all', [ 'conditions' => ['Quizzes.code' => $this->request->data['code']]])->first();
    		
           
    		$quiz_id =$quizInfo->id;
    	   		
    		if(!empty($quiz_id)){ 	
                
    			$quiz = $this->Quizzes->find('all', [    	
					'conditions' => ['Quizzes.id' => $quiz_id],
				    'contain' => [		        
				        'QuizzQuestions' => [
				        'conditions' => ['QuizzQuestions.candidate_id' => $candidate_id],//candidateId	        			        		        	    
				            'Questions' => [
				                'fields' => ['Questions.id','Questions.correct_option_id']    
				            ]
				        ]
				    ]
				])->first();

	//	 exit;
				if (!$quiz->quizz_questions) {
		          //  throw new NotFoundException(__('Invalid Quiz'));
					  $this->Session->setFlash('Sorry. There is no Quiz assigned to you with given code.');
		           
		            $this->redirect(array('action' => 'appear'));
		          }
		          $quiz =$quiz->toArray();
                 // debug($quiz); exit;
				$this->request->session()->write('form.params.quiz', $quiz);
				
              date_default_timezone_set("Asia/Calcutta");
              $formatDate = date("M d,Y H:i:s");
              $datetimeinfo=array('date'=>$formatDate,
	                 'min'=>$quiz['quiz_time']);
               $this->request->session()->write('form.params.quiztime', $datetimeinfo);
               
			return $this->redirect(['action' => 'setquizzQue/1']);
			//	 exit;

    		} else {
    			$this->Flash->error('Sorry. There is no quiz with given code.');
    		}
    	}    	    	
    }


    function ajaxResult(){
	$candidate_id =$this->request->session()->read('Auth.User.candidate_id');
    	$this->viewBuilder()->layout("ajax");
        // if ($this->request->is('ajax')) {
             $quiz_id =$this->request->data['quiz_id'];
             $elapsedTime =$this->request->data['elapsedTime'];

    				$quiz_questions = $this->Quizzes->QuizzQuestions->find('all',[
						'fields' => ['QuizzQuestions.option_id'],
						'conditions' => ['QuizzQuestions.quizz_id' => $quiz_id,'QuizzQuestions.candidate_id' => $candidate_id],
						'contain' => [
							'Questions' => ['fields' => ['Questions.correct_option_id']]
						]
				]	);
				$quiz_questions =$quiz_questions->toArray();
				//debug($quiz_questions); exit;
				$score = 0;
				foreach($quiz_questions as $quiz_question){
					if($quiz_question['QuizQuestion']['option_id'] == $quiz_question['Question']['correct_option_id'])
						$score++;
				}
             $today = date('Y-m-d h:i:s');
             $this->Quizzes->updateAll(
				    ['elapsedTime' => $elapsedTime, 'completed_date' => "'$today'"],
				    ['id' => $quiz_id]
				);
            $this->Quizzes->QuizzCandidates->updateAll(
				    ['score' => $score, 'elapsedTime' => $elapsedTime, 'completed_date' => "'$today'"],
				    ['quizz_id' => $quiz_id,'candidate_id' => $candidate_id]
				);


		// 		$result = $this->Quizzes->find('all', [
		// 	'fields' => ['Quizzes.candidate_id','Quizzes.total_questions','Quizzes.score','Quizzes.quiz_name','Quizzes.quiz_time','Quizzes.elapsedTime','Quiz.completed_date'),
  //       	'conditions' => array('Quiz.id' => $quiz_id),
		//     'contain' => array(		        
		//         'Candidate' => array(
		//             'fields' => array('Candidate.name')
		//         ),
		//          'QuizCandidate' => array(
		//             'fields' => array('QuizCandidate.score','QuizCandidate.candidate_id','QuizCandidate.elapsedTime','QuizCandidate.completed_date'),
		//             'conditions' => array('QuizCandidate.candidate_id' => $candidate_id)
		//         ),
		//         'QuizQuestion' => array('fields' => array('QuizQuestion.id'),
		//                 'conditions' => array('QuizQuestion.candidate_id' => $candidate_id),		            
		//             'Option' => array('fields' => array('Option.id','Option.name')),
		//             'Question' => array(
		//                 'fields' => array('Question.name','Question.mark'),
		//                 'CorrectOption' => array('fields' => array('CorrectOption.id','CorrectOption.name'))
		//             )
		//         )
		//     )
		// ));

	$result = $this->Quizzes->find('all',[
			//'fields' => ['Quizzes.candidate_id','Quizzes.total_questions','Quizzes.score','Quizzes.quiz_name','Quizzes.quiz_time','Quizzes.elapsedTime','Quizzes.completed_date'],
        	'conditions' =>['Quizzes.id' =>  $quiz_id],
		    'contain' => [		        
		      
		        'QuizzCandidates'
		         => [
		            'fields' => ['QuizzCandidates.quizz_id','QuizzCandidates.score','QuizzCandidates.candidate_id','QuizzCandidates.elapsedTime','QuizzCandidates.completed_date'],
		            'conditions' => ['QuizzCandidates.candidate_id' => $candidate_id]
		        ],

		        'QuizzQuestions' => ['fields' => ['QuizzQuestions.quizz_id'],	
		          'conditions' => ['QuizzQuestions.candidate_id' => $candidate_id],		            
		            'Options' => ['fields' => ['Options.id','Options.name','Options.mark']],
		            'Questions' => [
		                'fields' => ['Questions.name','Questions.mark','Questions.correct_option_id'],
		              //  'CorrectOption' => ['fields' => ['CorrectOption.id','CorrectOption.name']]
		            ]
		        ]
		    ]
		])->first();

		 $this->request->session()->delete('form.params.quiz');
		        $candidates = $this->Quizzes->Candidates->find('list',
												        [ 'keyField' => 'id',
														  'valueField'=> 'name']   
												    ); 
		        $candidates =$candidates->toArray();
               if(!empty($result)){
		        $result=$result->toArray(); }
		        $this->set(compact('result','candidates'));

				$this->render('result');


        // }
    }

    public function setquizzQue($question_num = 1){
    	
    	$candidate_id =$this->request->session()->read('Auth.User.candidate_id');
    	/**
		 * check if a quiz has setup, otherwise redirect to appear
		 */
    	$quiz = $this->request->session()->read('form.params.quiz');
    	//echo "<pre>"; print_r($quiz); exit;
    	if(!$quiz) {
    		$this->redirect(['action' => 'appear']);	
    	}
    	
    	$total_questions = count($quiz['quizz_questions']); 

		if ($total_questions<$question_num) {
			$this->Flash->error('Invalid question.');
            $this->redirect(['action' => 'setquizzQue']);
		}
			//debug($quiz); exit; 		
		if ($this->request->is('post')) {					

	      		// debug($this->request->data); exit;
			$candidate_ans = $this->request->data['data']['Quiz']['options'];
			
			$quizQuestion_id = $this->request->session()->read('form.params.quizQuestion_id');
			$question_num = $this->request->session()->read('form.params.quizQuestion_num');
			$quiz_time = $this->request->session()->read('form.params.quiz.Quiz.quiz_time');
			$elapsedTime =$this->request->data['data']['Quiz']['elapsedTime'];
		
		//	debug($quizQuestion_id);//save data to db
			if(!empty($candidate_ans)){
				$this->Quizzes->QuizzQuestions->updateAll(
					    ['option_id' => $candidate_ans],
					    ['id' => $quizQuestion_id]
					);
	
			}		
				//exit;
			/**
			 * if this is not the last question we redirect candidate to next question.
			 */
			
			if(isset($this->request->data['next'])){										
				$this->redirect(array('action' => 'setquizzQue', $question_num + 1));
			}elseif(isset($this->request->data['previous'])){
				$this->redirect(array('action' => 'setquizzQue', $question_num - 1));
			}else{ //submit quiz
				/**
				 * otherwise, this is the final question.
				 */
              //  debug($quiz);
				$quiz_questions = $this->Quizzes->QuizzQuestions->find('all',[
						'fields' => ['QuizzQuestions.option_id'],
						'conditions' => ['QuizzQuestions.quizz_id' => $quiz['id'],'QuizzQuestions.candidate_id' => $candidate_id],
						'contain' => [
							'Questions' => ['fields' => ['Questions.correct_option_id']]
						]
				]	);
				$quiz_questions =$quiz_questions->toArray();
				//debug($quiz_questions); exit;
				$score = 0;
				foreach($quiz_questions as $quiz_question){
					if($quiz_question['QuizQuestion']['option_id'] == $quiz_question['Question']['correct_option_id'])
						$score++;
				}
				
				$today = date('Y-m-d h:i:s');					
				// $this->Quizzes->unbindModel(
			 //        ['hasMany' => ['QuizzQuestion'],'belongsTo' => ['Candidates']]
			 //    );

				$this->Quizzes->updateAll(
				    ['score' => $score, 'elapsedTime' => $elapsedTime, 'completed_date' => "'$today'"],
				    ['id' => $quiz['id']]
				);
				$this->Quizzes->QuizzCandidates->updateAll(
				    ['score' => $score, 'elapsedTime' => $elapsedTime, 'completed_date' => "'$today'"],
				    ['quizz_id' => $quiz['id'],'candidate_id' => $candidate_id]
				);

			
        
          //  debug( $quiz['id']);
				$result = $this->Quizzes->find('all',[
			//'fields' => ['Quizzes.candidate_id','Quizzes.total_questions','Quizzes.score','Quizzes.quiz_name','Quizzes.quiz_time','Quizzes.elapsedTime','Quizzes.completed_date'],
        	'conditions' =>['Quizzes.id' => $quiz['id']],
		    'contain' => [		        
		      
		        'QuizzCandidates'
		         => [
		            'fields' => ['QuizzCandidates.quizz_id','QuizzCandidates.score','QuizzCandidates.candidate_id','QuizzCandidates.elapsedTime','QuizzCandidates.completed_date'],
		            'conditions' => ['QuizzCandidates.candidate_id' => $candidate_id]
		        ],

		        'QuizzQuestions' => ['fields' => ['QuizzQuestions.quizz_id'],	
		          'conditions' => ['QuizzQuestions.candidate_id' => $candidate_id],		            
		            'Options' => ['fields' => ['Options.id','Options.name','Options.mark']],
		            'Questions' => [
		                'fields' => ['Questions.name','Questions.mark','Questions.correct_option_id'],
		              //  'CorrectOption' => ['fields' => ['CorrectOption.id','CorrectOption.name']]
		            ]
		        ]
		    ]
		])->first();

	
		        $this->request->session()->delete('form.params.quiz');
		        $candidates = $this->Quizzes->Candidates->find('list',
												        [ 'keyField' => 'id',
														  'valueField'=> 'name']   
												    ); 
		        $candidates =$candidates->toArray();
               if(!empty($result)){
		        $result=$result->toArray(); }
		        $this->set(compact('result','candidates'));

				$this->render('result');
									
				// $this->Session->setFlash('Quiz Submitted!');
				 // $this->redirect(array('action' => 'appear'));
			}
			
		} else {
			//load prefilled data of requested question					
			 //debug($quiz);
		
			$quiz_question = $this->Quizzes->find('all', [    	
				        	'conditions' => ['Quizzes.id' => $quiz['id']],
						    'contain' => [	        
						        'QuizzQuestions' => [
						        	//'conditions' => array('QuizQuestion.position' => $question_num,'QuizQuestion.candidate_id' => $candidate_id),
						        	'conditions' => ['QuizzQuestions.position' => $question_num,'QuizzQuestions.candidate_id' => $candidate_id],		        			        		        	    
						            'Questions' => [
						                'fields' => ['Questions.id','Questions.name','Questions.mark','Questions.correct_option_id'],
						                'Options' => ['fields' => ['Options.id','Options.question_id','Options.name']]    
						            ],
						            'Quizzes' => [
						                'fields' => ['Quizzes.quiz_time','Quizzes.elapsedTime'],
						                   
						         ]
						        ]
						    ]
						 ]
						)->first();
			$quiz_question_attempt = $this->Quizzes->find('all', [    	
				        	'conditions' =>['Quizzes.id' => $quiz['id']],
						    'contain' => [		        
						        'QuizzQuestions' => [
						        	'conditions' => ['QuizzQuestions.candidate_id' => $candidate_id],		        			        		        	    
						            'Questions' => [
						                'fields' => ['Questions.id','Questions.name','Questions.mark','Questions.correct_option_id'],
						                'Options' => ['fields' => ['Options.id','Options.question_id','Options.name']]    
						            ],
						            'Quizzes' => [
						                'fields' => ['Quizzes.quiz_time','Quizzes.elapsedTime'],
						                   
						            ]
						        ]
						    ]
						])->first();

              //  debug($quiz_question);
                //debug($quiz_question->quizz_questions); 
			// $question['currentQuestion'] = $question_num;
			$question = $quiz_question->quizz_questions[0];
			$question['total_questions'] = $total_questions;
			$this->request->session()->write('form.params.quizQuestion_id', $question->id);
			$this->request->session()->write('form.params.quizQuestion_num', $question_num);
			//debug($question); exit;
			$this->set(compact('question','quiz_question_attempt'));			
		}		
	}
 
}

?>