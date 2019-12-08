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
          
        </form>
        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
		<li class="nav-item dropdown">
          <a class=" nav-link-icon mobilehide" href="#" id="notification-icon" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"  onclick="myFunction()">
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
            <a class="hfont pr-0 mobilehide" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
					 
				       echo $basicinfo->first_name .' '.$basicinfo->last_name; 
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
          <div class="card shadow cabfor">
            <div class="card-header border-0 gatepassheader" >
              <h3 class="mb-0"><img src="../assets/img/icons/gatepass.png" alt="gatepass.png" style="width: 50px;"/>CAB REQUEST FORM</h3>
			 
            </div>
			<div class="card-body">
            <form method="post" action="<?php echo base_url(); ?>Travel/cab_insert">
				  <div class="row">
					<div class="form-group col">
					     <label class="form-control-label" for="input-email">Emname<span style="color:red !important">*</span></label>
					     <?php
						   if($this->session->userdata('user_type')=='EMPLOYEE'){
						 ?>
						 <select class=" form-control form-control-alternative  selectsearch"  tabindex="1" name="emid" required>
							 <option value="<?php echo $employee->id ?>"><?php echo $employee->first_name ?></option>
						 </select>
						 <?php
						   }
						   else
						   {
							  ?>
							   <select class=" form-control custom-select"  tabindex="1" name="emid" required>
							  <?php
							foreach($employee as $value)
							{
						 ?>
								 
									 <option value="<?php echo $value->id ?>"><?php echo $value->first_name ?></option>
								 
						 <?php
							}
							?>
							</select>
							<?php
						   }
						   ?>
					</div>
					<div class="form-group col">
					   <label class="form-control-label" for="input-email">Purpose<span style="color:red !important">*</span></label>
						<input type="text" name="purpose" class="form-control form-control-alternative  charrestrict" maxlength="10" id="recipient-name1"  Placeholder="Purpose">
					</div>
				</div>
				<div class="row">
				    <div class="form-group col">
					    <label class="form-control-label" for="input-email">Travel From<span style="color:red !important">*</span></label>
						<div class="input-group input-group-alternative">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
							</div>
							<input class="form-control datepicker" name="from" placeholder="Select date" type="text" >
						</div>
					</div>
					 <div class="form-group col">
					    <label class="form-control-label" for="input-email">Travel To<span style="color:red !important">*</span></label>
						<div class="input-group input-group-alternative">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
							</div>
							<input class="form-control datepicker" name="to" placeholder="Select date" type="text" >
						</div>
					</div>
				</div>
				<div class="row">
					 <div class="form-group col">
					    <label class="form-control-label" for="input-email">Travel Date<span style="color:red !important">*</span></label>
						<div class="input-group input-group-alternative">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
							</div>
							<input class="form-control datepicker" name="travel_date" placeholder="Select date" type="text" >
						</div>
					</div>									
					 <div class="form-group col">
					    <label class="form-control-label" for="input-email">Return Date</label>
						<div class="input-group input-group-alternative">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
							</div>
							<input class="form-control datepicker" name="return_date" placeholder="Select date" type="text" >
						</div>
					</div> 
				</div>
				<div class="row">
					<div class="form-group col">
						<label class="form-control-label" for="input-email">Travel_type</label>
					    <select class="form-control" name="travel_type">
						    <option>Local</option>
							<option>Domestic</option>
						</select>
					</div>											
					<div class="form-group col">
					    <label class="form-control-label" for="input-email">Expected Expense<span style="color:red !important">*</span></label>
						<input type="text" name="Expected" class="form-control form-control-alternative"  id="recipient-name1"  value="Expected expense">
					</div>    
				</div>
						<div class="row">
					    <div class="form-group col">
						    <label class="form-control-label">State<span style="color:red !important">*</span></label>
							<select onChange="getdistrict(this.value);"  name="state" id="state" class="form-control" >
							<option value="">Select</option>
							<?php
							foreach($state as $value)
							{ ?>
							<option value="<?php echo $value->StCode;?>"><?php echo $value->StateName;?></option>
							<?php
							}
							?>
							</select>
						</div>
						<div class="form-group col">
						<label class="form-control-label">District<span style="color:red !important">*</span></label>
						    <select name="district" id="district-list" class="form-control">
							   <option value="">Select</option>
							</select>
						</div>
						
					</div>
					<div class="row">
						<div class="form-group col">
							<label class="form-control-label">Location<span style="color:red !important">*</span></label>
							<input type="text" name="location" class="form-control" placeholder="location" />
						</div>
						<div class="form-group col">
							<label class="form-control-label">Drop Type</label>
							<select name="droptype" class="form-control">
							    <option value="oneside">One Side</option>
								<option value="twoside">Two Side</option>
							</select>
						</div>
					</div>
				<div class="form-group">
						<input type="hidden" name="id" value="" class="form-control" id="recipient-name1">                                       
						<button type="submit" class="btn btn-primary">Submit</button>
						<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
			    </div>	
				  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
				  <script src="<?php echo base_url(); ?>assets/jquery/jquery-ui-1.12.1/jquery-ui-1.12.1/external/jquery/jquery.js"></script>
				  <script src="<?php echo base_url(); ?>assets/jquery/jquery-ui-1.12.1/jquery-ui-1.12.1/jquery-ui.js"></script>
					  <script>
				  $( function() {
					$( ".datepicker" ).datepicker();
				  } );
				  </script>
			</form>
            </div>
          </div>
        </div>
      </div>
<?php $this->load->view('backend/footer'); ?> 