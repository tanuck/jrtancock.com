<?php
use Phinx\Migration\AbstractMigration;

class Initial extends AbstractMigration {

    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     *
     * @return void
     */
    public function change()
    {
        $table = $this->table('posts');
        $table
            ->addColumn('id', 'integer', [
                'limit' => '11',
                'signed' => '0',
                'null' => '',
                'default' => ''
            ])
            ->addColumn('slug', 'string', [
                'limit' => '255',
                'null' => '',
                'default' => ''
            ])
            ->addColumn('title', 'string', [
                'limit' => '255',
                'null' => '',
                'default' => ''
            ])
            ->addColumn('body', 'text', [
                'limit' => '',
                'null' => '',
                'default' => ''
            ])
            ->addColumn('author', 'integer', [
                'limit' => '11',
                'signed' => '0',
                'null' => '',
                'default' => ''
            ])
            ->addColumn('created', 'datetime', [
                'limit' => '',
                'null' => '',
                'default' => ''
            ])
            ->addColumn('modified', 'datetime', [
                'limit' => '',
                'null' => '',
                'default' => ''
            ])
            ->save();
        $table = $this->table('users');
        $table
            ->addColumn('id', 'integer', [
                'limit' => '11',
                'signed' => '0',
                'null' => '',
                'default' => ''
            ])
            ->addColumn('username', 'string', [
                'limit' => '50',
                'null' => '',
                'default' => ''
            ])
            ->addColumn('password', 'string', [
                'limit' => '100',
                'null' => '',
                'default' => ''
            ])
            ->addColumn('email', 'string', [
                'limit' => '100',
                'null' => '',
                'default' => ''
            ])
            ->addColumn('firstname', 'string', [
                'limit' => '50',
                'null' => '',
                'default' => ''
            ])
            ->addColumn('lastname', 'string', [
                'limit' => '50',
                'null' => '',
                'default' => ''
            ])
            ->addColumn('created', 'datetime', [
                'limit' => '',
                'null' => '',
                'default' => ''
            ])
            ->addColumn('modified', 'datetime', [
                'limit' => '',
                'null' => '',
                'default' => ''
            ])
            ->save();
    }

    /**
     * Migrate Up.
     *
     * @return void
     */
    public function up()
    {
    }

    /**
     * Migrate Down.
     *
     * @return void
     */
    public function down()
    {
    }

}
