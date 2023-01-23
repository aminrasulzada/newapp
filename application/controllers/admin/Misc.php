<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require('Base_Controller.php');

class Misc extends Base_Controller {
	//constructor
	function __construct() {
        parent::__construct();
        $this->load->model('Base_model');
		
        if(! $this->isAdminLogin()) {
	        redirect ('admin/User');
	    }
    }

	
	public function quizResult()
	{
	    $data = array();
	    $query = "select CONCAT(users.first_name,' ', users.last_name) as full_name, quiz_details.quiz_name, quiz_details.counter, count(quiz_answer.question_id) as question_id , sum(quiz_answer.is_correct)as is_correct from users inner join quiz_answer on quiz_answer.user_id=users.user_id inner join quiz_details on quiz_details.quiz_id=quiz_answer.quiz_id  group by users.user_id";
		$query1="SELECT CONCAT(users.first_name,' ', users.last_name) as full_name, quiz_details.quiz_name, quiz_1.difficulty, quiz_answer.answer, quiz_1.user_id, quiz_1.id, quiz_1.is_correct, quiz_questions.question FROM quiz_questions LEFT JOIN quiz_1 ON quiz_1.question_id=quiz_questions.id LEFT JOIN quiz_answer ON quiz_1.id = quiz_answer.id LEFT JOIN quiz_details ON quiz_1.quiz_id = quiz_details.quiz_id 
		LEFT JOIN users ON quiz_1.user_id = users.user_id Where quiz_1.is_correct='2' ORDER by quiz_1.entry_date";
	    $data['res'] = $this->Base_model->selectRecord($query);
		$data['check'] = $this->Base_model->selectRecord($query1);
	    $this->load->view('admin/result', $data);
	}



}
