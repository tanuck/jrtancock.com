<?php
use Phinx\Migration\AbstractMigration;

class Comments extends AbstractMigration {

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
        $table = $this->table('comments');
        $table
            ->addColumn('id', 'integer', [
                'limit' => '11',
                'unsigned' => '1',
                'null' => '',
                'default' => ''
            ])
            ->addColumn('body', 'text', [
                'limit' => '',
                'null' => '',
                'default' => ''
            ])
            ->addColumn('parent_id', 'integer', [
                'limit' => '11',
                'unsigned' => '1',
                'null' => '1',
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
            ->addColumn('created_by', 'integer', [
                'limit' => '11',
                'unsigned' => '1',
                'null' => '',
                'default' => ''
            ])
            ->addColumn('modified_by', 'integer', [
                'limit' => '11',
                'unsigned' => '1',
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
