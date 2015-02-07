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
            ->addColumn('slug', 'string', [
                'limit' => '255',
            ])
            ->addColumn('title', 'string', [
                'limit' => '255',
            ])
            ->addColumn('body', 'text')
            ->addColumn('created', 'datetime')
            ->addColumn('modified', 'datetime')
            ->addColumn('created_by', 'integer', [
                'limit' => '11',
                'signed' => false
            ])
            ->addColumn('modified_by', 'integer', [
                'limit' => '11',
                'signed' => false
            ])
            ->save();
        $table = $this->table('users');
        $table
            ->addColumn('username', 'string', [
                'limit' => '50',
            ])
            ->addColumn('password', 'string', [
                'limit' => '100',
            ])
            ->addColumn('email', 'string', [
                'limit' => '100',
            ])
            ->addColumn('firstname', 'string', [
                'limit' => '50',
            ])
            ->addColumn('lastname', 'string', [
                'limit' => '50',
            ])
            ->addColumn('created', 'datetime')
            ->addColumn('modified', 'datetime')
            ->addColumn('created_by', 'integer', [
                'limit' => '11',
                'signed' => false
            ])
            ->addColumn('modified_by', 'integer', [
                'limit' => '11',
                'signed' => false
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
