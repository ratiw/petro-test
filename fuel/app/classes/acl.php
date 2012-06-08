<?php 

class Acl
{
	public $acl_table = 'app_acl';

	public static function allow($app_id, $level, $func)
	{
		$result = \DB:select('*')
			->from($this->acl_table)
			->where('app_id', $app_id)
			->and_where('level', $level)
			->and_where($func, 'Y')
			->execute();
		
		return count($result) > 0 ? true : false;
	}
}