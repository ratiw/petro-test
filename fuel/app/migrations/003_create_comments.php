<?php

namespace Fuel\Migrations;

class Create_comments {

	public function up()
	{
		\DBUtil::create_table('comments', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			// ref_type must be defined somewhere in the app (config?) to help determine
			// which comment record belongs to which app module/function.
			'ref_type' => array('constraint' => 4, 'type' => 'int'),
			'ref_id' => array('constraint' => 11, 'type' => 'int'),
			'user_id' => array('constraint' => 11, 'type' => 'int'),
			'type' => array('type' => 'tinyint'),
			'text' => array('constraint' => 255, 'type' => 'varchar'),
			'cost' => array('type' => 'decimal', 'null' => true),
			'is_deleted' => array('constraint' => 1, 'type' => 'tinyint', 'default' => 0),
			'created_at' => array('constraint' => 11, 'type' => 'int'),
			'updated_at' => array('constraint' => 11, 'type' => 'int'),
		), array('id'), true, 'InnoDB', 'utf8_general_ci');
	}

	public function down()
	{
		\DBUtil::drop_table('comments');
	}
}