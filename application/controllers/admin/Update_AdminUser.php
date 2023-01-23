<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require('Base_Controller.php');

class Update_AdminUser extends Base_Controller {
	//constructor
	function __construct() {
        parent::__construct();
        $this->load->model('Employee_model');
         $this->load->model('Base_model');
         if(! $this->isAdminLogin()) {
	        redirect ('admin/User');
	    }
    }
    public function updateAdminUser()
    {
        $data = array();
        $id = $this->uri->segment(3);
        if($this->input->server('REQUEST_METHOD')=='POST')
        {
            $name = $this->input->post('user_name',true);
            $role = $this->input->post('role', true);
            
       if($this->Base_model->updateRecord('users', array('user_name'=> $name, 'user_role'=> $role), array('user_id'=> $id)))
       {
           $data['error_msg'] = $this->config->item('success_admin_user_msg');
          
       }
       else
       {
           $data['error_msg'] = $this->config->item('error_admin_user_msg');
       }
        
        }
        
       $query = "select * from users where user_id = '$id'";
       $data['record'] = $this->Base_model->selectRecord($query);
       $this->load->view('admin/edit-admin-user', $data);
    }
    
}
