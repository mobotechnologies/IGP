<?php $this->load->view('backend/header'); ?>    
 <div class="main-content">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/inputs.css" />
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
          <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="../index.html"><img src="../assets/img/icons/mainconfig.png" alt="material.png" id="material"/>Configuration</a>
     
        <form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto" >
          
        </form>
        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
		        <ul class="navbar-nav align-items-center d-none d-md-flex">
		<li class="nav-item dropdown">
          <a class=" nav-link-icon" href="#" id="notification-icon" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"  onclick="myFunction()">
            <span id="notification-count">
			<?php 
			  $count=$this->Security_model->countcomment();
			  echo $count;
			?></span><img src="<?php echo base_url(); ?>assets/images/notify.png" style="width: 43px;"/>
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right" style="padding-top:0px;padding-bottom: 0px;" aria-labelledby="navbar-default_dropdown_1">
            <div id="notification-latest"></div>
          </div>
        </li>
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="media align-items-center">
                <span class="avatar avatar-sm rounded-circle">
                    <?php
                        $id = $this->session->userdata('user_login_id');
                       $basicinfo = $this->employee_model->GetBasic($id); 				   
				    ?>
                    <img src="<?php echo base_url(); ?>assets/images/users/<?php echo $basicinfo->em_image; ?>" class="img-circle" width="150" />
                </span>
                <div class="media-body ml-2 d-none d-lg-block">
                  <span class="mb-0 text-sm  font-weight-bold"> <?php 
				       echo $basicinfo->first_name .' '.$basicinfo->last_name; 
					 ?></span>
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
    <div class="container-fluid mt--7 visittabs" id="bgcontain">
      <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header border-0 gatepassheader" >
              <h3 class="mb-0"><img src="../assets/img/icons/config.png" alt="gatepass.png" style="width: 50px;"/>Settings</h3>
			</div>
			<div class="card-body">
             
				    <h4>Logistic Approval Configuration</h4>
					<hr>
					<table class="table table-bordered">
					    <?php
                            foreach($config as $vales)
							{	
						?>
					    <tr>
						   <td>
						        <select class=" form-control level1"  tabindex="1" name="level1" disabled>
							      <?php
							         foreach($employee as $value)
							        {
						                   ?>
								 
									     <option value="<?php echo $value->em_id ?>" <?php if($value->em_id==$vales->level1){ echo "selected"; }?>><?php echo $value->em_id."-".$value->first_name ?></option>
								 
						                 <?php
							        }
							     ?>
							    </select>
						   </td>
						   <td class="levellabel">Level1</td>
						   <td>
						      <button class="btn btn-primary editbtn l1edit"><i class="fa fa-edit"></i></button>
							  <button class="btn btn-primary editbtn lsave"><i class="fas fa-save"></i></button>
						</td>
						</tr>
						 <tr>
						   <td>
						        <select class=" form-control level2"  tabindex="1" name="level2" disabled>
							      <?php
							         foreach($employee as $value)
							        {
						                   ?>
								 
									     <option value="<?php echo $value->em_id ?>" <?php if($value->em_id==$vales->level2){ echo "selected"; }?>><?php echo $value->em_id."-".$value->first_name ?></option>
								 
						                 <?php
							        }
							     ?>
							    </select>
						   </td>
						   <td class="levellabel">Level2</td>
						   <td>
						      <button class="btn btn-primary editbtn l2edit"><i class="fa fa-edit"></i></button>
							  <button class="btn btn-primary editbtn l2save"><i class="fas fa-save"></i></button>
						   </td>
						</tr>
						 <tr>
						   <td>
						       <select class=" form-control level3"  tabindex="1" name="level3" disabled>
							      <?php
							         foreach($employee as $value)
							        {
						                   ?>
								 
									     <option value="<?php echo $value->em_id ?>" <?php if($value->em_id==$vales->level3){ echo "selected"; }?>><?php echo $value->em_id."-".$value->first_name ?></option>
								 
						                 <?php
							        }
							     ?>
							    </select>
						   </td>
						   <td class="levellabel">Level3</td>
						   <td>
						      <button class="btn btn-primary editbtn l3edit"><i class="fa fa-edit"></i></button>
							  <button class="btn btn-primary editbtn l3save"><i class="fas fa-save"></i></button>
							</td>
						</tr>
						<?php
							}
						?>
					</table>
				    <hr>
					
				    <h4>Travel Approval Configuration</h4>
					
					<hr>
					<table class="table table-bordered">
					    <?php
                            foreach($config as $vales)
							{	
						?>
					    <tr>
						   <td>
						        <select class=" form-control level1"  tabindex="1" name="level1" disabled>
							      <?php
							         foreach($employee as $value)
							        {
						                   ?>
								 
									     <option value="<?php echo $value->em_id ?>" <?php if($value->em_id==$vales->level1){ echo "selected"; }?>><?php echo $value->em_id."-".$value->first_name ?></option>
								 
						                 <?php
							        }
							     ?>
							    </select>
						   </td>
						   <td class="levellabel">GM</td>
						   <td>
						      <button class="btn btn-primary editbtn l1edit"><i class="fa fa-edit"></i></button>
							  <button class="btn btn-primary editbtn lsave"><i class="fas fa-save"></i></button>
						</td>
						</tr>
						 <tr>
						   <td>
						        <select class=" form-control level2"  tabindex="1" name="level2" disabled>
							      <?php
							         foreach($employee as $value)
							        {
						                   ?>
								 
									     <option value="<?php echo $value->em_id ?>" <?php if($value->em_id==$vales->level2){ echo "selected"; }?>><?php echo $value->em_id."-".$value->first_name ?></option>
								 
						                 <?php
							        }
							     ?>
							    </select>
						   </td>
						   <td class="levellabel">HR</td>
						   <td>
						      <button class="btn btn-primary editbtn l2edit"><i class="fa fa-edit"></i></button>
							  <button class="btn btn-primary editbtn l2save"><i class="fas fa-save"></i></button>
						   </td>
						</tr>
						 <tr>
						   <td>
						       <select class=" form-control level3"  tabindex="1" name="level3" disabled>
							      <?php
							         foreach($employee as $value)
							        {
						                   ?>
								 
									     <option value="<?php echo $value->em_id ?>" <?php if($value->em_id==$vales->level3){ echo "selected"; }?>><?php echo $value->em_id."-".$value->first_name ?></option>
								 
						                 <?php
							        }
							     ?>
							    </select>
						   </td>
						   <td class="levellabel">Optional</td>
						   <td>
						      <button class="btn btn-primary editbtn l3edit"><i class="fa fa-edit"></i></button>
							  <button class="btn btn-primary editbtn l3save"><i class="fas fa-save"></i></button>
							</td>
						</tr>
						<?php
							}
						?>
					</table>
				

				
            </div>
          </div>
        </div>
      </div>

<?php $this->load->view('backend/footer'); ?> 