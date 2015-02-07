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
            ->addColumn('body', 'text')
            ->addColumn('parent_id', 'integer', [
                'limit' => '11',
                'signed' => false,
                'null' => true
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
