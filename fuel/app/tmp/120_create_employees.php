<?php

namespace Fuel\Migrations;

class Create_Employees
{
	public $table = 'employees';

	public function up()
	{
		\DBUtil::create_table($this->table, array(
			'id'              => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'code'            => array('constraint' => 10, 'type' => 'varchar'),
			'first_name'      => array('constraint' => 50, 'type' => 'varchar'),
			'last_name'       => array('constraint' => 50, 'type' => 'varchar'),
			'first_name_en'   => array('constraint' => 50, 'type' => 'varchar', 'null' => true),
			'last_name_en'    => array('constraint' => 50, 'type' => 'varchar', 'null' => true),
			'salutation_code' => array('type' => 'tinyint'),
			'birthdate'       => array('type' => 'date'),
			'dept_code'       => array('type' => 'tinyint', 'null' => true),	// ฝ่าย
			'group_code'      => array('type' => 'tinyint', 'null' => true),	// แผนก
			'unit_code'       => array('type' => 'tinyint', 'null' => true),	// หน่วย
			'type'            => array('type' => 'tinyint'),	// รายเดือน / รายวัน
			'salary'          => array('type' => 'float'),
			'wage'            => array('type' => 'float'),
			'pay_via'         => array('type' => 'tinyint'),	// Bank, Cash
			'bank_code'       => array('type' => 'tinyint'),
			'account_no'      => array('constraint' => 13, 'type' => 'varchar', 'null' => true),
			'id_no'           => array('constraint' => 13, 'type' => 'varchar'),
			'ss_no'           => array('constraint' => 13, 'type' => 'varchar', 'null' => true),
			'status'          => array('type' => 'tinyint'),
			'profile'         => array('type' => 'text', 'null' => true),
			'created_at'      => array('constraint' => 11, 'type' => 'int'),
			'updated_at'      => array('constraint' => 11, 'type' => 'int', 'null' => true),
		), array('id'), true, 'InnoDB', 'utf8_general_ci');
		
		// add UNIQUE index for username and email fields
		$active_db = \Config::get('db.active');
		$table_prefix = \Config::get('db.'.$active_db.'.table_prefix');
		\DB::query("CREATE UNIQUE INDEX code ON ".$table_prefix.$this->table." (code)")->execute();
		\DB::query("CREATE UNIQUE INDEX id_no ON ".$table_prefix.$this->table." (id_no)")->execute();
		\DB::query("CREATE UNIQUE INDEX ss_no ON ".$table_prefix.$this->table." (ss_no)")->execute();
	}

	public function down()
	{
		\DBUtil::drop_table($this->table);
	}
}