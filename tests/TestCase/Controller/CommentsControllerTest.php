<?php
namespace App\Test\TestCase\Controller;

use App\Controller\CommentsController;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\CommentsController Test Case
 */
class CommentsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'Comments' => 'app.comments'
    ];

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->get('/comments/add');
        $this->assertRedirect(['controller' => 'users', 'action' => 'login']);

        $this->session([
            'Auth' => [
                'User' => [
                    'id' => 1,
                    'username' => 'lorem'
                ]
            ]
        ]);

        $this->get('/comments/add');
        $this->assertResponseOk();

        $data = [
            'body' => 'Comment body'
        ];
        $this->post('/comments/add', $data);
        $this->assertRedirect(['action' => 'index']);
        $comments = TableRegistry::get('Comments');
        $comment = $comments->find()->where(['body' => 'Comment body']);
        $this->assertEquals(1, $comment->count());

        unset($data['body']);
        $this->post('/comments/add', $data);
        $this->assertResponseContains('The comment could not be saved.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
