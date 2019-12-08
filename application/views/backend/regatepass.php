<?php $this->load->view('backend/header'); ?> 
        <div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block mobilehide" href="../index.html"><img src="../assets/img/icons/mainmaterial2.png" alt="material.png" id="material"/>MATERIAL OUTWARD</a>
        <a  class="menu1 menuhide"  href="<?php echo base_url(); ?>Security/stockout_view"><i class="fas fa-home fa-lg iconcss"></i>Home</a>
	    <a href="<?php echo base_url(); ?>Security/stockout_form" class="menu2 menuhide"><i class="fa fa-plus iconcss" aria-hidden="true"></i>Add</a>
		<a class="menu3 menuhide"  href="<?php echo base_url(); ?>Security/stockout_report"><i class="fa fa-file iconcss" aria-hidden="true"></i>Report</a>	       
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
    </div>
    <div class="container-fluid mt--7" id="bgcontain">
	   <h1>Materials List</h1>
      <!-- Table -->
          
          <div class="card shadow" class="ele1">
            <div class="card-header border-0" >
              <h3 class="mb-0" style="font-weight: 900;color: white;"><img src="../assets/images/poc.jpg" alt="gatepass.png" id="materialdub" style=" margin-right: 8% !important;"/>REQUEST FORM FOR RETURNABLE  /  NON RETURNABLE GATE PASS<span style="margin-right: 0px;margin-left: 11%;">+<i class="fas fa-envelope" data-toggle="modal" data-target="#addemail"></i></span><i class="fas fa-closed-captioning" data-toggle="modal" data-target="#Matclose" style=" margin-left: 9px;"></i></h3>
			    	<div class="modal fade" id="Matclose" role="dialog">
												<div class="modal-dialog">
												
												  <!-- Modal content-->
												  <div class="modal-content">
													<div class="modal-header">
													  <h4 class="modal-title" style="margin-left: 186px !important;"><img src="../assets/img/icons/closure.png" alt="closure.png" id="material"/>Material Closure</h4>
													</div>
													<div class="modal-body">
                                                        <form method="post" action="<?php echo base_url(); ?>security/stockout_remark">
													    <input type="mid" name="mid" value="<?php echo $materialin[0]->id; ?>" hidden />
                                                        <div class="form-group">
                                                         
                                                           <input type="text" name="remark" class="form-control" placeholder="Remark" /> 
                                                        </div>
                                                        <div class="form-group">
                                                         
                                                        	<select   class=" form-control"  tabindex="1" name="status" required>
																<option value="Opened">Opened</option>
																<option value="Closed">Closed </option>
															</select> 
                                                         </div> 
                                                         <div class="form-group"> 
                                                            <input type="submit" name="submit" class="btn btn-primary" value="Submit" style="width: 116.991422px;margin-left: 149px;"/>                                                  
                                                            <button type="button" class="btn btn-default" data-dismiss="modal" style="width: 77.991422px;">Close</button>
                                                         </div> 
                                                        </form>
												    </div>
												  
												</div>
											  </div>
                                        </div>
    <div class="modal fade" id="addemail" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title"><img src="../assets/img/icons/addemail.png" alt="material.png" id="material"/>AddOn Email</h4>
        </div>
        <div class="modal-body">
            <form>
			   <table class="table table-bordered">
				
					    <tr>
						   <td>
						        <select class=" form-control level1"  tabindex="1" name="level1" disabled>
								 <option value="">Select email</option>
							      <?php
							         foreach($employee as $value)
							        {
						                   ?>
								 
									     <option value="<?php echo $value->em_id ?>" <?php if($value->em_id==$materialin[0]->email1){ echo "selected"; }?>><?php echo $value->em_id."-".$value->first_name ?></option>
								 
						                 <?php
							        }
							     ?>
							    </select>
						   </td>
						   <td class="levellabel">Level1</td>
						   <td>
						      <button class="btn btn-primary editbtn l1edit"><i class="fa fa-edit"></i></button>
							  <button class="btn btn-primary editbtn e1save" data-value="<?php echo $materialin[0]->id ?>"><i class="fas fa-save"></i></button>
						</td>
						</tr>
						 <tr>
						   <td>
						        <select class=" form-control level2"  tabindex="1" name="level2" disabled>
								 <option value="">Select email</option>
							      <?php
							         foreach($employee as $value)
							        {
						                   ?>
								 
									     <option value="<?php echo $value->em_id ?>" <?php if($value->em_id==$materialin[0]->email3){ echo "selected"; }?>><?php echo $value->em_id."-".$value->first_name ?></option>
								 
						                 <?php
							        }
							     ?>
							    </select>
						   </td>
						   <td class="levellabel">Level2</td>
						   <td>
						      <button class="btn btn-primary editbtn l2edit"><i class="fa fa-edit"></i></button>
							  <button class="btn btn-primary editbtn e2save" data-value="<?php echo $materialin[0]->id ?>"><i class="fas fa-save"></i></button>
						   </td>
						</tr>
						 <tr>
						   <td>
						       <select class=" form-control level3"  tabindex="1" name="level3" disabled>
							    <option value="">Select email</option>
							      <?php
							         foreach($employee as $value)
							        {
						                   ?>
								 
									     <option value="<?php echo $value->em_id ?>" ><?php echo $value->em_id."-".$value->first_name ?></option>
								 
						                 <?php
							        }
							     ?>
							    </select>
						   </td>
						   <td class="levellabel">Level3</td>
						   <td>
						      <button class="btn btn-primary editbtn l3edit"><i class="fa fa-edit"></i></button>
							  <button class="btn btn-primary editbtn e3save" data-value="<?php echo $materialin[0]->id ?>"><i class="fas fa-save"></i></button>
							</td>
						</tr>
						
					</table>
					 <button type="button" class="btn btn-default" data-dismiss="modal" style="
    margin-top: 13px;
    margin-left: 238px;
">Close</button>
			</form>
      </div>
      
    </div>
  </div>
		   </div>
            <div class="card-body">
			    <hr class="hr1">
			    <div class="frto" style="width:826px !important;">
					<div class="from" style="width: 215px  !important;margin-right: 414px  !important;">
						<div> 
							<p>FROM : <?php echo $basicinfo->first_name; ?></p>
						</div>
						<div>
							<p>DEPT : <?php echo "Logistic"; ?></p>
						</div>
					</div>
					<div class="to">
						<div> 
							<p>TO DEPT : <?php echo $materialin[0]->to_em;  ?></p>
						</div>
						
					</div>
				</div>
				<hr class="hr2">
				<p>Please arrange a gate pass for the below mentioned item / part  to the below </p>
				<p>Address : </p>
				<p><?php echo $materialin[0]->organization_address; ?></p>
				<hr>
				 <table class="table table-bordered">
					       <tr>
						       <th>Sno</th>
							   <th>Material</th>
							   <th>GateIn</th>
							   <th>GateOut</th>
						   </tr>
				    <?php
					$count=0;
				     foreach($materialpart as $value)
					  {
						  $count=$count+1;
					?> 
					  
						   <tr>
						       <td><?php echo $count; ?></td>
							   <td><?php echo $value->particulars; ?></td>
							   <td><button class="btn btn-success outgatein buttonsizing"  data-toggle="modal" data-target="#gateindet"><img src="<?php echo base_url(); ?>assets/img/icons/forbidden.png" alt="forbidden.png" id="forbidden"/></button></td>
							   <td><button class="btn btn-success outgateout buttonsizing" data-toggle="modal" data-target="#gateoutdet" ><img src="<?php echo base_url(); ?>assets/img/icons/forbidden.png" alt="forbidden.png" id="forbidden"/></button></td>
					        </tr>
					<?php
					  }
					  ?>
				</table>
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addmat" style="
    margin-top: 11px;
">+ Add</button>
				<div class="modal fade" id="addmat" role="dialog">
												<div class="modal-dialog">
												
												  <!-- Modal content-->
												  <div class="modal-content">
													<div class="modal-header">
													  <h4 class="modal-title" style="margin-left: 186px !important;"><img src="../assets/img/icons/addmaterial.png" alt="material.png" style="width: 30px;margin-right: 7px;"/>Add Material</h4>
													</div>
													<div class="modal-body">
                                                        <form method="post" action="<?php echo base_url(); ?>security/stockout_updatematerials">
													    <input type="mid" name="mid" value="<?php echo $materialin[0]->id; ?>" hidden />
                                                        			<div class="form-group" style="
    margin-left: 115px;
">
					    <p style="
    margin-left: 72px;
">Material list  capture</p>
						<input type="text" name="matimg" class="matimg" />
						<div id="my_camera2"></div>
						<div id="results2" ></div>
						<div class="cambut" style="
    margin-left: 91px;
">
							<button class="btn btn-primary takesnap2"   onClick="take_snapshot2()"><i class="fas fa-camera"></i></button>
							<button class="btn btn-danger resetcam2"><i class="fas fa-undo"></i></button>
							<input type=button class="btn btn-primary savesnap2"  value="Save Snapshot" onClick="saveSnap2()" hidden >
						</div>
					</div>
					<script type="text/javascript" src="<?php echo base_url(); ?>assets/webcamjs/webcam.min.js"></script>
					
					<script language="JavaScript">
						Webcam.set({
							width: 320,
							height: 240,
							image_format: 'jpeg',
							jpeg_quality: 90,
							
						});
						Webcam.attach( '#my_camera2' );
					</script>
						<!-- Code to handle taking the snapshot and displaying it locally -->
	<script language="JavaScript">


 function take_snapshot2() {
  
  // take snapshot and get image data
  Webcam.snap( function(data_uri) {
  // display results in page
  document.getElementById('results2').innerHTML = 
   '<img id="imageprev" src="'+data_uri+'"/>';
  } );

 
 }



function saveSnap2(){
 // Get base64 value from <img id='imageprev'> source
 var base64image = document.getElementById("imageprev").src;

 Webcam.upload( base64image, '<?php echo base_url(); ?>security/imageupload', function(code, text) {
  console.log('Save successfully');
  $(".matimg").val(text);
  console.log(text);
 });

}
</script>
                                                         <div class="form-group"> 
                                                            <input type="submit" name="submit" class="btn btn-primary" value="Submit" style="width: 95.991422px;margin-left: 165px;"/>                                                  
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                         </div> 
                                                        </form>
												    </div>
												  
												</div>
											  </div>
                                        </div>
				<hr>
					<p style="font-size: 13px;">Reason for sending :&nbsp&nbsp&nbsp&nbsp<?php echo $materialin[0]->reason; ?></p>
					<p style="font-size: 13px;">Approx Value of goods: Rs. :&nbsp&nbsp&nbsp&nbsp<?php echo $materialin[0]->approx_value; ?></p>
					<div class="approvals" style="display:inline-flex">
					    <div class="requested">
						    <p style="font-size: 13px;">Requested By</p>
						    <p style="font-size: 13px;">Name : test</p>
							<p style="font-size: 13px;">Emid : <?php echo $id ?></p>
						</div>
						<div class="checked45">
						     <p style="font-size: 13px;">Checked By</p>
							 <p style="font-size: 13px;">Department-Manager</p>
						</div>
						<div class="approved">
						     <p style="font-size: 13px;">Approved By</p>
							 <p style="font-size: 13px;">Operations Manager</p>
						</div>
					</div>
				<hr>
				 <p style="font-size: 13px;"><u>FOR WAREHOUSE USAGE</u></p>
				 <p style="font-size: 13px;">Gate Pass No : <?php
		    if($materialin[0]->approve1=="" || $materialin[0]->approve2=="" || $materialin[0]->approve3=="")
			{
				echo "Pending";
			}
			?>
</p>
				  <p style="
    font-size: 13px;
">Gate Pass Date : <?php
		    if($materialin[0]->approve1=="" || $materialin[0]->approve2=="" || $materialin[0]->approve3=="")
			{
				echo "Pending";
			}
			?></p>
				<hr>
<?php
		    if($this->session->userdata('designation')=="15" || $this->session->userdata('designation')=="16" )
			{
				 
		    ?>
			    
				
				 <input type="submit" value="Approve"  class="btn btn-primary outapprove" name="approve" style="width: 204.977496px;margin-bottom: 10px;" data-value="<?php echo $materialin[0]->id ?>" />
				
				 <input type="submit" value="Reject" class="btn btn-danger outreject" name="reject" style="width: 204.977496px;margin-bottom: 10px;" data-value="<?php echo $materialin[0]->id ?>"/>
				 
	
<?php
}
?>
<?php
		    if($materialin[0]->approve1!="" && $materialin[0]->approve2!="" && $materialin[0]->approve3!="")
			{
			?>	
			
		    <input type="submit" value="Generate Pass" class="btn btn-primary" name="submit" style="
    width: 204.977496px;
    margin-bottom: 10px;
"/>				
		<?php
	}
			?>		
      <div class="modal fade" id="gateindet" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
		  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/inputs.css" />
            <h4 class="modal-title"><img src="../assets/img/icons/transportation.png" alt="material.png" id="material" style="margin-right: 19px;"/>Transportation Details</h4>
        </div>
        <div class="modal-body">
            <form style="margin-left: 120px;">
				<div class="form-group">
						
						 	<input type="text" name="imgname" class="images" required />
							<div id="my_camera"></div>
							<div id="results" ></div>
							<div class="cambut" style="margin-left: 100px;">
								<button class="btn btn-primary takesnap"   onClick="take_snapshot()"><i class="fas fa-camera"></i></button>
                               <button class="btn btn-danger resetcam"><i class="fas fa-undo"></i></button>
								<input type=button class="btn btn-primary savesnap"  value="Save Snapshot" onClick="saveSnap()" hidden >
							</div>
				
							

	</div>
                       <div class="form-group">
						     <select name="mode" class="form-control mode" style="width: 302.991422px;margin-left: 0px;">
							    <option name="Vechicle">Vehicle</option>
							    <option name="Onhand">Onhand</option>
							 </select>
						 </div>
						<div class="form-group vechicletypes">
							<select name="Vtype" class="form-control selectsearch">
								<option>Vechicle type</option>
								<option value="singleunit">Single unit</option>
								<option value="singletraior">Single trailor</option>
								<option value="multitrailor">Multi trailor</option>
								<option value="semitrailor">Semi trailor</option>
								<option value="passengercar">Passenger cars</option>
								<option value="motorcycle">Motorcycle</option>
							</select>
						</div>
						<div class="form-group">
							<div class="group">      
							  <input type="text" name="vechNo" required>
							  <span class="highlight"></span>
							  <span class="bar"></span>
							  <label class="vechicleno">Vechicle No<span style="color:red !important">*</span></label>
						     </div>								
						</div>
						 <div class="form-group">
							<div class="group">      
							  <input type="text" name="Dname" class="charrestrict" maxlength="10" required>
							  <span class="highlight"></span>
							  <span class="bar"></span>
							  <label class="dname">Driver Name<span style="color:red !important">*</span></label>
						    </div>								
						</div>
						<div class="form-group">
							<div class="group">      
							  <input type="text" name="Dphone" class="norestrict" maxlength="10" required>
							  <span class="highlight"></span>
							  <span class="bar"></span>
							  <label class="dphones">Driver Phone<span style="color:red !important">*</span></label>
						     </div>								
						</div>
						<div class="form-group cour" style="display:none">
							<div class="group">      
							  <input type="text" name="Cour">
							  <span class="highlight"></span>
							  <span class="bar"></span>
							  <label>Courier<span style="color:red !important">*</span></label>
						    </div>								
						</div>
						
						<div class="form-group"> 
														<input type="submit" name="submit" class="btn btn-primary" value="Submit" style="
    width: 86.991422px;
    margin-left: 62px;
"/>                                                  
														<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
													 </div>
			</form>
      </div>
      
    </div>
  </div>
		   </div>			
		         <div class="modal fade" id="gateoutdet" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
		  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/inputs.css" />
            <h4 class="modal-title"><img src="../assets/img/icons/transportation.png" alt="material.png" id="material" style="margin-right: 19px;"/>Transportation Details</h4>
        </div>
        <div class="modal-body">
            <form style="margin-left: 140px;">
				<div class="form-group">
						
						 	<input type="text" name="imgname" class="images" required />
							<div id="my_camera3"></div>
							<div id="results" ></div>
							<div class="cambut" style="margin-left: 100px;">
								<button class="btn btn-primary takesnap"   onClick="take_snapshot()"><i class="fas fa-camera"></i></button>
                               <button class="btn btn-danger resetcam"><i class="fas fa-undo"></i></button>
								<input type=button class="btn btn-primary savesnap"  value="Save Snapshot" onClick="saveSnap()" hidden >
							</div>
									<script type="text/javascript" src="<?php echo base_url(); ?>assets/webcamjs/webcam.min.js"></script>
					
					<script language="JavaScript">
						Webcam.set({
							width: 320,
							height: 240,
							image_format: 'jpeg',
							jpeg_quality: 90,
							
						});
						Webcam.attach( '#my_camera3' );
					</script>
	             </div>
                       <div class="form-group">
						     <select name="mode" class="form-control mode" style="width: 302.991422px;margin-left: 0px;">
							    <option name="Vechicle">Vehicle</option>
							    <option name="Onhand">Onhand</option>
							 </select>
						 </div>
						<div class="form-group vechicletypes">
							<select name="Vtype" class="form-control selectsearch">
								<option>Vechicle type</option>
								<option value="singleunit">Single unit</option>
								<option value="singletraior">Single trailor</option>
								<option value="multitrailor">Multi trailor</option>
								<option value="semitrailor">Semi trailor</option>
								<option value="passengercar">Passenger cars</option>
								<option value="motorcycle">Motorcycle</option>
							</select>
						</div>
						<div class="form-group">
							<div class="group">      
							  <input type="text" name="vechNo" required>
							  <span class="highlight"></span>
							  <span class="bar"></span>
							  <label class="vechicleno">Vechicle No<span style="color:red !important">*</span></label>
						     </div>								
						</div>
						 <div class="form-group">
							<div class="group">      
							  <input type="text" name="Dname"class="charrestrict" maxlength="10" required>
							  <span class="highlight"></span>
							  <span class="bar"></span>
							  <label class="dname">Driver Name<span style="color:red !important">*</span></label>
						    </div>								
						</div>
						<div class="form-group">
							<div class="group">      
							  <input type="text" name="Dphone" class="norestrict" maxlength="10" required>
							  <span class="highlight"></span>
							  <span class="bar"></span>
							  <label class="dphones">Driver Phone<span style="color:red !important">*</span></label>
						     </div>								
						</div>
						<div class="form-group cour" style="display:none">
							<div class="group">      
							  <input type="text" name="Cour">
							  <span class="highlight"></span>
							  <span class="bar"></span>
							  <label>Courier<span style="color:red !important">*</span></label>
						    </div>								
						</div>
						
					<div class="form-group"> 
														<input type="submit" name="submit" class="btn btn-primary" value="Submit" style="
    width: 86.991422px;
    margin-left: 62px;
"/>                                                  
														<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
													 </div>
			</form>
      </div>
      
    </div>
  </div>
		   </div>
		   <!-- Webcam.min.js -->
		 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		  
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/webcamjs/webcam.min.js"></script>

	<!-- Configure a few settings and attach camera -->
	<script language="JavaScript">
		Webcam.set({
			width: 320,
			height: 240,
			image_format: 'jpeg',
			jpeg_quality: 90,
			
		});
		Webcam.attach( '#my_camera' );
	</script>
	<script language="JavaScript">
		Webcam.set({
			width: 320,
			height: 240,
			image_format: 'jpeg',
			jpeg_quality: 90,
			
		});
		Webcam.attach( '#my_camera2' );
	</script>
	<!-- A button for taking snaps -->
	
	<!-- Code to handle taking the snapshot and displaying it locally -->
	<script language="JavaScript">

 function take_snapshot() {
  
  // take snapshot and get image data
  Webcam.snap( function(data_uri) {
  // display results in page
  document.getElementById('results').innerHTML = 
   '<img id="imageprev" src="'+data_uri+'"/>';
  } );

 
 }


function saveSnap(){
 // Get base64 value from <img id='imageprev'> source
 var base64image = document.getElementById("imageprev").src;

 Webcam.upload( base64image, '<?php echo base_url(); ?>security/imageupload', function(code, text) {
  console.log('Save successfully');
  $(".images").val(text);
  console.log(text);
 });

}


}

	</script>
		    <a href="<?php echo base_url(); ?>security/stockoutgenerate?I=<?php echo base64_encode($value->id); ?>" class="btn btn-primary " >Generate</a>
				<button class="print-link no-print btn btn-success" onclick="jQuery('.ele1').print()">
                                        Print
                </button>
            </div>
          </div>
        </div>
	
<?php $this->load->view('backend/footer'); ?> 