<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require('Base_Controller.php');

class Add_Quiz extends Base_Controller {
	//constructor
	function __construct() {
        parent::__construct();
       	$this->load->model('User_model');
       	if(! $this->isAdminLogin()) {
	        redirect ('admin/User');
	    }
    }
    
     public function index()
    {
       	if($this->input->server('REQUEST_METHOD') == 'POST') {
			
				$data_ar = array ( 
	        				'quiz_name' => $this->input->post('quiz', true),
	        				'quiz_duration' => $this->input->post('duration', true),
	        				'start_date' => date('Y-m-d', strtotime($this->input->post('q_s_d', true))),
	        				'end_date' => date('Y-m-d', strtotime($this->input->post('q_e_d', true))),
	        			    'is_active' => DEFAULT_ACTIVE_MODE,
	        			    'show_it' => intval($this->input->post('show_quiz', true)),
	        			    'created_date' => date('Y-m-d H:i:s')
	        			   );
	        
	        	if( $this->User_model->insertRecord('quiz_details', $data_ar) ) {
	        		$this->clear_posted_data();
	        		$data['msg'] = $this->config->item('success_save_quiz');
	        	} else
	        		$data['msg'] = $this->config->item('err_save_quiz');
            }	 
	
        $this->load->view('admin/add-quiz', $data);
    }
    
    public function add_question()
    {

        	if($this->input->server('REQUEST_METHOD') == 'POST') {
				
				$data_ar = array ( 
					'quiz_id' => $this->input->post('quiz_id', true),
					'question' => $this->input->post('question', true),
					'type' => $this->input->post('question-type', true),
					'difficulty' =>$this-> input->post('difficulty', true) ,
					'open_answer'=>$this->input->post('open_answer', true),
					'is_active' => DEFAULT_ACTIVE_MODE,
					'created_date' => date('Y-m-d H:i:s')
				   ); $question = $this->input->post('question', true);
				   $this->User_model->insertRecord('quiz_questions', $data_ar);}
                  
				   $sql="SELECT id FROM quiz_questions WHERE question ='$question' ";
                   $result =  $this->User_model->selectRecord($sql);
                      for ($x = 1; $x <= 10; $x++) {
                        $data1= array('answer'=> $this->input->post('option['.$x.']', true), 
					'is_correct'=>$this->input->post('correct['.$x.']',true),
					'question_id'=>$result[0]->id,
				);
			 
				    $this->User_model->insertRecord('quiz_answers', $data1);

                      }
						
            
        $is = DEFAULT_ACTIVE_MODE;
        $query = "select quiz_name, quiz_id from quiz_details where is_active=$is order by quiz_id desc";
	    $data['quiz_name'] = $this->User_model->selectRecord($query);
        $this->load->view('admin/add-quiz-question', $data);
    }
    
   public function show_quiz()
   {
       $is = DEFAULT_ACTIVE_MODE;
       $query = "select * from quiz_details where is_active=$is order by quiz_id desc";
       
	   $data['quiz_details'] = $this->User_model->selectRecord($query);
	  
	   $this->load->view('admin/show-quiz', $data);
	   
   }
   public function show_quiz_question()
   {
       
       $show_ques = "select quiz_questions.question, quiz_questions.id, quiz_questions.option1, quiz_questions.option2, quiz_questions.option3, quiz_questions.option4, quiz_questions.answer, quiz_details.quiz_name from quiz_questions inner join quiz_details on quiz_details.quiz_id=quiz_questions.quiz_id where quiz_questions.is_active= ".DEFAULT_ACTIVE_MODE." order by quiz_questions.quiz_id desc";
	   $data['quiz_question'] = $this->User_model->selectRecord($show_ques);
       $this->load->view('admin/show-quizquestion', $data);
       
   }
   
   
}