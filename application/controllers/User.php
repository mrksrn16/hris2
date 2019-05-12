<?php
class User extends User_Controller
{
	function __construct(){
		parent::__construct();

	}
	public function login(){
		// echo $this->M_User->hash('admin');
		$dashboard = 'home';

		// $this->M_User->loggedin() == FALSE || redirect($dashboard);
		if($this->input->post('submit'))
		{
			if($this->M_User->login() == TRUE)
			{
				redirect($dashboard);
			}
			else if($this->session->userdata('logged_in') == FALSE)
			{
				echo '<script>alert("Username/Password didn`t exists.");</script>';

			}
			else
			{
				$this->session->set_flashdata('error', 'Username and Password dont exists');
				redirect('user/login' , 'refresh');
			}
		}
		$this->load->view('login');
	}
	public function logout(){
		$this->M_User->logout();
		redirect('user/login');
		
	}
	public function upload_image($id){
		$image;
		if($_FILES['image']['name']){
			$config =  array(
              'upload_path'     => "./uploads/",
              'allowed_types'   => "jpg|png|jpeg",
              'overwrite'       => TRUE,
              'max_size'        => "2048000"
            );    
			$this->load->library('upload', $config);
			if($this->upload->do_upload('image'))
			{
				$image = $_FILES['image']['name'];
				$data = array('upload_data' => $this->upload->data());
				echo json_encode($data);
			}
			else
			{
				$image = NULL;
				$error = array('error' => $this->upload->display_errors());
				echo json_encode($error);
			}
		}
		$data = array(
			'image' => $image
			);
		$this->db->where('id', $id);
		$this->db->update('tbl_employee_details', $data);
		redirect('employees/view/' . $id);
	}
}

?>