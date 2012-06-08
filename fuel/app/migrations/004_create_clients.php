<?php

namespace Fuel\Migrations;

class Create_clients {

	public function up()
	{
		\DBUtil::create_table('clients', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'code' => array('constraint' => 10, 'type' => 'varchar'),
			'name' => array('constraint' => 100, 'type' => 'varchar'),
			'name_en' => array('constraint' => 100, 'type' => 'varchar'),
			'status' => array('type' => 'tinyint'),
			'created_at' => array('constraint' => 11, 'type' => 'int'),
			'updated_at' => array('constraint' => 11, 'type' => 'int'),
		), array('id'), true, 'InnoDB', 'utf8_general_ci');
	}

	public function down()
	{
		\DBUtil::drop_table('clients');
	}
}