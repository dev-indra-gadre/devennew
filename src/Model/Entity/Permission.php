<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Permission Entity
 *
 * @property int $id
 * @property int $company_registration_id
 * @property int $role_id
 * @property int $designation_id
 * @property bool $view
 * @property bool $edit
 * @property string $controller
 * @property string $action
 * @property string $module
 * @property string $main_link
 * @property string $title_link
 * @property int $sidebar_link
 * @property int $order_sequence
 *
 * @property \App\Model\Entity\CompanyRegistration $company_registration
 * @property \App\Model\Entity\Role $role
 * @property \App\Model\Entity\Designation $designation
 */
class Permission extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
