<?php

namespace Fuel\Migrations;

class Insert_Menus_data {

	public $table_name = 'menu';

	public function up()
	{
		\DB::set_charset('utf8');
		
		$this->insert('main', 100, 'dashboard', null, 'Dashboard', 'Dashboard');
		$this->insert('main', 200, 'users', null, 'Users', 'Users', 'users');
		$this->insert('main', 300, 'clients', null, 'Customers', 'Customers', 'clients');
		$this->insert('main', 400, 'docmk', null, 'Sales Order', 'Sales Order', 'docmk');
			$this->insert('main', 410, 'docmk2', null, 'DocMK2', 'DocMK2', 'docmk2', 'Y');
			$this->insert('main', 420, 'mk010', 'docmk2', 'FMMK-010', 'FMMK-010', 'docmk2', 'N');
		$this->insert('main', 430, 'mk011', 'docmk2', 'FMMK-011', 'FMMK-011', 'docmk011', 'N');
		$this->insert('main', 440, 'docmk011', null, 'ใบสั่งตัดสต็อค', 'Cutting Order', 'docmk011');
		$this->insert('main', 500, 'products', null, 'สินค้า', 'Products', null, 'Y');
			$this->insert('main', 510, 'mi1', 'products', 'Menu Item 1', 'Menu item 1', null, 'N');
			$this->insert('main', 520, 'mi2', 'products', 'Menu Item 1', 'Menu item 1', null, 'N');
			$this->insert('main', 530, 'divider-1', 'products');
			$this->insert('main', 540, 'mi3', 'products', 'Menu Item 1', 'Menu item 1', null, 'Y');
				$this->insert('main', 541, 'si1', 'mi3', 'SubMenu Item 1', 'SubMenu item 1', null, 'N');
				$this->insert('main', 542, 'divider-2', 'mi3');
				$this->insert('main', 543, 'si2', 'mi3', 'SubMenu Item 2', 'SubMenu item 2', null, 'N');
	}

	private function insert($group, $seq, $name, $parent = null, $title = '', $title_en = '', $link = null, $has_sub = 'N', $level = null)
	{
		\DB::insert($this->table_name)->set(array(
			'group' => $group,
			'name'	=> $name,
			'title'	=> $title,
			'title_en'	=> $title_en,
			'link' => $link,
			'seq'	=> $seq,
			'has_sub' => $has_sub,
			'parent' => $parent,
		))->execute();
	}
	
	public function down()
	{
		\DBUtil::truncate_table($this->table_name);
	}
}