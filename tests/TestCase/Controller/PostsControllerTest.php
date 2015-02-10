<?php
namespace App\Test\TestCase\Controller;

use App\Controller\PostsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\PostsController Test Case
 */
class PostsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'Posts' => 'app.posts'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->get('/posts');
        $this->assertResponseOk();
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->get('/posts/view');
        $this->assertResponseCode(404);

        $this->get('/posts/view/1');
        $this->assertResponseOk();

        $this->get('/posts/view/100');
        $this->assertResponseCode(404);
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->get('/posts/add');
        $this->assertRedirect(['controller' => 'users', 'action' => 'login']);

        $this->session([
            'Auth' => [
                'User' => [
                    'id' => 1,
                    'username' => 'lorem'
                ]
            ]
        ]);
        $this->get('/posts/add');
        $this->assertResponseOk();
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->get('/posts/edit/1');
        $this->assertRedirect(['controller' => 'users', 'action' => 'login']);

        $this->session([
            'Auth' => [
                'User' => [
                    'id' => 1,
                    'username' => 'lorem'
                ]
            ]
        ]);
        $this->get('/posts/edit/1');
        $this->assertResponseOk();

        $this->get('/posts/edit');
        $this->assertResponseCode(404);
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->get('/posts/delete/1');
        $this->assertRedirect(['controller' => 'users', 'action' => 'login']);

        $this->session([
            'Auth' => [
                'User' => [
                    'id' => 1,
                    'username' => 'lorem'
                ]
            ]
        ]);

        $this->get('/posts/delete/1');
        $this->assertResponseCode(405);

        $this->post('/posts/delete/1');
        $this->assertRedirect(['action' => 'index']);
    }
}
