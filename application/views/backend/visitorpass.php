<html>
     <head>
	      <link rel="stylesheet" href="<?php echo base_url();  ?>assets/bootstrap/css/bootstrap.min.css">
          <script src="<?php echo base_url(); ?>assets/jqueryvalid/lib/jquery.js"></script>     
          <script src="<?php echo base_url();  ?>assets/bootstrap/js/bootstrap.min.js"></script>
	</head>
	<body>
  <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">  
    </div>
    <div class="container-fluid mt--7" id="bgcontain">
      <!-- Table -->
      
        <div class="card shadow">
            <div class="table-responsive">
 <!--<div class="table-responsive">-->
                      
		   <table border="1" id="customers" class="ele2"> 
                <tbody>
                    <tr>
						<td style="width:50%;padding-left: 62px;">
						   
							     <img src="<?php echo base_url(); ?>assets/images/poc.jpg"  id="printTable" /></br>
							
						</td>
						<td style="width:50%">
							 <p style=" font-size: 12px;font-weight: 900;margin-top: 11px;margin-left: 25px;">
								<span style="color:blue">POCLAIN HYDRAULICS PVT LTD</span></br>
								No: 131 / 2, Kothapurinatham Road
								Mannadipet Commune Panchayat
								Thiruvandarkoil
								PONDICHERRY -  605 102
								INDIA

								Tel.: +91 413 2641455
							</p>
						</td>
					</tr>
					<tr>
					   <td style="width:50%;padding-left: 77px;">Pass No   : <?php  echo $visitor["passno"]; ?></td>
					   <td style="width:50%;padding-left: 77px;">Validity : <?php echo date("Y-m-d"); ?></td>
					</tr>
					<tr>
					   <td style="width:50%"><img src="<?php echo base_url(); ?>assets/upload/<?php echo trim($visitor['identity_proof']," "); ?>"  style="width: 154px;margin-top: 10px;margin-left: 142px;margin-bottom: 26px;"/></td>
					   <td style="width:50%">
							<table  style="width:100%">
								<tr>
								   <td>Name</td>
								   <td>:</td>
								   <td><?php echo $visitor["name"]; ?></td>
								</tr>
								<tr>
								   <td>To meet</td>
								   <td>:</td>
								   <td><?php echo $visitor["meeting_to"]; ?></td>
								</tr>
								<tr>
								   <td>Purpose</td>
								   <td>:</td>
								   <td><?php echo $visitor["purpose"];?></td>
								</tr>
								<tr>
								   <td>Validity</td>
								   <td>:</td>
								   <td><?php echo date("Y-m-d"); ?></td>
								</tr>
							</table>
					   </td>
					</tr>					 
                </tbody>
              </table>
            </div>

          </div>
      
		     <button class="print-link no-print btn btn-success" onclick="jQuery('.ele1').print()" style="margin-left: 47%;margin-top: 5%;margin-bottom: 5%;">
                                        Print
            </button>
</div>
	</body>
</html>
<?php $this->load->view('backend/footer'); ?> 