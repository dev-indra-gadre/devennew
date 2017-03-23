<?php
namespace App\Model\Table;
use Cake\Auth\DigestAuthenticate;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\TableRegistry;

/**
 * QuizzQuestions Model
 */
class QuizzQuestionsTable extends Table {

/**
 * Initialize method
 *
 * @param array $config The configuration for the Table.
 * @return void
 */
	public function initialize(array $config) {
		$this->table('quizz_questions');
		$this->displayField('id');
		$this->primaryKey(['id']);
		$this->addBehavior('Timestamp');
		// $this->hasMany('Candidates', [
		// 	'foreignKey' => 'user_id',
		// ]);

		$this->belongsTo('Candidates', [
			'foreignKey' => 'candidate_id',
		]);
		$this->belongsTo('Questions', [
			'foreignKey' => 'question_id',
		]);
		$this->belongsTo('Quizzes', [
			'foreignKey' => 'quizz_id',
		]);
		// $this->belongsTo('Roles', [
		// 	'foreignKey' => 'role_id',
		// ]);
	}
}

?>