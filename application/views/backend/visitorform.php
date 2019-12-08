<?php $this->load->view('backend/header'); ?>    
 <div class="main-content">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/inputs.css" />
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
    <div class="container-fluid mt--7 visittabs" id="bgcontain">
      <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header border-0 gatepassheader" >
                <h3 class="mb-0 hvisit"><img src="<?php echo base_url(); ?>assets/images/visitor.png" alt="home.png" style="width: 28px;margin-right: 6px;"/>VISITOR FORM</h3>
                 
		   </div>
			<div class="card-body stockinsform">
            <form method="post" action="<?php echo base_url(); ?>Security/visitor_insert" id="regForm" >
			    <div class="tab">
				    <h3 class="vheadings">Visitor Information</h3>
					    <div class="group">      
						  <input type="text" name="name" class="charrestrict" maxlength="10" required>
						  <span class="highlight"></span>
						  <span class="bar"></span>
						  <label>Name<span style="color:red !important">*</span></label>
						</div>
					<div class="form-group">
						<div class="group">      
						  <input type="text" name="email" required>
						  <span class="highlight"></span>
						  <span class="bar"></span>
						  <label>Email<span style="color:red !important">*</span></label>
						</div>
					</div>
					<div class="form-group">
						 <div class="group">      
						  <input type="text" name="phone" class="norestrict" maxlength="10" required>
						  <span class="highlight"></span>
						  <span class="bar"></span>
						  <label>Phone<span style="color:red !important">*</span></label>
						</div>
					</div>
					<div class="form-group">
					    <p>Address<span style="color:red !important">*</span></p>
						<textarea name="address" placeholder="address" class="form-control"></textarea>
					</div>
				</div>
				<div class="tab">
				      <h3 class="vheadings">Meeting Information</h3>
				    <div class="form-group">
						<div class="group">      
						  <input type="text" name="purpose"  maxlength="10" required>
						  <span class="highlight"></span>
						  <span class="bar"></span>
						  <label>Purpose<span style="color:red !important">*</span></label>
						</div>
					</div>
                    <div class="form-group">					
						<select class="form-control selectsearch" name="meet_to">
								 <?php
								foreach($employee as $value)
								{
							 ?>
									 
										 <option value="<?php echo $value->id ?>"><?php echo $value->first_name."-".$value->dep_name; ?></option>
									 
							 <?php
								}
								?>
						</select>
					</div>
					<div class="form-group">
					    <select name="accompanied" class="form-control" required >
							  <option>Accompanied</option>
							  <option>1</option>
							  <option>2</option>
							  <option>3</option>
							  <option>4</option>
							  <option>5</option>
						</select>
					</div>
				</div>
				<div class="tab">
				    <h3 class="vheadings">Material Aquistisation</h3>
				    <div class="form-group">
					   <p>Item Carried</p>
						<select class="form-control selectsearch" name="Item_car" >
							<option>Mobile</option>
							<option>Laptop</option>
							<option>Others</option>
						</select>
					</div>
					<div class="form-group">
					    <p>Item Deposited</p>
					    <select class="form-control selectsearch" name="Item_deposit" >
							<option>Mobile</option>
							<option>Laptop</option>
							<option>Others</option>
						</select>
					</div>
					<div class="form-group">
                        <p>Item Carried</p>
					    <select class="form-control selectsearch" name="Item_issue" >
							<option>Mobile</option>
							<option>Laptop</option>
							<option>Others</option>
						</select>
					</div>
				</div>
				<div class="tab">
				   <h3 class="vheadings">Organization Information</h3>
				    <div class="form-group">
					  <div class="group">      
						  <input type="text" name="organization" class="charrestrict" required>
						  <span class="highlight"></span>
						  <span class="bar"></span>
						  <label>Organization</label>
						</div>
					</div>
					<div class="form-group">
					 <div class="group">      
						  <input type="text" name="organphone" class="norestrict" maxlength="10" required>
						  <span class="highlight"></span>
						  <span class="bar"></span>
						  <label>Company Phone</label>
						</div>
					</div>
					<div class="form-group">
                        <div class="group">      
						  <input type="text" name="organaddress" required>
						  <span class="highlight"></span>
						  <span class="bar"></span>
						  <label>Company Address</label>
						</div>
					</div>
				</div>
				<div class="tab"> 
				    <p><span style="color:red !important">*</span>Note : Image is mandatory</p>
				    <input type="text" name="imgname"  class="images" />
				    <div id="my_camera"></div>
				    <div id="results" ></div>
					<div class="cambut">
	                   <input type=button class="btn btn-primary" value="Take Snapshot" onClick="take_snapshot()">
	                   <input type=button class="btn btn-primary" value="Save Snapshot" onClick="saveSnap()">
					</div>
					<input type="submit" class="btn btn-primary subm" name="submit" value="submit" />
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

	</script>
	
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