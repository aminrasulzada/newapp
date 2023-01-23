<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require('Base_Controller.php');

class Employee extends Base_Controller {
	//constructor
	function __construct() {
        parent::__construct();
        $this->load->model('Employee_model');
         $this->load->model('Base_model');
         
         if(! $this->isAdminLogin()) {
	        redirect ('admin/User');
	    }
    }

	//default page
	public function index() {
		$data = array();
	

    	$data['emp_list'] = $this->Employee_model->get_employee();
		//$data['employees'] = array(5,3,3,3,3);
		$this->load->view('admin/user/manage-employee', $data);
	}

	public function add_Update_Employee() {
		$data = array();
	
		if($this->input->server('REQUEST_METHOD') == 'POST') {
		    //echo '<pre>';print_r($_REQUEST); die;
			//setting validation rule
			//$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.user_name]');
			$this->form_validation->set_rules('f_name', 'First name', 'required');
			$this->form_validation->set_rules('emp_code', 'Employee code', 'required');
			$this->form_validation->set_rules('pwd', 'Password', 'required');
			//$this->form_validation->set_rules('dob','Date of birth','required');
		
		
            
        	if ($this->form_validation->run() !== FALSE) {
          
	            $input_ar = array( 
                                'user_name' => $this->input->post('emp_code', true),
                               
    				            'user_password' => $this->convert_to_md5($this->input->post('pwd')),
    				            'user_role' => 2,
    				          
    				            'first_name' => $this->input->post('f_name'),
    				            'last_name' => $this->input->post('l_name'),
    				            'gender' => $this->input->post('gender'),
    				            
    				            //'date_of_birth' => $this->input->post('dob'),
    				           
				        );
		   
            //$input_ar['date_of_birth'] = date('Y-m-d', strtotime($input_ar['date_of_birth']));
            
          $user_record = $this->Employee_model->add_Employee($input_ar);
          if(!empty($user_record))
          {
            	$data['error_msg'] = $this->config->item('success_employee_save');
          }
          else {
						$data['error_msg'] = $this->config->item('err_employee_save');
				}
		}
		}

		$this->load->view('admin/user/add-user', $data);
	}
	
	///////Update Employee/////////////
	
	public function Update_Employee() {
		$data = array();
		$user_id = $this->uri->segment(3);
		
		if($this->input->server('REQUEST_METHOD') == 'POST') {
		    $user_id = $this->uri->segment(3);
            //die($user_id);
            $input_ar = array( 
                                'user_id' => $user_id,
                                'user_name' => $this->input->post('emp_code', true),
                                'user_role' => 2,
    				            'first_name' => $this->input->post('f_name'),
    				            'last_name' => $this->input->post('l_name'),
    				            'gender' => $this->input->post('gender'),
    				            'is_active' => $this->input->post('status'),
    				            'login_user_id' => 1
				        );
		    
           
          if($this->Employee_model->update_Employee($input_ar))
          {
            	$data['error_msg'] = $this->config->item('success_employee_update');
          }
          else {
						$data['error_msg'] = $this->config->item('err_employee_update');
					}
		
		
		}
		
		$data['emp_list'] = $this->Employee_model->get_employee($user_id);

		$this->load->view('admin/user/edit-employee', $data);
	}
	
}