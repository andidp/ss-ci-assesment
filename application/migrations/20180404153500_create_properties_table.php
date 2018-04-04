<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_create_properties_table extends CI_Migration
{
    public function up()
    {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE,
                'comment' => 'PK'
            ),
            'user_id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'comment' => 'FK users(id)'
            ),
            'title' => array(
                'type' => 'VARCHAR',
                'constraint' => '200',
            ),
            'slug' => array(
                'type' => 'VARCHAR',
                'constraint' => '200',
            ),
            'description' => array(
                'type' => 'TEXT',
                'null' => TRUE,
            ),
            'price' => array(
                'type' => 'INT',
                'constraint' => '10',
            ),
            'price_text' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
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
        $this->dbforge->add_key('user_id', FALSE);
        $this->dbforge->create_table('properties');
    }

    public function down()
    {
        $this->dbforge->drop_table('properties');
    }
}
