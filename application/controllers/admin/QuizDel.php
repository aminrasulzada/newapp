<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require('Base_Controller.php');

class QuizDel extends Base_Controller {
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



	public function del_quiz() {
		$res_code = 0;
		$employee = intval( $this->input->post('req_dept_id', true) );
		if($employee > 0) {
			$this->Base_model->deleteRecord( 'quiz_details',  array('quiz_id' => $employee) );
			$this->Base_model->deleteRecord( 'quiz_questions',  array('quiz_id' => $employee) );
			$res_code = 1;

		}
		echo $res_code;
	}
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function del_quest() {
		$res_code = 0;
		$employee = intval( $this->input->post('req_dept_id', true) );
		if($employee > 0) {
			$this->Base_model->deleteRecord( 'quiz_questions', array('id' => $employee) );
			$res_code = 1;

		}
		echo $res_code;
	}

	
}