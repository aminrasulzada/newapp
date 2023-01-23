    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    
                  <a href="#"  ><img src="<?php echo base_url() ?>assets-frontend/img/admin.png" width="48" height="48" alt="User" /></a>
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       Welcome!  <strong> <?php echo $this->session->userdata('user_name'); ?> </strong>
                    </div>
                    <!-- <div class="email">john.doe@example.com</div> -->
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            
                            <li><a href="<?php echo base_url(); ?>index.php"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->

            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <!-- <li class="header">MAIN NAVIGATION</li> -->
                    <li>
                        <a href="<?php echo base_url() . 'admin/dashboard'; ?>">
                            <i class="material-icons">home</i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                   
                    
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">people</i>
                            <span>User Management</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="<?php echo base_url() . 'admin/add-user'; ?>">
                                    <span>Add New User</span>
                                </a>
                            </li>
							<li>
                                <a href="<?php echo base_url() . 'admin/manage-employee'; ?>">
                                    <span>Manage User</span>
                                </a>
                            </li>
                           
                        </ul>
                    </li>
                    
                    
                    
                     <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">assignment_turned_in</i>
                            <span>Quiz Management</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="<?php echo base_url() . 'admin/add-quiz'; ?>">
                                    <span>Add Quiz</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url() . 'admin/manage-quiz'; ?>">
                                    <span>Manage Quiz</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url() . 'admin/add-quiz-question'; ?>">
                                    <span>Add Quiz Question</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url() . 'admin/manage-quiz-question'; ?>">
                                    <span>Manage Quiz Question</span>
                                </a>
                            </li>
                             <li>
                                <a href="<?php echo base_url() . 'admin/quiz-result'; ?>">
                                    <span>Answer Details</span>
                                </a>
                            </li>
                                              
                        </ul>

                    </li> 
                    
                    
                </ul>
            </div>
           
        </aside>
       
    </section>