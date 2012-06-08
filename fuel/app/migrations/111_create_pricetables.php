<?php

namespace Fuel\Migrations;

class Create_PriceTables 
{

	public $table_name = 'price_table';

	public function up()
	{
		\DBUtil::create_table($this->table_name, array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'belt_grade' => array('type' => 'tinyint'),
			'belt_type' => array('type' => 'tinyint'),
			'belt_color' => array('type' => 'tinyint'),
			'ep120' => array('type' => 'float', 'null' => true),
			'ep125' => array('type' => 'float', 'null' => true),
			'ep160' => array('type' => 'float', 'null' => true),
			'ep200' => array('type' => 'float', 'null' => true),
			'ep250' => array('type' => 'float', 'null' => true),
			'ep300' => array('type' => 'float', 'null' => true),
		), array('id'), true, 'InnoDB', 'utf8_general_ci');
		
		// \DB::query('CREATE UNIQUE INDEX IDX_TYPE ON '.$this->table_name.'(TYPE)')->execute();
	}

	public function down()
	{
		\DBUtil::drop_table($this->table_name);
	}
}