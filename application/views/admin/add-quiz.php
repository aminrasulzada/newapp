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
                Add Quiz
            </h2>
        </div>
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
                                           <input type="text" class="form-control" name="quiz" required>
                                            <label class="form-label">Enter Quiz Name </label>    
                                        </div>
                                    </div>
                                </div>
                                 <div class="col-sm-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <select class="form-control show-tick" name="duration" required>
                                                <option value="">Quiz Duration Time</option>
                                                <option value="29 min">30 Minutes</option>
                                               
                                               
                                           </select>   
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                           <input type="text" class="datepicker form-control" name="q_s_d" placeholder="Quiz Start Date" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                          <input type="text" class="datepicker form-control" name="q_e_d" placeholder="Quiz End Date" required>    
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                          
                              <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group form-float">
                                       
                                          <input id="checkbox" class="filled-in chk-col-teal" name="show_quiz" value="1"  type="checkbox">
                                          <label for="checkbox">Active</label> <br/>
                                        
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
            <!-- #END# Advanced Form Example With Validation -->
    </div>
</section>

<!-- footer part -->
<?php $this->load->view('admin/include/footer'); ?>


<script type="text/javascript">
     <?php
        if(isset($msg)) {
            echo 'swal("' . $msg . '");';
        }
    ?>
</script>