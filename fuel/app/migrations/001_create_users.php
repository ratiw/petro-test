<?php

namespace Fuel\Migrations;

class Create_users 
{

	public function up()
	{
		\DBUtil::create_table('users', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'username' => array('constraint' => 50, 'type' => 'varchar'),
			'password' => array('constraint' => 255, 'type' => 'varchar'),
			'group' => array('type' => 'int'),
			'email' => array('constraint' => 255, 'type' => 'varchar'),
			'last_login' => array('constraint' => 25, 'type' => 'varchar'),
			'login_hash' => array('constraint' => 255, 'type' => 'varchar'),
			'profile_fields' => array('type' => 'text'),
			'created_at' => array('constraint' => 11, 'type' => 'int'),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
		), array('id'), true, 'InnoDB', 'utf8_general_ci');
		
		// add UNIQUE index for username and email fields
		$active_db = \Config::get('db.active');
		$table_prefix = \Config::get('db.'.$active_db.'.table_prefix');
		\DB::query("CREATE UNIQUE INDEX user_username ON ".$table_prefix."users (username)")->execute();
		\DB::query("CREATE UNIQUE INDEX user_email ON ".$table_prefix."users (email)")->execute();
		
		// create default admin user
		$admin_username = "admin";
		$admin_password = "admin";
		$admin_pass_hash = \Auth::instance()->hash_password($admin_password);
		$admin_email = "ratiw@hotmail.com";
		
		list($id, $row_affected) = \DB::insert('users')->set(array(
			'username' => $admin_username,
			'password' => $admin_pass_hash,
			'email' => $admin_email,
			'group' => 100,
			'last_login' => '',
			'login_hash' => '',
			'profile_fields' => '',
		))->execute();
		
		if ($id and $row_affected > 0)
		{
			\Cli::write("added admin account");
		}
		else
		{
			\Cli::write("failed to add admin account");
		}
	}

	public function down()
	{
		\DBUtil::drop_table('users');
	}
}