<?php

namespace Fuel\Migrations;

class Insert_App_Acl_data {

	public $table_name = 'app_acl';

	public function up()
	{
		\DB::set_charset('utf8');

		$result = \DB::query('SELECT app_id FROM apps ORDER BY app_id')->execute();
		$admin_level = 100;

		foreach($result as $r)
		{
			$this->insert($r['app_id'], $admin_level, 'Y', 'Y', 'Y', 'Y', 'Y');
		}
		
	}

	private function insert($app_id, $level, $create, $read, $update, $delete, $print)
	{
		\DB::insert($this->table_name)->set(array(
			'app_id'	=> $app_id,
			'level'	=> $level,
			'create'	=> $create,
			'read'	=> $read,
			'update' => $update,
			'delete' => $delete,
			'print' => $print,
		))->execute();
	}
	
	public function down()
	{
		\DBUtil::truncate_table($this->table_name);
	}
}