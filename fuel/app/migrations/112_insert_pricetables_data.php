<?php

namespace Fuel\Migrations;

class Insert_PriceTables_data {

	public $table_name = 'price_table';

	public function up()
	{
		\DB::set_charset('utf8');
		
		// P, flat, (color)
		$this->insert('1', '1', '1', '1.5', '1.7', '2', '2.2', '2.4', '2.6');
		$this->insert('1', '1', '2', '3', '3.15', '3.5', '3.75', '4', '4.2');
		$this->insert('1', '1', '3', '3', '3.15', '3.5', '3.75', '4', '4.2');

		// P, chevron, (color)
		$this->insert('1', '2', '1', '3.3', '3.4', '3.5', '3.75', '4', '4.2');
		$this->insert('1', '2', '2', '4.25', '4.5', '4.75', '5', '5.25', '5.45');
		$this->insert('1', '2', '3', '4.25', '4.5', '4.75', '5', '5.25', '5.45');

		// N, flat, (color)
		$this->insert('2', '1', '1', '1.75', '2', '2.25', '2.4', '2.6', '2.8');
		$this->insert('2', '1', '2', '3.25', '3.5', '3.75', '4', '4.25', '4.45');
		$this->insert('2', '1', '3', '3.25', '3.5', '3.75', '4', '4.25', '4.45');

		// N, chevron, (color)
		$this->insert('2', '2', '1', '3.5', '3.6', '3.75', '4', '4.25', '4.45');
		$this->insert('2', '2', '2', '4.5', '4.75', '5', '5.25', '5.5', '5.7');
		$this->insert('2', '2', '3', '4.5', '4.75', '5', '5.25', '5.5', '5.7');

		// M, flat, (color)
		$this->insert('3', '1', '1', '2', '2.25', '2.4', '2.6', '2.8', '3');
		$this->insert('3', '1', '2', '3.5', '3.75', '4', '4.25', '4.5', '4.7');
		$this->insert('3', '1', '3', '3.5', '3.75', '4', '4.25', '4.5', '4.7');

		// M, chevron, (color)
		$this->insert('3', '2', '1', '3.6', '3.75', '4', '4.25', '4.5', '4.7');
		$this->insert('3', '2', '2', '4.75', '5', '5.25', '5.5', '5.75', '5.95');
		$this->insert('3', '2', '3', '4.75', '5', '5.25', '5.5', '5.75', '5.95');
		
		// OR1
		$this->insert('4', '1', '1', '3.3', '3.4', '3.5', '3.6', '3.7', '3.9');
		$this->insert('4', '1', '2', '4.5', '4.65', '4.9', '5.2', '5.4', '5.6');
		$this->insert('4', '1', '3', '4.5', '4.65', '4.9', '5.2', '5.4', '5.6');
		$this->insert('4', '2', '1', '6.6', '6.7', '6.8', '6.9', '7', '7.2');
		$this->insert('4', '2', '2', '7', '7.1', '7.2', '7.3', '7.4', '7.6');
		$this->insert('4', '2', '3', '7', '7.1', '7.2', '7.3', '7.4', '7.6');
		
		// OR2
		$this->insert('5', '1', '1', '4', '4.1', '4.25', '4.4', '4.65', '4.85');
		$this->insert('5', '1', '2', '5.75', '6', '6.2', '6.4', '6.6', '6.8');
		$this->insert('5', '1', '3', '5.75', '6', '6.2', '6.4', '6.6', '6.8');
		$this->insert('5', '2', '1', '7', '7.25', '7.3', '7.4', '7.5', '7.7');
		$this->insert('5', '2', '2', '7.25', '7.5', '7.75', '8', '8.25', '8.5');
		$this->insert('5', '2', '3', '7.25', '7.5', '7.75', '8', '8.25', '8.5');

		// HR100
		$this->insert('6', '1', '1', '3.3', '3.4', '3.5', '3.6', '3.7', '3.9');
		$this->insert('6', '1', '2', '4', '4.25', '4.5', '4.75', '5', '5.2');
		$this->insert('6', '1', '3', '4', '4.25', '4.5', '4.75', '5', '5.2');
		$this->insert('6', '2', '1', '6.6', '6.7', '6.8', '6.9', '7', '7.2');
		$this->insert('6', '2', '2', '7', '7.1', '7.2', '7.3', '7.4', '7.6');
		$this->insert('6', '2', '3', '7', '7.1', '7.2', '7.3', '7.4', '7.6');
		
		// HR150
		$this->insert('8', '1', '1', '5', '5.1', '5.25', '5.4', '5.65', '5.85');
		$this->insert('8', '1', '2', '5.75', '6', '6.25', '6.5', '6.75', '7');
		$this->insert('8', '1', '3', '5.75', '6', '6.25', '6.5', '6.75', '7');
		$this->insert('8', '2', '1', '7', '7.15', '7.3', '7.4', '7.5', '7.7');
		$this->insert('8', '2', '2', '7.25', '7.5', '7.75', '8', '8.25', '8.5');
		$this->insert('8', '2', '3', '7.25', '7.5', '7.75', '8', '8.25', '8.5');
		
	}

	private function insert($grade, $type, $color, $ep120, $ep125, $ep160, $ep200, $ep250, $ep300)
	{
		\DB::insert($this->table_name)->set(array(
			'belt_grade'	=> $grade,
			'belt_type'	=> $type,
			'belt_color'	=> $color,
			'ep120'		=> $ep120,
			'ep125'		=> $ep125,
			'ep160'		=> $ep160,
			'ep200'		=> $ep200,
			'ep250'		=> $ep250,
			'ep300'		=> $ep300,
		))->execute();
	}
	
	public function down()
	{
		\DBUtil::truncate_table($this->table_name);
	}
}