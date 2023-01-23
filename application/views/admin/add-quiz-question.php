<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('admin/include/header');
$this->load->view('admin/include/left-bar');
?>
<script>
function checkform(){
    if(document.add-emp.question.length < 10) {
        alert("Please enter question");
        return false;
    } else {
        document.add-emp.submit();
    }
    var inputFormDiv = document.getElementById('options');
if(inputFormDiv.getElementsByTagName('options').length < 4){
    alert("Question must have at least 4 options");
    return false;
}else{
    document.add-emp.submit();
};


}
</script>
<?php 
                                            
                                         ?>
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>
                Add Quiz Question 
            </h2>
        </div>
  
            <form action="" method="post" name="add-emp" id="eddEmp" enctype="multipart/form-data">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
                          <!--  <h2 class="card-inside-title">Question</h2> -->
                             <br>
                      
                      
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                           <select class="form-control show-tick" name="quiz_id" required>
                                                <option value="">Quiz Name</option>
                                             <?php
                                               foreach($quiz_name as $quiz)
                                               { ?>
                                                <option value="<?php echo $quiz->quiz_id; ?>"><?php echo ucfirst($quiz->quiz_name); ?></option>
                                              <?php   }
                                                         ?>
                                           </select>
                                            
                                        </div>
                                    </div>
                                </div>
                                
                             </div>
                            
                          <div class="row clearfix">
                                <div class="col-sm-6">
                                   <div class="form-group form-float">
                                        <div class="form-line">
                                            
                                            <textarea rows="2" class="form-control no-resize" maxlength="250" name="question"></textarea>
                                            
                                            <label class="form-label">Question</label>
                                         
                                        
                                        </div>
                                    </div>

                                </div>
                                
                            </div>
                            <table class="table table-bordered" id="dynamic_field">
                                
                            <div id ='options' class="row clearfix">
                                <div class="col-sm-6">
                                   <div class="form-group form-float">
                                        <div class="form-line">
                                            <textarea  rows="2" class="form-control no-resize" maxlength="250" name="option[1]" id="option[]"  autofocus></textarea>
                                            <label for="option[]" class="form-label">Option 1</label>
                                            
                                        </div>
                                        
 
                                    </div>
                                    
                               </div>
                               <input type="hidden" name="correct[1]" value="0" />
                               <input type="checkbox" name="correct[1]" value="1" placeholder="correct" id ="correct[]" class="with-gap" >
                                            <label for= "correct[]" >Correct</label>      
                                             
                            </div>
                            
                            <td>
                                    <button type="button" name="addAnswer" id="addAnswer" class="btn btn-success mb-2">
                                        Add Answer
                                    </button>
                                </td>
                                </table>
                                <div class="col-sm-9">
                                  <div class="form-group">
                                        Question type:
                                        <label for="radio" class="m-l-20">Multiple choice</label>
                                        <input type="radio" name="question-type" value="radio" id="radio" class="with-gap" >
                                        
                                        
                                        <label for="checkbox" class="m-l-20">Multiple answers</label>     
                                        <input type="radio" name="question-type" value="checkbox" id="checkbox" class="with-gap" >
                                        
                                        
                                        <label for="text" class="m-l-20">Open-ended</label>
                                        <input type="radio" name="question-type" value="text" id="text" class="with-gap" >
                                       
                                        </div>
                                </div>
                                <div class="row clearfix">
                                <div class="col-sm-9">
                                  <div class="form-group">
                                        Difficulty:
                                       
                                        <label for="easy" class="m-l-20">Easy</label>
                                        <input type="radio" name="difficulty" value="1" id="easy" class="with-gap" >
                                            
                                        
                                        <label for="normal" class="m-l-20">Normal</label>
                                        <input type="radio" name="difficulty" value="2" id="normal" class="with-gap" >
                                        
                                        
                                        <label for="hard" class="m-l-20">Hard</label>
                                        <input type="radio" name="difficulty" value="3" id="hard" class="with-gap" >
                                        </div>
                                        
                                </div>
                                </div>
                              
                                <div class="row clearfix">
                                <div class="col-sm-9">
                                  <div class="form-group">
                                        Open-ended:
                                       
                                        <label for="Yes" class="m-l-20">Yes</label>
                                        <input type="radio" name="open_answer" value="1" id="Yes" class="with-gap" >
                                            
                                        
                                        <label for="No" class="m-l-20">No</label>
                                        <input type="radio" name="open_answer" value="0" id="No" class="with-gap" >
                                        
                                        </div>
                                        
                                </div>
                                </div>
                             
                            <button type="submit" name="save_data" class="btn btn-primary m-t-15 waves-effect" onclick="checkform()">Submit</button>
                            <input type="reset" class="btn btn-danger m-t-15 waves-effect" name="reset" value="Reset" />
                           
                             
                        </div>
                    </div>
                </div>
            </div>
            </form>
            <!-- #END# Advanced Form Example With Validation -->
    </div>
</section>

                             
<!-- footer part -->
<?php $this->load->view('admin/include/footer'); ?>


<script type="text/javascript">
     <?php
        if(isset($msg)) {
            echo 'swal("' . $msg . '", );';
        }?>
        $(document).ready(function () {
            var n = 1;

            $('#addAnswer').click(function () {
                n++;
                $('#dynamic_field').append('' +
                    '<div id="row' + n + '" class="row clearfix">' +
                    '<div class ="col-sm-6">' +
                    ' <div class="form-group form-float">' +
                    '<div class="form-line">'+
                    '<td>'+
                    '<button type="button" name="remove" id="' + n + '" class="btn btn-danger btn_remove">X</button>' +
                    '</td>' +
                    '<textarea rows="" class="form-control no-resize" maxlength="250" name="option['+ n +']" id ="option['+ n +']"></textarea>'+
                    '<label for= "option['+ n +']" class="form-label"></label>'+
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '<input type="hidden" name="correct['+ n +']" value="0" />'+
                    '<input type="checkbox" name="correct['+ n +']" value="1" placeholder="correct" id ="correct['+ n +']" class="with-gap" />' +
                    '<label for= "correct['+ n +']" >Correct</label>  ' +
                    '</div>' +
                    '</tr>');
            });
           
            
            $(document).on('click', '.btn_remove', function () {
                var button_id = $(this).attr("id");
                $('#row' + button_id + '').remove();
            });

        });
</script>