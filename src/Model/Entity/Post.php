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

    /**
     * Set the slug.
     *
     * @param string $title The data set from the form field.
     * @return mixed
     */
    protected function _setTitle($title)
    {
        $this->set('slug', Inflector::slug($title));
        return $title;
    }
}
