<?php $this->load->view('backend/header'); ?>    
 <div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block mobilehide" href="../index.html"><img src="../assets/img/icons/mainexpense.png" alt="material.png" id="material"/>EXPENSE MANAGEMENT</a>
        <a  class="menu1 menuhide"  href="<?php echo base_url(); ?>Travel/expense_view"><i class="fas fa-home fa-lg iconcss"></i>Home</a>
		<a href="<?php echo base_url(); ?>Travel/expense_form" class="menu2 menuhide"><i class="fa fa-plus iconcss" aria-hidden="true"></i>Add</a>
		<a class="menu3 menuhide"  href="<?php echo base_url(); ?>Travel/expense_report"><i class="fa fa-file iconcss" aria-hidden="true"></i>Report</a>		       	                     
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
              <a href="../examples/profile.html" class="dropdown-item">
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
              <a href="#!" class="dropdown-item">
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
              <h3 class="mb-0"><img src="../assets/img/icons/gatepass.png" alt="gatepass.png" style="width: 50px;"/>EXPENSE  FORM</h3>
			 
            </div>
			<div class="card-body">
			<form  method="post" action="expense_insert" enctype='multipart/form-data'>
                  <div class="form-group">
					<label class="control-label">Employee_name<span style="color:red !important">*</span></label>
					 <select class="form-control"  tabindex="1" name="emid" required>
					    <?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?>
						 <option value="<?php echo $employe->id ?>"><?php echo $employe->first_name; ?></option>
						<?php 
						}
						else
						{ 
					        foreach($employe as $value)
							{
								?>
								    <option value="<?php echo $value->id ?>"><?php echo $value->first_name; ?></option> 
								<?php
							}								
						}
						?>
					 </select>
				</div>
				<div class="form-group">
					<label class="control-label">Category<span style="color:red !important">*</span></label>
					<select name="category"  class="form-control">
						<option value="transport">Transportation</option>
						<option value="bank">Bank fees</option>
						<option value="dinning">Dinning Out</option>
						<option value="insurance">Insurance</option>
						<option value="medical">Medical</option>
						<option value="hotel">Hotel</option>
						<option value="rent">rent</option>
					</select>
				</div>
				<div class="form-group">
					<label class="control-label">Purpose<span style="color:red !important">*</span></label>
					<input type="text" name="purpose" class="form-control " id="recipient-name1"  value="">
				</div>
				  <div class="form-group">
					<label class="control-label">Currency<span style="color:red !important">*</span></label>
					<input type="text" name="currency" class="form-control " id="recipient-name1"  value="">
				</div>   
				<div class="form-group">
					<label class="control-label">Amount<span style="color:red !important">*</span></label>
					<input type="text" name="amount" class="form-control " id="recipient-name1" value="">
				</div>
				<div class="form-group">
					<label class="control-label">Attachment<span style="color:red !important">*</span></label>
					<input type="file" name="bill" class="form-control " value="" multiple="" >
					<span style="color: blue;font-size: 14px;font-weight: 900;font-color: blue;">Note : Mutiple files can be uploaded on mutiple selection</span>
				</div> 											
					
		</div>
		<div class="modal-footer">
		<input type="hidden" name="id" value="" class="form-control" id="recipient-name1">                                       
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			<button type="submit" class="btn btn-primary">Submit</button>
		</div>
		</form>
            </div>
          </div>
		
        </div>
      </div>
<?php $this->load->view('backend/footer'); ?> 