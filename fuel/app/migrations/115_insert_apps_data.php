<?php

namespace Fuel\Migrations;

class Insert_Apps_data {

	public $table_name = 'apps';

	public function up()
	{
		\DB::set_charset('utf8');
		
		$this->insert(100, 'dashboard', 'Dashboard', 'Dashboard');
		$this->insert(200, 'users', 'Users', 'Users', 'users');
		$this->insert(300, 'clients', 'Customers', 'Customers', 'clients');
		$this->insert(400, 'docmk', 'Sales Order', 'Sales Order', 'docmk');
		$this->insert(410, 'docmk2', 'DocMK2', 'DocMK2', 'docmk2', 'Y');
		$this->insert(420, 'mk010', 'FMMK-010', 'FMMK-010', 'docmk2', 'N', 410);
		$this->insert(430, 'mk011', 'FMMK-011', 'FMMK-011', 'docmk011', 'N', 410);
		$this->insert(440, 'docmk011', 'ใบสั่งตัดสต็อค', 'Cutting Order', 'docmk011');
		$this->insert(500, 'products', 'สินค้า', 'Products', null, 'Y');
		$this->insert(510, 'mi1', 'Menu Item 1', 'Menu item 1', null, 'N', 500);
		$this->insert(520, 'mi2', 'Menu Item 1', 'Menu item 1', null, 'N', 500);
		$this->insert(530, 'mi3', 'Menu Item 1', 'Menu item 1', null, 'N', 500);
		
	}

	private function insert($app_id, $name, $title, $title_en, $link = null, $has_sub = 'N', $parent = null)
	{
		\DB::insert($this->table_name)->set(array(
			'app_id'	=> $app_id,
			'name'	=> $name,
			'title'	=> $title,
			'title_en'	=> $title_en,
			'link' => $link,
			'has_sub' => $has_sub,
			'parent' => $parent,
		))->execute();
	}
	
	public function down()
	{
		\DBUtil::truncate_table($this->table_name);
	}
}