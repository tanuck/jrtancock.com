<?php
namespace App\Test\TestCase\Controller;

use App\Controller\UsersController;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\UsersController Test Case
 */
class UsersControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'Users' => 'app.users'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->get('/users');
        $this->assertRedirect(['action' => 'login']);

        $this->session([
            'Auth' => [
                'User' => [
                    'id' => 1,
                    'username' => 'lorem',
                ]
            ]
        ]);

        $this->get('/users');
        $this->assertResponseOk();
        $this->assertResponseContains('username');

        $this->get('/users?page=1');
        $this->assertResponseOk();

        $this->get('/users?page=2');
        $this->assertResponseCode(404);
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->get('/users/view/1');
        $this->assertRedirect(['action' => 'login']);

        $this->session([
            'Auth' => [
                'User' => [
                    'id' => 1,
                    'username' => 'lorem',
                ]
            ]
        ]);

        $this->get('/users/view/1');
        $this->assertResponseOk();
        $this->assertResponseContains('lorem');

        $this->get('/users/view');
        $this->assertResponseCode(404);
        $this->assertResponseContains('Invalid User ID');

        $this->get('/users/view/100');
        $this->assertResponseCode(404);
        $this->assertResponseContains('Record not found');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->get('/users/add');
        $this->assertResponseOk();

        $users = TableRegistry::get('Users');
        $user = $users->newEntity();
        $this->assertEquals($user, $this->viewVariable('user'));

        $data = [
            'username' => 'james',
            'password' => 'password',
            'email' => 'foo@bar.com',
            'firstname' => 'Foo',
            'lastname' => 'Bar',
            'created' => '2015-01-27 13:22:17',
            'modified' => '2015-01-27 13:22:17',
        ];
        $this->post('/users/add', $data);
        $user = $users->find()->where(['username' => 'james']);
        $this->assertEquals(1, $user->count());
        $this->assertRedirect(['action' => 'index']);

        unset($data['username']);
        $this->post('/users/add', $data);
        $this->assertResponseContains('The user could not be saved.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->get('/users/edit/1');
        $this->assertRedirect(['action' => 'login']);

        $this->session([
            'Auth' => [
                'User' => [
                    'id' => 1,
                    'username' => 'lorem',
                ]
            ]
        ]);

        $this->get('/users/edit/1');
        $this->assertResponseOk();
        $this->assertResponseContains("<label for=\"username\">");

        $this->get('/users/edit');
        $this->assertResponseCode(404);
        $this->assertResponseContains('Invalid User ID');

        $this->get('/users/edit/100');
        $this->assertResponseCode(404);
        $this->assertResponseContains('Record not found');

        $data = [
            'id' => 1,
            'username' => 'james',
            'email' => 'lorem@foo.com',
            'firstname' => 'Lorem',
            'lastname' => 'Ipsum',
        ];
        $this->post('/users/edit/1', $data);
        $this->assertRedirect(['action' => 'index']);
        $users = TableRegistry::get('Users');
        $user = $users->find()->where(['id' => 1]);
        $user = $user->first();
        $this->assertEquals($data['username'], $user->username);

        $data['username'] = '';
        $this->post('/users/edit/1', $data);
        $this->assertResponseContains('The user could not be saved.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->post('/users/delete/1');
        $this->assertRedirect(['action' => 'login']);

        $this->session([
            'Auth' => [
                'User' => [
                    'id' => 1,
                    'username' => 'lorem',
                ]
            ]
        ]);

        $this->get('/users/delete/1');
        $this->assertResponseCode(405);

        $this->post('/users/delete');
        $this->assertResponseCode(404);
        $this->assertResponseContains('Invalid User ID.');

        $this->post('/users/delete/100');
        $this->assertResponseCode(404);

        $this->post('/users/delete/1');
        $this->assertRedirect(['action' => 'index']);
        $users = TableRegistry::get('Users');
        $user = $users->find()->where(['id' => 1]);
        $this->assertEquals(0, $user->count());
    }

    /**
     * Test login method
     *
     * @return void
     */
    public function testLogin()
    {
        $data = [
            'username' => 'foo',
            'password' => 'password',
            'email' => 'foo@bar.com',
            'firstname' => 'Foo',
            'lastname' => 'Bar',
        ];
        $users = TableRegistry::get('Users');
        $user = $users->newEntity();
        $user = $users->patchEntity($user, $data);
        if ($users->save($user)) {
            $this->get('/users/login');
            $this->assertResponseOk();

            $data = [
                'username' => 'foo',
                'password' => 'password',
            ];

            $this->put('/users/login', $data);
            $this->assertSession(null, 'Auth.User.id');

            $this->post('/users/login', $data);
            $this->assertSession('2', 'Auth.User.id');
            $this->assertRedirect('/posts');
        }
    }

    /**
     * Test logout method
     *
     * @return void
     */
    public function testLogout()
    {
        $this->session([
            'Auth' => [
                'User' => [
                    'id' => 1,
                    'username' => 'lorem',
                ]
            ]
        ]);

        $this->get('/users/logout');
        $this->assertRedirect(['action' => 'login']);
        $this->assertSession(null, 'Auth.User.id');
    }
}
