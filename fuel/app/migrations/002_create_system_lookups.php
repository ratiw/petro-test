<?php

namespace Fuel\Migrations;

class Create_system_lookups {

	public function up()
	{
		\DBUtil::create_table('lookups', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'type' => array('constraint' => 20, 'type' => 'varchar'),
			'code' => array('type' => 'tinyint'),
			'name' => array('constraint' => 255, 'type' => 'varchar'),
			'name_en' => array('constraint' => 255, 'type' => 'varchar'),
			'seq' => array('type' => 'tinyint'),
			'created_by' => array('constraint' => 11, 'type' => 'int'),
			'created_at' => array('type' => 'datetime'),
			'updated_by' => array('constraint' => 11, 'type' => 'int'),
			'updated_at' => array('type' => 'datetime'),
		), array('id'), true, 'InnoDB', 'utf8_general_ci');
	}

	public function down()
	{
		\DBUtil::drop_table('lookups');
	}
}
