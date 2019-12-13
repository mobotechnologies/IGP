<?php $this->load->view('backend/header'); ?>    
 <div class="main-content">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/inputs.css" />
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
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
    <div class="container-fluid mt--7 visittabs" id="bgcontain">
      <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header border-0 gatepassheader" >
              <h3 class="mb-0"><img src="../assets/img/icons/gatepass.png" alt="gatepass.png" style="width: 50px;"/>Gate pass form</h3>
			
            </div>
			<div class="card-body stockinsform">
            <form method="post" action="<?php echo base_url(); ?>Security/stockin_insert" class="stockinformvalid" autocomplete="off">
					<div class="tab">		
						 
      <div class="form-group">
        <span style="color:red !important;float:right">*</span>
        <input type="text" placeholder="Invoice no" name="invoiceno" id="invoiceno" class="form-control form-control-alternative" required />
      </div>
    						
						<div class="form-group">
					       <span style="color:red !important;float:right">*</span>
					       <input  class="form-control form-control-alternative" name="invoicedate" placeholder="Select invoice date" type="date" required>
					
					    </div>
						<div class="form-group">
  
							<select name="vendor"  class="selectsearch form-control ">
						        <option value="Lica">Select Vendor</option>
								 <?php
							foreach($vendor as $value)
							{
						 ?>
								 
									 <option value="<?php echo $value->vendor ?>"><?php echo $value->vendor ?></option>
								 
						 <?php
							}
							?>
							</select>
							
				
						</div>
					</div>
					<div class="tab">
								
						<div class="form-group">
					       <span style="color:red !important;float:right">*</span>
					       <input  class="form-control form-control-alternative charrestrict" name="purpose" maxlength="10" placeholder="Purpose" type="text" >
						
					    </div>
						<div class="form-group">
							<select   class=" form-control custom-select"  tabindex="1" name="Type" required>
								<option value="">Select MaterialType</option>
								<option value="service">service parts</option>
								<option value="spare_parts">spare parts </option>
								<option value="raw_material">raw material </option>
								
							</select>
					   </div>
					
					
						<div class="form-group">
							<input type="text" class="form-control" name="Destination" value="Poclain Hydraulics/Poclain Power Train"  />
                            <p style="float: right;font-size: 10px;color: red;"> Destination</p>
						</div>
						
						
					</div>
					<div class="tab">
					    <div class="form-group">
						    <table class="table table-bordered" id="particules">
							     <tr>
								    <th>Particules</th>
									<th>Quantity</th>
									<th>Action</th>
								 </tr>
								 <tr class="part1" id="1">
								    <td><input type='text' name='particules[]' class='parti charrestrict' placeholder='particules'/></td>
									<td><input type='text' name='quantity[]' class='quanti norestrict'  placeholder='quantity'/></</td>
									<td><button class='btn btn-success add'>+</button></td>
								 </tr>
							</table> 
						</div>
					</div>
					<div class="tab">
					    <div class="form-group">
							 <p>Material list  capture</p>
							    	<input type="file" accept="image/*" name="matimg" capture="camera" class="hidedrop"/>
                              	<input type="text" class="mobilehide" name="matimg" class="matimg" />
								<div id="my_camera2" class="mobilehide"></div>
								<div id="results2"   class="mobilehide"></div>
								<div class="cambut mobilehide" >
									<button class="btn btn-primary takesnap2"   onClick="take_snapshot2()"><i class="fas fa-camera"></i></button>
								    <button class="btn btn-danger resetcam2"><i class="fas fa-undo"></i></button>
									<input type=button class="btn btn-primary savesnap2"  value="Save Snapshot" onClick="saveSnap2()" hidden >
								</div>
					    </div>
					</div>
					<div class="tab">
					     <div class="form-group">
						     <select name="mode" class="form-control mode">
							    <option name="Vechicle">Vehicle</option>
							    <option name="Onhand">Onhand</option>
							 </select>
						 </div>
						<div class="form-group vechicletypes">
							<select name="Vtype" class="form-control">
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
							  <input type="text" class="norestrict" name="Dphone" maxlength="10" required>
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
						
					</div>

					<div class="tab">
						<div class="form-group">
						  <p><span style="color:red !important">*</span>Note : Image is mandatory</p>
						  <input type="file" accept="image/*" name="matimg" capture="camera" class="hidedrop"/>
						 	<input type="text" name="imgname" class="images mobilehide"/>
							<div id="my_camera"  class="mobilehide"></div>
							<div id="results"   class="mobilehide"></div>
							<div class="cambut mobilehide">
								<button class="btn btn-primary takesnap"   onClick="take_snapshot()"><i class="fas fa-camera"></i></button>
                               <button class="btn btn-danger resetcam"><i class="fas fa-undo"></i></button>
								<input type=button class="btn btn-primary savesnap"  value="Save Snapshot" onClick="saveSnap()" hidden >
							</div>
							
		<!-- Webcam.min.js -->
		  <script>
				  $( function() {
					$( ".datepicker" ).datepicker();
				  } );
				  </script>
	<script src="<?php echo base_url(); ?>assets/jquery/jquery-3.4.1.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/webcamjs/webcam.min.js"></script>

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
 function take_snapshot2() {
  
  // take snapshot and get image data
  Webcam.snap( function(data_uri) {
  // display results in page
  document.getElementById('results2').innerHTML = 
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
	
						</div>
						<div class="form-group">
						  
							<select name="check" class="selectsearch form-control">
							    <option>Checked by</option>
							   	 <?php
							foreach($checkedby as $value)
							{
						 ?>
								 
									 <option value="<?php echo $value->checkedby ?>"><?php echo $value->checkedby ?></option>
								 
						 <?php
							}
							?>
							</select>
							<input type="submit" name="submit" class="btn btn-primary subm" value="submit" style="margin-top: 17px;"/>
						</div>		
					</div>
					
				    <div style="overflow:auto;">
						<div style="float:right;">
						  <button type="button" class="btn btn-primary" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
						  <button type="button" class="btn btn-primary" id="nextBtn" onclick="nextPrev(1)">Next</button>
						</div>
				    </div>
			     <!-- Circles which indicates the steps of the form: -->
				  <div style="text-align:center;margin-top:40px;">
					<span class="step"></span>
					<span class="step"></span>
					<span class="step"></span>
					<span class="step"></span>
				  </div>
			</form>
            </div>
          </div>
        </div>
      </div>
	   <script src="<?php echo base_url(); ?>assets/jquery/select2-develop/dist/js/select2.min.js"></script>
<?php $this->load->view('backend/footer'); ?> 