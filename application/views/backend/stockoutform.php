<?php $this->load->view('backend/header'); ?>    
 <div class="main-content">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/inputs.css" />
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
          <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block mobilehide" href="../index.html"><img src="../assets/img/icons/mainmaterial2.png" alt="material.png" id="material"/>MATERIAL OUTWARD</a>
        <a  class="menu1 menuhide"  href="<?php echo base_url(); ?>Security/stockout_view"><i class="fas fa-home fa-lg iconcss"></i>Home</a>
	    <a href="<?php echo base_url(); ?>Security/stockout_form" class="menu2 menuhide"><i class="fa fa-plus iconcss" aria-hidden="true"></i>Request_form</a>
		<a class="menu3 menuhide"  href="<?php echo base_url(); ?>Security/stockout_report"><i class="fa fa-file iconcss" aria-hidden="true"></i>Report</a>		       
        <!-- Form -->
        <form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto" >
          
        </form>
        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
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
              <h3 class="mb-0"><img src="../assets/img/icons/gatepass.png" alt="gatepass.png" style="width: 50px;"/>GATE PASS REQUEST FORM</h3>
              
			</div>
			<div class="card-body stockinsform2">
            <form method="post" action="<?php echo base_url(); ?>Security/stockout_insert">
				<div class="tab">			
					<div class="form-group"> 
					     <p>To</p>
					  	 <input type="text" name="to" class="form-control" value="Logistic"  />
					</div>
					<div class="form-group" style="display: flex;">
					    <p class="check4">Category1 <span style="color:red !important">*</span></p> 
						<div style="display: inline-flex;">
							<input type="checkbox" class="check" name="category1" value="Parts">Parts<br>
							<input type="checkbox"  class="check " name="category2" value="Mro">Mro<br>
						</div>
					</div>
					<div class="form-group" style="display:flex;">
					    <p class="check4" style="display: inherit;">Category2 <span style="color:red !important">*</span></p>
						<div style="display: inline-flex;">
						     <input type="checkbox" class="check" name="subcategory" value="OSP" style="margin-left: 3px;">OSP<br>
                             <input type="checkbox" class="check" name="subcategory" value="NONOSP" style="margin-left: 6px;">NONOSP<br>
						</div>
					</div>
					<div class="form-group"style="display: flex;">
					    <p>Type <span style="color:red !important">*</span></p>
						<div style="display: inline-flex;">
						    <input type="checkbox"  class="check check3 check2" name="type" value="RGP">RGP<br>
                            <input type="checkbox"   class="check check3" name="type" value="NRGP">NRGP<br>
						</div>
					</div>
					<div class="form-group rdate" style="display:none">
					   <p>Return data</p>
					   <input type="date" name="returndate"/>
				    </div>
				</div>
				<div class="tab">
                    <div class="form-group">
					     <p>Shipping Address<span style="color:red !important">*</span></p>
					    <textarea name="shippingaddress" class="form-control"></textarea>
					</div>
					<div class="form-group">
					    <p>Material list  capture</p>
						<input type="text" name="matimg" class="matimg" />
						<div id="my_camera2"></div>
						<div id="results2" ></div>
						<div class="cambut">
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
					    <div class="group">
					      <input type="text" name="reason" required>
						  <span class="highlight"></span>
						  <span class="bar"></span>
						  <label>Reason for sending<span style="color:red !important">*</span></label>
						</div>
					</div>
					<div class="form-group">
					    <div class="group">
					     <input type="text" name="approx_value" required>
						  <span class="highlight"></span>
						  <span class="bar"></span>
						  <label>Approx value for goods<span style="color:red !important">*</span></label>
						</div>
					</div>
					<div class="form-group">
					    <div class="group">
					     <input type="text" name="costcenter" required>
						  <span class="highlight"></span>
						  <span class="bar"></span>
						  <label>CostCenter<span style="color:red !important">*</span></label>
						</div>
					</div>
					<div class="form-group">
					    <input type="submit" class="btn btn-primary" name="submit" value="submit"/>
					</div>
				</div>
					<div style="overflow:auto;">
					<div style="float:right;">
					  <button type="button" class="btn btn-primary" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
					  <button type="button" class="btn btn-primary nextbutton" id="nextBtn" onclick="nextPrev(1)">Next</button>
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
<?php $this->load->view('backend/footer'); ?> 