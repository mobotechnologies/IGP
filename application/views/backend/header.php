<!--

=========================================================
* Argon Dashboard - v1.1.0
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard
* Copyright 2019 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md)

* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
        IGP
    </title>
    <!-- Favicon -->
    <link href="<?php echo base_url(); ?>assets/jquery/select2-develop/dist/css/select2.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/img/brand/favicon.png" rel="icon" type="image/png">
   
    <!-- Icons -->
    <link href="<?php echo base_url(); ?>assets/js/plugins/nucleo/css/nucleo.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/css/argon-dashboard.css?v=1.1.0" rel="stylesheet" />
	<link href="<?php echo base_url(); ?>assets/css/argon-dashboard.css?v=1.1.0" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/responsiveslide/responsetable.css" rel="stylesheet" />
	<!-- menuplugin -->
   	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/menuplug/css/normalize.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/menuplug/css/demo.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/menuplug/css/component2.css" /> 
    <script src="<?php echo base_url(); ?>assets/menuplug/js/modernizr-2.6.2.min.js"></script>	
	<!--datatable-->
        <link href="<?php echo base_url(); ?>assets/jquery/DataTables-1.10.20/css/jquery.dataTables.min.css"  rel="stylesheet" />
        <link href="<?php echo base_url(); ?>assets/jquery/Buttons-1.6.1/css/buttons.dataTables.min.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>assets/jquery/DataTables-1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
	<!--chartjs-->   
    <script src="<?php echo base_url(); ?>assets/js/plugins/chart.js/dist/Chart.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins/chart.js/dist/Chart.extension.js"></script>
	
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/jquery/jquery-ui-1.12.1/jquery-ui-1.12.1/jquery-ui.css">
     <script src="<?php echo base_url(); ?>assets/loginstyle/vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/notify/notify.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/notify/notify.js"></script>
   
	<script type="text/javascript">
	var _gaq = _gaq || [];
	_gaq.push(['_setAccount', 'UA-7243260-2']);
	_gaq.push(['_trackPageview']);
	(function() {
	var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	})();
	</script>
	<?php 
            $id = $this->session->userdata('user_login_id');
            $basicinfo = $this->employee_model->GetBasic($id); 
	?>
    <style>
    #my_camera{
        width: 320px;
        height: 240px;
        border: 1px solid black;
    }
	</style>
		

</head>

<body class="">

  <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Brand -->
      <a class="navbar-brand pt-0" href="<?php echo base_url(); ?>dashboard/Dashboard">
        <img src="../assets/images/poc.jpg" class="navbar-brand-img logoresponsive" alt="..." style=" width:100px;">
      </a>
      <!-- User -->
      <ul class="nav align-items-center d-md-none">
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
                <div class="media-body ml-2 d-none d-lg-block mobilehide">
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
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Collapse header -->
        <div class="navbar-collapse-header d-md-none">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="../index.html">
                <img src="../assets/images/poc.jpg" class="navbar-brand-img logoresponsive" alt="..." style=" width:100px;">
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        <!-- Form -->
        <form class="mt-4 mb-3 d-md-none">
         
        </form>
        <!-- Navigation -->
     <ul class="navbar-nav">
	 
         <li class="nav-item"  class="active">
          <a class=" nav-link <?php if($this->uri->segment(2)=="Dashboard"){ echo "active"; }?>  hmenu" href="<?php echo base_url(); ?>dashboard/Dashboard" style=' color: #8898aa !important;'> <img src="../assets/img/icons/dasboard.png" alt="material.png" id="material"/>Dashboard
            </a>
          </li>
		
  <?php
		    if($this->session->userdata('user_type')=="ADMIN"  || $this->session->userdata('user_type')=="SUPER ADMIN" || $this->session->userdata('user_type')=="SECURITY")
			{
		    ?>  
          <li class="nav-item navsalign">
            <a class="nav-link <?php if($this->uri->segment(2)=="stockin_view" ||  $this->uri->segment(2)=="stockin_form" ||  $this->uri->segment(2)=="stockin_report"){ echo "active"; } ?> hmenu mobilehide menuhide" href="<?php echo base_url(); ?>security/stockin_view " >
			
              <img src="../assets/img/icons/material.png"  alt="material.png" id="material"/>Inward
            </a>
			 <div class="nav-link <?php if($this->uri->segment(2)=="stockin_view" ||  $this->uri->segment(2)=="stockin_form" ||  $this->uri->segment(2)=="stockin_report"){ echo "active"; } ?> hmenu  dropdown hidedrop">
    <a class="dropdown-toggle" data-toggle="dropdown"><img src="../assets/img/icons/material.png"  alt="material.png" id="material"/>Inward
    <span class="caret"></span></a>
    <ul class="dropdown-menu" style="width: 142px;">
      <li style="font-size: 13px;"> <a   href="<?php echo base_url(); ?>Security/stockin_view"><i class="fas fa-home fa-lg iconcss" style="margin-left: 20px;margin-right: 5px;"></i>Home</a></li>
      <li style="font-size: 13px;"><a href="<?php echo base_url(); ?>Security/stockin_form" ><i class="fa fa-plus iconcss1" aria-hidden="true" style="margin-left: 21px;margin-right: 12px;"></i>Add</a></li>
       <?php
		    if($this->session->userdata('user_type')=="ADMIN"  || $this->session->userdata('user_type')=="SUPER ADMIN")
			{
		    ?>
	 <li style="font-size: 13px;"><a   href="<?php echo base_url(); ?>Security/stockin_report"><i class="fa fa-file iconcss1" aria-hidden="true" style="margin-left: 21px;margin-right: 13px;"></i>Report</a></li>
		<?PHP
			}
			?>
	<li style="font-size: 13px;"><a href="<?php echo base_url(); ?>Security/anonymous"><i class="fa fa-question-circle iconcss2" aria-hidden="true" style="margin-left: 20px;margin-right: 12px;"></i>Anonymous</a>	</li>
    </ul>
  </div>
			
          </li>
		  <?php
			}
			?>
			 <?php
		    if($this->session->userdata('user_type')=="ADMIN"  || $this->session->userdata('user_type')=="SUPER ADMIN" || $this->session->userdata('user_type')=="EMPLOYEE" || $this->session->userdata('user_type')=="SECURITY")
			{
		    ?> 
          <li class="nav-item navsalign">
            <a class="nav-link <?php if($this->uri->segment(2)=="stockout_view" ||  $this->uri->segment(2)=="stockout_form" ||  $this->uri->segment(2)=="stockout_report"){ echo "active"; } ?> hmenu  mobilehide menuhide" href="<?php echo base_url(); ?>security/stockout_view">
			
              <img src="../assets/img/icons/material2.png" alt="material.png" id="material"/>Outward
            </a>
			<div class="nav-link <?php if($this->uri->segment(2)=="stockout_view" ||  $this->uri->segment(2)=="stockout_form" ||  $this->uri->segment(2)=="stockout_report"){ echo "active"; } ?> hmenu  dropdown hidedrop">
    <a class="dropdown-toggle" data-toggle="dropdown"><img src="../assets/img/icons/material2.png" alt="material.png" id="material"/>Outward
    <span class="caret"></span></a>
    <ul class="dropdown-menu" style="width: 142px;">
      <li style="font-size: 13px;"> <a href="<?php echo base_url(); ?>Security/stockout_view"><i class="fas fa-home fa-lg iconcss" style="margin-left: 20px;margin-right: 5px;"></i>Home</a></li>
      <li style="font-size: 13px;"><a href="<?php echo base_url(); ?>Security/stockout_form" ><i class="fa fa-plus iconcss1" aria-hidden="true" style="margin-left: 21px;margin-right: 12px;"></i>Add</a></li>
	
	        <?php
		    if($this->session->userdata('user_type')=="ADMIN"  || $this->session->userdata('user_type')=="SUPER ADMIN")
			{
		    ?>
	 <li style="font-size: 13px;"><a   href="<?php echo base_url(); ?>Security/stockout_report"><i class="fa fa-file iconcss1" aria-hidden="true" style="margin-left: 21px;margin-right: 13px;"></i>Report</a></li>
  		<?PHP
			}
			?>
	</ul>
  </div>
          </li>
		 <?PHP
			}
			?>
			 <?php
		    if($this->session->userdata('user_type')=="ADMIN"  || $this->session->userdata('user_type')=="SUPER ADMIN" || $this->session->userdata('user_type')=="EMPLOYEE" ||  $this->session->userdata('user_type')=="SECURITY")
			{
		    ?> 
          <li class="nav-item navsalign">
            <a class="nav-link <?php if($this->uri->segment(2)=="visitor_view" ||  $this->uri->segment(2)=="visitor_form" ||  $this->uri->segment(2)=="visitor_report"){ echo "active"; } ?> hmenu  mobilehide menuhide" href="<?php echo base_url(); ?>security/visitor_view">
		
              <img src="../assets/img/icons/visit.png" alt="material.png" id="material"/> Visitor
            </a>
			<div class="nav-link <?php if($this->uri->segment(2)=="visitor_view" ||  $this->uri->segment(2)=="visitor_form" ||  $this->uri->segment(2)=="visitor_report"){ echo "active"; } ?> hmenu  dropdown hidedrop">
			<a class="dropdown-toggle" data-toggle="dropdown"><img src="../assets/img/icons/visit.png" alt="material.png" id="material"/>Visitor</a>
			<span class="caret"></span></a>
			<ul class="dropdown-menu" style="width: 142px;">
			  <li style="font-size: 13px;"> <a   href="<?php echo base_url(); ?>Security/visitor_view"><i class="fas fa-home fa-lg iconcss" style="margin-left: 20px;margin-right: 5px;"></i>Home</a></li>
			  <li style="font-size: 13px;"><a href="<?php echo base_url(); ?>Security/visitor_form" ><i class="fa fa-plus iconcss1" aria-hidden="true" style="margin-left: 21px;margin-right: 12px;"></i>Add</a></li>
              <?php
		    if($this->session->userdata('user_type')=="ADMIN"  || $this->session->userdata('user_type')=="SUPER ADMIN")
			{
		    ?>			 
			 <li style="font-size: 13px;"><a   href="<?php echo base_url(); ?>Security/visitor_report"><i class="fa fa-file iconcss1" aria-hidden="true" style="margin-left: 21px;margin-right: 13px;"></i>Report</a></li>
			<?PHP
			}
			?>
			  </ul>
  </div>
          </li>
		
		  <?PHP
			}
			?>
			 <?php
		    if($this->session->userdata('user_type')=="ADMIN"  || $this->session->userdata('user_type')=="SUPER ADMIN" || $this->session->userdata('user_type')=="EMPLOYEE")
			{
		    ?> 
       
			   <li class="nav-item navsalign">
				<a class="nav-link <?php if($this->uri->segment(2)=="cab_view" ||  $this->uri->segment(2)=="cab_form" ||  $this->uri->segment(2)=="cab_report"){ echo "active"; } ?> hmenu  mobilehide menuhide" href="<?php  echo base_url(); ?>Travel/cab_view" >
				  <img src="<?php echo base_url(); ?>/assets/img/icons/cab.png" alt="material.png" id="material" /> Cab
				</a>
			   <div class="nav-link <?php if($this->uri->segment(2)=="cab_view" ||  $this->uri->segment(2)=="cab_form" ||  $this->uri->segment(2)=="cab_report"){ echo "active"; } ?> hmenu dropdown hidedrop">
    <a class="dropdown-toggle" data-toggle="dropdown">  <img src="<?php echo base_url(); ?>/assets/img/icons/cab.png" alt="material.png" id="material" /> Cab</a>
    <span class="caret"></span></a>
    <ul class="dropdown-menu" style="width: 142px;">
      <li style="font-size: 13px;"> <a   href="<?php echo base_url(); ?>Security/cab_view"><i class="fas fa-home fa-lg iconcss" style="margin-left: 20px;margin-right: 5px;"></i>Home</a></li>
      <li style="font-size: 13px;"><a href="<?php echo base_url(); ?>Security/cab_form" ><i class="fa fa-plus iconcss1" aria-hidden="true" style="margin-left: 21px;margin-right: 12px;"></i>Add</a></li>
       <?php
		    if($this->session->userdata('user_type')=="ADMIN"  || $this->session->userdata('user_type')=="SUPER ADMIN")
			{
		    ?>
	  <li style="font-size: 13px;"><a   href="<?php echo base_url(); ?>Security/cab_report"><i class="fa fa-file iconcss1" aria-hidden="true" style="margin-left: 21px;margin-right: 13px;"></i>Report</a></li>
	  <?PHP
			}
			?>
</ul>
  </div>
			  </li>
			  <?PHP
			}
			?>
			 <?php
		    if($this->session->userdata('user_type')=="ADMIN"  || $this->session->userdata('user_type')=="SUPER ADMIN" || $this->session->userdata('user_type')=="EMPLOYEE")
			{
		    ?> 
			   <li class="nav-item navsalign">
				<a class="nav-link <?php if($this->uri->segment(2)=="expense_view" ||  $this->uri->segment(2)=="expense_form" ||  $this->uri->segment(2)=="expense_report"){ echo "active"; } ?> hmenu  mobilehide menuhide" href="<?php  echo base_url(); ?>Travel/expense_view">
				  <img src="<?php echo base_url(); ?>/assets/img/icons/expense.png" alt="material.png" id="material"/> Reimburse
									</a>
					<div class="nav-link <?php if($this->uri->segment(2)=="expense_view" ||  $this->uri->segment(2)=="expense_form" ||  $this->uri->segment(2)=="expense_report"){ echo "active"; } ?> hmenu dropdown hidedrop">
						<a class="dropdown-toggle" data-toggle="dropdown"> <img src="<?php echo base_url(); ?>/assets/img/icons/expense.png" alt="material.png" id="material"/> Reimburse</a>
						<span class="caret"></span></a>
						<ul class="dropdown-menu" style="width: 142px;">
						  <li style="font-size: 13px;"><a href="<?php echo base_url(); ?>Travel/expense_view"><i class="fas fa-home fa-lg iconcss" style="margin-left: 20px;margin-right: 5px;"></i>Home</a></li>
						  <li style="font-size: 13px;"><a href="<?php echo base_url(); ?>Travel/expense_form" ><i class="fa fa-plus iconcss1" aria-hidden="true" style="margin-left: 21px;margin-right: 12px;"></i>Add</a></li>
            <?php
		    if($this->session->userdata('user_type')=="ADMIN"  || $this->session->userdata('user_type')=="SUPER ADMIN")
			{
		    ?>				
				<li style="font-size: 13px;"><a  href="<?php echo base_url(); ?>Travel/expense_report"><i class="fa fa-file iconcss1" aria-hidden="true" style="margin-left: 21px;margin-right: 13px;"></i>Report</a></li>
            <?PHP
			}
            ?>			
				</ul>
					  </div>
			  </li>
			  <?PHP
			}
			?>
			 <?php
		    if($this->session->userdata('user_type')=="ADMIN"  || $this->session->userdata('user_type')=="SUPER ADMIN")
			{
		    ?> 
			  <li class="nav-item">
				<a class="nav-link <?php if($this->uri->segment(2)=="Department"){ echo "active"; } ?> hmenu" href="<?php echo base_url(); ?>organization/Department" style=' color: #8898aa !important;'>
				  <img src="<?php echo base_url(); ?>/assets/img/icons/department.png" alt="material.png" style="width: 32px;margin-right: 10px;"/> Department
				</a>
			  </li>
			   <li class="nav-item">
				<a class="nav-link <?php if($this->uri->segment(2)=="Designation"){ echo "active"; } ?> hmenu" href="<?php echo base_url(); ?>organization/Designation" style=' color: #8898aa !important;'>
				  <img src="<?php echo base_url(); ?>/assets/img/icons/designation.png" alt="material.png" style="width: 32px;margin-right: 10px;"/> Designation
				</a>
			  </li>
             <?PHP
			}
			?>
        </ul>
      </div>
    </div>
  </nav>