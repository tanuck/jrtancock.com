<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Comment Entity.
 */
class Comment extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'body' => true,
        'parent_id' => true,
        'created_by' => true,
        'modified_by' => true,
        'parent_comment' => true,
        'child_comments' => true,
    ];
}
