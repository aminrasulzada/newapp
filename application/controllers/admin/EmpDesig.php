<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require('Base_Controller.php');

class EmpDesig extends Base_Controller {
	//constructor
	function __construct() {
        parent::__construct();
        $this->load->model('Base_model');
        if(! $this->isAdminLogin()) {
	        redirect ('admin/User');
	    }
    }

	//default is login page
    public function index() {
    	//nothing else
    }



	public function del_Employee() {
		$res_code = 0;
		$employee = intval( $this->input->post('req_dept_id', true) );
		if($employee > 0) {
			
			$this->Base_model->deleteRecord( 'users',  array('user_id' => $employee) );
					
			$res_code = 1;

		}
		echo $res_code;
	}
	
	
}