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
          <a class=" nav-link-icon " href="#" id="notification-icon" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"  onclick="myFunction()">
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
      <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header border-0">
              <h3 class="mb-0 visitorhead"><img src="<?php echo base_url(); ?>assets/images/visitor.png" alt="home.png" style="width: 28px;margin-right: 6px;"/>Visitor Management</h3>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush" id="visitor">
                <thead class="thead-light" role="rowgroup">
                  <tr role="row">
                     <th role="columnheader">Name</th>
					 <th role="columnheader">Email</th>
					 <th role="columnheader">Address</th>
					 <th role="columnheader">GateIn</th>
					 <th role="columnheader">GateOut</th>	 						   
					 <th role="columnheader">Action</th>
                  </tr>
                </thead>
                <tbody role="rowgroup" class="visitdata materialo">
				   <?php
					  foreach($visitor as $value)
					  {
							
					?>
					<tr role="row" id="<?php echo $value->id; ?>">
                       <td class="visitort" role="cell"><?php echo ucfirst($value->name);	?></td>
				       <td class="visitort email" role="cell" ><?php echo strtolower($value->email);	?></td>
					   <td class="visitort address" role="cell" ><?php echo ucfirst($value->address);	?></td>
				      
				       <td class="visitort" role="cell"><?php echo $value->intime;	?></td>
				       <td class="visitort" role="cell" id="<?php echo $value->id; ?>">
					      	<?php 
								if($value->out=="00:00:00") 
								{ 
								  ?>
					              <button class="btn btn-success visitgateout buttonsizing" ><img src="<?php echo base_url(); ?>assets/img/icons/forbidden.png" alt="forbidden.png" id="forbidden"/></button>
								  <?php 
								}
								else
								{
									echo $value->out;						
								}
								?>
						</td>
					    <td class="visitort">
						    <button class="btn btn-primary  buttonsizing" id="view" data-toggle="modal" data-target="#visitor<?PHP echo $value->id; ?>"><img src="<?php echo base_url(); ?>assets/img/icons/eye.jpg" alt="eye.png" id="forbidden"/></button>
							 <a href="#" class="btn btn-danger buttonsizing delvisitor" id="view" data-value="<?php echo $value->id; ?>"><i class="fa fa-trash" aria-hidden="true" style="padding-left: 6px;"></i></a>
						    <div class="modal fade" id="visitor<?PHP echo $value->id; ?>" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
      
          <h4 class="modal-title"><img src="../assets/img/icons/visit.png" alt="material.png" id="material"/>Visitor</h4>
        </div>
        <div class="modal-body">
		   <form method="post" action="<?php echo base_url(); ?>Security/visitgatepass">
		      <img src="<?php echo base_url(); ?>assets/upload/<?php echo $value->identity_proof; ?>"  style="width: 154px;margin-left: 144px;margin-bottom: 20px;"/>
		    <div class="row">
			    <div class="col">
				     <label>Name</label>
				     <input type="text" name="name" class="form-control charrestrict" value="<?php echo $value->name; ?>">
				</div>
				<div class="col">
				    <label>Email</label>
				      <input type="text" name="email" class="form-control" value="<?php echo $value->email; ?>">
				</div>
				<div class="col">
				 <label>Phone</label>
				 <input type="text" name="phone" class="form-control norestrict" value="<?php echo $value->phone; ?>">
				</div>
			</div>
			<div class="row">
				     <div class="col">
				    <div class="form-group">
					 
                          <label>Purpose</label>						
						  <input type="text" name="purpose" class="form-control charrestrict"  value="<?php echo $value->purpose ?>" required>
						 
						
						
					</div>
					</div>
					 <div class="col">
                    <div class="form-group">
                        <label>Meeting With</label>					
						<select class="form-control" name="meet_to">
								 <?php
								 $m=$value->meeting_to;
								foreach($employee as $val)
								{

							 ?>
									
										 <option value="<?php echo $val->id ?>" <?php if($val->id==$m){ echo "selected";  } ?>><?php echo $val->first_name."-".$val->dep_name; ?></option>
									 
							 <?php
								}
								?>	
						</select>
					</div>
					</div>
					 <div class="col">
					<div class="form-group">
					   <label>Accompanied</label>
					    <select name="accompanied" class="form-control" >
							  <option>Accompanied</option>
							  <option selected>1</option>
							  <option>2</option>
							  <option>3</option>
							  <option>4</option>
							  <option>5</option>
						</select>
					</div>
					</div>
				</div>
			<div class="row">
				   <div class="col">
				    <div class="form-group">
					   <p>Item Carried</p>
						<select class="form-control" name="Item_car" >
							<option selected>Mobile</option>
							<option>Laptop</option>
							<option>Others</option>
						</select>
					</div>
					</div>
					 <div class="col">
					<div class="form-group">
					    <p>Item Deposited</p>
					    <select class="form-control" name="Item_deposit" >
							<option selected>Mobile</option>
							<option>Laptop</option>
							<option>Others</option>
						</select>
					</div>
					</div>
					 <div class="col">
					<div class="form-group">
                        <p>Item Carried</p>
					    <select class="form-control" name="Item_issue" >
							<option selected>Mobile</option>
							<option>Laptop</option>
							<option>Others</option>
						</select>
					</div>
					</div>
				</div>
			<div class="row">
			    <div class="col">
				     <label>Organization</label>
				     <input type="text" name="organization" class="form-control charrestrict" value="<?php echo $value->organization; ?>">
				</div>
				 <div class="col">
				     <label>Company Phone</label>
				     <input type="text" name="organphone" class="form-control norestrict" value="<?php echo $value->companyphone; ?>">
				</div>
				 <div class="col">
				     <label>Company Address</label>
				     <input type="text"  name="organaddress" class="form-control" value="<?php echo $value->companyaddress; ?>">
				</div>
			</div>
			<div class="row">
			  <div class="col">
			    <label>Address</label>
				<textarea name="address" value="<?php echo $value->address; ?>" class="form-control"><?php echo $value->address; ?></textarea>
			  </div>
			</div>
			<div class="row">
			    <input type="text" name="receipt"  value="<?php echo $value->passno; ?>" hidden>
			    <input type="text" name="imgname"  class="images" value="<?php  echo $value->identity_proof; ?>" hidden />
			</div>
			<div class="row">
			    <div class="col" style="margin-top: 21px;margin-left: 38px;">
				  <input type="submit" value="Generate Pass" class="btn btn-primary" name="submit"/> 
				  <input type="submit" value="Save" class="btn btn-primary" name="submit"/> 
				  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
            </div>
        </div>
		</form>
       
      </div>
      
    </div>
  </div>
						</td>
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