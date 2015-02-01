<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Utility\Inflector;

/**
 * Post Entity.
 */
class Post extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'slug' => true,
        'title' => true,
        'body' => true,
        'author' => true,
    ];

    protected function _setTitle($title) {
        $this->set('slug', Inflector::slug($title));
        return $title;
    }
}
