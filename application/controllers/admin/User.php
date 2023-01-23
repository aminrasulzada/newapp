<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require('Base_Controller.php');

class User extends Base_Controller {
	//constructor
	function __construct() {
        parent::__construct();
        
      $this->load->model('admin/User_model','usermodel');
      
    }

	//default is login page
	public function index() {
	    
		$data = array();
		//if form submitted
		if($this->input->server('REQUEST_METHOD') == 'POST') {
			//setting validation rule
			$this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');

			if ($this->form_validation->run() !== FALSE) {
                $username = $this->input->post('username', true);
	        	$password = $this->input->post('password', true);
	        	$password = $this->convert_to_md5($password);
	        	$login_res = $this->usermodel->validate_user($username, $password);
                 // print_r($login_res); die;
				if( count($login_res) > 0 ) {
					if($login_res[0]->user_role == 1) {
						$this->session->set_userdata( array('user_id'  => $login_res[0]->user_id) );
						$this->session->set_userdata( array('user_name'  => $login_res[0]->user_name) );
						$this->session->set_userdata( array('user_role'  => $login_res[0]->user_role) );
						
					    redirect('admin/User');
						//$this->load->view('admin/dashboard');
						
					} else {
						$data['error_msg'] = $this->config->item('err_user_inactive');
					}
				} else {
					$data['error_msg'] = $this->config->item('err_login_invalid');
				}

            }	
		}

		$this->load->view('admin/login', $data);
	}

	public function logout() {
		$this->session->sess_destroy();
		redirect('admin', 'refresh');
	}

	
	public function user_Dashboard() {
		
	    if(! $this->isAdminLogin()) {
	        redirect ('admin');
	    }
		
     
		$this->load->view('admin/dashboard');
	}

}