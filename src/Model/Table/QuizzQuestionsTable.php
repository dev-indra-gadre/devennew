<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * QuizzQuestions Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Candidates
 * @property \Cake\ORM\Association\BelongsTo $Quizzs
 * @property \Cake\ORM\Association\BelongsTo $Questions
 * @property \Cake\ORM\Association\BelongsTo $Options
 *
 * @method \App\Model\Entity\QuizzQuestion get($primaryKey, $options = [])
 * @method \App\Model\Entity\QuizzQuestion newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\QuizzQuestion[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\QuizzQuestion|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\QuizzQuestion patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\QuizzQuestion[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\QuizzQuestion findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class QuizzQuestionsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('quizz_questions');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Candidates', [
            'foreignKey' => 'candidate_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Quizzes', [
            'foreignKey' => 'quizz_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Questions', [
            'foreignKey' => 'question_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Options', [
            'foreignKey' => 'option_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->integer('position')
            ->requirePresence('position', 'create')
            ->notEmpty('position');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['candidate_id'], 'Candidates'));
        $rules->add($rules->existsIn(['quizz_id'], 'Quizzes'));
        $rules->add($rules->existsIn(['question_id'], 'Questions'));
        $rules->add($rules->existsIn(['option_id'], 'Options'));

        return $rules;
    }
}
