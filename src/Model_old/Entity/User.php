<?php
namespace App\Model\Entity;
use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;

/**
 * User Entity.
 */
class User extends Entity {

/**
 * Fields that can be mass assigned using newEntity() or patchEntity().
 *
 * @var array
 */
	protected $_accessible = [
		'username' => true,
		'password' => true,
		'admin' => true,
		'candidate_id' => true,
		'created' => true,
		'modified' => true,
		'status' => true,
	];

	// protected function _setPassword($password) {
 //        return (new DefaultPasswordHasher)->hash($password);
 //    }

  

    

}
