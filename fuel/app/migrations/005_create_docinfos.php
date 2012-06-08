<?php

namespace Fuel\Migrations;

class Create_DocInfos {

	public $table_name = 'docinfo';

	public function up()
	{
		\DBUtil::create_table($this->table_name, array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'type' => array('constraint' => 5, 'type' => 'varchar'),
			'pattern' => array('constraint' => 30, 'type' => 'varchar'),
			'change_on' => array('constraint' => 10, 'type' => 'varchar'),
			'last_docno' => array('constraint' => 30, 'type' => 'varchar', 'null' => true),
		), array('id'), true, 'InnoDB', 'utf8_general_ci');
		
		\DB::query('CREATE UNIQUE INDEX IDX_TYPE ON '.$this->table_name.'(TYPE)')->execute();
	}

	public function down()
	{
		\DBUtil::drop_table($this->table_name);
	}
}