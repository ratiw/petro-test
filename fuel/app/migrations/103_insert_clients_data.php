<?php

namespace Fuel\Migrations;

class Insert_clients_data {

	public function up()
	{
		\DB::set_charset('utf8');

		\DB::insert('clients')->set(array(
			'code' 	=> 'SU',
			'name' 	=> 'หจก.สระบุรียูเนี่ยน',
			'name_en' => 'Saraburi Union Ltd., Part.',
			'status'	=> '1',
		))->execute();

		\DB::insert('clients')->set(array(
			'code' 	=> 'MUIBK',
			'name' 	=> 'หจก.เอ็มยูไอ ไพศาล',
			'name_en' => 'M.U.I Paisarn Ltd., Part.',
			'status'	=> '1',
		))->execute();

		\DB::insert('clients')->set(array(
			'code' 	=> 'MUICHON',
			'name' 	=> 'หจก.ชลบุรี เอ็มยูไอ ไพศาล',
			'name_en' => 'Chonburi M.U.I Paisarn Ltd., Part.',
			'status'	=> '1',
		))->execute();

		\DB::insert('clients')->set(array(
			'code' 	=> 'RV',
			'name' 	=> 'บริษัท อาร์วี เพาเวอร์แอนด์ทรานส์มิชชั่น จำกัด',
			'name_en' => 'RV Power and Transmission Co., Ltd.',
			'status'	=> '1',
		))->execute();

	}

	public function down()
	{
		\DBUtil::truncate_table('clients');
	}
}