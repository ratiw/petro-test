<?php

namespace Fuel\Migrations;

class Create_docmks {

	public $table_name = 'docmk';

	public function up()
	{
		\DBUtil::create_table($this->table_name, array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'mk_no' => array('constraint' => 15, 'type' => 'varchar'),
			'mk_date' => array('type' => 'date'),
			'client_id' => array('constraint' => 11, 'type' => 'int'),
			'client_po' => array('constraint' => 20, 'type' => 'varchar', 'null' => true),
			'delivery_date' => array('type' => 'date'),
			'deliver_to' => array('constraint' => 255, 'type' => 'varchar', 'null' => true),
			'delivered_date' => array('type' => 'date', 'null' => true),
			'product_type' => array('type' => 'tinyint'),
			'belt_type' => array('type' => 'tinyint'),
			'belt_color' => array('type' => 'tinyint', 'null' => true),
			'belt_color_other' => array('constraint' => 20, 'type' => 'varchar', 'null' => true),
			'belt_width' => array('type' => 'tinyint', 'null' => true),
			'belt_width_unit' => array('type' => 'tinyint', 'null' => true),
			'belt_ply' => array('type' => 'tinyint', 'null' => true),
			'belt_ep' => array('type' => 'tinyint', 'null' => true),
			'belt_grade' => array('type' => 'tinyint', 'null' => true),
			'belt_top_grade' => array('constraint' => 15, 'type' => 'varchar', 'null' => true),
			'belt_bot_grade' => array('constraint' => 15, 'type' => 'varchar', 'null' => true),
			'belt_thick' => array('type' => 'float', 'null' => true),
			'belt_top_thick' => array('type' => 'float', 'null' => true),
			'belt_bot_thick' => array('type' => 'float', 'null' => true),
			'belt_length' => array('type' => 'decimal', 'null' => true),
			'belt_length_unit' => array('type' => 'tinyint'),
			'belt_end' => array('type' => 'tinyint', 'null' => true),
			'belt_qty' => array('type' => 'tinyint'),
			'price_info' => array('constraint' => 255, 'type' => 'varchar', 'null' => true),
			'belt_price' => array('type' => 'decimal', 'null' => true),
			'belt_disc1' => array('type' => 'float', 'default' => 0),
			'belt_disc2' => array('type' => 'float', 'default' => 0),
			'belt_disc3' => array('type' => 'float', 'default' => 0),
			'belt_price_net' => array('type' => 'decimal', 'null' => true),
			'belt_amount' => array('type' => 'decimal', 'null' => true),
			'remark' => array('type' => 'text', 'null' => true),
			'creator_id' => array('constraint' => 11, 'type' => 'int'),
			'creator_name' => array('constraint' => 255, 'type' => 'varchar'),
			'status' => array('type' => 'tinyint', 'default' => 0),
			'created_at' => array('constraint' => 11, 'type' => 'int'),
			'updated_at' => array('constraint' => 11, 'type' => 'int'),
		), array('id'), true, 'InnoDB', 'utf8_general_ci');
		
		\DB::query('CREATE UNIQUE INDEX IDX_MK_NO ON '.$this->table_name.'(MK_NO)')->execute();
	}

	public function down()
	{
		\DBUtil::drop_table($this->table_name);
	}
}