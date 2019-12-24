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
                  <span class="mb-0 text-sm  font-weight-bold"><?php 
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
              <h5 class="mb-0 matheadings"><img src="<?php echo base_url(); ?>/assets/img/icons/expense.png" alt="material.png" id="material"/>Expense</h5>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush" id="cab">
                <thead class="thead-light" role="rowgroup">
					<tr role="row">
						  <th role="columnheader">Employee_name</th>
						  <th role="columnheader">Category</th>
						  <th role="columnheader">Purpose</th>
						  <th role="columnheader">Attachment</th>
						  <th role="columnheader">PaymentStatus</th>
						  <th>status</th>
						   <?php if($this->session->userdata('user_type')=='EMPLOYEE')
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
                <tbody role="rowgroup">
                                               <?php 
								 
											foreach($employee as $key=>$value) {
												    $yid=$employee[$key]->yid;
                                                    $app1=$employee[$key]->approve1;
													$app2=$employee[$key]->approve2;
													$app3=$employee[$key]->approve3;
													$exp_status=$employee[$key]->exp_status;
   													?>
                                            <tr id="<?php echo $employee[$key]->yid; ?>" role="row">
                                                <td class="expensetable" role="cell"><?php echo ucfirst($employee[$key]->first_name); ?></td>
                                                <td class="expensetable" role="cell"><?php echo ucfirst($employee[$key]->exp_category); ?></td>
												<td class="expensetable" role="cell"><?php echo ucfirst($employee[$key]->purpose); ?></td>
                                                <td class="expensetable" role="cell">
												  <?php 
												 
												  $dec=json_decode($employee[$key]->Bill_document);
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
											</td>
												<td id="text" class="expensetable" role="cell">
												    <?php 
													
                                                    if(($app1=="Yes" || $app1=="No")   && (($app2=="Yes" ||$app2=="No" ) || ($app3=="Yes" || $app3=="No")) )
			                                         {
													 if($app1 =="Yes" && ($app2=="Yes" || $app3=="Yes"))
			                                          {
														
                                                         if($exp_status=="")
														 {
															 if($this->session->userdata('user_type')=='EMPLOYEE')
															{
																echo "Pending";
															}
															else
															{	
														       ?>
															    <button class="btn btn-primary pay" data-toggle="modal" data-target="#pay">Pay</button>
																					  <div class="modal fade" id="pay" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content ">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="exampleModalLabel1"><img src="../assets/img/icons/payee.png" alt="material.png" style="width: 41px;margin-right: 15px;"/>Payment details</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form method="post" action="<?php echo base_url();?>travel/Expense_pay" id="holidayform" enctype="multipart/form-data" style="width: 362px;margin-left: 119px;">
                                    <div class="modal-body">
									     
                                            <div  class="form-group">
											     <label class="control-label">ExpenseCode</label>
												 <input type="text" name="Expcode" id="excode" class="form-control " value="<?php echo $yid; ?>" >
                                            </div>
											<div class="form-group">
                                                <label class="control-label">Payment_method</label>
                                                <select name="pmethod" class="form-control">
												    <option value="cash">Cash</option>
												    <option value="check">Check</option>
												    <option value="credit">Credit card</option>
													<option value="debit">Debit card</option>
													
												</select>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Payee</label>
                                                <input type="text" name="payee" class="form-control " id="recipient-name1" placeholder="Payee">
                                            </div>  
											<div class="form-group">
                                                <label class="control-label">Payment_amount</label>
                                                <input type="text" name="amount" class="form-control " id="recipient-name1" value="">
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
															   <?php
															}
														 }
														 else
														 {
															echo "Paid";
														 }
													  }
													  else
													  {
														  "Rejected";
													  }
													 }
													 else
													 {
														  echo "Requested";
													 }
												    ?>
											    </td>
											<td>
											<?php
											    if(($app1=="Yes" || $app1=="No")   && (($app2=="Yes" ||$app2=="No" ) || ($app3=="Yes" || $app3=="No")) )
			                                    {
													 if($app1 =="Yes" && ($app2=="Yes" || $app3=="Yes"))
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
											?>
											</td>
												<?php
   												    if($this->session->userdata('user_type')=='EMPLOYEE')
												    {
														?>
														 <td class="expensetable" role="cell">
														<a href="<?php echo base_url(); ?>travel/expsingleview?I=<?php echo base64_encode($employee[$key]->yid); ?>" class="btn btn-primary buttonsizing" id="view"><img src="<?php echo base_url(); ?>assets/img/icons/eye.jpg" alt="eye.png" id="forbidden"/></a>
														</td>
														<?php
												    }
                                                    else
													{														
												       ?>
														<td class="expensetable"  id="<?php echo $value->yid; ?>" role="cell">
														        <a href="<?php echo base_url(); ?>travel/expsingleview?I=<?php echo base64_encode($yid); ?>" class="btn btn-primary buttonsizing" id="view"><img src="<?php echo base_url(); ?>assets/img/icons/eye.jpg" alt="eye.png" id="forbidden"/></a>
																<a href="#" class="btn btn-danger buttonsizing delexpense" id="view" value="<?php echo $yid; ?>"><i class="fa fa-trash" aria-hidden="true" style="padding-left: 6px;"></i></a>
														         <?php
																	  $config=$this->Security_model->selectcabmails();  
															
																	  foreach($config as $vales)
																	  {	
																	  		//echo $vales->level1;

																		if($this->session->userdata('user_login_id')==$vales->level1 )
																		{	
																	   
																	?>
															    <button class="btn btn-primary buttonsizing expapprove1" data-value="<?php echo  $value->yid; ?>"><i class="fa fa-check" aria-hidden="true"></i></button>
															    <button class="btn btn-danger buttonsizing expreject1"   data-value="<?php echo  $value->yid; ?>"><i class="fa fa-ban" aria-hidden="true"></i></button>
														       <?php
																		}
																		if($this->session->userdata('user_login_id')==$vales->level2)
																		{
																			  ?>
																			 <button class="btn btn-primary buttonsizing expapprove2"  data-value="<?php echo  $value->yid; ?>"><i class="fa fa-check" aria-hidden="true"></i></button>
															                 <button class="btn btn-danger buttonsizing expreject2"    data-value="<?php echo  $value->yid; ?>"><i class="fa fa-ban" aria-hidden="true"></i></button>
																			  <?php
																		}
																		if($this->session->userdata('user_login_id')==$vales->level3)
																		{
																			 ?>
																			  <button class="btn btn-primary buttonsizing expapprove3"  data-value="<?php echo  $value->yid; ?>" ><i class="fa fa-check" aria-hidden="true"></i></button>
															                 <button class="btn btn-danger buttonsizing expreject3"     data-value="<?php echo  $value->yid; ?>" ><i class="fa fa-ban" aria-hidden="true"></i></button>
																			 <?php
																		}
																	  }
																		?>
														</td>
														<?php
													}
													?>
                                            </tr>
                                        <?php }?>
                </tbody>
              </table>
            </div>

          </div>
        </div>
      </div>
<?php $this->load->view('backend/footer'); ?>   