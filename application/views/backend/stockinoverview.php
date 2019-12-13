<?php $this->load->view('backend/header'); ?> 
        <div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
       <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block mobilehide" href="../index.html"><img src="../assets/img/icons/mainmaterial.png" alt="material.png" id="material"/>MATERIAL INWARD </a>
        <a  class="menu1 menuhide"  href="<?php echo base_url(); ?>Security/stockin_view"><i class="fas fa-home fa-lg iconcss"></i>Home</a>
		<a href="<?php echo base_url(); ?>Security/stockin_form" class="menu2 menuhide"><i class="fa fa-plus iconcss" aria-hidden="true"></i>Gatepass</a>
		<a class="menu3 menuhide"  href="<?php echo base_url(); ?>Security/stockin_report"><i class="fa fa-file iconcss" aria-hidden="true"></i>Report</a>		       
	   	<a class="menu3 menuhide" href="<?php echo base_url(); ?>Security/anonymous"><i class="fa fa-question-circle iconcss" aria-hidden="true"></i>Anonymous</a>	
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
	   <h1>Materials List</h1>
      <!-- Table -->
          
          <div class="card shadow" class="ele1">
            <div class="card-header border-0" >
              <h3 class="mb-0" style="font-weight: 900;color: white;"><img src="../assets/images/poc.jpg" alt="gatepass.png" id="materialdub"/><span style="margin-left: 16%;">Material Inward Information</span></h3>
             <hr> 
		   </div>
            <div class="card-body">
                <form method="post" action="<?php echo base_url(); ?>security/update_stockinward">
                   <input type="mid" name="mid" value="<?php echo $stockin[0]->id; ?>" hidden />
                   <div class="row">
                    <div class="col">
					<div  class="row">
						<div class="col">
						   <label>Invoice Date</label>
						  <input type="text" class="form-control stockinput"  name="invoicedate" value="<?php echo $stockin[0]->invoice_date?>" required>
						</div>
						<div class="col">
						  <label>Invoice No</label>
						  <input type="text"  name="invoiceno"  class="form-control stockinput" value="<?php echo $stockin[0]->invoice_no ?>" required>
						</div>
						<div class="col">
							<div class="form-group">
								 <label>Vendor</label>
								 <input type="text" class="form-control" name="vendor" value="<?php echo $stockin[0]->vendor; ?>"  />
							</div>
						</div>
					</div>
					<div class="row">
						
						<div class="form-group col">
							  <label>Purpose</label>
								   <input type="text" class="form-control stockinput" name="purpose"  value="<?php echo $stockin[0]->purpose ?>" required>
							   </div>
					  
						<div class="form-group col">
						 <label>Date</label>
						 <input type="text" name="date" class="form-control" value="<?php echo $stockin[0]->date; ?>">
						</div>
						 <div class="form-group col">
						   <label>Checked BY</label>
						  <input type="text" name="check" class="form-control" value="<?php echo $stockin[0]->checkedby; ?>">
						</div>

					</div>
                    </div>
                    <div class="col">
					   
							 <div class="form-group">
							 <label>Gatepass</label>
							 <input type="text" name="gatepass" class="form-control" value="<?php echo $stockin[0]->GatePass; ?>">
							</div>
							 <div class="form-group">
								 <label>Date</label>
								 <input type="text" name="date" class="form-control" value="<?php echo $stockin[0]->date; ?>">
							</div>
						
                    </div>
				   </div>
                     <div class="form-group" style="margin-left: 263px;">
                        <input type="submit" name="submit" class="btn btn-primary" value="submit" />
                        <a href="<?php echo base_url(); ?>security/in_addmat?I=<?php echo base64_encode($stockin[0]->id); ?>" class="btn btn-primary">+ Materials</a>
			
                    </div>
                    </form>
					<hr>
					<table class="table table-bordered" style="margin-bottom: 36px;margin-top: 16px;">
                        <?php $result=$this->Security_model->inmateriallist($stockin[0]->id)?>
						<tr>
                          
							<th>Particular</th>
							<th>Quantity</th>
						    <th>Vechicle_no</th>
							<th>Driver name</th>
							<th>Driver phone</th>
							<th>Time in</th>
							<th>Time out</th>
						</tr>
						<?php 
                            foreach($result as $value)
                            {
								?>   
                                <tr>
                          
                                    <td><?php echo $value->particules; ?></a></td>
									<td><?php echo $value->quantity; ?></a></td>
									 <?php 
									    $resulttime=$this->Security_model->inmaterialpart($value->ipid);
									
                            foreach($resulttime as $time)
                            {
									 ?>
									<td><?php echo $time->vechicle_no; ?></td>
									<td><?php echo $time->driver_name; ?></td>
									<td><?php echo $time->driver_phone; ?> </td>
									<td><?php echo $time->gatein; ?></td>
									<td id="<?php echo $time->ipid; ?>">
                                       	<?php 
											if($time->gateout=="") 
											{ 
											  ?>
										  <a class="btn btn-success ingout buttonsizing"  ><img src="<?php echo base_url(); ?>assets/img/icons/forbidden.png" alt="forbidden.png" id="forbidden"/></button>
										   <?php 
									}
									else
									{
										echo $time->gateout;						
									}
									?>
                                   </td>
								   <?php
							}
							?>
                                </tr>
								<?php
                            } 
                        ?>
					</table>
                   
					<hr>

				 
            </div>
            </div>
          </div>
        </div>
	
<?php $this->load->view('backend/footer'); ?> 