<?php namespace App\Controllers;

class HomeController extends BaseController
{
	public function index():string
	{
		$data['page_title'] = 'Swiss Guards @ SWGOH';
		$data['is_logged_in'] = logged_in();

		return view('welcome_message', $data);
	}

	//--------------------------------------------------------------------

}
