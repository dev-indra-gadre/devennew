<?php
namespace App\Model\Table;
use Cake\Auth\DigestAuthenticate;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\TableRegistry;

/**
 * Options Model
 */
class OptionsTable extends Table {

/**
 * Initialize method
 *
 * @param array $config The configuration for the Table.
 * @return void
 */
	public function initialize(array $config) {
		$this->table('options');
		$this->displayField('id');
		$this->primaryKey(['id']);
		$this->addBehavior('Timestamp');

		$this->belongsTo('Questions', [
			'foreignKey' => 'question_id',
		]);
	}


	
    

}
