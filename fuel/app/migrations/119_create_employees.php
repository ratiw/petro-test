<?php

namespace Fuel\Migrations;

class Create_employees
{
	public function up()
	{
		\DBUtil::create_table('employees', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'code' => array('constraint' => 10, 'type' => 'varchar'),
			'first_name' => array('constraint' => 50, 'type' => 'varchar'),
			'last_name' => array('constraint' => 50, 'type' => 'varchar'),
			'birthdate' => array('type' => 'date'),
			'salary' => array('type' => 'float'),
			'status' => array('type' => 'tinyint'),
			'created_at' => array('constraint' => 11, 'type' => 'int'),
			'updated_at' => array('constraint' => 11, 'type' => 'int'),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('employees');
	}
}