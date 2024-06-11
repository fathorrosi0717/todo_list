<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTable extends Migration
{
    public function up()
    {
        /*
         * Users
         */
        $this->forge->addField([
            'id'            => ['type' => 'int', 'constraint' => 7, 'unsigned' => true, 'auto_increment' => true],
            'name'          => ['type' => 'varchar', 'constraint' => 32],
            'email'         => ['type' => 'varchar', 'constraint' => 255],
            'password'      => ['type' => 'varchar', 'constraint' => 255],
            'created_at'       => ['type' => 'datetime', 'null' => true],
            'updated_at'       => ['type' => 'datetime', 'null' => true],
            'deleted_at'       => ['type' => 'datetime', 'null' => true],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('email');

        $this->forge->createTable('users', true);

        /*
         * List
         */

        $this->forge->addField([
            'id'            => ['type' => 'int', 'constraint' => 7, 'unsigned' => true, 'auto_increment' => true],
            'user_id'       => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'tittle'        => ['type' => 'varchar', 'constraint' => 255],
            'description'   => ['type' => 'text',  'null' => true],
            'time'          => ['type' => 'datetime',],
            'status'        => ['type' => 'tinyint', 'constraint' => 1, 'null' => 0, 'default' => 0],
            'created_at'       => ['type' => 'datetime', 'null' => true],
            'updated_at'       => ['type' => 'datetime', 'null' => true],
            'deleted_at'       => ['type' => 'datetime', 'null' => true],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('user_id', 'users', 'id', '', 'CASCADE');

        $this->forge->createTable('list', true);
    }

    public function down()
    {
        $this->forge->dropTable('users', true);
        $this->forge->dropTable('list', true);
    }
}
