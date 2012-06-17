<?php

class Model_Client extends Orm\Model 
{

	public static function _init()
	{
		\Lang::load('client');
	}

	protected static $_properties = array(
		'id' => array(
			'grid' => array('sortable' => true),
		),
		'code' => array(
			'data_type' => 'string',
			'validation' => array('required', 'max_length' => array(10), 'min_length' => array(2)),
			'grid' => array('sortable' => true),
		),
		'name' => array(
			'data_type' => 'string',
			'validation' => array('required', 'max_length' => array(100)),
			'grid' => array('sortable' => true),
		),
		'name_en' => array(
			'data_type' => 'string',
			'validation' => array('required', 'max_length' => array(100)),
			'grid' => array('sortable' => true),
		),
		'status' => array(
			'validation' => array('required'),
			'form' => array(
				'type' => 'select',
				'lookup' => 'client.status',
			),
			'grid' => array('format' => '<span class="label">{value}</span>'),
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

/* End of file client.php */