<?php $this->load->view('backend/header'); ?>     
 <div class="main-content">
    
    <style>
	.csstransforms .cn-wrapper li a {
		 background:radial-gradient(transparent 35%, #42535f 35%) !important;
	}

	</style>
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
               <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block mobilehide" href="../index.html"><img src="../assets/img/icons/employee.png" alt="material.png" style="width: 30px;margin-right: 9px;"/>Employee</a>
               <a  class="menu1 menuhide"  href="<?php echo base_url(); ?>employee/Employees"><i class="fas fa-home fa-lg iconcss"></i>Home</a>
	           <a href="<?php echo base_url(); ?>employee/Add_employee" class="menu2 menuhide"><i class="fa fa-plus iconcss" aria-hidden="true"></i>Add</a>
			   <a href="<?php echo base_url(); ?>employee/Inactive_Employee" class="menu3 menuhide"><i class="fa fa-ban iconcss" aria-hidden="true"></i>Inactive</a>
	 <!-- Form -->
        <form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto" >
          
        </form>
        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
		<li class="nav-item dropdown">
          <a class=" nav-link-icon mobilehide mobilehide2" href="#" id="notification-icon" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"  onclick="myFunction()">
            <span id="notification-count">
			<?php 
			  $count=$this->security_model->countcomment();
			  echo $count;
			?></span><img src="<?php echo base_url(); ?>assets/images/notify.png" style="width: 43px;"/>
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right" style="padding-top:0px;padding-bottom: 0px;" aria-labelledby="navbar-default_dropdown_1">
            <div id="notification-latest"></div>
          </div>
        </li>
          <li class="nav-item dropdown">
            <a class="hfont pr-0 mobilehide mobilehide2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="media align-items-center">
                <span class="avatar avatar-sm rounded-circle">
                    <?php
                        $id = $this->session->userdata('user_login_id');
                       $basicinfo = $this->employee_model->GetBasic($id); 				   
				    ?>
                    <img src="<?php echo base_url(); ?>assets/images/users/<?php echo $basicinfo->em_image; ?>" class="img-circle" width="150" />
                </span>
                <div class="media-body ml-2 d-none d-lg-block">
                   <span class="mb-0 text-sm  font-weight-bold">  
				    <?php 
				       echo $basicinfo->first_name; 
					?>
				  </span>
                </div>
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
              <div class=" dropdown-header noti-title">
                <h6 class="text-overflow m-0">Welcome!</h6>
              </div>
              <a href="<?php echo base_url(); ?>employee/view?I=<?php echo base64_encode($basicinfo->em_id); ?>" class="dropdown-item">
                <i class="ni ni-single-02"></i>
                <span>My profile</span>
              </a>
		  <a href="<?php echo base_url(); ?>employee/Add_employee" class="dropdown-item">
              <i class="fas fa-user-plus"></i>
                <span>Add Employee</span>
              </a>
              <a href="<?php echo base_url(); ?>security/email_config" class="dropdown-item">
                <i class="ni ni-settings-gear-65"></i>
                <span>Settings</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="<?php echo base_url(); ?>login/logout" class="dropdown-item">
                <i class="ni ni-user-run"></i>
                <span>Logout</span>
              </a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
    <!-- End Navbar -->
    <!-- Header -->
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">  

		
    </div>
    <div class="container-fluid mt--7" id="bgcontain">
      <div class="row">
                    <div class="col-12">
                        <div class="card card-outline-info">
                            <div class="card-header">
                               <h5 class="mb-0 matheadings"><img src="<?php echo base_url(); ?>assets/img/icons/mainemployee.png" alt="home.png" style="width: 28px;margin-right: 6px;"/>Employee List</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive ">
                                    <table class="table align-items-center table-flush" id="materialinward">
                                        <thead class="thead-light">
                                            <tr role="row">
                                                <th role="columnheader">ID </th>
                                                <th role="columnheader">Employee Name</th>
                                                <th role="columnheader">Email </th>
                                                <th role="columnheader">Contact </th>
                                                <th role="columnheader">Roll</th>
                                                <th role="columnheader">Action</th>
                                            </tr>
                                        </thead>
                                     
                                        <tbody role="rowgroup" class="materialo">
                                           <?php foreach($invalidem as $value): ?>
                                            <tr  role="row">
                                                <td><?php echo $value->em_code; ?></td>
                                                <td><?php echo $value->first_name .' '.$value->last_name; ?></td>
                                                <td><?php echo $value->em_email; ?></td>
                                                <td><?php echo $value->em_phone; ?></td>
                                                <td><?php echo $value->em_role; ?></td>
                                                <td class="jsgrid-align-center ">
                                                    <a href="<?php echo base_url(); ?>employee/view2?I=<?php echo base64_encode($value->em_id); ?>" title="Edit" class="btn btn-primary buttonsizing"><img src="<?php echo base_url(); ?>assets/img/icons/eye.jpg" alt="eye.png" id="forbidden"/></a>
                                                     <a href="#" class="btn btn-danger buttonsizing" id="view" data-toggle="modal" data-target="#stockin<?PHP echo $value->id; ?>"><i class="fa fa-trash" aria-hidden="true" style="padding-left: 6px;"></i></a>
											   </td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

<?php $this->load->view('backend/footer'); ?>   
