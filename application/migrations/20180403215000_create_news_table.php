<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_news_table extends CI_Migration {

        public function up()
        {
            $this->dbforge->add_field(array(
                    'id' => array(
                            'type' => 'INT',
                            'constraint' => 11,
                            'unsigned' => TRUE,
                            'auto_increment' => TRUE
                    ),
                    'slug' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '100',
                    ),
                    'title' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '100',
                    ),
                    'content' => array(
                            'type' => 'TEXT',
                            'null' => TRUE,
                    ),
            ));
            $this->dbforge->add_key('id', TRUE);
            $this->dbforge->create_table('news');
        }

        public function down()
        {
                $this->dbforge->drop_table('news');
        }
}