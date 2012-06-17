<?php

class Model_Employee extends \Orm\Model
{
	protected static $_properties = array(
		'id' => array(),
		'code' => array(
			'label' => 'Employee No.',
			'validation' => array('required'),
			'form' => array('editable' => false),
			'grid' => array(
				'sortable' => true,
				'process' => 'process_code',
			),
		),
		'first_name' => array(
			'label' => 'First Name',
			'validation' => array('required'),
			'grid' => array('sortable' => true),
		),
		'last_name' => array(
			'label' => 'Last Name',
			'validation' => array('required'),
			'grid' => array('sortable' => true),
		),
		'birthdate' => array(
			'label' => 'Date of Birth',
			'validation' => array('required'),
			'grid' => array(
				'sortable' => true,
				'format' => 'date',
			),
		),
		'salary' => array(
			'validation' => array('required'),
			'grid' => array(
				'format' => 'number',
				'align'  => 'right',
			),
		),
		'status' => array(
			'form' => array(
				'type' => 'select',
				'options' => array(
					0 => 'N/A', 1 => 'Working', 2 => 'Suspended', 3 => 'On Leave', 4 => 'Quit', 5 => 'Fired'
				),
			),
			'grid' => array(
				// 'format' => '<span class="label">{value}</span>',
				'process' => 'process_status',
			),
		),
		'created_at' => array(
			'form' => array('type' => false),
			'grid' => array(
				'process' => 'process_created_at'
			),
		),
		'updated_at' => array(
			'form' => array('type' => false),
		),
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_save'),
			'mysql_timestamp' => false,
		),
	);
	
	public static function process_code($data, $value)
	{
		return str_pad($data->code, 5, '0', STR_PAD_LEFT);
	}
	
	public static function process_status($data, $value)
	{
		$class = '';
		
		switch ($data->status)
		{
			case 1: $class = 'label-success'; break;
			case 2: $class = 'label-warning'; break;
			case 3: $class = 'label-inverse'; break;
			case 4: $class = 'label-info'; break;
			case 5: $class = 'label-important'; break;
			default: $class = ''; break;
		}
		
		return '<span class="label '.$class.'">'.$value.'</span>';
	}

	public static function process_created_at($data, $value) {
		return '<span class="label">'.\Date::forge($data->created_at)->format('%Y-%m-%d %H:%M').'</span>';
	}
}
