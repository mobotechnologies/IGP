     <?php $this->load->view('backend/header'); ?>     
	 	 <div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block mobilehide" href="../index.html"><img src="../assets/img/icons/maincab.png" alt="material.png" style="width: 30px;"/>CAB</a>
	    <a  class="menu1 menuhide"  href="<?php echo base_url(); ?>Travel/Cab_view"><i class="fas fa-home fa-lg iconcss"></i>Home</a>
	    <a href="<?php echo base_url(); ?>Travel/Cab_form" class="menu2 menuhide"><i class="fa fa-plus iconcss" aria-hidden="true"></i>Add Cab</a>
		<a href="<?php echo base_url(); ?>Travel/expense_form" class="menu2 menuhide"><i class="fa fa-plus iconcss" aria-hidden="true"></i>Add Reimburse</a>
		<a class="menu3 menuhide"  href="<?php echo base_url(); ?>Travel/cab_report"><i class="fa fa-file iconcss" aria-hidden="true"></i>Report</a>		       
        <!-- Form -->
        <form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto" >
          <div class="form-group mb-0">
          
          </div>
        </form>
        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
		  <li class="nav-item dropdown">
          <a class=" nav-link-icon" href="#" id="notification-icon" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"  onclick="myFunction()">
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
            <a class="hfont pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="media align-items-center">
                <span class="avatar avatar-sm rounded-circle">
                     <?php
                        $id = $this->session->userdata('user_login_id');
                       $basicinfo = $this->employee_model->GetBasic($id); 				   
				   ?>
                    <img src="<?php echo base_url(); ?>assets/images/users/<?php echo $basicinfo->em_image; ?>" class="img-circle" width="150" />
                </span>
                <div class="media-body ml-2 d-none d-lg-block">
                  <span class="mb-0 text-sm  font-weight-bold"><?php 
					  
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
                <span>
				    <?php 
					   $id = $this->session->userdata('user_login_id');
                       $basicinfo = $this->employee_model->GetBasic($id); 
				       echo $basicinfo->first_name .' '.$basicinfo->last_name; 
					?>
				</span>
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
              <h5 class="mb-0 matheadings"> <img src="<?php echo base_url(); ?>/assets/img/icons/cab.png" alt="material.png" id="material" /> Cab</h5>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush" id="cab">
                <thead class="thead-light"  role="rowgroup">
                  <tr role="row">
                   <th  role="columnheader">EmpCode</th>
				   <th  role="columnheader">EmpName</th>
				   <th  role="columnheader">Purpose</th>
				   <th  role="columnheader">Location</th>
				   <th  role="columnheader">Travel_date</th>
				   <th  role="columnheader">Status</th>
				   <?php
					        if($this->session->userdata('user_type')=='EMPLOYEE')
							{
								 ?>
								 <th role="columnheader">Action</th>
								 <?php
							}
							else
							{
					    ?>
				   <th role="columnheader">Action</th>
				   <?php
							}
							?>
                  </tr>
                </thead>
                <tbody  role="rowgroup">
				<?php
					  foreach($cab as $value)
					  {
							
					?>
					<tr role="row">
                       <td class="cabtable" role="cell"><?php echo $value->em_code; ?></td>
					   <td class="cabtable" role="cell"><?php echo ucfirst($value->first_name)."".ucfirst($value->last_name); ?></td>
					   <td class="cabtable" role="cell"><?php echo ucfirst($value->purpose); ?></td>
					   <td class="cabtable" role="cell"><?php echo ucfirst($value->location); ?></td>
					   <td class="cabtable" role="cell"><?php echo $value->Travel_date; ?></td>
					   <td class="cabtable" role="cell">
					        <?php
                               	if($value->cab_status!="")
								{									
						          echo ucfirst($value->cab_status); 
								}
								else
								{
									echo "requested";
								}
							?>
					   </td>
					    <?php
					        if($this->session->userdata('user_type')=='EMPLOYEE')
							{
								?>
								<td class="cabtable" role="cell">
					                <a href="<?php echo base_url(); ?>travel/cabsingleview?I=<?php echo base64_encode($value->cabid); ?>" class="btn btn-primary buttonsizing" id="view"><img src="<?php echo base_url(); ?>assets/img/icons/eye.jpg" alt="eye.png" id="forbidden"/></a>
								</td>
								<?php
							}
							else
							{
					    ?>
					    <td class="cabtable" role="cell">
					        <a href="<?php echo base_url(); ?>travel/cabsingleview?I=<?php echo base64_encode($value->cabid); ?>" class="btn btn-primary buttonsizing" id="view"><img src="<?php echo base_url(); ?>assets/img/icons/eye.jpg" alt="eye.png" id="forbidden"/></a>
						    <a href="#" class="btn btn-danger buttonsizing delcab" id="view"><i class="fa fa-trash" aria-hidden="true" style="padding-left: 6px;"></i></a>
                        </td>
						<?php
							}
						?>
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