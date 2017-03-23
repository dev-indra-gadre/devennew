<?php
namespace App\Model\Table;
use Cake\Auth\DigestAuthenticate;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\TableRegistry;

/**
 * Questions Model
 */
class QuestionsTable extends Table {

/**
 * Initialize method
 *
 * @param array $config The configuration for the Table.
 * @return void
 */
	public function initialize(array $config) {
		$this->table('questions');
		$this->displayField('id');
		$this->primaryKey(['id']);
		$this->addBehavior('Timestamp');

		$this->hasMany('QuizzQuestions', [
			'foreignKey' => 'question_id',
		]);

		$this->hasMany('Options', [
			'foreignKey' => 'question_id',
		]);

		 // $this->$belongsTo('Options',[
   //      'CorrectOption' => ['foreignKey'   => 'correct_option_id']]);
// $this->belongsTo('Users', [
// 			'foreignKey' => 'user_id',
// 		]);

		 	$this->belongsTo('CorrectOption', [
		 		 'className'    => 'Options',
			'foreignKey' => 'correct_option_id',
		]);

	}


	
    

}
