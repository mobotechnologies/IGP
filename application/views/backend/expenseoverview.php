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
      <div class="row">
        <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
          <div class="card card-profile shadow">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <a href="#">
                    <img src="../assets/img/theme/avatar.jpg" class="rounded-circle">
                  </a>
                </div>
              </div>
            </div>
            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
              <div class="d-flex justify-content-between">
                
              </div>
            </div>
            <div class="card-body pt-0 pt-md-4">
              <div class="row">
                <div class="col">
                  <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                      
                  </div>
                </div>
              </div>
              <div class="text-center">
                <h3>
                    <?php echo $employee[0]->first_name; ?>
                </h3>
				 <div class="h5 font-weight-300">
                   <span style="font-size: 13px;font-weight: 900;"> Email:</span><span style="font-size: 13px;font-weight: 900;"><?php echo $employee[0]->em_email; ?></span>
                </div>
				 <div class="h5 font-weight-300">
                    <span style="font-size: 13px;font-weight: 900;">Phone :</span><span style="font-size: 13px;font-weight: 900;"><?php echo $employee[0]->em_phone; ?></span>
                </div>
                <div>
                  <i class="ni education_hat mr-2"></i>
                </div>
                <hr class="my-4" />
               
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-8 order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0" style="margin-left: 122px;"><img src="../assets/img/icons/expense.png" alt="material.png" id="material" style="width: 30px;margin-right: 14px;"/>Addtional Information</h3>
                </div>
                <div class="col-4 text-right">
                   
                </div>
              </div>
            </div>
            <div class="card-body">
              <form>
                <hr class="my-4" />
                <!-- Address -->
                <h6 class="heading-small text-muted mb-4">Expense information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <label class="form-control-label" for="input-city">Payment Method</label>
                        <input type="text" id="input-city" class="form-control form-control-alternative"  value="<?php 
												     if($employee[0]->payment_method=="")
													 {
														 echo "Pending";
													 } 
                                                     else
													 {
														 echo $employee[0]->payment_method;
													 }														 
													?>">
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">Payee</label>
                        <input type="text" id="input-country" class="form-control form-control-alternative"  value="<?php 
												     if($employee[0]->payee=="")
													 {
														 echo "Pending";
													 } 
                                                     else
													 {
														 echo $employee[0]->payee;
													 }														 
													?>">
                      </div>
                    </div>
                    
                  </div>
				  <div class="row">
						<div class="col">
						  <div class="form-group">
							<label class="form-control-label" for="input-city">Amount</label>
							<input type="text" id="input-city" class="form-control form-control-alternative"  value="<?php  echo $employee[0]->amount;  ?>">
						  </div>
						</div>
						<div class="col">
						  <div class="form-group">
							<label class="form-control-label" for="input-country">Currency</label>
							<input type="text" id="input-country" class="form-control form-control-alternative"  value="<?php echo $employee[0]->currency;?>">
						  </div>
						</div>
                  </div>
				  <div class="row">
				        <div class="col">
						  <div class="form-group">
							<label class="form-control-label" for="input-city">Payment_Date</label>
							<input type="text" id="input-city" class="form-control form-control-alternative"  value="  <?php  
												       if($employee[0]->payment_date=="" )
												       {
														   echo "Pending";
													   }
													   else
													   {
														   echo  $employee[0]->payment_date;
													   }
													   
													   ?>">
						  </div>
						</div>
						<div class="col">
						  <div class="form-group">
							<label class="form-control-label" for="input-country">Payment_status</label>
							<input type="text" id="input-country" class="form-control form-control-alternative"  value=" <?php 
                                                         if($employee[0]->exp_status=="")
														 {
															 if($this->session->userdata('user_type')=='EMPLOYEE')
															{
																echo "Pending";
															}
															else
															{	
														       echo "unpaid";
															}
														 }
														 else
														 {
															echo "Paid";
														 }
		
												    ?>">
						  </div>
						</div>
				  </div>
                </div>
                <hr class="my-4" />
                <!-- Description -->
                <h6 class="heading-small text-muted mb-4">Expense Information</h6>
                 <div class="pl-lg-4">
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <label class="form-control-label" for="input-city">Category</label>
                        <input type="text" id="input-city" class="form-control form-control-alternative"  value="<?php  echo $employee[0]->exp_category; ?>">
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">Purpose</label>
                        <input type="text" id="input-country" class="form-control form-control-alternative" value="<?php echo $employee[0]->purpose;  ?>">
                      </div>
                    </div>
                   
                   </div>
				    <div class="row">
				      <div class="col">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">Attachment</label>
						</br>
                        			  <?php 
												 
												  $dec=json_decode($employee[0]->Bill_document);
												if(is_array($dec))
												{
												  foreach($dec as $key => $val)
												  {
												  ?>
												     <a href="<?php echo base_url(); ?>assets/expense/<?php echo $val; ?>" ><?php echo $val; ?></a>
											     <?php
												  }
												}
												else
												{
													?>
													
												     <a href="<?php echo base_url(); ?>assets/expense/<?php echo $employee[$key]->Bill_document; ?>" ><?php echo $employee[$key]->Bill_document; ?></a>
													<?php
												}
												 ?>
                      </div>
                    </div>
					 <div class="col">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">Status</label>
                        <input type="text" id="input-postal-code" class="form-control form-control-alternative" value="<?php
											    if(($employee[0]->approve1=="Yes" || $employee[0]->approve1=="No")   && (($employee[0]->approve2=="Yes" ||$$employee[$key]->approve2=="No" ) || ($$employee[$key]->approve3=="Yes" || $$employee[$key]->approve3=="No")) )
			                                    {
													 if($employee[0]->approve1 =="Yes" && ($employee[0]->approve2=="Yes" || $employee[0]->approve3=="Yes"))
			                                          {
														  echo "Approved";
													  }
													  else
												      {
														  echo "Rejected";
													  }
												}
                                                else
												{
													echo "Requested";
												}													
											?>"/>
                      </div>
                    </div>
				
				 </div>
				 <div class="row">
				      <div class="col">
							<p>Level 1 </p>
							<?php
								if($employee[0]->approve1=="Yes")
								{
									?>
									 <input type="checkbox" class="check" checked ><br>
									<?php
								}
								elseif($employee[0]->approve1==NULL)
								{
									echo "Pending";
								}
								else
								{
									echo "Rejected";
									echo "Remark".$employee[0]->reject_remark1;
								}								
							?>
					  </div>
					  <div class="col">
					       <p>Level 2 </p>
							<?php
								if($employee[0]->approve2=="Yes")
								{
									?>
									 <input type="checkbox" class="check" checked ><br>
									<?php
								}
								elseif($employee[0]->approve2==NULL)
								{
									echo "Pending";
								}
								else
								{
									echo "Rejected";
									echo "Remark".$employee[0]->reject_remark2;
								}								
							?>
					  </div>
					  <div class="col">
					       <p>Level 3 </p>
						   <?php
                            if($employee[0]->approve3=="Yes")
							{
								?>
							     <input type="checkbox" class="check" checked ><br>
								<?php
							}
                            elseif($employee[0]->approve3==NULL)
							{
								echo "Pending";
							}
                            else
                            {
								echo "Rejected";
								echo "Remark".$employee[0]->reject_remark3;
							}								
						 ?>
					  </div>
					  </div>
				 </div>
				 </div>
				 <div>
				  
				 <?php
				 if($this->session->userdata('user_type')=='ADMIN')
															{
															
				 ?>
				<div class="form-group row">
				    <div class="col">
				     <input type="submit" name="Canel" class="form-control btn btn-danger"  value="Canel" style="width: 101.991422px;margin-left: 216px;"/>
					</div>
					<div class="col">
					   <input type="submit" name="submit" class="form-control btn btn-success " value="Submit" style="width: 92.991422px;margin-left: 0px;"/>
					</div>
				</div>
				<?php
															}
				?>
              </form>
            </div>
          </div>
        </div>
      </div>  
<?php $this->load->view('backend/footer'); ?> 