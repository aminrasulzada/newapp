<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('admin/include/header');
$this->load->view('admin/include/left-bar');
?>
<!-- header part -->

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>
                Edit Quiz Question 
            </h2>
        </div>
        <?php
        
        if($question>0)
        {
            foreach($question as $ques)
            {
       
        
        ?>
            <!-- Advanced Form Example With Validation -->
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
                                            <textarea rows="2" class="form-control no-resize" maxlength="250" name="question"><?php echo $ques->question; ?></textarea>
                                            <label class="form-label">Question</label>
                                        </div>
                                    </div>
                                </div>
                               
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                   <div class="form-group form-float">
                                        <div class="form-line">
                                            <textarea rows="2" class="form-control no-resize" maxlength="250" name="option_1"><?php echo $ques->option1; ?></textarea>
                                            <label class="form-label">Option 1</label>
                                        </div>
                                    </div>
                                </div>
                               <div class="col-sm-6">
                                   <div class="form-group form-float">
                                        <div class="form-line">
                                            <textarea rows="2" class="form-control no-resize" maxlength="250" name="option_2"><?php echo $ques->option2; ?></textarea>
                                            <label class="form-label">Option 2</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                             <div class="row clearfix">
                                <div class="col-sm-6">
                                   <div class="form-group form-float">
                                        <div class="form-line">
                                            <textarea rows="2" class="form-control no-resize" maxlength="250" name="option_3"><?php echo $ques->option3; ?></textarea>
                                            <label class="form-label">Option 3</label>
                                        </div>
                                    </div>
                                </div>
                               <div class="col-sm-6">
                                   <div class="form-group form-float">
                                        <div class="form-line">
                                            <textarea rows="2" class="form-control no-resize" maxlength="250" name="option_4"><?php echo $ques->option4; ?></textarea>
                                            <label class="form-label">Option 4</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                             <div class="row clearfix">
                                <div class="col-sm-6">
                                  <div class="form-group">
                                        Correct Answer :
                                        <input type="radio" name="answer" value="option_1" id="option_1" class="with-gap" <?php if($ques->answer == "option_1"){ echo "checked"; } ?>>
                                        <label for="option_1">Option 1</label>
    
                                        <input type="radio" name="answer" value="option_2" id="option_2" class="with-gap" <?php if($ques->answer == "option_2"){ echo "checked"; } ?>>
                                        <label for="option_2" class="m-l-20">Option 2</label>
                                        
                                        <input type="radio" name="answer" value="option_3" id="option_3" class="with-gap" <?php if($ques->answer == "option_3"){ echo "checked"; } ?>>
                                        <label for="option_3" class="m-l-20">Option 3</label>
                                        
                                        <input type="radio" name="answer" value="option_4" id="option_4" class="with-gap" <?php if($ques->answer == "option_4"){ echo "checked"; } ?>>
                                        <label for="option_4" class="m-l-20">Option 4</label>
                                    </div>
                                </div>
                             </div>
                             <div class="row clearfix">
                                <div class="col-sm-6">
                                  <div class="form-group">
                                        Question Type:
                                        <input type="radio" name="type" value="radio" id="radio" class="with-gap" <?php if($ques->type == "radio"){ echo "checked"; } ?>>
                                        <label for="radio">Multiple Choice</label>
    
                                        <input type="radio" name="type" value="checkbox" id="checkbox" class="with-gap" <?php if($ques->type == "checkbox"){ echo "checked"; } ?>>
                                        <label for="checkbox" class="m-l-20">Multiple Answer</label>
                            
                                        <input type="radio" name="type" value="text" id="text" class="with-gap" <?php if($ques->type == "text"){ echo "checked"; } ?>>
                                        <label for="text" class="m-l-20">Open-ended</label>
                                        
                                        
                                    </div>
                                </div>
                             </div>
                              
                             
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">Submit</button>
                            <input type="reset" class="btn btn-danger m-t-15 waves-effect" name="reset" value="Reset" />
                        </div>
                    </div>
                </div>
            </div>
            </form>
            <?php } } ?>
            <!-- #END# Advanced Form Example With Validation -->
    </div>
</section>

<!-- footer part -->
<?php $this->load->view('admin/include/footer'); ?>


<script type="text/javascript">
     <?php
        if(isset($error_msg)) {
            echo 'swal("' . $error_msg . '");';
        }
    ?>
</script>