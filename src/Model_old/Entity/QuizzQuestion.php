<?php
namespace App\Model\Entity;
use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;

/**
 * QuizzQuestion Entity.
 */
class QuizzQuestion extends Entity {

/**
 * Fields that can be mass assigned using newEntity() or patchEntity().
 *
 * @var array
 */
	protected $_accessible = [
		// 'name' => true,
		 'id' => true,
		 'candidate_id' => true,
		 'quizz_id' => true,
		 'question_id' => true,
		 'position' => true,
		 'created' => true,
          'modified' => true,
 	      '*'=>true,
		
	];

    

}
