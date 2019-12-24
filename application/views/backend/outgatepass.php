<html>
     <head>
	      <link rel="stylesheet" href="<?php echo base_url();  ?>assets/bootstrap/css/bootstrap.min.css">
          <script src="<?php echo base_url(); ?>assets/jqueryvalid/lib/jquery.js"></script>     
          <script src="<?php echo base_url();  ?>assets/bootstrap/js/bootstrap.min.js"></script>
	</head>
	<body>
	    <div class="container" style="margin:auto">
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">  
    </div>
   
      <!-- Table -->

      
          <div class="card shadow ele1">
         
            <div class="table-responsive">
              <table class="table table-bordered" id="customers"> 
                <tbody>
				   <tr>
				        <td style="width:50%;" colspan="2">  
							<img src="<?php echo base_url(); ?>assets/images/poc.jpg"  id="printTable" /></br>	
							
						</td>
						<td colspan="3">
						   POCLAIN HYDRAULICS (P) LTD
						</td>
				   </tr>
                    <tr>
						<td style="width:50%;padding-left: 62px;" colspan="2">
						   RETURNABLE GATE PASS
						</td>
						<td style="width:50%" colspan="3">
							 <p style=" font-size: 12px;font-weight: 900;margin-top: 11px;margin-left: 25px;">
								No: 131 / 2, Kothapurinatham Road
								Mannadipet Commune Panchayat
								Thiruvandarkoil
								PONDICHERRY -  605 102
								INDIA

								Tel.: +91 413 2641455
							</p>
						</td>
					</tr>
				    <tr >
					    <td colspan="2">
						    <p>To</p>
						    <p><?php echo $materialin[0]->organization_address; ?></p>
						</td>
						<td colspan="3">
						    <table class="table table-bordered">
							    <tr>
								    <td>
									   <p>GSTIN :</p>
								    </td>
									<td colspan="2">
									   <p>34AAECP0947Q1ZZ</p>
									</td>
								</tr>
								<tr>
								    <td>
									    <p>Gate Pass No :</p>
									</td>
									<td>
									   <p>3000</p>
									</td>
									<td>
									   <p>Date :<?php  echo $materialin[0]->date; ?></p>
									</td>
								</tr>
								<tr>
								    <td>
									   <p>Requested by:</p>
								    </td>
									<td colspan="2">
									 <?php
                        $fid = $materialin[0]->from_em;
                       $basicin = $this->employee_model->GetBasic2($fid); 					   
				    ?>
									   <p>Dept :<?php echo $basicin->dep_name; ?> </p>
									</td>
								</tr>
								<tr>
								   <td colspan="3">
									   <p>Martial Status : <?php 
					                                      echo $materialin[0]->type;
													  ?></p>
									</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr> 
					   <td>Sno</td>
					   <td>Particulars</td>
					   <td>Quantity</td>
					   <td>GateIn</td>
					   <td>GateOut</td>
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
							   <td><?php echo $value->quantity; ?></td>
							   <td>  <?php
                 $particulesid=$this->security_model->getgateincount($value->pid);
                   if($particulesid==0)		
                   {
					   	
    					 echo "Error ! Time unchecked";				 
					 
				   }
                    else
					{
						     $particulestime=$this->security_model->getgatein($value->pid);	
							 echo $particulestime[0]->gatein;
					}						
		 ?></td>
							   <td> <?php
                                        $particulesid=$this->security_model->getgateoutcount($value->pid);	
                                        if($particulesid==0)		
                                        {			
								              echo "Error ! Time unchecked";
										}
										else
										{
											 $particulestime=$this->security_model->getgateout($value->pid);
											 echo $particulestime[0]->gateout;
										}
                                   ?></td>
					        </tr>
					<?php
					  }
					  ?>
					
					 <tr>
				        <td style="width:50%;" colspan="2">  
						   <p>Expected Date of Return : <?php 
					                                      if($materialin[0]->type=="NRGP")
														  {
															   echo "Non Returnable Material";
														  }
														  else
														  {
					                                           echo $materialin[0]->returndate; 
														  }
													  ?></p>
						   <p>Prepared By : <?php echo $basicin->first_name; ?></p>
						</td>
						<td colspan="3">
						   <p>Value of Goods : <?php echo $materialin[0]->approx_value; ?></p>
						   <p>Authorized By : Depart-Manager</p>
						</td>
				   </tr>
                </tbody>
              </table>
            </div>
           
          </div>
       
		     <button class="print-link no-print btn btn-success" onclick="jQuery('.ele1').print()" style="margin-left: 47%;margin-top: 5%;margin-bottom: 5%;">
                                        Print
            </button>
			
	
	</body>
</html>
<?php $this->load->view('backend/footer'); ?> 