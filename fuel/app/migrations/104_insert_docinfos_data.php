<?php

namespace Fuel\Migrations;

class Insert_Docinfos_data {

	public $table_name = 'docinfo';

	public function up()
	{
		\DB::set_charset('utf8');
		
		\DB::insert($this->table_name)->set(array(
			'type' => 'MK',
			'pattern' => 'MKYYMM###',
			'change_on' => 'MM',
		))->execute();
	
	}

	public function down()
	{
		\DBUtil::truncate_table($this->table_name);
	}
}