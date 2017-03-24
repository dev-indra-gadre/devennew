<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Quizzes Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Candidates
 *
 * @method \App\Model\Entity\Quiz get($primaryKey, $options = [])
 * @method \App\Model\Entity\Quiz newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Quiz[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Quiz|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Quiz patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Quiz[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Quiz findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class QuizzesTable extends Table
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

        $this->table('quizzes');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Candidates', [
            'foreignKey' => 'candidate_id',
            'joinType' => 'INNER'
        ]);
         $this->hasMany('QuizzQuestions', [
            'foreignKey' => 'quizz_id'
        ]);

            $this->hasMany('QuizzCandidates', [
            'foreignKey' => 'quizz_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    // public function validationDefault(Validator $validator)
    // {
    //     $validator
    //         ->integer('id')
    //         ->allowEmpty('id', 'create');

    //     $validator
    //         ->requirePresence('quiz_name', 'create')
    //         ->notEmpty('quiz_name');

    //     $validator
    //         ->requirePresence('code', 'create')
    //         ->notEmpty('code')
    //         ->add('code', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

    //     $validator
    //         ->integer('total_questions')
    //         ->requirePresence('total_questions', 'create')
    //         ->notEmpty('total_questions');

    //     $validator
    //         ->integer('score')
    //         ->allowEmpty('score');

    //     $validator
    //         ->numeric('quiz_time')
    //         ->requirePresence('quiz_time', 'create')
    //         ->notEmpty('quiz_time');

    //     $validator
    //         ->requirePresence('elapsedTime', 'create')
    //         ->notEmpty('elapsedTime');

    //     $validator
    //         ->dateTime('completed_date')
    //         ->allowEmpty('completed_date');

    //     $validator
    //         ->boolean('status')
    //         ->requirePresence('status', 'create')
    //         ->notEmpty('status');

    //     return $validator;
    // }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['code']));
        $rules->add($rules->existsIn(['candidate_id'], 'Candidates'));

        return $rules;
    }
}
