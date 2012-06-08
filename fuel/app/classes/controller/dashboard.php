<?php

class Controller_Dashboard extends Petro\Controller_Common
{
	public function action_index($page = 'petro')
	{
		$dir = APPPATH.'views';
		$file = '/dashboard/'.$page.'.md';
		$path = \Fuel::clean_path($dir.$file);
		// var_dump($dir, $file, $path);
		// var_dump(\Finder::instance()->locate($dir, 'dashboard/index'));  die;
		$data['text'] = \View::forge('dashboard/'.$page.'.md');
		$this->template->content = \View::forge('dashboard/index', $data);
	}
	
}
