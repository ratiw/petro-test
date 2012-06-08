<?php

namespace Fuel\Migrations;

class Create_users_test_data {

	public function up()
	{
		// create default admin user
		$default_password = "password";
		$default_pass_hash = \Auth::instance()->hash_password($default_password);
		
		for ($i=1; $i<=100; $i++)
		{
			list($id, $row_affected) = \DB::insert('users')->set(array(
				'username' => 'user'.$i,
				'password' => $default_pass_hash,
				'email' => 'user'.$i.'@somewhere.com',
				'group' => ($i % 3) == 0 ? 50 : 1,
				'last_login' => '',
				'login_hash' => '',
				'profile_fields' => '',
			))->execute();

			if ($row_affected <= 0)
			{
				\Cli::write("failed to user account: user".$i);
			}
		}
		
	}

	public function down()
	{
		$result = \DB::query("DELETE FROM users WHERE username LIKE 'user%'")->execute();
	}
}