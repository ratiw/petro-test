<?php

class Model_Employee extends Orm\Model
{
	public static function _init()
	{
		// \Lang::load('employee');
	}

	public static $_properties = array(
		'id'              => array(),
		'code'            => array(
			'validation'  => array('required', 'max_length' => array(10)),
		),
		'first_name'      => array(
			'validation'  => array('required', 'max_length' => array(50)),
		),
		'last_name'       => array(
			'validation'  => array('required', 'max_length' => array(50)),
		),
		'first_name_en'   => array(
			'validation'  => array('max_length' => array(50)),
		),
		'last_name_en'    => array(
			'validation'  => array('max_length' => array(50)),
		),
		'salutation_code' => array(
			'validation'  => array('required', 'numeric_min' => array(1)),
			'form' => array(
				'type'   => 'select',
				'lookup' => 'emp.salute',
			),
		),
		'birthdate'       => array(
			
		),
		'dept_code'       => array(
			'validation'  => array('required', 'numeric_min' => array(1)),
			'form' => array(
				'type'   => 'select',
				'lookup' => 'emp.dept',
			),
		),
		'group_code'      => array(
			'validation'  => array('required', 'numeric_min' => array(1)),
			'form' => array(
				'type'   => 'select',
				'lookup' => 'emp.group',
			),
		),
		'unit_code'       => array(
			'validation'  => array('required', 'numeric_min' => array(1)),
			'form' => array(
				'type'   => 'select',
				'lookup' => 'emp.unit',
			),
		),
		'type'            => array(
			'validation'  => array('required', 'numeric_min' => array(1)),
			'form' => array(
				'type'   => 'select',
				'lookup' => 'emp.type',
			),
		),
		'salary'          => array(
			'validation'  => array('required', 'numeric_min' => array(1)),
		),
		'wage'            => array(
			'validation'  => array('required', 'numeric_min' => array(1)),
		),
		'pay_via'         => array(
			'validation'  => array('required', 'numeric_min' => array(1)),
			'form' => array(
				'type'   => 'select',
				'lookup' => 'emp.pay_via',
			),
		),
		'bank_code'       => array(
			'validation'  => array('required', 'numeric_min' => array(1)),
			'form' => array(
				'type'   => 'select',
				'lookup' => 'bank',
			),
		),
		'account_no'      => array(
			'validation'  => array('required'),
		),
		'id_no'           => array(
			'validation'  => array('required'),
		),
		'ss_no'           => array(
		),
		'status'          => array(
			'validation'  => array('required', 'numeric_min' => array(1)),
			'form' => array(
				'type'   => 'select',
				'lookup' => 'emp.status',
			),
		),
		'profile'         => array(
			'form' => array('type' => false),
			'grid' => array('visible' => false)
		),
		'created_at' => array(
			'form' => array('type' => false),
			'grid' => array('visible' => false)
		),
		'updated_at' => array(
			'form' => array('type' => false),
			'grid' => array('visible' => false)
		),
	);
	
	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_save'),
		),
	);
}
