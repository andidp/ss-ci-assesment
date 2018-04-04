<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_create_users_table extends CI_Migration
{

    public function up()
    {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 10,
                'unsigned' => TRUE,
                'auto_increment' => TRUE,
                'comment' => 'PK'
            ),
            'username' => array(
                'type' => 'VARCHAR',
                'constraint' => '20',
            ),
            'password' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
            ),
            'first_name' => array(
                'type' => 'VARCHAR',
                'constraint' => '20',
            ),
            'last_name' => array(
                'type' => 'VARCHAR',
                'constraint' => '20',
            ),
            'email' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
            'phone' => array(
                'type' => 'VARCHAR',
                'constraint' => '20',
                'null' => TRUE,
            ),
            'remember_token' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'default' => NULL
            ),
            'created' => array(
                'type' => 'INT',
                'constraint' => '10',
                'unsigned' => TRUE,
                'comment' => 'Unix Timestamp'
            ),
            'updated' => array(
                'type' => 'INT',
                'constraint' => '10',
                'unsigned' => TRUE,
                'comment' => 'Unix Timestamp'
            ),
            'deleted' => array(
                'type' => 'INT',
                'constraint' => '10',
                'unsigned' => TRUE,
                'null' => TRUE,
                'comment' => 'Unix Timestamp'
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('users');
    }

    public function down()
    {
        $this->dbforge->drop_table('users');
    }
}
