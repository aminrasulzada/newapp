<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('admin/include/header');
$this->load->view('admin/include/left-bar');
?>
<!-- header part -->

<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2> Manage Users </h2>
            </div>
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Users List
                            </h2>
                           
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>User Name</th>
                                            <th>Name</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>User Name</th>
                                            <th>Name</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                            if(count($emp_list) > 0) {
                                                foreach ($emp_list as $emp_obj) {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $emp_obj->user_name; ?></td>
                                                        <td><?php echo ucfirst($emp_obj->name); ?></td>
                                                        
                                                        <td><?php if($emp_obj->is_active == 1){ ?><span class="label label-info">Active</span> <?php } else { ?><span class="label label-warning">Inactive</span> <?php } ?> </td>
                                                        <td>
                                                <a href="<?php echo base_url(); ?>admin/edit-employee/<?php echo $emp_obj->user_id; ?>"> 
                                                    <span class="badge bg-teal">Edit</span>
                                                </a>
                                                <a href="javascript:void(0);" rel="<?php echo $emp_obj->user_id; ?>" onClick="delConfirm(this);"> 
                                                    <span class="badge bg-pink">Delete</span>
                                                </a>
                                                        </td>
                                                    </tr>
                                                <?php
                                                }
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
        </div>
</section>

<!-- footer part -->
<?php $this->load->view('admin/include/footer'); ?>
<script>
    
    function delConfirm(curObj) {
        swal({
                title: "Are you sure to delete ?",
                text: "You will not be able to recover this user!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: false
            }, function () {
                var delID = $(curObj).attr('rel');
                var request = $.ajax({
                                      url: hostUrl + "admin/del-employee",
                                      type: "POST",
                                      data: {req_dept_id : delID}
                              });

                request.done(function(msg) {
                     
                      swal({
                             title: "Deleted!",
                             text: "User has been deleted.",
                             type: "success",
                             showCancelButton: false,
                             confirmButtonText: "OK",
                             closeOnConfirm: false
                          }, function () {
                                window.location = hostUrl + "admin/manage-employee";
                      });
                });      

                request.fail(function(jqXHR, textStatus) {
                    alert( "Delete request failed." );
                });    
       });
    }
</script>