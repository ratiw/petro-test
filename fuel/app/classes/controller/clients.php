<?php
class Controller_Clients extends Petro\Controller_App
{
	// protected $app_name = 'Customer';
	protected $view_display_columns = array('code', 'name', 'name_en', 'status');

	public function action_index()
	{
		// $grid = new Petro_Grid($this->model);
		$grid = new Petro_Grid($this);
		
		$this->sidebars->add('Filters', 
			Petro::render_filters(array(
				'code' => array('label' => 'Code', 'type' => 'string'),
				'name' => array('type' => 'string'),
				// 'status' => array('type' => 'select', 'collection' => Petro_Lookup::get('client.status'))
				'status' => array('type' => 'checkbox', 'collection' => Petro_Lookup::get('client.status'))
			))
		);
		
		$this->action_items = array(
			array('title' => 'Add New Client', 'link' => Petro::get_routes('new'), 'visible' => $this->can_create()),
		);

		// $this->template->page_title = "Clients";
		$this->template->set('content', $grid->render(), false);
		// Petro_Menu::load_from_table();
	}
	
	public function setup_index(&$grid)
	{
		$this->sidebars->add('Filters', 
			Petro::render_filters(array(
				'code' => array('label' => 'Code', 'type' => 'string'),
				'name' => array('type' => 'string'),
				'status' => array('type' => 'checkbox', 'collection' => Petro_Lookup::get('client.status'))
			))
		); 
	}
	
	public function action_view($id = null)
	{
		$client = Model_Client::find($id);
		if (is_null($client))
		{
			\Response::redirect('clients');
		}
		
		$data['client'] = Petro::render_panel(
			'Client Information',
			// Petro::render_attr_table($client, static::_columns('view'))
			// Petro::render_attr_table($client)
			Petro::render_attr_table(
				$client,
				array('code', 'name', 'name_en', 'status')
			)
			// Petro::render_attr_table(
				// $client, 
				// array(
					// 'code', 
					// 'full_name' => function($data) {
						// return $data->name.' - '.$data->name_en;
					// }, 
					// 'status'
				// )
			// )
			// Petro::render_attr_table(
				// $client, 
				// array('code', 'name', 'name_en', 'status' => function($data) {
					// $status = Petro_Lookup::get('client.status');
					// return '<span class="label">'.$status[$data['status']].'</span>';
				// })
			// )
		);
		
		$data['comments'] = Petro_Comment::render($this->app, $id);

		$this->sidebars->add(
			'Render from another View!', 
			View::forge('sidebar_link', array('url' => 'going/anywhere'))
		);

		$routes = Petro::get_routes($id);
		$this->action_items = array(
			array('title' => 'Edit Client', 'link' => $routes['edit']),
			array(
				'title' => 'Delete Client', 
				'link' => $routes['delete'], 
				'attr' => array(
					'data-toggle' => 'modal', 'data-target' => '#petro-confirm', 'class' => 'del-item',
				)
			),
		);
		
		$this->template->page_title = $client->name;
		$this->template->set('content', $data['client'].$data['comments'], false);
	}
	
	protected function setup_view(&$data)
	{
		$this->sidebars->add(
			'Render from another View!', 
			View::forge('sidebar_link', array('url' => 'going/anywhere'))
		);
		
		return Petro_Comment::render($this->app, $data->id);
	}
	
	protected function setup_form()
	{
		$form = new Petro_Form(array('class' => 'form-horizontal'));
		$form->add_model('Model_Client');
		$form->add_form_action(\Form::submit('submit', 'Submit', array('class' => 'btn btn-primary')));
		$form->add_form_action(\Html::anchor('clients', 'Cancel', array('class' => 'btn')));
		// $form->sequence(array('status', '<hr/>', 'name_en', 'name', 'code'));

		$this->sidebars->add('New Client!', 
			'<form action="#">'
			.'Edit Client: This is the demo sidebar section inspired '
			.'by the <a href="#">ActiveAdmin</a> package for ruby'
			.'</form>'
		);

		return $form;
	}
	
	public function action_create($id = null)
	{
		$form = $this->setup_form();
	
		if (Input::method() == 'POST')
		{
			if ($form->validation()->run() === true)
			{
				$fields = $form->validated();
				
				$client = Model_Client::forge(array(
					'code'    => $fields['code'],
					'name'    => $fields['name'],
					'name_en' => $fields['name_en'],
					'status'  => $fields['status'],
					'created_at' => Date::forge()->get_timestamp(),
				));
			
				if ($client and $client->save())
				{
					Session::set_flash('success', 'Added client #' . $client->id . '.');
					Response::redirect('clients');
				}
				else
				{
					Session::set_flash('error', 'Could not create new client.');
				}
			}
			else
			{
				$this->template->set_global('errors', $form->error(), false);
			}
		}

		$this->template->page_title = "New Client";
		$this->template->set('content', $form->build(), false);
	}
	
	public function action_edit($id = null)
	{
		$client = Model_Client::find($id);
		
		$form = $this->setup_form();

		if (Input::method() == 'POST')
		{
			if ($form->validation()->run() === true)
			{
				$fields = $form->validated();
			
				$client->code    = $fields['code'];
				$client->name    = $fields['name'];
				$client->name_en = $fields['name_en'];
				$client->status  = $fields['status'];
				$client->updated_at = Date::forge()->get_timestamp();

				if ($client->save())
				{
					Session::set_flash('success', 'Updated client #' . $id);
					Response::redirect('clients');
				}
				else
				{
					Session::set_flash('error', 'Could not update client #' . $id);
				}
			}
			else
			{
				$this->template->set_global('errors', $form->error(), false);
			}
		}
		
		$this->template->page_title = "Edit Client";
		$this->template->set('content', $form->build($client), false);
	}
	
	public function action_delete($id = null)
	{
		$model = $this->model;
		
		if ( ! is_null($id) and $client = $model::find($id)->delete())
		{
			Session::set_flash('success', 'Deleted client #' . $id);
		}
		else
		{
			Session::set_flash('error', 'Could not delete client #' . $id);
		}

		Response::redirect('clients');

	}
	
}

/* End of file clients.php */
