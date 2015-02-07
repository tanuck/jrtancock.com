<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Posts Model
 */
class PostsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('posts');
        $this->displayField('title');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');
        $this->addBehavior('Ceeram/Blame.Blame');
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
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create')
            ->requirePresence('slug', 'create')
            ->notEmpty('slug')
            ->requirePresence('title', 'create')
            ->notEmpty('title')
            ->requirePresence('body', 'create')
            ->notEmpty('body')
            ->add('author', 'valid', ['rule' => 'numeric'])
            ->requirePresence('author', 'create')
            ->notEmpty('author');

        return $validator;
    }
}
