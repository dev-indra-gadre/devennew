<?php
namespace App\Model\Entity;
use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;

/**
 * QuizzCandidate Entity.
 */
class QuizzCandidate extends Entity {

/**
 * Fields that can be mass assigned using newEntity() or patchEntity().
 *
 * @var array
 */
	protected $_accessible = [
		// 'name' => true,
		// 'correct_option_id' => true,
		// 'mark' => true,
		// 'status' => true,
		// 'created' => true,
		// 'modified' => true
	      '*'=>true,
		
	];

    

}
