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
      <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header border-0" style="background: black;">
              <h3 class="mb-0" style="font-weight: 900;color: white;"><img src="../assets/img/icons/gatepass.png" alt="gatepass.png" id="material"/>VISITOR PASS</h3>
            </div>
            <div class="table-responsive">
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
					   <td style="width:50%;padding-left: 77px;">Pass No   : <?php  echo rand(); ?></td>
					   <td style="width:50%;padding-left: 77px;">Validity : <?php echo date("Y-m-d"); ?></td>
					</tr>
					<tr>
					   <td style="width:50%"><img src="<?php echo base_url(); ?>assets/photo/uploads/original/<?php echo $visitor[0]->identity_proof; ?>"  style="width: 154px;margin-top: 10px;margin-left: 142px;margin-bottom: 26px;"/></td>
					   <td style="width:50%">
							<table  style="width:100%">
								<tr>
								   <td>Name</td>
								   <td>:</td>
								   <td><?php echo $visitor[0]->name; ?></td>
								</tr>
								<tr>
								   <td>To meet</td>
								   <td>:</td>
								   <td><?php echo $visitor[0]->meeting_to; ?></td>
								</tr>
								<tr>
								   <td>Purpose</td>
								   <td>:</td>
								   <td><?php echo $visitor[0]->purpose;?></td>
								</tr>
								<tr>
								   <td>Department</td>
								   <td>:</td>
								   <td><?php echo $visitor[0]->department; ?></td>
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
        </div>
		<div class="col">
		     <button class="print-link no-print btn btn-success" onclick="jQuery('.ele1').print()">
                                        Print
            </button>
		</div>
</div>
	</body>
</html>
<?php $this->load->view('backend/footer'); ?> 