 <div class="top_nav">

                <div class="nav_menu">
                    <nav class="" role="navigation">
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"><?php //echo $title ?></i></a>
                        </div>

                        <ul class="nav navbar-nav navbar-right">
                            <li class="">
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <img src="<?php  echo base_url().'assets/UI/images/employees/'.$this->session->userdata('avatar') ?>" alt=""><?php echo $this->session->userdata('first_name') ?>
                                    <span class=" fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                                    <li>
                                        <?php echo anchor('Admin_controller/profile_management/edit/'.$this->session->userdata('id'),'Profile','') ?>
                                    </li>
<!--                                    <li>
                                        <a href="javascript:;">
                                            <span class="badge bg-red pull-right">50%</span>
                                            <span>Settings</span>
                                        </a>
                                    </li>-->
                                    <li>
                                        <a href="javascript:;">Help</a>
                                    </li>
                                    <li>
<!--                                        <a href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a>-->
                                        <?php  echo anchor('login_controller/logout_user','<i class="fa fa-sign-out pull-right"></i> Log Out','') ?>
  
                                    </li>
                                </ul>
                            </li>