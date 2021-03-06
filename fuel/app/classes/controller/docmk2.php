<?php

/**
 * Generated by Crude CRUD generator for Fuel on
 * November 25, 2011, 4:57 am
 *
 * @file      classes\controller\docmk.php
 * @database  fuel_dev
 * @type      mysql
 * @table     docmk
 * @stencil   activeapp
 */

class Controller_DocMK2 extends Controller_App
{

	public static function _init()
	{
		parent::_init();
		// Config::set('language', 'th');
		Lang::load('docmk');
	}

	/**
	 * Define columns
	 */
	protected static function _columns($page = 'index')
	{
		$columns_for = array(
			'view' => array(
				'id' => array('required' => true),
				'mk_no' => array('required' => true),
				'mk_date' => array('required' => true, 'grid' => array(
						'process' => function($data) {
							return Petro::to_app_date($data->mk_date);
						}
						)),
				'client_id' => array('required' => true),
				'client_po',
				'delivery_date' => array('grid' => array(
						'process' => function($data) {
							return Petro::to_app_date($data['delivery_date']);
						})),
				'deliver_to',
				'product_type' => array('grid' => array(
						'process' => function($data) {
							return Petro_Lookup::get('product.type', $data->product_type);
						})),
				'belt_type' => array('required' => true, 'grid' => array(
						'process' => function($data) {
							return Petro_Lookup::get('belt.type', $data['belt_type']);
						})),
				'belt_color' => array('required' => true, 'grid' => array(
						'process' => function($data) {
							return Petro_Lookup::get('belt.color', $data['belt_color']);
						})),
				'belt_width' => array('required' => true, 'grid' => array(
						'process' => function($data) {
							return $data->belt_width.' '.Petro_Lookup::get('belt.w.unit', $data->belt_width_unit);
						})),
				'belt_width_unit' => array('required' => true, 'grid' => array(
						'process' => function($data) {
							return Petro_Lookup::get('belt.w.unit', $data['belt_width_unit']);
						})),
				'belt_ply' => array('required' => true),
				'belt_ep' => array('required' => true, 'grid' => array(
						'process' => function($data) {
							return Petro_Lookup::get('belt.ep', $data['belt_ep']);
						})),
				'belt_grade' => array('required' => true, 'grid' => array(
						'process' => function($data) {
							return Petro_Lookup::get('belt.grade', $data['belt_grade']);
						})),
				'belt_top_grade',
				'belt_bot_grade',
				'belt_thick' => array('required' => true),
				'belt_top_thick' => array('required' => true),
				'belt_bot_thick' => array('required' => true),
				'belt_length' => array('required' => true),
				'belt_length_unit' => array('required' => true),
				'belt_end' => array('required' => true, 'grid' => array(
						'process' => function($data) {
							return Petro_Lookup::get('belt.end', $data['belt_end']);
						})),
				'belt_qty' => array('required' => true),
				'belt_price',
				'belt_disc1' => array('label' => 'Discount1'),
				'belt_disc2' => array('label' => 'Discount2'),
				'belt_disc3' => array('label' => 'Discount3'),
				'belt_price_net',
				'belt_amount',
				'remark',
				'creator_id',
				'creator_name',
				'status',
			),
			'index' => array(
				'id' => array('visible' => false),
				'mk_no' => array('label' => __('mk_no'), 'grid' => array(
					'sortable' => true,
					'process' => function($data) {
						return '<a href="'.Uri::base().Uri::segment(1).'/view/'.$data->id.'">'.$data->mk_no.'</a>';
					})),
				'mk_date' => array('label' => __('mk_date'), 'grid' => array(
					'format' => 'date',
					'sortable' => true)),
				'client_id' => array('label' => __('client_id'), 'grid' => array(
					'sortable' => true,
					'process' => function($data) {
						return Petro_Lookup::table('clients', 'id', 'code', $data->client_id);
					})),
				'belt_info' => array('label' => __('belt_info'), 'grid' => array(
					'process' => function($data) {
						return BeltInfo::short($data);
					})),
				'belt_qty' => array('label' => __('belt_qty'), 'grid' => array(
					'align' => 'right',
					'process' => function($data) {
						return $data->belt_qty.'&nbsp;'.__('belt_piece');
					})),
				'belt_price_net' => array('label' => __('belt_price_net'), 'grid' => array(
					'align' => 'right', 
					'format' => 'number')),
				'belt_amount' => array('label' => __('belt_amount'), 'grid' => array(
					'align' => 'right', 'format' => 'number')),
				'status' => array('label' => __('status'), 'grid' => array(
					'process' => function($data) {
						$t = '';
						switch($data->status)
						{
							case 0:
								$t = 'warning';
								break;
							case 1:
								$t = 'success';
								break;
							case 2:
								$t = '';
								break;
							default:
								$t = 'important';
						}
						return '<span class="label '.$t.'">'.Petro_Lookup::get('prd.status', $data->status).'</span>';
					})),
				'_action_' => Petro_Grid::default_actions(),
			),
		);
		
		return $columns_for[$page];
	}

	private function setup_scope($grid)
	{
		$grid->add_scope('all', 'ทั้งหมด');
		$m = date('n'); // 2 -- febuary
		$y = date('Y'); // 2012
		$grid->add_scope('this_month', 'เดือนนี้', array(
			'mk_date', 'between', array(
				date('Y-m-d', Petro::date($y, $m, 1)),
				date('Y-m-d', Petro::date($y, $m, Date::days_in_month($m, $y)))
			))
		);
		
		$m -= 1;
		if ($m == 0) 
		{
			$m = 12;
			$y -= 1;
		}
		$grid->add_scope('last_month', 'เดือนก่อน', array(
			'mk_date', 'between', array(
					date('Y-m-d', Petro::date($y, $m, 1)), 
					date('Y-m-d', Petro::date($y, $m, Date::days_in_month($m, $y)))
			))
		);
	}
	
	/**
	 * Index
	 */
	public function action_index($curr_page = 1, $order_by = null, $scope = null, $filter = null)
	{
		$data['filters'] = Input::param('q');
	
		$grid = new Petro_Grid('Model_DocMK', static::_columns('index'));

		$this->setup_scope($grid);
		
		$grid->add_summary('belt_price_net', 'sum');
		$grid->add_summary('belt_amount', 'sum');
		
		$data['index_content'] = $grid->render(); //$curr_page, $order_by, $scope, $data['filters']);
		
		$this->sidebars->add('Filters',
			Petro::render_group_filters(array(
				array("By Document info", array(
					'mk_date'   => array('type' => 'date_range'),	//'label' => 'Doc. Date', 
					'mk_no'     => array('type' => 'string'),	//'label' => 'Doc. No', 
					'client_id' => array('label' => 'Customer', 'type' => 'select', 'collection' => Petro_Lookup::table('clients', 'id', 'name')),
					'status'    => array('type' => 'select', 'collection' => Petro_Lookup::get('prd.status')),
				)),
				array("By Belt info", array(
					'belt_type'  => array('type' => 'select', 'collection' => Petro_Lookup::get('belt.type')),
					'belt_width' => array('type' => 'numeric'),
					'belt_grade' => array('type' => 'select', 'collection' => Petro_Lookup::get('belt.grade')),
					'belt_color' => array('type' => 'select', 'collection' => Petro_Lookup::get('belt.color')),
					'belt_thick' => array('label' => 'Thickness', 'type' => 'numeric'),
					'belt_length'=> array('label' => 'Length', 'type' => 'numeric'),
					'belt_end'   => array('label' => 'End Type', 'type' => 'select', 'collection' => Petro_Lookup::get('belt.end')),
				)),
			))
		);
		
		$this->action_items = array(
			array('title' => 'Add New Docmk', 'link' => Petro::get_routes('new')),
		);

		// set this to override default page_title
		$this->template->page_title = "MK Index";
		$this->template->content = View::forge('docmk2/index', $data, false);
	}

	/**
	 * View
	 */
	public function action_view($id = null)
	{
		$docmk = Model_DocMK::find($id);

		$data['docinfo'] = Petro::render_panel(
			'Document Information',
			$this->display_info($docmk)
		);
		
		$mk011 = Model_DocMK011::find()->where('mk_id', $docmk->id)->get_one();
		
		$this->sidebars->add(
			'Client Sales History', 
			'Total this month'.
			'<br>Total this year '
		);

		$this->sidebars->add(
			'Belt History',
			View::forge('docmk2/flow2', array('docmk' => $docmk, 'mk011' => $mk011))
		);
		// $this->sidebars->add(
			// 'Belt History', 
			// 'วันที่รับ order'.
			// '<br>วันที่สั่งผลิต'.
			// '<br>วันที่ตัด-ประกบ'.
			// '<br>วันที่เคลื่อบผิว'.
			// '<br>วันที่อบ'.
			// '<br>วันที่ QC'.
			// '<br>วันที่จัดส่ง'
		// );

		$routes = Petro::get_routes($id);
		$this->action_items = array(
			array('title' => 'Print', 'link' => 'print/mk/'.$id, 'attr' => array('target' => '_blank')),
			array('title' => 'Edit Docmk', 'link' => $routes['edit']),
			array('title' => 'Delete Docmk', 'link' => $routes['delete']),
		);

		$data['comments'] = Petro_Comment::render($this->app, $id, 'History');
		
		$this->template->page_title = "MK Info";
		$this->template->content = View::forge('docmk2/view', $data, false);
	}
	
	protected function display_info($docmk)
	{
		// $out = Petro::render_attr_table_open($docmk);
		
		// $out .= Petro::render_attr_table_row(__('mk_no'), $docmk->mk_no);
		// $out .= Petro::render_attr_table_row(__('mk_date'), Petro::to_app_date($docmk->mk_date));
		// $out .= Petro::render_attr_table_row(__('client_id'), 
			// '<a href="'.Uri::base().'clients/view/'.$docmk->client_id.'">'.
			// Petro_Lookup::get(null, $docmk->client_id, 'clients', 'id', 'name').
			// '</a>'
		// );
		// $out .= Petro::render_attr_table_row(__('client_po'), $docmk->client_po);
		// $out .= Petro::render_attr_table_row(__('product_type'), Petro_Lookup::get('product.type', $docmk->product_type));
		// $out .= Petro::render_attr_table_row(__('belt_info'), BeltInfo::long($docmk));
		// $out .= Petro::render_attr_table_row(__('belt_length'), $docmk->belt_length.' '.Petro_Lookup::get('belt.l.unit', $docmk->belt_length_unit));
		// $out .= Petro::render_attr_table_row(__('belt_end'), Petro_Lookup::get('belt.end', $docmk->belt_end));
		// $out .= Petro::render_attr_table_row(__('belt_qty'), $docmk->belt_qty.' '.'เส้น');
		// $price = BeltInfo::calc_price($docmk);
		// $out .= Petro::render_attr_table_row(__('belt_price'), number_format($price['standard_price'], 2));
		// $out .= Petro::render_attr_table_row(__('remark'), $docmk->remark);
		// $out .= Petro::render_attr_table_row(__('creator'), $docmk->creator_name);
		// $out .= Petro::render_attr_table_row(__('status'), Petro_Lookup::get('prd.status', $docmk->status));
		
		// $out .= Petro::render_attr_table_close();
		
		// return $out;
		return Petro::render_attr_table($docmk, array(
				'mk_no', 
				'mk_date' => function($data) { 
					return Petro::to_app_date($data->mk_date); 
				},
				'client_id' => function($data) {
					return '<a href="'.Uri::base().'clients/view/'.$data->client_id.'">'.
						Petro_Lookup::get(null, $data->client_id, 'clients', 'id', 'name').
						'</a>';
				},
				'client_po',
				'product_type' => function($data) {
					return Petro_Lookup::get('product.type', $data->product_type);
				},
				'belt_info' => function($data) {
					return BeltInfo::long($data);
				},
				'belt_length' => function($data) {
					return $data->belt_length.' '.Petro_Lookup::get('belt.l.unit', $data->belt_length_unit);
				},
				'belt_end' => function($data) {
					return Petro_Lookup::get('belt.end', $data->belt_end);
				},
				'belt_qty' => function($data) {
					return $data->belt_qty.' '.'เส้น';
				},
				'belt_price' => function($data) {
					$price = BeltInfo::calc_price($data);
					return number_format($price['standard_price'], 2);
				},
				'remark',
				'creator' => function($data) {
					return $data->creator_name;
				},
				'status' => function($data) {
					return Petro_Lookup::get('prd.status', $data->status);
				}
			));
	}
	
	protected function setup_validation($mode = null)
	{
		$val = Validation::forge('docmk');
		$val->add_field('mk_no', __('mk_no'), 'required');
		$val->add_field('mk_date', __('mk_date'), 'required');
		$val->add_field('client_id', __('client_id'), 'required|numeric_min[1]');
		$val->add_field('product_type', __('product_type'), 'required');
		$val->add_field('belt_type', __('belt_type'), 'required|numeric_min[1]');
		$val->add_field('belt_color', __('belt_color'), 'required');
		$val->add_field('belt_width', __('belt_width'), 'required');
		$val->add_field('belt_ply', __('belt_ply'), 'required');
		$val->add_field('belt_ep', __('belt_ep'), 'required|numeric_min[1]');
		$val->add_field('belt_grade', __('belt_grade'), 'required|numeric_min[1]');
		$val->add_field('belt_thick', __('belt_thick'), 'required|numeric_min[5]');
		$val->add_field('belt_top_thick', __('belt_top_thick'), 'required');
		$val->add_field('belt_bot_thick', __('belt_bot_thick'), 'required');
		$val->add_field('belt_length', __('belt_length'), 'required');
		$val->add_field('belt_end', __('belt_end'), 'required|numeric_min[1]');
		$val->add_field('belt_qty', __('belt_qty'), 'required|numeric_min[1]');
		
		// ...for validation rules defined inside model properties
		// foreach (Model_DocMK::properties() as $key => $val)
		// {
			// if (isset($val['validation'])
			// {
				// $val->add_field($key, __($key), $val['validation']);
			// }
		// }
		
		return $val;
	}
	
	protected function get_post_data($docmk = null)
	{
		$is_new = false;

		if ( !isset($docmk) )
		{
			$docmk = array();
			$is_new = true;
		}

		$user = Auth::instance()->get_user_id();
		$screen_name = Auth::instance()->get_screen_name();
		
		$docmk['mk_no'] = Input::post('mk_no');
		$docmk['last_docno'] = Input::post('last_docno');
		$docmk['mk_date'] = Petro::to_db_date(Input::post('mk_date'));
		$docmk['client_id'] = Input::post('client_id');
		$docmk['client_po'] = Input::post('client_po');
		$docmk['delivery_date'] = Petro::to_db_date(Input::post('delivery_date'));
		$docmk['deliver_to'] = Input::post('deliver_to');
		$docmk['product_type'] = Input::post('product_type');
		$docmk['belt_type'] = Input::post('belt_type');
		$docmk['belt_color'] = Input::post('belt_color');
		$docmk['belt_color'] == 3 and $docmk['belt_color_other'] = Input::post('belt_color_other');
		$docmk['belt_width'] = Input::post('belt_width');
		$docmk['belt_width_unit'] = Input::post('belt_width_unit');
		$docmk['belt_ply'] = Input::post('belt_ply');
		$docmk['belt_ep'] = Input::post('belt_ep');
		$docmk['belt_grade'] = Input::post('belt_grade');
		$docmk['belt_top_grade'] = Input::post('belt_top_grade');
		$docmk['belt_bot_grade'] = Input::post('belt_bot_grade');
		$docmk['belt_thick'] = Input::post('belt_thick');
		$docmk['belt_top_thick'] = Input::post('belt_top_thick');
		$docmk['belt_bot_thick'] = Input::post('belt_bot_thick');
		$docmk['belt_length'] = Input::post('belt_length');
		$docmk['belt_length_unit'] = Input::post('belt_length_unit');
		$docmk['belt_end'] = Input::post('belt_end');
		$docmk['belt_qty'] = Input::post('belt_qty');
		$docmk['belt_price'] = Input::post('belt_price');
		$docmk['belt_disc1'] = Input::post('belt_disc1');
		$docmk['belt_disc2'] = Input::post('belt_disc2');
		$docmk['belt_disc3'] = Input::post('belt_disc3');
		$docmk['belt_price_net'] = Input::post('belt_price_net');
		$docmk['belt_amount'] = Input::post('belt_amount');
		$docmk['remark'] = Input::post('remark');
		$docmk['creator_id'] = $user[1];
		$docmk['creator_name'] = $screen_name;
		$docmk['status'] = Input::post('status');
		
		return $is_new ? Model_DocMK::forge($docmk) : $docmk;
	}

	/**
	 * Create
	 */
	public function action_create($id = null)
	{
		if (Input::method() == 'POST')
		{
			$val = $this->setup_validation();
			if ($val->run())
			{
				$docmk = $this->get_post_data();
			
				try 
				{
					DB::start_transaction();
					
					if ($docmk and $docmk->save())
					{
						$last_docno = strtoupper(Input::post('last_docno'));
						
						// update docinfo set last_docno=$ where id=?? and last_docno=$last_docno
						// if failed, then rollback
						$str = 'UPDATE docinfo SET last_docno = "'.strtoupper($docmk['mk_no']).'"'
								.' WHERE type = "MK"'
								.' AND last_docno '.(($last_docno == '') ? 'IS NULL' : '= "'.$last_docno.'"');
							

						$result = DB::query($str)->execute();
						
						if ((int) $result <= 0)
						{
							// failed updating, possibly the last_docno has changed by another user
							$docinfo = DocInfo::get_next('MK');
							throw new Exception('Document No is no longer valid, try "'.$docinfo['next'].'" instead.');
						}
					}
					else
					{
						throw new Exception('Could not save docmk. ['.mysql_errno().'] '.mysql_error());
					}

					DB::commit_transaction();
					Session::set_flash('notice', 'Added docmk #' . $docmk->id . '.'." ($result) ".$str);
					Response::redirect('docmk2');
				}
				catch (Exception $e)
				{
					DB::rollback_transaction();
					Session::set_flash('error', $e->getMessage());
				}
			
			}
			else
			{
				Session::set_flash('error', 'Please correct the error(s).');
				$this->template->set_global('errors', $val->errors());
			}
		
		}

		$this->template->page_title = "New Doc MK";
		$this->template->content = View::forge('docmk2/create');
	}

	/**
	 * Edit
	 */
	public function action_edit($id = null)
	{
		$docmk = Model_DocMK::find($id);

		if (Input::method() == 'POST')
		{
			$docmk = $this->get_post_data($docmk);

			if ($docmk->save())
			{
				Session::set_flash('notice', 'Updated docmk #' . $id);
				Response::redirect('docmk2');
			}
			else
			{
				Session::set_flash('notice', 'Could not update docmk #' . $id);
			}
		}
		else
		{
			$this->template->set_global('docmk', $docmk);
		}

		// $this->template->page_title = "Docmk";
		$this->template->content = View::forge('docmk2/edit');
	}

	/**
	 * Delete
	 */
	public function action_delete($id = null)
	{
		if ($docmk = Model_DocMK::find($id))
		{
			$docmk->delete();

			Session::set_flash('notice', 'Deleted docmk #' . $id);
		}
		else
		{
			Session::set_flash('notice', 'Could not delete docmk #' . $id);
		}

		Response::redirect('docmk2');
	}

	public function action_next_docno()
	{
		$docno = DocInfo::get_next('MK');
		return \Response::forge($docno['next']);
	}

}