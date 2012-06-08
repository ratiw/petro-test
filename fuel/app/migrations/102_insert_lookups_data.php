<?php

namespace Fuel\Migrations;

class Insert_lookups_data {

	public function up()
	{
		\DB::set_charset('utf8');

		\DB::insert('lookups')->set(array(
			'type' 	=> 'PU.TYPE',
			'code' 	=> '1',
			'name' 	=> 'ซื้อเงินเชื่อ',
			'name_en' => 'Credit',
			'seq'	=> '1',
		))->execute();
		\DB::insert('lookups')->set(array(
			'type' 	=> 'PU.TYPE',
			'code' 	=> '2',
			'name' 	=> 'ซื้อเงินสด',
			'name_en' => 'Cash',
			'seq'	=> '2',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type' 	=> 'PU.CATEGORY',
			'code' 	=> '1',
			'name' 	=> 'สินค้า',
			'name_en' => 'Product',
			'seq'	=> '1',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type' 	=> 'PU.CATEGORY',
			'code' 	=> '2',
			'name' 	=> 'บริการ',
			'name_en' => 'Service',
			'seq'	=> '2',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type' 	=> 'TAX.CALC.TYPE',
			'code' 	=> '1',
			'name' 	=> 'แยกนอก',
			'name_en' => 'Excluded',
			'seq'	=> '1',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type' 	=> 'TAX.CALC.TYPE',
			'code' 	=> '2',
			'name' 	=> 'รวมใน',
			'name_en' => 'Included',
			'seq'	=> '2',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type' 	=> 'TAX.CALC.TYPE',
			'code' 	=> '3',
			'name' 	=> 'ไม่คิดภาษี',
			'name_en' => 'Exempted',
			'seq'	=> '3',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type' 	=> 'TAX.WHOLD.TYPE',
			'code' 	=> '1',
			'name' 	=> 'นิติบุคคล',
			'name_en' => 'Corporate',
			'seq'	=> '1',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type' 	=> 'TAX.WHOLD.TYPE',
			'code' 	=> '2',
			'name' 	=> 'บุคคลธรรมดา',
			'name_en' => 'Personal',
			'seq'	=> '2',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type' 	=> 'AP.TYPE',
			'code' 	=> '01',
			'name' 	=> 'เจ้าหนี้การค้า',
			'name_en' => 'Account Payables',
			'seq'	=> '1',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type' 	=> 'AP.TYPE',
			'code' 	=> '02',
			'name' 	=> 'เจ้าหนี้อื่นๆ',
			'name_en' => 'Other Payables',
			'seq'	=> '2',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type' 	=> 'AP.TYPE',
			'code' 	=> '03',
			'name' 	=> 'ค่าใช้จ่ายค้างจ่าย',
			'name_en' => 'Accrued Expenses',
			'seq'	=> '3',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type' 	=> 'AP.STATUS',
			'code' 	=> '1',
			'name' 	=> 'ไม่ได้กำหนด',
			'name_en' => 'Undefied',
			'seq'	=> '1',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type' 	=> 'AP.STATUS',
			'code' 	=> '2',
			'name' 	=> 'ปกติ',
			'name_en' => 'Normal',
			'seq'	=> '2',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type' 	=> 'AP.STATUS',
			'code' 	=> '3',
			'name' 	=> 'ระงับการซื้อ',
			'name_en' => 'Suspended',
			'seq'		=> '3',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'BELT.COLOR', 
			'code'		=>	'1', 
			'name'		=>	'ดำ', 
			'name_en'	=>	'Black', 
			'seq'		=>	'1',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'BELT.COLOR', 
			'code'		=>	'2', 
			'name'		=>	'ขาว', 
			'name_en'	=>	'White', 
			'seq'		=>	'2',
		))->execute();
		
		\DB::insert('lookups')->set(array(
			'type'		=>	'BELT.COLOR', 
			'code'		=>	'3', 
			'name'		=>	'อื่นๆ', 
			'name_en'	=>	'Green', 
			'seq'		=>	'3'
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'BELT.TYPE', 
			'code'		=>	'1', 
			'name'		=>	'เรียบ', 
			'name_en'	=>	'Flat', 
			'seq'		=>	'1',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'BELT.TYPE', 
			'code'		=>	'2', 
			'name'		=>	'บั้ง', 
			'name_en'	=>	'Chevron', 
			'seq'		=>	'2',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'BELT.TYPE', 
			'code'		=>	'3', 
			'name'		=>	'บั้งไม่มีขอบ', 
			'name_en'	=>	'Chevron Edgeless', 
			'seq'		=>	'3',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'BELT.TYPE', 
			'code'		=>	'4', 
			'name'		=>	'กระพ้อ', 
			'name_en'	=>	'Elevator', 
			'seq'		=>	'4',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'BELT.TYPE', 
			'code'		=>	'5', 
			'name'		=>	'ซุปเปอร์ทอ', 
			'name_en'	=>	'Super Flex Transmission',
			'seq'		=>	'5',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'BELT.TYPE', 
			'code'		=>	'6', 
			'name'		=>	'ผ้าใบน้ำกาวหน้าเดียว', 
			'name_en'	=>	'Flat Cotton',
			'seq'		=>	'6',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'BELT.TYPE', 
			'code'		=>	'7', 
			'name'		=>	'ยางดำล้วน', 
			'name_en'	=>	'Rubber Sheet',
			'seq'		=>	'7',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=> 'BELT.TYPE', 
			'code'		=>	'8', 
			'name'		=> 'ยางดิบ', 
			'name_en'	=>	'Mixed Compound', 
			'seq'		=>	'8',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'BELT.END',
			'code'		=>	'1',
			'name'		=>	'ตัดยาว',
			'name_en'	=>	'Open-end',
			'seq'		=>	'1'
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'BELT.END',
			'code'		=>	'2',
			'name'		=>	'ต่อกลม',
			'name_en'	=>	'Endless',
			'seq'		=>	'2'
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'BELT.END',
			'code'		=>	'3',
			'name'		=>	'กลมสำเร็จ',
			'name_en'	=>	'Perfect Endless',
			'seq'		=>	'3'
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'BELT.EP',
			'code'		=>	'1',
			'name'		=>	'EP120',
			'name_en'	=>	'EP120',
			'seq'		=>	'1'
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'BELT.EP',
			'code'		=>	'2',
			'name'		=>	'EP125',
			'name_en'	=>	'EP125',
			'seq'		=>	'2'
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'BELT.EP',
			'code'		=>	'3',
			'name'		=>	'EP160',
			'name_en'	=>	'EP160',
			'seq'		=>	'3'
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'BELT.EP',
			'code'		=>	'4',
			'name'		=>	'EP200',
			'name_en'	=>	'EP200',
			'seq'		=>	'4'
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'BELT.EP',
			'code'		=>	'5',
			'name'		=>	'EP250',
			'name_en'	=>	'EP250',
			'seq'		=>	'5',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'BELT.EP',
			'code'		=>	'6',
			'name'		=>	'EP300',
			'name_en'	=>	'EP300',
			'seq'		=>	'6'
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'BELT.GRADE',
			'code'		=>	'1',
			'name'		=>	'P',
			'name_en'	=>	'P',
			'seq'		=>	'1'
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'BELT.GRADE',
			'code'		=>	'2',
			'name'		=>	'N',
			'name_en'	=>	'N',
			'seq'		=>	'2'
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'BELT.GRADE',
			'code'		=>	'3',
			'name'		=>	'M',
			'name_en'	=>	'M',
			'seq'		=>	'3'
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'BELT.GRADE',
			'code'		=>	'4',
			'name'		=>	'OR1',
			'name_en'	=>	'OR1',
			'seq'		=>	'4'
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'BELT.GRADE',
			'code'		=>	'5',
			'name'		=>	'OR2',
			'name_en'	=>	'OR2',
			'seq'		=>	'5'
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'BELT.GRADE',
			'code'		=>	'6',
			'name'		=>	'HR100',
			'name_en'	=>	'HR100',
			'seq'		=>	'6'
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'BELT.GRADE',
			'code'		=>	'7',
			'name'		=>	'HR120',
			'name_en'	=>	'HR120',
			'seq'		=>	'7'
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'BELT.GRADE',
			'code'		=>	'8',
			'name'		=>	'HR150',
			'name_en'	=>	'HR150',
			'seq'		=>	'8'
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'BELT.GRADE',
			'code'		=>	'9',
			'name'		=>	'SP',
			'name_en'	=>	'SP',
			'seq'		=>	'9'
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'BELT.GRADE',
			'code'		=>	'10',
			'name'		=>	'SR',
			'name_en'	=>	'SR',
			'seq'		=>	'10'
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'CLIENT.STATUS',
			'code'		=>	'1',
			'name'		=>	'ปกติ',
			'name_en'	=>	'Active',
			'seq'		=>	'1'
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'CLIENT.STATUS',
			'code'		=>	'2',
			'name'		=>	'ขายเงินสดเท่านั้น',
			'name_en'	=>	'Cash Only',
			'seq'		=>	'2'
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'CLIENT.STATUS',
			'code'		=>	'3',
			'name'		=>	'ระงับการขาย',
			'name_en'	=>	'Suspended',
			'seq'		=>	'3'
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'BELT.W.UNIT',
			'code'		=>	'1',
			'name'		=>	'นิ้ว',
			'name_en'	=>	'in',
			'seq'		=>	'1',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'BELT.W.UNIT',
			'code'		=>	'2',
			'name'		=>	'มม',
			'name_en'	=>	'mm',
			'seq'		=>	'2',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'BELT.W.UNIT',
			'code'		=>	'3',
			'name'		=>	'ซม',
			'name_en'	=>	'cm',
			'seq'		=>	'3',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'BELT.L.UNIT',
			'code'		=>	'1',
			'name'		=>	'เมตร',
			'name_en'	=>	'm',
			'seq'		=>	'1',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'BELT.L.UNIT',
			'code'		=>	'2',
			'name'		=>	'ฟุต',
			'name_en'	=>	'ft',
			'seq'		=>	'2',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'BELT.L.UNIT',
			'code'		=>	'3',
			'name'		=>	'นิ้ว',
			'name_en'	=>	'in',
			'seq'		=>	'3',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'BELT.L.UNIT',
			'code'		=>	'4',
			'name'		=>	'มม',
			'name_en'	=>	'mm',
			'seq'		=>	'4',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'BELT.GRADE.2',
			'code'		=>	'1',
			'name'		=>	'PA',
			'name_en'	=>	'PA',
			'seq'		=>	'1',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'BELT.GRADE.2',
			'code'		=>	'2',
			'name'		=>	'PB',
			'name_en'	=>	'PB',
			'seq'		=>	'2',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'BELT.GRADE.2',
			'code'		=>	'3',
			'name'		=>	'PD',
			'name_en'	=>	'PD',
			'seq'		=>	'3',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'BELT.GRADE.2',
			'code'		=>	'4',
			'name'		=>	'PE',
			'name_en'	=>	'PE',
			'seq'		=>	'4',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'BELT.GRADE.2',
			'code'		=>	'5',
			'name'		=>	'PF',
			'name_en'	=>	'PF',
			'seq'		=>	'5',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'BELT.GRADE.2',
			'code'		=>	'6',
			'name'		=>	'N',
			'name_en'	=>	'N',
			'seq'		=>	'7',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'BELT.GRADE.2',
			'code'		=>	'7',
			'name'		=>	'M',
			'name_en'	=>	'M',
			'seq'		=>	'8',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'BELT.GRADE.2',
			'code'		=>	'8',
			'name'		=>	'OR1',
			'name_en'	=>	'OR1',
			'seq'		=>	'9',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'BELT.GRADE.2',
			'code'		=>	'9',
			'name'		=>	'OR2',
			'name_en'	=>	'OR2',
			'seq'		=>	'10',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'BELT.GRADE.2',
			'code'		=>	'10',
			'name'		=>	'OR-50',
			'name_en'	=>	'OR-50',
			'seq'		=>	'11',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'BELT.GRADE.2',
			'code'		=>	'11',
			'name'		=>	'HR100',
			'name_en'	=>	'HR100',
			'seq'		=>	'12',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'BELT.GRADE.2',
			'code'		=>	'12',
			'name'		=>	'HR120',
			'name_en'	=>	'HR120',
			'seq'		=>	'13',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'BELT.GRADE.2',
			'code'		=>	'13',
			'name'		=>	'HR150',
			'name_en'	=>	'HR150',
			'seq'		=>	'14',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'BELT.GRADE.2',
			'code'		=>	'14',
			'name'		=>	'SP',
			'name_en'	=>	'SP',
			'seq'		=>	'15',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'BELT.GRADE.2',
			'code'		=>	'15',
			'name'		=>	'SR',
			'name_en'	=>	'SR',
			'seq'		=>	'16',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'BELT.EP.2',
			'code'		=>	'1',
			'name'		=>	'EP100',
			'name_en'	=>	'EP100',
			'seq'		=>	'1',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'BELT.EP.2',
			'code'		=>	'2',
			'name'		=>	'EP125',
			'name_en'	=>	'EP125',
			'seq'		=>	'2',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'BELT.EP.2',
			'code'		=>	'3',
			'name'		=>	'EP150',
			'name_en'	=>	'EP150',
			'seq'		=>	'3',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'BELT.EP.2',
			'code'		=>	'4',
			'name'		=>	'EP200',
			'name_en'	=>	'EP200',
			'seq'		=>	'4',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'BELT.EP.2',
			'code'		=>	'5',
			'name'		=>	'EP250',
			'name_en'	=>	'EP250',
			'seq'		=>	'5',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'BELT.EP.2',
			'code'		=>	'0',
			'name'		=>	'-',
			'name_en'	=>	'-',
			'seq'		=>	'0',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'COND.NUM',
			'code'		=>	'1',
			'name'		=>	'=',
			'name_en'	=>	'=',
			'seq'		=>	'1',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'COND.NUM',
			'code'		=>	'2',
			'name'		=>	'<',
			'name_en'	=>	'<',
			'seq'		=>	'2',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'COND.NUM',
			'code'		=>	'3',
			'name'		=>	'>',
			'name_en'	=>	'>',
			'seq'		=>	'3',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'COND.NUM',
			'code'		=>	'4',
			'name'		=>	'<>',
			'name_en'	=>	'<>',
			'seq'		=>	'4',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'COND.NUM',
			'code'		=>	'5',
			'name'		=>	'<=',
			'name_en'	=>	'<=',
			'seq'		=>	'5',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'COND.NUM',
			'code'		=>	'6',
			'name'		=>	'>=',
			'name_en'	=>	'>=',
			'seq'		=>	'6',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'COND.TEXT',
			'code'		=>	'1',
			'name'		=>	'=',
			'name_en'	=>	'=',
			'seq'		=>	'1',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'COND.TEXT',
			'code'		=>	'2',
			'name'		=>	'<>',
			'name_en'	=>	'<>',
			'seq'		=>	'2',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'COND.TEXT',
			'code'		=>	'3',
			'name'		=>	'like',
			'name_en'	=>	'like',
			'seq'		=>	'3',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'COND.DATE',
			'code'		=>	'1',
			'name'		=>	'=',
			'name_en'	=>	'=',
			'seq'		=>	'1',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'COND.DATE',
			'code'		=>	'2',
			'name'		=>	'<',
			'name_en'	=>	'<',
			'seq'		=>	'2',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'COND.DATE',
			'code'		=>	'3',
			'name'		=>	'>',
			'name_en'	=>	'>',
			'seq'		=>	'3',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'COND.DATE',
			'code'		=>	'4',
			'name'		=>	'<>',
			'name_en'	=>	'<>',
			'seq'		=>	'4',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'COND.DATE',
			'code'		=>	'5',
			'name'		=>	'<=',
			'name_en'	=>	'<=',
			'seq'		=>	'5',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'COND.DATE',
			'code'		=>	'6',
			'name'		=>	'>=',
			'name_en'	=>	'>=',
			'seq'		=>	'6',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'DOC.STATUS',
			'code'		=>	'0',
			'name'		=>	'ปกติ',
			'name_en'	=>	'Normal',
			'seq'		=>	'0',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'DOC.STATUS',
			'code'		=>	'1',
			'name'		=>	'ยกเลิก',
			'name_en'	=>	'Cancelled',
			'seq'		=>	'1',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'BELT.W.UNIT.2',
			'code'		=>	'1',
			'name'		=>	'\"',
			'name_en'	=>	'\"',
			'seq'		=>	'1',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'BELT.W.UNIT.2',
			'code'		=>	'2',
			'name'		=>	'mm',
			'name_en'	=>	'mm',
			'seq'		=>	'2',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'BELT.W.UNIT.2',
			'code'		=>	'3',
			'name'		=>	'cm',
			'name_en'	=>	'cm',
			'seq'		=>	'3',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'SP.LENGTH',
			'code'		=>	'1',
			'name'		=>	'0',
			'name_en'	=>	'0',
			'seq'		=>	'1',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'SP.LENGTH',
			'code'		=>	'2',
			'name'		=>	'20',
			'name_en'	=>	'20',
			'seq'		=>	'2',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'SP.LENGTH',
			'code'		=>	'3',
			'name'		=>	'40',
			'name_en'	=>	'40',
			'seq'		=>	'3',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'SP.LENGTH',
			'code'		=>	'4',
			'name'		=>	'50',
			'name_en'	=>	'50',
			'seq'		=>	'4',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'SP.LENGTH',
			'code'		=>	'5',
			'name'		=>	'70',
			'name_en'	=>	'70',
			'seq'		=>	'5',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'SP.LENGTH',
			'code'		=>	'6',
			'name'		=>	'90',
			'name_en'	=>	'90',
			'seq'		=>	'6',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'BELT.GRADE.2',
			'code'		=>	'16',
			'name'		=>	'FG',
			'name_en'	=>	'FG',
			'seq'		=>	'17',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'SG.COMP',
			'code'		=>	'1',
			'name'		=>	'1.34',
			'name_en'	=>	'1.34',
			'seq'		=>	'1',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'SG.COMP',
			'code'		=>	'2',
			'name'		=>	'1.33',
			'name_en'	=>	'1.33',
			'seq'		=>	'2',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'SG.COMP',
			'code'		=>	'7',
			'name'		=>	'1.15',
			'name_en'	=>	'1.15',
			'seq'		=>	'4',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'SG.COMP',
			'code'		=>	'6',
			'name'		=>	'1.24',
			'name_en'	=>	'1.24',
			'seq'		=>	'3',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'SG.COMP',
			'code'		=>	'8',
			'name'		=>	'1.35',
			'name_en'	=>	'1.35',
			'seq'		=>	'5',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'SG.COMP',
			'code'		=>	'9',
			'name'		=>	'1.35',
			'name_en'	=>	'1.35',
			'seq'		=>	'6',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'SG.COMP',
			'code'		=>	'11',
			'name'		=>	'1.22',
			'name_en'	=>	'1.22',
			'seq'		=>	'7',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'SG.COMP',
			'code'		=>	'12',
			'name'		=>	'1.3',
			'name_en'	=>	'1.3',
			'seq'		=>	'8',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'SG.COMP',
			'code'		=>	'13',
			'name'		=>	'1.3',
			'name_en'	=>	'1.3',
			'seq'		=>	'9',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'SG.COMP',
			'code'		=>	'15',
			'name'		=>	'1.3',
			'name_en'	=>	'1.3',
			'seq'		=>	'10',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'SG.COMP',
			'code'		=>	'16',
			'name'		=>	'1.18',
			'name_en'	=>	'1.18',
			'seq'		=>	'11',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'PRD.STATUS',
			'code'		=>	'1',
			'name'		=>	'รอยืนยัน',
			'name_en'	=>	'Unconfirm',
			'seq'		=>	'0',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'PRD.STATUS',
			'code'		=>	'2',
			'name'		=>	'สั่งผลิต',
			'name_en'	=>	'Production',
			'seq'		=>	'1',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'PRD.STATUS',
			'code'		=>	'3',
			'name'		=>	'สั่งตัดสต็อค',
			'name_en'	=>	'Stock',
			'seq'		=>	'2',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'RM.GROUP',
			'code'		=>	'1',
			'name'		=>	'ยาง',
			'name_en'	=>	'Rubbers',
			'seq'		=>	'1',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'RM.GROUP',
			'code'		=>	'2',
			'name'		=>	'เคมี',
			'name_en'	=>	'Chemicals',
			'seq'		=>	'2',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'RM.GROUP',
			'code'		=>	'3',
			'name'		=>	'เขม่าดำ',
			'name_en'	=>	'Carbon Black',
			'seq'		=>	'3',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'RM.GROUP',
			'code'		=>	'4',
			'name'		=>	'แป้ง',
			'name_en'	=>	'Fillers',
			'seq'		=>	'4',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'RM.GROUP',
			'code'		=>	'5',
			'name'		=>	'น้ำมัน',
			'name_en'	=>	'Oils',
			'seq'		=>	'5',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'RM.GROUP',
			'code'		=>	'6',
			'name'		=>	'ยาสุก',
			'name_en'	=>	'Activators',
			'seq'		=>	'6',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'FML.TYPE',
			'code'		=>	'2',
			'name'		=>	'สูตรมาตรฐาน',
			'name_en'	=>	'Standard formula',
			'seq'		=>	'2',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'FML.TYPE',
			'code'		=>	'1',
			'name'		=>	'สูตรทดลอง',
			'name_en'	=>	'Test formula',
			'seq'		=>	'1',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'AUDIT.ACTION',
			'code'		=>	'10',
			'name'		=>	'เรียกดู',
			'name_en'	=>	'view',
			'seq'		=>	'1',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'AUDIT.ACTION',
			'code'		=>	'20',
			'name'		=>	'เพิ่ม',
			'name_en'	=>	'insert',
			'seq'		=>	'2',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'AUDIT.ACTION',
			'code'		=>	'30',
			'name'		=>	'แก้ไข',
			'name_en'	=>	'update',
			'seq'		=>	'3',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'AUDIT.ACTION',
			'code'		=>	'40',
			'name'		=>	'ลบ',
			'name_en'	=>	'delete',
			'seq'		=>	'4',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'AUDIT.ACTION',
			'code'		=>	'50',
			'name'		=>	'พิมพ์',
			'name_en'	=>	'print',
			'seq'		=>	'5',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'AUDIT.ACTION',
			'code'		=>	'11',
			'name'		=>	'เรียกดู-กรอง',
			'name_en'	=>	'view-filter',
			'seq'		=>	'6',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'BELT.EP',
			'code'		=>	'99',
			'name'		=>	'ไม่ใช้',
			'name_en'	=>	'Not Use',
			'seq'		=>	'99',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'BELT.EP.2',
			'code'		=>	'99',
			'name'		=>	'ไม่ใช้',
			'name_en'	=>	'Not Use',
			'seq'		=>	'99',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'BELT.GRADE',
			'code'		=>	'99',
			'name'		=>	'ไม่ใช้',
			'name_en'	=>	'Not Use',
			'seq'		=>	'99',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'BELT.GRADE.2',
			'code'		=>	'99',
			'name'		=>	'ไม่ใช้',
			'name_en'	=>	'Not Use',
			'seq'		=>	'99',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'BELT.GRADE',
			'code'		=>	'11',
			'name'		=>	'pH',
			'name_en'	=>	'pH',
			'seq'		=>	'11',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'BELT.GRADE.2',
			'code'		=>	'17',
			'name'		=>	'pH',
			'name_en'	=>	'pH',
			'seq'		=>	'18',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'BELT.GRADE.2',
			'code'		=>	'18',
			'name'		=>	'P (ยางสี)',
			'name_en'	=>	'P (non-black)',
			'seq'		=>	'6',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'BELT.COLOR',
			'code'		=>	'4',
			'name'		=>	'ฟ้า',
			'name_en'	=>	'Cyan',
			'seq'		=>	'4',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'BELT.TYPE',
			'code'		=>	'9',
			'name'		=>	'ยางน้ำกาว',
			'name_en'	=>	'Skim Rubber',
			'seq'		=>	'9',
		))->execute();

		\DB::insert('lookups')->set(array(
			'type'		=>	'BELT.TYPE',
			'code'		=>	'10',
			'name'		=>	'ยางคาดหัว',
			'name_en'	=>	'Splicing Rubber',
			'seq'		=>	'10',
		))->execute();
		
		\DB::insert('lookups')->set(array(
			'type'		=>	'PRODUCT.TYPE',
			'code'		=>	'1',
			'name'		=>	'สายพานลำเลียง',
			'name_en'	=>	'Conveyor Belt',
			'seq'		=>	'1',
		))->execute();
		
		\DB::insert('lookups')->set(array(
			'type'		=>	'PRODUCT.TYPE',
			'code'		=>	'2',
			'name'		=>	'ยางดำล้วน',
			'name_en'	=>	'Rubber Sheet',
			'seq'		=>	'2',
		))->execute();
		
		\DB::insert('lookups')->set(array(
			'type'		=>	'PRODUCT.TYPE',
			'code'		=>	'3',
			'name'		=>	'วัตถุดิบ / อื่นๆ',
			'name_en'	=>	'Compound Rubber / Others',
			'seq'		=>	'3',
		))->execute();
		
		\DB::insert('lookups')->set(array(
			'type'		=>	'COMMENT.TYPE',
			'code'		=>	'1',
			'name'		=>	'ข้อมูล',
			'name_en'	=>	'Info',
			'seq'		=>	'1',
		))->execute();
		
		\DB::insert('lookups')->set(array(
			'type'		=>	'COMMENT.TYPE',
			'code'		=>	'2',
			'name'		=>	'ปัญหา',
			'name_en'	=>	'Problem',
			'seq'		=>	'2',
		))->execute();
		
	}

	public function down()
	{
		\DBUtil::truncate_table('lookups');
	}
}