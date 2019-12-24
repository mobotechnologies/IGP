<?php $this->load->view('backend/header'); ?>   
    <div class="main-content">
	<?php 
            $id = $this->session->userdata('user_login_id');
            $basicinfo = $this->employee_model->GetBasic($id); 
	?>
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block mat1 mobilehide" href="<?php echo base_url(); ?>dashboard/Dashboard"><img src="<?php echo base_url(); ?>/assets/img/icons/maindasboard.png" alt="material.png" id="material"/>Dashboard</a>
		<a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block menuhide" href="<?php echo base_url(); ?>security/stockin_view"><img src="../assets/img/icons/mainmaterial.png" alt="material.png" id="material"/>Inward</a>
	    <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block mat2 menuhide" href="<?php echo base_url(); ?>security/stockout_view"><img src="../assets/img/icons/mainmaterial2.png" alt="material.png" id="material"/>Outward</a>
		<a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block mat3 menuhide" href="<?php echo base_url();  ?>security/visitor_view"><img src="../assets/img/icons/mainvisit.png" alt="material.png" id="material"/>Visitor</a>
        <!-- Form -->
        <form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto">
      
        </form>
        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
			  <li class="nav-item dropdown">
          <a class=" nav-link-icon mobilehide mobilehide2" href="#" id="notification-icon" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"  onclick="myFunction()">
            <span id="notification-count">
			<?php 
			  $count=$this->security_model->countcomment();
			  echo $count;
			?></span><img src="<?php echo base_url(); ?>assets/images/notify.png" class="notifycssicon" style="width: 43px;"/>
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
                  <span class="mb-0 text-sm  font-weight-bold">  <?php 
					
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
      <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats -->
          <div class="row">

	    <?php
		    if($this->session->userdata('user_type')=="SECURITY"  || $this->session->userdata('user_type')=="ADMIN"  || $this->session->userdata('user_type')=="SUPER ADMIN")
			{
		    ?>
			<div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Outward Complete</h5>
                       <?php foreach ($outwardcomplete as $key6 => $val6){
                       $outcomp= $val6->outcomp;
                       
                      }?>
                      <span class="h2 font-weight-bold mb-0"><?php echo $outcomp;?></span>
                    </div>
                    <div class="col-auto">

                      <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                          <img src="../assets/img/icons/mainmaterial2.png" alt="material.png" id="material"/> 
                      </div>
                    </div>
                  </div>
				   <span style="font-size:10px;color:#2dce89;font-weight:900">Overall</span>
                </div>
              </div>
            </div>
		    <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h6 class="card-title text-uppercase text-muted mb-0">Outward Partial</h6>
                       <?php foreach ($outwardnotcomplete as $key7 => $val7){
                       $outnotcomp= $val7->outnotcomp;
                       
                      }?>
                      <span class="h2 font-weight-bold mb-0"><?php echo $outnotcomp;?></span>
                    </div>
                    <div class="col-auto">

                      <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                       <img src="../assets/img/icons/mainmaterial2.png" alt="material.png" id="material"/>
                      </div>
                    </div>
                  </div>
				   <span style="font-size:10px;color:#2dce89;font-weight:900">Overall</span>
                </div>
              </div>
          </div>
          <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Outward Pending</h5>
                       <?php foreach ($inwardpending as $key8 => $val8){
                       $pending= $val8->pending;
                       
                      }?>
                      <span class="h2 font-weight-bold mb-0"><?php echo $pending;?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                        <img src="../assets/img/icons/mainmaterial2.png" alt="material.png" id="material"/>
                      </div>
                      
                    </div>
                  </div>
				   <span style="font-size:10px;color:#2dce89;font-weight:900">Overall</span>
                </div>
              </div>
            </div>
		
		             <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                     <h5 class="card-title text-uppercase text-muted mb-0">Total Inward</h5>
                      <?php foreach ($inward as $key1 => $val1){
                       $inwardcount= $val1->inward;
                       
                      }?>
                      <span class="h2 font-weight-bold mb-0"><?php echo $inwardcount;?></span>
						
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                       <img src="../assets/img/icons/mainmaterial.png" alt="material.png" id="material"/>
                      </div>
                    </div>
                  </div>
				  <span style="font-size:10px;color:#2dce89;font-weight:900">Today</span>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Total Outward</h5>
                       <?php foreach ($outward as $key2 => $val2){
                       $outwardcount= $val2->outward;
                       
                      }?>
                      <span class="h2 font-weight-bold mb-0"><?php echo $outwardcount;?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                        <img src="../assets/img/icons/mainmaterial2.png" alt="material.png" id="material"/>
                      </div>
                      
                    </div>
                  </div>
				   <span style="font-size:10px;color:#2dce89;font-weight:900">Today</span>
                </div>
              </div>
            </div>
	<?PHP
			}
			?>
			 <?php
		    if($this->session->userdata('user_type')=="SECURITY"  || $this->session->userdata('user_type')=="	EMPLOYEE"  ||  $this->session->userdata('user_type')=="ADMIN"  || $this->session->userdata('user_type')=="SUPER ADMIN")
			{
		    ?>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Visitor</h5>
                       <?php foreach ($vistor as $key3 => $val3){
                       $vistorcount= $val3->vistor;
                       
                      }?>
                      <span class="h2 font-weight-bold mb-0"><?php echo $vistorcount;?></span>
                    </div>
                    <div class="col-auto">

                      <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                        <img src="../assets/img/icons/mainvisit.png" alt="material.png" id="material"/>
                      </div>
                    </div>
                  </div>
				   <span style="font-size:10px;color:#2dce89;font-weight:900">Today</span>
                </div>
              </div>
            </div>
     <?PHP
			}
			?>
            <?php
		    if($this->session->userdata('user_type')=="ADMIN"  || $this->session->userdata('user_type')=="SUPER ADMIN" || $this->session->userdata('user_type')=="EMPLOYEE" )
            {
            ?>
			            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Cab</h5>
                       <?php foreach ($cab as $key4 => $val4){
                       $cab= $val4->cab;
                       
                      }?>
                      <span class="h2 font-weight-bold mb-0"><?php echo $cab;?></span>
                    </div>
                    <div class="col-auto">

                      <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                      <img src="../assets/img/icons/maincab.png" alt="material.png" style="width: 30px;"/>
                      </div>
                    </div>
                  </div>
				   <span style="font-size:10px;color:#2dce89;font-weight:900">Today</span>
                </div>
              </div>
            </div>
			<div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Expense</h5>
                       <?php foreach ($expense as $key5 => $val5){
                       $expense= $val5->expense;
                       
                      }?>
                      <span class="h2 font-weight-bold mb-0"><?php echo $expense;?></span>
                    </div>
                    <div class="col-auto">

                      <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                       <img src="../assets/img/icons/mainexpense.png" alt="material.png" id="material"/>
                      </div>
                    </div>
                  </div>
				   <span style="font-size:10px;color:#2dce89;font-weight:900">Today</span>
                </div>
              </div>
            </div>
<?php
}
?>
          </div>
        </div>
      </div>
    </div>

    <div class="container-fluid mt--7">
	<div>
	     <div class="row" style="
    margin-bottom: 10px;
">
 <?php
		    if($this->session->userdata('user_type')=="SECURITY"  || $this->session->userdata('user_type')=="EMPLOYEE" || $this->session->userdata('user_type')=="ADMIN"  || $this->session->userdata('user_type')=="SUPER ADMIN")
			{
		    ?>
        <div class="col-md-12" style="margin-top: 16px;">
			<div class="card">
				<div class="card-body">
					<div class="chart " >
				      <canvas id="myChart"></canvas>
					</div>
 
  <script>
	   let myChart = document.getElementById('myChart').getContext('2d');
 var cData = JSON.parse('<?php echo $visit; ?>');

    // Global Options
    Chart.defaults.global.defaultFontFamily = 'Lato';
    Chart.defaults.global.defaultFontSize = 18;
    Chart.defaults.global.defaultFontColor = '#777';

    let massPopChart1 = new Chart(myChart, {
      type:'bar', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
	   responsive: true,
      data:{
        labels:['Jan', 'Feb', 'Mar', 'April', 'May', 'June','July','Aug','Sept','Oct','Nov','Dec'],
        datasets:[{
          label:'Total Visitor',
          data:cData.data,
          //backgroundColor:'green',
          backgroundColor:[
		    '#337ed7ba',
            '#337ed7ba',
            '#337ed7ba',
            '#337ed7ba',
            '#337ed7ba',
            '#337ed7ba',
            '#337ed7ba',
			'#337ed7ba',
            '#337ed7ba',
            '#337ed7ba',
            '#337ed7ba',
            '#337ed7ba',
            '#337ed7ba',
            '#337ed7ba'
          ],
          borderWidth:1,
          borderColor:'#777',
          hoverBorderWidth:3,
          hoverBorderColor:'#000'
        }]
      },
      options:{
        title:{
          display:true,
          text:'Visitor Yearly Report',
          fontSize:25
        },
        legend:{
          display:true,
          position:'right',
          labels:{
            fontColor:'#000'
          }
        },
        layout:{
          padding:{
            left:50,
            right:0,
            bottom:0,
            top:0
          }
        },
        tooltips:{
          enabled:true
        }
      }
    });
  
	 
  </script>
				</div>
			</div>
        </div>
        <?php
}
?>
      </div>

	  <div class="row ">
        <?php
		    if($this->session->userdata('user_type')=="EMPLOYEE" || $this->session->userdata('user_type')=="ADMIN" || $this->session->userdata('user_type')=="SUPER ADMIN")
            {
            ?>
	   <div class="col-md-12" style="margin-bottom: 10px;">
		   <div class="card " >
				<div class="card-body">
					<div class="chart">
				      <canvas id="myChart2"></canvas>
					</div>
                     <script>
    let myChart2 = document.getElementById('myChart2').getContext('2d');
    var cData = JSON.parse('<?php echo $cabcharts; ?>');
    // Global Options
    Chart.defaults.global.defaultFontFamily = 'Lato';
    Chart.defaults.global.defaultFontSize = 18;
    Chart.defaults.global.defaultFontColor = '#777';

    let massPopChart2 = new Chart(myChart2, {
      type:'bar', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
      data:{
        labels:['Accepted', 'Rejected'],
        datasets:[{
          label:'Accepted',
          data:cData.data,
          //backgroundColor:'green',
          backgroundColor:[
              '#337ed7ba',
              '#85B3d1FF'
          ],
          borderWidth:1,
          borderColor:'#777',
          hoverBorderWidth:3,
          hoverBorderColor:'#000'
        }]
      },
      options:{
        title:{
          display:true,
          text:'Cab Monthly Report',
          fontSize:25
        },
        legend:{
          display:true,
          position:'right',
          labels:{
            fontColor:'#000'
          }
        },
        layout:{
          padding:{
            left:50,
            right:0,
            bottom:0,
            top:0
          }
        },
        tooltips:{
          enabled:true
        }
      }
    });
                     </script>
				</div>
			</div>
		</div>
		
		<div class="col-md-12" style="margin-bottom: 10px;">
		 <div class="card ">
				<div class="card-body">
					<div class="chart">
				      <canvas id="myChart3" ></canvas>
					</div>
<script>
   let myChart3 = document.getElementById('myChart3').getContext('2d');
    var cData = JSON.parse('<?php echo $exp; ?>');
    // Global Options
    Chart.defaults.global.defaultFontFamily = 'Lato';
    Chart.defaults.global.defaultFontSize = 18;
    Chart.defaults.global.defaultFontColor = '#777';

    let massPopChart3 = new Chart(myChart3, {
      type:'bar', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
      data:{
        labels:['Accepted', 'Rejected'],
        datasets:[{
          label:'Accepted',
          data:cData.data,
          //backgroundColor:'green',
          backgroundColor:[
            
            '#337ed7ba',
            '#85B3d1FF'
          ],
          borderWidth:1,
          borderColor:'#777',
          hoverBorderWidth:3,
          hoverBorderColor:'#000'
        }]
      },
      options:{
        title:{
          display:true,
          text:'Expense Monthly Report',
          fontSize:25
        },
        legend:{
          display:true,
          position:'right',
          labels:{
            fontColor:'#000'
          }
        },
        layout:{
          padding:{
            left:50,
            right:0,
            bottom:0,
            top:0
          }
        },
        tooltips:{
          enabled:true
        }
      }
    });
</script>
				</div>
			</div>
		</div>
    <?php
}
?>
	  </div>
 
</div>
<?php $this->load->view('backend/footer'); ?>