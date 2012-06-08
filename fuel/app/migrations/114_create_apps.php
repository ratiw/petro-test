<?php

namespace Fuel\Migrations;

class Create_apps
{
	public $table_name = 'apps';

	public function up()
	{
		\DBUtil::create_table($this->table_name, array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'name' => array('constraint' => 20, 'type' => 'varchar'),
			'title' => array('constraint' => 50, 'type' => 'varchar'),
			'title_en' => array('constraint' => 50, 'type' => 'varchar'),
			'app_id' => array('constraint' => 11, 'type' => 'int'),
			'link' => array('constraint' => 255, 'type' => 'varchar', 'null' => true),
			'has_sub' => array('constraint' => 1, 'type' => 'char', 'default' => 'N'),
			'parent' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'), true, 'InnoDB', 'utf8_general_ci');

		// add UNIQUE index for username and email fields
		$active_db = \Config::get('db.active');
		$table_prefix = \Config::get('db.'.$active_db.'.table_prefix');
		\DB::query("CREATE UNIQUE INDEX apps_name ON ".$table_prefix.$this->table_name." (name)")->execute();
		\DB::query("CREATE UNIQUE INDEX apps_app_id ON ".$table_prefix.$this->table_name." (app_id)")->execute();

	}

	public function down()
	{
		\DBUtil::drop_table($this->table_name);
	}
}