<?php
namespace App\Model\Table;
use Cake\Auth\DigestAuthenticate;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\TableRegistry;

/**
 * Quizzes Model
 */
class QuizzesTable extends Table {

/**
 * Initialize method
 *
 * @param array $config The configuration for the Table.
 * @return void
 */
	public function initialize(array $config) {
		$this->table('quizzes');
		$this->displayField('id');
		$this->primaryKey(['id']);
		$this->addBehavior('Timestamp');
		$this->hasMany('QuizzQuestions', [
			'foreignKey' => 'quizz_id',
		]);
		$this->hasMany('QuizzCandidates', [
			'foreignKey' => 'quizz_id',
		]);
           
		$this->belongsTo('Candidates', [
			'foreignKey' => 'candidate_id',
		]);
		// $this->belongsTo('Roles', [
		// 	'foreignKey' => 'role_id',
		// ]);
	}
}

?>