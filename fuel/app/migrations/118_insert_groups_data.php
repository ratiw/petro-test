<?php

namespace Fuel\Migrations;

class Insert_groups_data {

	public $table = 'groups';

	public function up()
	{
		\DB::set_charset('utf8');

		\DB::insert($this->table)->set(array(
			'name' 	=> 'Administrators',
			'level' 	=> 100,
			'is_admin' => true,
		))->execute();

		\DB::insert($this->table)->set(array(
			'name' 	=> 'Moderators',
			'level' 	=> 50,
			'is_admin' => false,
		))->execute();

		\DB::insert($this->table)->set(array(
			'name' 	=> 'Users',
			'level' 	=> 1,
			'is_admin' => false,
		))->execute();

		\DB::insert($this->table)->set(array(
			'name' 	=> 'Guests',
			'level' 	=> 0,
			'is_admin' => false,
		))->execute();

		\DB::insert($this->table)->set(array(
			'name' 	=> 'Banned',
			'level' 	=> -1,
			'is_admin' => false,
		))->execute();
	}

	public function down()
	{
		\DBUtil::truncate_table($this->table);
	}
}