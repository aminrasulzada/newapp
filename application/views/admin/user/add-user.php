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
                Add User
            </h2>
        </div>
            <!-- Advanced Form Example With Validation -->
            <form action="" method="post" name="add-emp" id="eddEmp" enctype="multipart/form-data">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
                            <h2 class="card-inside-title">User Information</h2>
                             <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="emp_code" required />
                                            <label class="form-label">User Name</label>
                                            <?php echo form_error('emp_code', '<label id="feedback-error" class="error" for="emp_code">', '</label>'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="password" class="form-control" name="pwd" required />
                                            <label class="form-label">Password </label>
                                            <?php echo form_error('pwd', '<label id="feedback-error" class="error" for="pwd">', '</label>'); ?>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                             

                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="f_name" required  pattern=".*[^ ].*[a-zA-Z ]+" />
                                            <label class="form-label">First Name </label>
                                            <?php echo form_error('f_name', '<label id="feedback-error" class="error" for="f_name">', '</label>'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="l_name" required />
                                            <label class="form-label">Last Name </label>
                                        </div>
                                    </div>
                                </div>
                                 
                            </div>
                            
                            <div class="row clearfix">
                              <!--  <div class="col-sm-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="datepicker form-control" name="dob" placeholder="Date Of Birth" required>
                                            <?php echo form_error('dob', '<label id="feedback-error" class="error" for="dob">', '</label>'); ?>
                                        </div>
                                    </div>
                                </div> -->
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        Gender :
                                        <input type="radio" name="gender" value="male" id="male" class="with-gap" required >
                                        <label for="male">Male</label>
    
                                        <input type="radio" name="gender" value="female" id="female" class="with-gap" >
                                        <label for="female" class="m-l-20" >Female</label>
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
        if(isset($error_msg)) {
            echo 'swal("' . $error_msg . '");';
        }
    ?>
</script>