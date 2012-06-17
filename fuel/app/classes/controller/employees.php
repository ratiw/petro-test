<?php

class Controller_Employees extends Petro\Controller_App
{
	protected $form_columns = array('code', '<hr/>', 'first_name', 'last_name', 'birthdate', '<hr/>', 'salary', 'status');

	protected $grid_columns = array('code', 'first_name', 'last_name', 'birthdate', 'salary', 'status', 'created_at', '_actions_');

	protected $view_columns = array('code', 'first_name', 'last_name', 'birthdate', 'salary', 'status', 'created_at');

	
	public function setup_index(&$grid)
	{
		$this->sidebars->add('Filters', 
			Petro::render_filters(array(
				'first_name' => array('type' => 'string'),
				'last_name' => array('type' => 'string'),
				// 'status' => array('type' => 'select', 'collection' => Petro_Lookup::get('client.status'))
				'status' => array('type' => 'select', 'collection' => $this->model),
			))
		);

		$grid->add_scope('all', 'All');
		$grid->add_scope('working', 'Working', array('status', '=', 1));
		$grid->add_scope('suspend', 'Suspended', array('status', '=', 2));
	}
	
}