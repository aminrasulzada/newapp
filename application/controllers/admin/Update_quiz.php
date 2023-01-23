<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require('Base_Controller.php');

class Update_quiz extends Base_Controller 
{
	//constructor
	function __construct() {
        parent::__construct();
        $this->load->model('Employee_model');
         $this->load->model('Base_model');
         if(! $this->isAdminLogin()) {
	        redirect ('admin/User');
	    }
    }
    
public function update_quiz()
    {
        $data = array();
        $id = $this->uri->segment(3);
        if($this->input->server('REQUEST_METHOD')=='POST')
        {
            $name = $this->input->post('quiz',true);
            $duration = $this->input->post('duration', true);
            $start_date = date('Y-m-d', strtotime($this->input->post('q_s_d', true)));
            $end_date = date('Y-m-d', strtotime($this->input->post('q_e_d', true)));
            $show_it = intval($this->input->post('show_quiz', true));
       if($this->Base_model->updateRecord('quiz_details', array('quiz_name'=> $name, 'quiz_duration'=> $duration, 'start_date'=> $start_date, 'end_date'=> $end_date, 'show_it'=> $show_it), array('quiz_id'=> $id)))
       {
           $data['error_msg'] = $this->config->item('success_quiz_update');
          
       }
       else
       {
           $data['error_msg'] = $this->config->item('error_quiz_update');
       }
        
        }
        
       $query = "select * from quiz_details where quiz_id = '$id'";
       $data['quiz'] = $this->Base_model->selectRecord($query);
       $this->load->view('admin/edit-quiz', $data);
    }
    
    public function update_question()
    {
        $data = array();
        $id = $this->uri->segment(3);
        if($this->input->server('REQUEST_METHOD')=='POST')
        {
            $question = $this->input->post('question',true);
            $option1 = $this->input->post('option_1', true);
            $option2 = $this->input->post('option_2', true);
            $option3 = $this->input->post('option_3', true);
            $option4 = $this->input->post('option_4', true);
            $answer = $this->input->post('answer', true);
            $type = $this->input->post('type', true);
         
            
       if(($this->Base_model->updateRecord('quiz_questions', array('question'=> $question, 'option1'=> $option1, 'option2'=> $option2, 'option3'=> $option3, 'option4'=> $option4 , 'answer'=> $answer, 'type'=>$type ), array('id'=> $id)))){
          
       }
       else
       {
           $data['error_msg'] = $this->config->item('error_question_update');
       }
        
    }
        
       $query = "select * from quiz_questions where id = '$id'";
       $data['question'] = $this->Base_model->selectRecord($query);
       $this->load->view('admin/edit-quiz-question', $data);
    } 
    
    public function update_grade()
    {
        $data = array();
        $id = $this->uri->segment(3);
        if($this->input->server('REQUEST_METHOD')=='POST')
        {
            $grade = $this->input->post('grade',true);
           
         
           if($grade >= 1){
       if(($this->Base_model->updateRecord('quiz_answer', array('point'=> $grade, 'is_correct'=>'1' ), array('id'=> $id)))){
        $data['error_msg'] = $this->config->item('success_quiz_update');
       }
       else
       {
           $data['error_msg'] = $this->config->item('error_question_update');
       }}
       else{
        if(($this->Base_model->updateRecord('quiz_answer', array('point'=> $grade, 'is_correct'=>'0' ), array('id'=> $id)))){
            $data['error_msg'] = $this->config->item('success_quiz_update');
           }
           else
           {
               $data['error_msg'] = $this->config->item('error_question_update');
           }
       }
    }
       $query = "SELECT CONCAT(users.first_name,' ', users.last_name) as full_name, quiz_details.quiz_name, quiz_1.difficulty, quiz_answer.answer, quiz_1.user_id, quiz_1.id, quiz_1.is_correct, quiz_questions.question FROM quiz_questions LEFT JOIN quiz_1 ON quiz_1.question_id=quiz_questions.id LEFT JOIN quiz_answer ON quiz_1.id = quiz_answer.id LEFT JOIN quiz_details ON quiz_1.quiz_id = quiz_details.quiz_id 
       LEFT JOIN users ON quiz_1.user_id = users.user_id Where quiz_1.id ='$id' ";
       $data['check'] = $this->Base_model->selectRecord($query);
       $this->load->view('admin/check-quiz', $data);
    } 
}
