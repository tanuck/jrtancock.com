<?php
use Phinx\Migration\AbstractMigration;

class CommentsTreeFields extends AbstractMigration {

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
            ->addColumn('lft', 'integer', [
                'limit' => 11,
                'signed' => false,
                'after' => 'parent_id'
            ])
            ->addColumn('rght', 'integer', [
                'limit' => 11,
                'signed' => false,
                'after' => 'lft'
            ]);
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
