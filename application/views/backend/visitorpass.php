<?php $this->load->view('backend/header'); ?> 
        <div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block mobilehide" href="../index.html"><img src="../assets/img/icons/mainvisit.png" alt="material.png" id="material"/>VISITOR MANAGEMENT</a>
	    <a  class="menu1 menuhide"  href="<?php echo base_url(); ?>Security/visitor_view"><i class="fas fa-home fa-lg iconcss"></i>Home</a>
		<a href="<?php echo base_url(); ?>Security/visitor_form" class="menu2 menuhide"><i class="fa fa-plus iconcss" aria-hidden="true"></i>Add</a>
		<a class="menu3 menuhide"  href="<?php echo base_url(); ?>Security/visitor_report"><i class="fa fa-file iconcss" aria-hidden="true"></i>Report</a>		
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
                  <span class="mb-0 text-sm  font-weight-bold"> <?php 
					 
				       echo $basicinfo->first_name; 
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
      
        <div class="card shadow">
            <div class="table-responsive">
 <!--<div class="table-responsive">-->
                      
		   <table border="1" id="customers" class="ele2"> 
                <tbody>
                    <tr>
						<td style="width:50%;padding-left: 62px;">
						   
							     <img src="<?php echo base_url(); ?>assets/images/poc.jpg"  id="printTable" /></br>
							
						</td>
						<td style="width:50%">
							 <p style=" font-size: 12px;font-weight: 900;margin-top: 11px;margin-left: 25px;">
								<span style="color:blue">POCLAIN HYDRAULICS PVT LTD</span></br>
								No: 131 / 2, Kothapurinatham Road
								Mannadipet Commune Panchayat
								Thiruvandarkoil
								PONDICHERRY -  605 102
								INDIA

								Tel.: +91 413 2641455
							</p>
						</td>
					</tr>
					<tr>
					   <td style="width:50%;padding-left: 77px;">Pass No   : <?php  echo $visitor["passno"]; ?></td>
					   <td style="width:50%;padding-left: 77px;">Validity : <?php echo date("Y-m-d"); ?></td>
					</tr>
					<tr>
					   <td style="width:50%"><img src="<?php echo base_url(); ?>assets/upload/<?php echo $visitor['identity_proof']; ?>"  style="width: 154px;margin-top: 10px;margin-left: 142px;margin-bottom: 26px;"/></td>
					   <td style="width:50%">
							<table  style="width:100%">
								<tr>
								   <td>Name</td>
								   <td>:</td>
								   <td><?php echo $visitor["name"]; ?></td>
								</tr>
								<tr>
								   <td>To meet</td>
								   <td>:</td>
								   <td><?php echo $visitor["meeting_to"]; ?></td>
								</tr>
								<tr>
								   <td>Purpose</td>
								   <td>:</td>
								   <td><?php echo $visitor["purpose"];?></td>
								</tr>
								<tr>
								   <td>Validity</td>
								   <td>:</td>
								   <td><?php echo date("Y-m-d"); ?></td>
								</tr>
							</table>
					   </td>
					</tr>					 
                </tbody>
              </table>
            </div>

          </div>
      
		     <button class="print-link no-print btn btn-success" onclick="jQuery('.ele1').print()">
                                        Print
            </button>
		
<?php $this->load->view('backend/footer'); ?> 