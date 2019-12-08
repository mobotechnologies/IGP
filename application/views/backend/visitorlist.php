<?php $this->load->view('backend/header'); ?>  
      <div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block mobilehide" href="../index.html"><img src="../assets/img/icons/material.png" alt="material.png" id="material"/>VISITOR REPORT</a>
        <!-- Form -->
        <form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto" >
      
        </form>
        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
	    <li class="nav-item dropdown">
          <a class=" nav-link-icon mobilehide" href="#" id="notification-icon" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"  onclick="myFunction()">
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
            <a class="nav-link pr-0 mobilehide" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
              <a href="../examples/profile.html" class="dropdown-item">
                <a href="<?php echo base_url(); ?>employee/view?I=<?php echo base64_encode($basicinfo->em_id); ?>" class="dropdown-item">
                <i class="ni ni-single-02"></i>
                <span>My profile</span>
              </a>
            		  <?php
		    if($this->session->userdata('user_type')=="SUPER ADMIN")
            {
              ?>
			 <a href="<?php echo base_url(); ?>employee/Add_employee" class="dropdown-item">
              <i class="fas fa-user-plus"></i>
                <span>Add Employee</span>
              </a>
              <a href="<?php echo base_url(); ?>security/email_config" class="dropdown-item">
                <i class="ni ni-settings-gear-65"></i>
                <span>Settings</span>
              </a>
<?php
}?>
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
      <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header border-0">
              <h3 class="mb-0">Visitor Report</h3>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush" id="materialinwardreport">
                <thead class="thead-light">
                     <tr>
	                   <th>Name</th>
					   <th>Phone</th>
					   <th>Email</th>
					   <th>Address</th>
					   <th>Organization</th>
					   <th>Company Name</th>
					   <th>Company Address</th>
					   <th>Purpose</th>
					   <th>Destination</th>
					   <th>Meeting With</th>
					   <th>Accompanied</th>
					   <th>Item carried</th>
					   <th>Item issued</th>
					   <th>Item deposited</th>
					   <th>GateIn</th>
					   <th>GateOut</th>
					   <th>Remark</th>
					</tr>
                </thead>
                <tbody>
                   	<?php
					  foreach($visitor as $value)
					  {
							
					?>
						<tr>
						    <td><?php echo $value->name;?></td>
							<td><?php echo $value->phone; ?></td>
						    <td><?php echo $value->email;?></td>
							<td><?php echo $value->address;?></td>
						    <td><?php echo $value->organization; ?></td>
						    <td><?php echo $value->companyphone; ?></td>
						    <td><?php echo $value->companyaddress; ?></td>
							<td><?php echo $value->purpose; ?></td>
						    <td><?php echo $value->department; ?></td>
							<td><?php echo $value->meeting_to; ?></td>
							<td><?php echo $value->accompanied_by; ?></td>
							<td><?php echo $value->item_carried; ?></td>
							<td><?php echo $value->item_issued; ?></td>
							<td><?php echo $value->item_deposited; ?></td>
							<td><?php echo $value->in; ?></td>
						    <td><?php echo $value->out; ?></td>
						    <td><?php echo $value->remark; ?></td>	  
						</tr>
					<?php
					  }
					?>
          
                </tbody>
              </table>
            </div>

          </div>
        </div>
      </div> 
<?php $this->load->view('backend/footer'); ?>   