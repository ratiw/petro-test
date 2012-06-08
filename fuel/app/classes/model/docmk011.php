<?php

class Model_Docmk011 extends Orm\Model
{
	protected static $_properties = array(
		'id',
		'mk_id',
		'suggest_roll',
		'length',
		'remark',
		'user_id',
		'created_at',
		'updated_at'
	);

	protected static $_table_name = 'docmk011';

	protected static $_primary_key = array('id');

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_save'),
		),
	);
}
