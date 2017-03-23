<?php
namespace App\Model\Table;
use Cake\Auth\DigestAuthenticate;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\TableRegistry;

/**
 * Candidates Model
 */
class CandidatesTable extends Table {

/**
 * Initialize method
 *
 * @param array $config The configuration for the Table.
 * @return void
 */
	public function initialize(array $config) {
		$this->table('candidates');
		$this->displayField('id');
		$this->primaryKey(['id']);
		$this->addBehavior('Timestamp');

		$this->hasMany('Quizzes', [
			'foreignKey' => 'candidate_id',
		]);
			$this->belongsTo('Users', [
			'foreignKey' => 'user_id',
		]);
			// $this->belongsTo('Users');

	}


	
    

}
