<?php
namespace App\Model\Entity;
use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;

/**
 * Quizz Entity.
 */
class Quizz extends Entity {

/**
 * Fields that can be mass assigned using newEntity() or patchEntity().
 *
 * @var array
 */
	protected $_accessible = [
	'*' => true,
		'id' => false,
		
	];

	// protected function _setPassword($password) {
 //        return (new DefaultPasswordHasher)->hash($password);
 //    }

  

    

}