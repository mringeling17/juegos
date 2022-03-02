<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class CommentsTable extends Table
{
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('comments');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

    }
    public function validationDefault(Validator $validator)
    {
        $validator
            ->scalar('comment')
            ->maxLength('comment', 255)
            ->minLength('comment',25);
        return $validator;
    }

}