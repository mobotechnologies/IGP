     <?php $this->load->view('backend/header'); ?>     
	 	 <div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block mobilehide" href="../index.html"><img src="../assets/img/icons/maindesignation.png" alt="material.png"  style="width: 32px;margin-right: 10px;"/>Designation</a>
             
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
	<div class="modal fade" id="adddesignation" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
           <h4 style="padding-left: 25%;"><img src="<?php echo base_url(); ?>/assets/img/icons/department.png" alt="material.png" style="width: 32px;margin-right: 10px;"/>Add Department</h4>
        </div>
        <div class="modal-body">
		         <form method="post" action="Save_des" enctype="multipart/form-data">
							<div class="form-body">
								<div class="row ">
									<div class="col-md-12">
										<div class="form-group">
											<label class="control-label">Designation Name</label>
											<input type="text" name="designation" id="firstName" value="" class="form-control charrestrict" placeholder="" minlength="3" required>
										</div>
									</div>
									<!--/span-->
								</div>
								<!--/row-->
							</div>
							<div class="form-actions">
								<button type="submit" class="btn btn-primary"> <i class="fa fa-check"></i> Save</button>
								<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
							</div>
						</form>
       
      </div>
      
    </div>
  </div>
  </div>
    <div class="row">
        <div class="col-lg-2">
		
        </div>
        <div class="col-7">
            <div class="card card-outline-info">
                <div class="card-header" id="descheader">
                    <h4 style="padding-left: 33%;"><img src="<?php echo base_url(); ?>/assets/img/icons/designation.png" alt="material.png" style="width: 32px;margin-right: 10px;"/>Designation List<i class="fa fa-plus" aria-hidden="true" style="margin-left: 102px;"  data-toggle="modal" data-target="#adddesignation"></i></h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive ">
                        <table class="table align-items-center table-flush" cellspacing="0" width="100%" id="designer">
                            <thead role="rowgroup" >
                                <tr role="row" >
                                    <th role="columnheader">Designation</th>
                                    <th role="columnheader">Action</th>
                                </tr>
                            </thead>
                            <tbody role="rowgroup" >
                                <?php foreach ($designation as $value) {?>
                                <tr role="row" >
                                    <td  class="designresponse"><?php echo $value->des_name;?></td>
                                    <td class="jsgrid-align-center designresponse">
                                        <button class="btn btn-primary" data-toggle="modal" data-target="#designation<?PHP echo $value->id; ?>"><i class="fas fa-edit"></i></button>
																											    <div class="modal fade" id="designation<?PHP echo $value->id; ?>" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title"><img src="<?php echo base_url(); ?>/assets/img/icons/designation.png" alt="material.png" style="width: 32px;margin-right: 10px;"/>Edit Designation</h4>
        </div>
        <div class="modal-body">
		     <form method="post" action="<?php echo base_url();?>organization/Update_des" enctype="multipart/form-data">
				<div class="form-body">
					<div class="row ">
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label"><img src="<?php echo base_url(); ?>/assets/img/icons/designation.png" alt="material.png" style="width: 32px;margin-right: 10px;"/>Designation Name</label>
								<input type="text" name="designation" id="firstName" value="<?php  echo $value->des_name;?>" class="form-control charrestrict" placeholder="">
								<input type="hidden" name="id" value="<?php  echo $value->id;?>">
							</div>
						</div>
						<!--/span-->
					</div>
					<!--/row-->
				</div>
				<div class="form-actions">
					<button type="submit" class="btn btn-primary"> <i class="fa fa-check"></i> Save</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				</div>
			</form>
      </div>
      
    </div>
  </div>
  </div>
              
                                        <a onclick="return confirm('Are you sure to delete this data?')"  href="<?php echo base_url();?>organization/des_delete/<?php echo $value->id;?>" title="Delete" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>
		
                    </div>
					
                </div>
            </div>
        </div>
    </div>
<?php $this->load->view('backend/footer'); ?>   