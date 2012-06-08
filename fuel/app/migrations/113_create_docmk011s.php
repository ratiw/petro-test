<?php

namespace Fuel\Migrations;

class Create_docmk011s
{
	public $table_name = 'docmk011';

	public function up()
	{
		\DBUtil::create_table($this->table_name, array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'mk_id' => array('constraint' => 11, 'type' => 'int'),
			'suggest_roll' => array('constraint' => 20, 'type' => 'varchar'),
			'length' => array('type' => 'float'),
			'remark' => array('constraint' => 255, 'type' => 'varchar'),
			'user_id' => array('constraint' => 11, 'type' => 'int'),
			'created_at' => array('constraint' => 11, 'type' => 'int'),
			'updated_at' => array('constraint' => 11, 'type' => 'int'),
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table($this->table_name);
	}
}