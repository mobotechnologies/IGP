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
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block mobilehide" href="../index.html"><img src="../assets/img/icons/mainmaterial.png" alt="material.png" id="material"/>MATERIAL INWARD </a>
        <a  class="menu1 menuhide"  href="<?php echo base_url(); ?>Security/stockin_view"><i class="fas fa-home fa-lg iconcss"></i>Home</a>
		<a href="<?php echo base_url(); ?>Security/stockin_form" class="menu2 menuhide"><i class="fa fa-plus iconcss" aria-hidden="true"></i>Gatepass</a>
		<a class="menu3 menuhide"  href="<?php echo base_url(); ?>Security/stockin_report"><i class="fa fa-file iconcss" aria-hidden="true"></i>Report</a>		       
		<a class="menu3 menuhide"  href="<?php echo base_url(); ?>Security/anonymous"><i class="fa fa-question-circle iconcss" aria-hidden="true"></i>Anonymous</a>	
		<!-- Form -->
		
        <form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto" >
          
        </form>
        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
	    <li class="nav-item dropdown">
            <a class=" nav-link-icon mobilehide mobilehide2" href="#" id="notification-icon" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"  onclick="myFunction()">
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
        <?php 
				       if($this->session->flashdata('feedback'))
					   {
					      ?>
				         <div class="alert alert-success" role="alert">
                            <?php  echo $this->session->flashdata('feedback'); ?>
                         </div>
					     <?php
						}
					?>
    </div>
    <div class="container-fluid mt--7" id="bgcontain">
      <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card shadow blacky">
            <div class="card-header border-0">
              <h3 class="mb-0"><img src="<?php echo base_url(); ?>assets/images/materialins.png" alt="home.png"  class="insresponse" style="width: 28px;margin-left:25%"/>Material Inward Report</h3>
            </div>
			<div class="card-body">
			   <div class="container">
					<form method="post" name = "stock" action="filter_in">
					
						<div class="row col-md-12">
							 
						<div class="form-group col-md-6">
							<label class="form-control-label">Choose Date Range</label>
												
						</div>
						<div class="form-group col-md-6">
							 <select class="form-control incategory" name="datetype">
							    <option name="date" value="date">Entry Date</option>
								<option name="invoicedate" value="invoice_date">Invoice Date</option>
							</select>					
						</div>
						 </div>

						<div class="daterange" >
							<div class="form-group">
								<label class="form-control-label" >From</label>
								<input type="date" required="required" class="form-control form-control-line" name="From" placeholder="From"  />
							</div>
							<div class="form-group">
								<label class="form-control-label" >To</label>
								<input type="date"  required="required" class="form-control form-control-line" name="To" placeholder="To"  />
							</div>
						</div>
						<div class="form-group">
						      <input type="button" name="Cancel" value="Cancel" class="btn btn-danger"/>
							 <input type="submit" name="Generate" value="Generate" class="btn btn-primary"/>
						</div>
					</form>
				</div>
			</div>
          </div>
        </div>
		
      </div>
	
<?php $this->load->view('backend/footer'); ?>   