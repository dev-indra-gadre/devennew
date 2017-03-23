<?php
namespace App\Model\Table;
use Cake\Auth\DigestAuthenticate;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\TableRegistry;

/**
 * Users Model
 */
class UsersTable extends Table {

/**
 * Initialize method
 *
 * @param array $config The configuration for the Table.
 * @return void
 */
	public function initialize(array $config) {
		$this->table('users');
		$this->displayField('id');
		$this->primaryKey(['id']);
		$this->addBehavior('Timestamp');
		// $this->hasMany('Candidates', [
		// 	'foreignKey' => 'user_id',
		// ]);
		 $this->hasOne('Candidates');

		// $this->belongsTo('SchoolDetails', [
		// 	'foreignKey' => 'school_detail_id',
		// ]);
		// $this->belongsTo('Roles', [
		// 	'foreignKey' => 'role_id',
		// ]);
	}

/**
 * Default validation rules.
 *
 * @param \Cake\Validation\Validator $validator
 * @return \Cake\Validation\Validator
 */
	// public function validationDefault(Validator $validator) {
	// 	$validator
	// 		->add('id', 'valid', ['rule' => 'numeric'])
	// 		->allowEmpty('id', 'create')
	// 		->validatePresence('username', 'create')
	// 		->notEmpty('username')
	// 		->add('username', [
	// 			            'unique' => [
	// 			                'rule' => ['validateUnique', ['scope' => 'school_detail_id']],
	// 			                'provider' => 'table'
	// 			            ]
	// 			        ])
			
	// 		->validatePresence('password', 'create')
	// 		->notEmpty('password')
	// 		->add('school_detail_id', 'valid', ['rule' => 'numeric'])
	// 		->allowEmpty('school_detail_id')
	// 		->add('role_id', 'valid', ['rule' => 'numeric'])
	// 		->validatePresence('role_id', 'create')
	// 		->notEmpty('role_id')
	// 		->validatePresence('email')
 //    		->add('email', 'validFormat', [
 //        		  'rule' => 'email',
 //        		  'message' => 'E-mail must be valid'
 //    		])
 //            ->add('email', [
 //                            'unique' => [
 //                                'rule' => ['validateUnique', ['scope' => 'school_detail_id']],
 //                                'provider' => 'table',
 //                                'message' => 'This Email ID already exist!'
 //                            ]
 //                        ])
 //    		->notEmpty('new_psw', 'Please enter new password')
 //    		->notEmpty('old_psw', 'Please enter old password')
 //    		->notEmpty('confirm_psw', 'Your must comfirm your password')
 //    		->add('confirm_psw', 'custom',[
 //        		  'rule' => 'match_password',
 //        		  'message' => 'New password & Confirm password did not match.'
 //    		])
            
 //    		;

	// 	return $validator;
	// }

	// public function beforeSave(Event $event) {
 //        $entity = $event->data['entity'];

 //        // Make a password for digest auth.
 //        $entity->digest_hash = DigestAuthenticate::password(
 //            $entity->username,
 //            $entity->plain_password,
 //            env('SERVER_NAME')
 //        );
 //        return true;
 //    }

 //    public function match_password()
 //    {

 //        if(!empty($this->request->data['new_psw']) && !empty($this->request->data['confirm_psw']))
 //        {
 //            if($this->request->data['new_psw'] != $this->request->data['confirm_psw'])
 //                return false;
 //            else
 //                return true;
 //        }else
 //            return true;

 //    }


	
    

}
