<?php

namespace Fuel\Migrations;

class Insert_App_Acl_data {

	public $table_name = 'app_acl';

	public function up()
	{
		\DB::set_charset('utf8');

		$result = \DB::query('SELECT name FROM menu ORDER BY seq')->execute();
		$admin_level = 100;

		foreach($result as $r)
		{
			$this->insert($r['name'], $admin_level, 'Y', 'Y', 'Y', 'Y', 'Y');
		}
		
		$this->insert('clients', 50, 'N', 'Y', 'N', 'N', 'Y');
	}

	private function insert($app, $level, $create, $read, $update, $delete, $print)
	{
		\DB::insert($this->table_name)->set(array(
			'app'	 => $app,
			'level'	 => $level,
			'create' => $create,
			'read'	 => $read,
			'update' => $update,
			'delete' => $delete,
			'print'  => $print,
		))->execute();
	}
	
	public function down()
	{
		\DBUtil::truncate_table($this->table_name);
	}
}