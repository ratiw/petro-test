<?php

namespace Fuel\Migrations;

class Insert_Sentry_Testdata {

	public function up()
	{
		\Config::load('sentry', true);
		
		try
		{
			// create groups
			$this->create_group('users', 1);
			$this->create_group('moderators', 50);
			$this->create_group('administrators', 100, true);

			// create user data
			$user_id = $this->create_user('admin', 'logica');
			\Sentry::user($user_id)->add_to_group(\Sentry::group('administrators')->get('id'));
			
			$group_mod = \Sentry::group('moderators')->get('id');
			$group_user = \Sentry::group('users')->get('id');
			
			for ($i=1; $i<=100; $i++)
			{
				$user_id = $this->create_user('user'.$i, 'password');
				$group = ($i % 3) ? $group_mod : $group_user;
				$user = \Sentry::user($user_id);
				$user->add_to_group($group);
			}
		}
		catch (SentryUserException $e)
		{
			echo $e->getMessage();
			return false;
		}
		
	}
	
	private function create_user($username, $password)
	{
		$user_id = \Sentry::user()->create(array(
			'username' => $username,
			'email' => $username.'@somewhere.com',
			'password' => $password,
		));
		
		return $user_id;
	}
	
	private function create_group($name, $level, $is_admin = false)
	{
		\DB::insert(\Config::get('sentry.table.groups'))->set(array(
			'name' => $name,
			'level' => $level,
			'is_admin' => $is_admin,
		))->execute();
		
	}

	public function down()
	{
		\DBUtil::truncate_table(\Config::get('sentry.table.users'));
		\DBUtil::truncate_table(\Config::get('sentry.table.groups'));
	}
	
}
