<?php
class User_Controller extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->data['meta_title'] = 'HRIS-Admin';
		//Loaded helpers,libraries,models
		$this->load->model('M_User');
		$this->load->library('form_validation');


		//Get User info
		$this->data['get_current_user_details'] = $this->M_User->get_current_user_details();
		
		//Login Check
		$exception_uris = array(
			'user/login',
			'user/logout',
			);
		if(in_array(uri_string(), $exception_uris) == FALSE)
		{
			if($this->M_User->loggedin() == FALSE)
			{
				redirect('user/login');
			}
		}
	}
}
?>