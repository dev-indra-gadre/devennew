<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * QuizzQuestion Entity
 *
 * @property int $id
 * @property int $candidate_id
 * @property int $quizz_id
 * @property int $question_id
 * @property int $option_id
 * @property int $position
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\Candidate $candidate
 * @property \App\Model\Entity\Quizz $quizz
 * @property \App\Model\Entity\Question $question
 * @property \App\Model\Entity\Option $option
 */
class QuizzQuestion extends Entity
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
