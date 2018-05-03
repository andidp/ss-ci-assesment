<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_add_confirmed_to_users_table extends CI_Migration
{
    public function up()
	{
		$this->dbforge->add_column('users', array(
			'confirmed' => array(
				'type' => 'INT',
			    'constraint' => 10,
                'null' => true,
                'comment' => 'Unixtime Stamp'
			)
		));
	}
	
	public function down()
	{
		$this->dbforge->drop_column('users', 'confirmed');
	}
}
