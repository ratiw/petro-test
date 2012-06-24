<?php

namespace Fuel\Migrations;

class Create_app_acl
{
	public function up()
	{
		\DBUtil::create_table('app_acl', array(
			'app' => array('constraint' => 20, 'type' => 'varchar'),
			'level' => array('constraint' => 11, 'type' => 'int'),
			'create' => array('constraint' => 1, 'type' => 'char', 'default' => 'N'),
			'read' => array('constraint' => 1, 'type' => 'char', 'default' => 'N'),
			'update' => array('constraint' => 1, 'type' => 'char', 'default' => 'N'),
			'delete' => array('constraint' => 1, 'type' => 'char', 'default' => 'N'),
			'print' => array('constraint' => 1, 'type' => 'char', 'default' => 'N'),

		), array('app', 'level'), true, 'InnoDB', 'utf8_general_ci');
	}

	public function down()
	{
		\DBUtil::drop_table('app_acl');
	}
}