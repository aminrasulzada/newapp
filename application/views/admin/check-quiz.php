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
                Check Quiz Question 
            </h2>
        </div>
        <?php
        
        if($check>0)
        {
            foreach($check as $ques)
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
                                            <p><?php echo $ques->question; ?></p>
                                      
                                        </div>
                                    </div>
                                </div>
                               
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                   <div class="form-group form-float">
                                        <div class="form-line">
                                        
                                            <p><?php echo $ques->answer; ?></p>
                                            
                                        </div>
                                    </div>
                                </div>
                              
                            
                             <div class="row clearfix">
                                <div class="col-sm-6">
                                  <div class="form-group">
                                      Point : <br>
                                        <input type="text" name="grade" value="" id="" class="with-gap" >
                                        <label class="form-label"> Out of <?php echo $ques->difficulty;  ?></label>
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