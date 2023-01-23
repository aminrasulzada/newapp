<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require('Base_Controller.php');

class Admin_user extends Base_Controller {
	//constructor
	function __construct() {
        parent::__construct();
       	$this->load->model('User_model');
       	if(! $this->isAdminLogin()) {
	        redirect ('admin/User');
	    }
    }
    
    public function add_admin_user()
    {
        	if($this->input->server('REQUEST_METHOD') == 'POST') {
			
				$data_ar = array ( 
	        				'user_name' => $this->input->post('user_name', true),
	        				'user_password' => $this->convert_to_md5( $this->input->post('pwd')),
	        				'user_role' => $this->input->post('role', true),
	        				'is_active' => DEFAULT_ACTIVE_MODE,
	        				'user_ip' => $this->input->ip_address()
	        			   );
	        
	        	if( $this->User_model->insertRecord('users', $data_ar) ) {
	        		$this->clear_posted_data();
	        		$data['msg'] = $this->config->item('success_save_admin_user');
	        	} else
	        		$data['msg'] = $this->config->item('err_save_admin_user');
            }	
	
        $this->load->view('admin/add-admin-user', $data);
    }
    
    public function show_admin_user()
    {
        $data = array();
        $data['admin_user'] = $this->User_model->select_admin_user();
        $this->load->view('admin/manage-admin-user', $data);
    }
}