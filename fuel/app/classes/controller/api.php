<?php

class Controller_Api extends Petro\Controller_Common
{
	public function action_client_list()
	{
		$q = Input::get('term');
		$arr = array(
			"aa11","aa22bb","bb33cc","dd44bb","ee55abc",
			"121345","25494","99456","55124","77856","27785","112456"
		);
		$result = array_filter($arr, function($element) use ($q) {
			return ( strpos($element, $q) === false ? false : true);
		});
		return json_encode($result);
	}
}
