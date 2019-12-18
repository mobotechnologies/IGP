<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Security extends CI_Controller 
{
	 function __construct() {
        parent::__construct();
		$this->load->library('session');
        $this->load->database();
        $this->load->model('login_model');
        $this->load->model('dashboard_model'); 
        $this->load->model('employee_model');
        $this->load->model('settings_model');    
        $this->load->model('notice_model');    
        $this->load->model('project_model');    
        $this->load->model('leave_model');  
        $this->load->model('Security_model');
		 $this->load->model('security_model');
			require  APPPATH.'third_party/PHPMailer/PHPMailerAutoload.php';
					
			 if ($this->session->userdata('user_type') == false) {
        redirect('login'); // where you want to redirect
    }
  
    }
	public function view_notification()
	{
	    
        $result=$this->Security_model->selectcomment();
		$response='';
		foreach($result as $value)
		{
			$response = $response . "<div class='notification-item'>" .
			"<div class='notification-subject'>". $value->subject . "</div>" . 
			"<div class='notification-comment'>" .$value->comment  . "</div>" .
			"</div>";
		}
		$this->Security_model->updatecomment();
		  echo $response;
		
	}
	public function delete_stockin()
	{
		$id=$this->input->post('delv');
	    $this->Security_model->stockin_del($id);
	}
	public function stockout_approval1()
	{
	       	    $id=$this->input->post('id');
				
			    $result=$this->Security_model->Getconfig();
				$status=$this->input->post('stat');
				    foreach($result as $value)
	             	{
							 $mail1=$value->level1;
							 if($this->session->userdata('user_login_id')==$mail1)
							 {
							    $data=array(
								    'approve1'=>$status,
								);
							 }
		                    $this->Security_model->Update_stockoutapprove($id,$data);
							 
					}
				
	}
	public function  stockout_approval2()
	{
		        $id=$this->input->post('id');
			    $result=$this->Security_model->Getconfig();
				$status=$this->input->post('stat');
			  foreach($result as $value)
	             	{
						     $mail2=$value->level2;
				             if($this->session->userdata('user_login_id')==$mail2)
							 {
							    $data=array(
								    'approve2'=>$status,
								);
							 }
							 $this->Security_model->Update_stockoutapprove($id,$data);
					}
	}
	public function stockout_approval3()
	{
		        $id=$this->input->post('id');
			    $result=$this->Security_model->Getconfig();
				$status=$this->input->post('stat');
			    foreach($result as $value)
	             	{
						       $mail2=$value->level3;
						    if($this->session->userdata('user_login_id')==$mail3)
							{
							    $data=array(
								    'approve3'=>$status,
								);
							}
						$this->Security_model->Update_stockoutapprove($id,$data);
					}
	}
    public function report()
	{
		$this->load->helper('download');
		$data = file_get_contents('./views/backend/file.xls');
      force_download('rkmvc_reports.xlsx',$data);
	}
	public function delete_stockout()
	{
		$id=$this->input->post('delv');
		$this->Security_model->stockout_del($id);
	}
	public function delete_visitor()
	{
		$id=$this->input->post('delv');
		 $this->Security_model->visitor_del($id);
	}
	public function delete_cab()
	{
		$id=$this->input->post('delv');
	    $this->Security_model->cab_del($id);
	}
    public function delete_expense()
	{
		$id=$this->input->post('delv');
	}
	public function filter_in()
	{
		$data["datetype"]=$this->input->post('datetype');
		$data["date1"]=$this->input->post('From');
		$data["date2"]=$this->input->post('To');	
	    $data['materialall']=$this->Security_model->selectinmatdail($data);
	   $count = sizeof($data['materialall']);

	    if($count>0)
	    {
	     	$this->load->view('backend/stockinward_excel.php',$data);
		}else
		{
			echo "<script type='text/javascript'>alert('No Data On Your Choosen day');
			window.location.href = 'http://localhost/hrmsproduct/security/stockin_report';
			</script>";
		}
 
	}

	public function stockin_remark()
	{
        
	    $id=$this->input->post('mid');
		$employeeemail=$this->Security_model->getaddmails($id);
		foreach($employeeemail as $value)
		{
			 
			 	$sub="Material Closure alert";
					$msg="
					    <html>
						    <head>
							     <head>
									<style>
									#customers {
									  font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif;
									  border-collapse: collapse;
									  width: 100%;
									}

									#customers td, #customers th {
									  border: 1px solid #ddd;
									  padding: 8px;
									}

									#customers tr:nth-child(even){background-color: #f2f2f2;}

									#customers tr:hover {background-color: #ddd;}

									#customers th {
									  padding-top: 12px;
									  padding-bottom: 12px;
									  text-align: left;
									  background-color: #f2f2f2 ;
									  color: white;
									}
									</style>
                            </head>
                            <body>
							          <div class='card shadow ele1'>
         
            <div class='table-responsive'>
              <table border='1' id='customers'> 
                <tbody>
                    <tr>
						<td style='width:50%;padding-left: 62px;'>
						   
							     <img src='./assets/images/poc.jpg'  id='printTable' /></br>
							
						</td>
						<td style='width:50%;'>
							 <p style=' font-size: 12px;font-weight: 900;margin-top: 11px;margin-left: 25px;'>
								<span style='color:blue'>POCLAIN HYDRAULICS PVT LTD</span></br>
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
					   <td style='width:50%;padding-left: 77px;'>Gate Pass   : ".$value->GatePass."</td>
					   <td style='width:50%;padding-left: 77px;'>Materials to received are received successfully.</td>
					</tr>				 
                </tbody>
              </table>
            </div>
           
          </div>
                            </body>							
						</html>
					";
						$getmail1=$this->Security_model->emmailcode($value->email1);	
	                    $this->mail($sub,$msg,$getmail1[0]->em_email);
						$getmail1=$this->Security_model->emmailcode($value->email2);	
	                    $this->mail($sub,$msg,$getmail1[0]->em_email);
						$getmail1=$this->Security_model->emmailcode($value->email3);	
	                    $this->mail($sub,$msg,$getmail1[0]->em_email);
				
		}
		$data=array(
		    'remark'=>$this->input->post('remark'), 
            'status'=>$this->input->post('status'),
		);
		$this->Security_model->update_stockinremark($id,$data);
        $this->session->set_flashdata('feedback','Material closed Sucessfully');
	    redirect('security/stockin_view');
	}
	public function sensitivemailalert_send()
	{
		$id=$this->input->post('id');
		$emcode1=$this->input->post('em1');
		$emcode2=$this->input->post('em2');
		$emcode3=$this->input->post('em3');
		$sub="Sensitive material alert";
					$msg="
					    <html>
						    <head>
							     <head>
									<style>
									#customers {
									  font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif;
									  border-collapse: collapse;
									  width: 100%;
									}

									#customers td, #customers th {
									  border: 1px solid #ddd;
									  padding: 8px;
									}

									#customers tr:nth-child(even){background-color: #f2f2f2;}

									#customers tr:hover {background-color: #ddd;}

									#customers th {
									  padding-top: 12px;
									  padding-bottom: 12px;
									  text-align: left;
									  background-color: #f2f2f2 ;
									  color: white;
									}
									</style>
                            </head>
                            <body>
							          <div class='card shadow ele1'>
         
            <div class='table-responsive'>
              <table border='1' id='customers'> 
                <tbody>
                    <tr>
						<td style='width:50%;padding-left: 62px;'>
						   
							     <img src='./assets/images/poc.jpg'  id='printTable' /></br>
							
						</td>
						<td style='width:50%;'>
							 <p style=' font-size: 12px;font-weight: 900;margin-top: 11px;margin-left: 25px;'>
								<span style='color:blue'>POCLAIN HYDRAULICS PVT LTD</span></br>
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
					   <td style='width:50%;padding-left: 77px;'>Gate Pass In   : ".$id."</td>
					   <td style='width:50%;padding-left: 77px;'>A Sensitive material has been arrived.</td>
					</tr>				 
                </tbody>
              </table>
            </div>
           
          </div>
                            </body>							
						</html>
					";
		$getmail1=$this->Security_model->emmailcode($emcode1);	
	    $this->mail($sub,$msg,$getmail1[0]->em_email);
		$getmail2=$this->Security_model->emmailcode($emcode2);
		$this->mail($sub,$msg,$getmail2[0]-em_email);
		$getmail3=$this->Security_model->emmailcode($emcode3);
		$this->mail($sub,$msg,$getmail3[0]->em_email);
		//$this->session->set_flashdata('feedback','Material closed Sucessfully');
	    //redirect('security/stockin_view');
	}
	public function stockout_remark()
	{
        
	   $id=$this->input->post('mid');
		$data=array(
		    'remark'=>$this->input->post('remark'), 
            'status'=>$this->input->post('status'),
		);
		$this->Security_model->update_stockoutremark($id,$data);
        $this->session->set_flashdata('feedback','Material closed Sucessfully');
	    redirect('security/stockout_view');
	}
    public function in_addmat()
	{
		$sid = base64_decode($this->input->get('I'));
		$data['Aid']=array(
               'sid'=>$sid,
         );
		$this->load->view('backend/addmaterial',$data);
	} 
	public function update_inmaterials()
	{
           $datetime=date('Y-m-d')." ".date('H:i:sa');
           $part=trim($this->input->post('matimg')," ");
		    $particular=$this->input->post('particules');
					 $quantity=$this->input->post('quantity');
					for($count=0;$count<count($particular);$count++)
					{
							   $data2=array(
								   'particules'=>$this->input->post('particules')[$count],
								   'quantity'=>$this->input->post('quantity')[$count],
								   'id'=>$this->input->post('mid'),
							   );	
							   
						  $this->Security_model->inward_particules($data2);
						  	$insert_id = $this->db->insert_id();	
                   $data3=array(
				       'part_image'=>$part,
                       'gatein'=>$datetime,
					   'vechicle_no'=>$this->input->post('vechNo'),
					   'driver_name'=>$this->input->post('Dname'),
					   'driver_phone'=>$this->input->post('Dphone'),
                       'material_type'=>$this->input->post('Type'),
                       'checkedby'=>$this->input->post('check'),
                       'comp_name'=>$this->input->post('Cour'),
					   'driver_identity'=>trim($this->input->post('imgname')," "),
					   'vechicle_type'=>$this->input->post('Vtype'),
                       'mode'=>$this->input->post('mode'),
					   'ipid'=>$insert_id,
				   );
				   
				    $this->Security_model->inward_time($data3);
					}
                   $this->session->set_flashdata('feedback','Successfully Added');
		           redirect('security/stockin_view');  
	}
	public function stockinover()
	{
		$id = base64_decode($this->input->get('I'));
		$data['stockin'] = $this->Security_model->singlestockin($id);
		$this->load->view('backend/stockinoverview',$data);
	}
	public function inrepass()
	{
		$id = base64_decode($this->input->get('I'));
		$data['materialin'] = $this->Security_model->singlestockin($id);
		 $this->load->view('backend/inrepass',$data);
	}
	public function visitover()
	{
		$id = base64_decode($this->input->get('I'));
		$data['svisitor'] = $this->Security_model->singlevisitor($id);
		$this->load->view('backend/visitoroverview',$data);
	}
	public function revisitpass()
	{
		$id = base64_decode($this->input->get('I'));
		$data['visitor'] = $this->Security_model->singlevisitor($id);
		$this->load->view('backend/revisitorpass',$data);
	}
	public function stockoutover()
	{
		$id = base64_decode($this->input->get('I'));
		$data['materialin'] = $this->Security_model->singlestockover($id);
		$data['materialpart'] = $this->Security_model->singlestockpartover($id);
	    $data['employee']=$this->employee_model->emselect();
	
		$this->load->view('backend/regatepass',$data);
	}
	public function stockoutgenerate()
	{
		$id = base64_decode($this->input->get('I'));
		$data['materialin'] = $this->Security_model->singlestockover($id);
		$data['materialpart'] = $this->Security_model->singlestockpartover($id);
	    $data['employee']=$this->employee_model->emselect();
	
		$this->load->view('backend/outgatepass',$data);
	}
	public function outrepass()
	{
		$id = base64_decode($this->input->get('I'));
		$data['materialin'] = $this->Security_model->singlestockover($id);
	
		$this->load->view('backend/stockoutoverview',$data);
	}
	public function filter_outs_locket()
	{

	    $data["datetype"]=$this->input->post('outno');
	    $data['materialout']=$this->Security_model->selectoutmatdail_locket($data);
	    $count = sizeof($data['materialout']);

	    if($count>0)
	    {
	   	   $this->load->view('backend/stockoutward_excel.php',$data);
		}
		else
		{
			echo "<script type='text/javascript'>alert('No Data On Your Choosen day');

			window.location.href = 'http://localhost/hrmsproduct/security/stockout_report';

			</script>";

		}
		
	}
	public function filter_out()
	{
		$data["datetype"]=$this->input->post('datetype');
		$data["date1"]=$this->input->post('From');
		$data["date2"]=$this->input->post('To');		
	    $data['materialout']=$this->Security_model->selectoutmatdail($data);
	    $count = sizeof($data['materialout']);
	   if($count>0)
	    {
	   	     $this->load->view('backend/stockoutward_excel.php',$data);
		}else
		{
            echo "<script type='text/javascript'>alert('No Data On Your Choosen day');
            window.location.href = 'http://localhost/hrmsproduct/security/stockin_report';
            </script>";

		}

	}

	public function filter_visitor()
	{
		if($this->input->post('emp')=="all")
		{
            $data["emid"]="";
		}
		else
		{
			$data["emid"]=$this->input->post('emp');
		}
		//$data["date"]=$this->input->post('date');
 	 
		$data["date1"]=$this->input->post('From');
		$data["date2"]=$this->input->post('To');

		$data['visitor']=$this->Security_model->selectvisitdail($data);
		// $this->load->view('backend/visitorlist',$data);

			   $count = sizeof($data['visitor']);

	   if($count>0)
	    {
	   	     $this->load->view('backend/vistor_excel.php',$data);
		}
		else
		{
			echo "<script type='text/javascript'>alert('No Data On Your Choosen day');

			window.location.href = 'http://localhost:90/arun/hrmsproduct/security/visitor_report';

			</script>";
		
	    }

}
    public function anonymous()
	{
	   $this->load->view('backend/anonymous');
	}
	public function stockout_report()
	{
	   $this->load->view('backend/stockoutreport');
	}
	public function visitor_report()
	{
		if($this->session->userdata('user_type')=='EMPLOYEE')
		{
			$emid= $this->session->userdata('user_login_id');
			$data['employee']=$this->employee_model->emselectByID($emid);
			 $this->load->view('backend/visitoreport',$data);
		}
		else
		{
		   $data['employee']=$this->employee_model->emselect();
		   $this->load->view('backend/visitoreport',$data);
		}
	}
	
	
	public function cab_report()
	{
			$this->load->view('backend/visitoreport');
	}
	public function Stockin_form()
	{
		$data['vendor']=$this->Security_model->selectvendor();
        $data['checkedby']=$this->Security_model->selectchecked();
		$this->load->view('backend/stockinform',$data);
	}
	public function Stockout_form()
	{
		$data['employee']=$this->employee_model->emselect2();
		
		$this->load->view('backend/stockoutform',$data);
	}
	public function visitor_form()
	{
		$data['employee']=$this->employee_model->emselect2();
		$this->load->view('backend/visitorform',$data);
	}
	
	public function stockin_report()
	{
	   $this->load->view('backend/stockinreport');
	}
	public function stockin_view()
	{
		$data['employee']=$this->employee_model->emselect();
		$data['materialall']=$this->Security_model->selectinmat();
		$this->load->view('backend/stockin',$data);
	}
	public function stockout_view()
	{
		$data['employee']=$this->employee_model->emselect();
		$data['materialout']=$this->Security_model->selectoutmat();
		$this->load->view('backend/stockout',$data);
	}
	public function email_config()
	{
		$data['employee']=$this->employee_model->emselect();
		$data['config']=$this->Security_model->selectconfig();
		$data['config2']=$this->Security_model->selectconfig2();
		$this->load->view('backend/config',$data);
	}
	public function visitor_view()
	{
		$data['employee']=$this->employee_model->emselect2();
		$data['visitor']=$this->Security_model->selectvisitor();
		$this->load->view('backend/visitor',$data);
	}
	public function matoutgatepass()
	{
		$this->load->view('backend/outgatepass');
	}
	public function regatepass()
	{
			$data['materialin']= array(
						'invoice_no' => $this->input->post('invoiceno'),
						'invoice_date' => $this->input->post('invoicedate'),
						'material_type'=>$this->input->post('Type'),
						'purpose'=>$this->input->post('purpose'),
						'vechicle_no'=>$this->input->post('vechNo'),
						'vendor'=>$this->input->post('vendor'),
						'vechicle_type'=>$this->input->post('Vtype'),
						'gatein'=>$this->input->post('date'),
						'GatePass'=>$this->input->post('gatepass'),
						'destination'=>$this->input->post('Destination'),
						'driver_name'=>$this->input->post('Dname'),
						'driver_phone'=>$this->input->post('Dphone'),
						'date'=>date('Y-m-d'),
						'driver_identity'=>$this->input->post('imgname'),
						'mode'=>$this->input->post('mode'),
			        );
		$this->load->view('backend/gatepass',$data);
	}
	public function visitgatepass()
	{
			 $data['visitor']=  array(
						'name' => $this->input->post('name'),
						'address' => $this->input->post('address'),
						'phone' => $this->input->post('phone'),
						'email'=>$this->input->post('email'),
						'purpose'=>$this->input->post('purpose'),
						'meeting_to' => $this->input->post('meet_to'),
						'accompanied_by' => $this->input->post('accompanied'),
						'identity_proof' => $this->input->post('imgname'),
						'item_carried' => $this->input->post('Item_car'),
						'item_issued' => $this->input->post('Item_issue'),
						'item_deposited' => $this->input->post('Item_deposit'),
						'organization'=>$this->input->post('organization'),
						'companyphone'=>$this->input->post('organphone'),
						'companyaddress'=>$this->input->post('organaddress'),
						'passno'=>$this->input->post('receipt'),
						'in' =>date('h:i:s A'),
						'date'=>date('Y-m-d'),
			        );
		$this->load->view('backend/visitorpass',$data);
	}
	public function visitor_insert()
	{
		$receipt=rand();
		 $data1= array(
						'name' => $this->input->post('name'),
						'address' => $this->input->post('address'),
						'phone' => $this->input->post('phone'),
						'email'=>$this->input->post('email'),
						'purpose'=>$this->input->post('purpose'),
						'meeting_to' =>$this->input->post('meet_to'),
						'accompanied_by' =>$this->input->post('accompanied'),
						'identity_proof' =>$this->input->post('imgname'),
						'item_carried' => $this->input->post('Item_car'),
						'item_issued' => $this->input->post('Item_issue'),
						'item_deposited' => $this->input->post('Item_deposit'),
						'organization'=>$this->input->post('organization'),
						'companyphone'=>$this->input->post('organphone'),
						'companyaddress'=>$this->input->post('organaddress'),
						'passno'=>$receipt,
						'intime' =>date('h:i:s A'),
						'date'=>date('Y-m-d'),
			        );
					 $data['visitor']=  array(
						'name' => $this->input->post('name'),
						'address' => $this->input->post('address'),
						'phone' => $this->input->post('phone'),
						'email'=>$this->input->post('email'),
						'purpose'=>$this->input->post('purpose'),
						'meeting_to' => $this->input->post('meet_to'),
						'accompanied_by' => $this->input->post('accompanied'),
						'identity_proof' => $this->input->post('imgname'),
						'item_carried' => $this->input->post('Item_car'),
						'item_issued' => $this->input->post('Item_issue'),
						'item_deposited' => $this->input->post('Item_deposit'),
						'organization'=>$this->input->post('organization'),
						'companyphone'=>$this->input->post('organphone'),
						'companyaddress'=>$this->input->post('organaddress'),
						'passno'=>$receipt,
						'intime' =>date('h:i:s A'),
						'date'=>date('Y-m-d'),
			        );
				   $sub="Visitor Notification";
					$msg="<head>

  
</head>
					<div class='table-responsive'>
              <table   border='1' id='customers' class='ele2'> 
                <tbody>
                    <tr>
						<td style='width:50%;padding-left: 62px;'>
						   
							     <img src='./assets/images/logo.png'  id='printTable' /></br>
							
						</td>
						<td style='width:50%'>
							 <p style=' font-size: 12px;font-weight: 900;margin-top: 11px;margin-left: 25px;'>
								<span style='color:blue'>POCLAIN HYDRAULICS PVT LTD</span></br>
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
					   <td style='width:50%;padding-left: 77px;'>Pass No   : ".$receipt."</td>
					   <td style='width:50%;padding-left: 77px;'>Validity : ".date('Y-m-d')."</td>
					</tr>
					<tr>
					   <td style='width:50%'><img src='./assets/upload/".$this->input->post('imgname')."'  style='width: 154px;margin-top: 10px;margin-left: 142px;margin-bottom: 26px;'/></td>
					   <td style='width:50%'>
							<table  style='width:100%'>
								<tr>
								   <td>Name</td>
								   <td>:</td>
								   <td>".$this->input->post('name')."</td>
								</tr>
								<tr>
								   <td>To meet</td>
								   <td>:</td>
								   <td>".$this->input->post('meet_to')."</td>
								</tr>
								<tr>
								   <td>Purpose</td>
								   <td>:</td>
								   <td>".$this->input->post('purpose')."</td>
								</tr>
								<tr>
								   <td>Validity</td>
								   <td>:</td>
								   <td>".date('y-m-d')."</td>
								</tr>
							</table>
					   </td>
					</tr>					 
                </tbody>
              </table>
            </div>";
		    $mail=$this->Security_model->getmail($this->input->post('to'));
		    $this->mail($sub,$msg,$mail); 
		    $this->Security_model->insert_visitor($data1);
			$this->session->set_flashdata('feedback','Successfully Added');
					$this->load->view('backend/visitorpass',$data);
	}
	public function stockin_insert()
	{
		   
		   $rid=$this->Security_model->getmaxid2();
		  
		   $datetime=date('Y-m-d')." ".date('H:i:sa');

	
		    if($rid=="")
		    {
		       $gatepass="PHM01";
		    }
			else
			{
				$gatepass="PHM".$rid;
			}
		$data1= array(
					   'invoice_no' => $this->input->post('invoiceno'),
						'invoice_date' => $this->input->post('invoicedate'),
						'purpose'=>$this->input->post('purpose'),
						'vendor'=>$this->input->post('vendor'),
						'GatePass'=>$gatepass,
						'destination'=>$this->input->post('Destination'),
						'checkedby'=>$this->input->post('check'),
						'date'=>$datetime,
			        );
		$data['materialin']= array(
						'invoice_no' => $this->input->post('invoiceno'),
						'invoice_date' => $this->input->post('invoicedate'),
						'material_type'=>$this->input->post('Type'),
						'purpose'=>$this->input->post('purpose'),
						'vechicle_no'=>$this->input->post('vechNo'),
						'vendor'=>$this->input->post('vendor'),
						'vechicle_type'=>$this->input->post('Vtype'),
						'GatePass'=>$gatepass,
						'destination'=>$this->input->post('Destination'),
						'driver_name'=>$this->input->post('Dname'),
						'driver_phone'=>$this->input->post('Dphone'),
						'date'=>$datetime,
                        'driver_identity'=>trim($this->input->post('imgname')," "),
						'mode'=>$this->input->post('mode'),
						'checkedby'=>$this->input->post('check'),
			        );
				     $this->Security_model->insert_materialin($data1);
				     $part=trim($this->input->post('matimg')," ");
				     $insert_id = $this->db->insert_id();
					 $particular=$this->input->post('particules');
					 $quantity=$this->input->post('quantity');
					for($count=0;$count<count($particular);$count++)
					{
							   $data2=array(
								   'particules'=>$this->input->post('particules')[$count],
								   'quantity'=>$this->input->post('quantity')[$count],
								   'id'=>$insert_id,
							   );	
							   
						  $this->Security_model->inward_particules($data2);
						  $insert_id = $this->db->insert_id();
						 $data3=array(
						   'part_image'=>$part,
						   'gatein'=>$datetime,
						   'vechicle_no'=>$this->input->post('vechNo'),
						   'driver_name'=>$this->input->post('Dname'),
						   'driver_phone'=>$this->input->post('Dphone'),
						   'material_type'=>$this->input->post('Type'),
						   'checkedby'=>$this->input->post('check'),
						   'comp_name'=>$this->input->post('Cour'),
						   'driver_identity'=>trim($this->input->post('imgname')," "),
						   'vechicle_type'=>$this->input->post('Vtype'),
						   'mode'=>$this->input->post('mode'),
						   'ipid'=>$insert_id,
				           );
				   
				          $this->Security_model->inward_time($data3);
					}
						
                  
					$comment="Material has been Arrived on".date('H:i:s');
					$status=0;
					$subject="Material inward Notify";
					$dc=array(
					     'comment'=>$comment,
						 'status'=>$status,
						 'subject'=>$subject,
					);
				    $this->Security_model->insert_comment($dc);
				    $result=$this->Security_model->Getconfig();
					$mina=trim($this->input->post('imgname'),"  ");
					$msg="
					    <html>
						    <head>
							     <head>
									<style>
									#customers {
									  font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif;
									  border-collapse: collapse;
									  width: 100%;
									}

									#customers td, #customers th {
									  border: 1px solid #ddd;
									  padding: 8px;
									}

									#customers tr:nth-child(even){background-color: #f2f2f2;}

									#customers tr:hover {background-color: #ddd;}

									#customers th {
									  padding-top: 12px;
									  padding-bottom: 12px;
									  text-align: left;
									  background-color: #f2f2f2 ;
									  color: white;
									}
									</style>
                            </head>
                            <body>
							          <div class='card shadow ele1'>
         
            <div class='table-responsive'>
              <table border='1' id='customers'> 
                <tbody>
                    <tr>
						<td style='width:50%;padding-left: 62px;'>
						   
							     <img src='./assets/images/poc.jpg'  id='printTable' /></br>
							
						</td>
						<td style='width:50%;'>
							 <p style=' font-size: 12px;font-weight: 900;margin-top: 11px;margin-left: 25px;'>
								<span style='color:blue'>POCLAIN HYDRAULICS PVT LTD</span></br>
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
					   <td style='width:50%;padding-left: 77px;'>Gate Pass In   : ".$gatepass."</td>
					   <td style='width:50%;padding-left: 77px;'>Gate Pass Date : ".$datetime."</td>
					</tr>
					<tr>
					   <td style='width:50%'><img src='./assets/upload/".trim($this->input->post('imgname')," ")."'  style='width: 154px;margin-top: 10px;margin-left: 142px;margin-bottom: 26px;'/></td>
					   <td style='width:50%'>
							<table  style='width:100%'>
								<tr>
								   <td style='font-weight:900'>Invoice No </td>
								   <td>:</td>
								   <td style='font-weight:900'>".ucfirst($this->input->post('invoiceno'))."</td>
								</tr>
								<tr>
								   <td style='font-weight:900'>Invoice Date </td>
								   <td>:</td>
								   <td style='font-weight:900'>".$this->input->post('invoicedate')."</td>
								</tr>
								<tr>
								   <td style='font-weight:900'>Destination </td>
								   <td>:</td>
								   <td style='font-weight:900'>".ucfirst($this->input->post('Destination'))."</td>
								</tr>
								<tr>
								   <td style='font-weight:900'>Purpose</td>
								   <td>:</td>
								   <td style='font-weight:900'>".ucfirst($this->input->post('purpose'))."</td>
								</tr>
							</table>
					   </td>
					</tr>					 
                </tbody>
              </table>
            </div>
           
          </div>
                            </body>							
						</html>
					";
				    foreach($result as $value)
	             	{
						     $mail1=$value->level1;
							 $mail=trim($this->Security_model->getmail($mail1)," ");
		                     $sub="Material Inward";
		                     $this->mail($sub,$msg,$mail);
							 
					}
					  foreach($result as $value)
	             	{
						     $mail2=$value->level2;
				             $mail=trim($this->Security_model->getmail($mail2)," ");
		                     $sub="Material Inward";
		                     $this->mail($sub,$msg,$mail);
							 
					}
					  foreach($result as $value)
	             	{
						     $mail3=$value->level3;
							 $mail=trim($this->Security_model->getmail($mail3)," ");
		                     $sub="Material Inward";
		                     $this->mail($sub,$msg,$mail);
							
					}
					  $this->session->set_flashdata('feedback','Successfully Added');
					  $this->load->view('backend/gatepass',$data);
				
	}
	public function stockin_gatein()
	{
	    $id=$this->input->post('id');
        $datetime=date('Y-m-d')." ".date('H:i:sa');
		$data=array(

		    'gateout'=>$datetime, 
		);
		$this->Security_model->update_ingat($id,$data);
	}
	   public function inward1update()
   {
        $id=$this->input->post('id');
        $data=array(
               'email1'=>$this->input->post('level1'),
          );
        $this->Security_model->update_inward1($data,$id);
   }
   public function inward2update()
   {
        $id=$this->input->post('id');
        $data=array(
               'email2'=>$this->input->post('level2'),
          );
        $this->Security_model->update_inward2($data,$id);
   }
      public function inward3update()
   {
        $id=$this->input->post('id');
        $data=array(
               'email3'=>$this->input->post('level3'),
          );
        $this->Security_model->update_inward3($data,$id);
   }
    public function level1update()
   {
        $id="1";
        $data=array(
               'level1'=>$this->input->post('level1'),
          );
        $this->Security_model->update_level1($data,$id);
   }
  public function level2update()
   {
        $id="1";
        $data=array(
               'level2'=>$this->input->post('level2'),
          );
        $this->Security_model->update_level2($data,$id);
   }
public function level3update()
   {
        $id="1";
        $data=array(
               'level3'=>$this->input->post('level3'),
          );
        $this->Security_model->update_level3($data,$id);
   }
   public function level4update()
   {
        $id="1";
        $data=array(
               'level1'=>$this->input->post('level1'),
          );
        $this->Security_model->update_level4($data,$id);
   }
   public function level5update()
   {
        $id="1";
        $data=array(
               'level2'=>$this->input->post('level2'),
          );
        $this->Security_model->update_level5($data,$id);
   }
   public function level6update()
   {
        $id="1";
        $data=array(
               'level3'=>$this->input->post('level3'),
          );
        $this->Security_model->update_level6($data,$id);
   }
       public function email1update()
   {
        $id=$this->input->post('id');
        $data=array(
               'email1'=>$this->input->post('level1'),
          );
        $this->Security_model->update_email1($data,$id);
   }
  public function email2update()
   {
        $id=$this->input->post('id');
        $data=array(
               'email2'=>$this->input->post('level2'),
          );
        $this->Security_model->update_email2($data,$id);
   }
public function email3update()
   {
        $id=$this->input->post('id');
        $data=array(
               'email3'=>$this->input->post('level3'),
          );
        $this->Security_model->update_email3($data,$id);
   }
	public function stockout_gateout()
	{
	    $id=$this->input->post('id');
		$data=array(

		    'gateout'=>date('H:i:s'), 
		);
		$this->Security_model->update_outgat($id,$data);
	}
	public function visit_gateout()
	{
	    $id=$this->input->post('id');
		$data=array(

		    'out'=>date('H:i:s'), 
		);
		$this->Security_model->update_visitgat($id,$data);
	}
	public function stockout_insert()
	{
		    $rid=$this->Security_model->getmaxid();
		    if($rid=="")
		    {
		       $gatepass="PH01";
		    }
			else
			{
				$gatepass="PH".$rid;
			}
			
		
			$data1= array(
					    'category' => $this->input->post('category1'),
					    'type' => $this->input->post('type'),
						'subcategory'=>$this->input->post('subcategory'),
					    'costcenter'=>$this->input->post('costcenter'),
					    'reason'=>$this->input->post('reason'),
						'approx_value'=>$this->input->post('approx_value'),
						'gatepass'=>$gatepass,
						'organization_address'=>$this->input->post('shippingaddress'),
						'to_em'=>$this->input->post('to'),
						'from_em'=>$this->session->userdata('user_id'),
						'returndate'=>$this->input->post('returndate'),
						'date'=>date('Y-m-d'),
			        );
				
		    $this->Security_model->insert_materialout($data1);
			$insert_id = $this->db->insert_id();
			$part=$this->input->post('matimg');
			 $particular=$this->input->post('particules');
			 $quantity=$this->input->post('quantity');
					for($count=0;$count<count($particular);$count++)
					{
							   $data2=array(
								   'particulars'=>$this->input->post('particules')[$count],
								   'quantity'=>$this->input->post('quantity')[$count],
								   'id'=>$insert_id,
							   );	
							   
						 $this->Security_model->insert_particules($data2);
						  $insert_id = $this->db->insert_id();
						 $data3=array(
						   'part_image'=>$part,
						   'id'=>$insert_id,
				           );
				   
				          $this->Security_model->outward_time($data3);
					}
		         	$comment="Material  has sending has been requested on".date('H:i:s');
					$status=0;
					$subject="Material outward Notify";
					$dc=array(
					     'comment'=>$comment,
						 'status'=>$status,
						 'subject'=>$subject,
					);
					$this->Security_model->insert_comment($dc);
					$result=$this->Security_model->Getconfig();
					//$level=1;
				    foreach($result as $value)
	             	{
						     $mail1=$value->level1;
							 $mail=trim($this->Security_model->getmail($mail1)," ");
		                     $sub="Material Inward";
		                     $msg="Demo mail test";
		                     $this->mail($sub,$msg,$mail);
							 
					}
					  foreach($result as $value)
	             	{
						     $mail2=$value->level2;
				             $mail=trim($this->Security_model->getmail($mail2)," ");
		                     $sub="Material Inward";
		                     $msg="Demo mail test";
		                     $this->mail($sub,$msg,$mail);
							 
					}
					  foreach($result as $value)
	             	{
						     $mail3=$value->level3;
							 $mail=trim($this->Security_model->getmail($mail3)," ");
		                     $sub="Material Inward";
		                     $msg="Demo mail test";
		                     $this->mail($sub,$msg,$mail);
							
					}
					$this->session->set_flashdata('feedback','Successfully Added');
		           redirect('security/stockout_view');
	}
	public function stockout_updatematerials()
	{
		    $insert_id = $this->input->post('mid');
			$part=$this->input->post('matimg');
          
                   $data2=array(
				       'particulars'=>$part,
					   'id'=>$insert_id,
				   );	
				   
           $this->Security_model->insert_particules($data2);
	}
	public function imageupload()
	{
		// new filename
$filename = 'pic_'.date('YmdHis') . '.jpeg';

$url = '';
if( move_uploaded_file($_FILES['webcam']['tmp_name'],'./assets/upload/'.$filename) ){
 $url =  $filename;
}

// Return image url
echo $url;
	}
public function update_stockinward()
{
        $id=$this->input->post('mid');
       	$data1= array(
					   'invoice_no' => $this->input->post('invoiceno'),
						'invoice_date' => $this->input->post('invoicedate'),
						'purpose'=>$this->input->post('purpose'),
						'vendor'=>$this->input->post('vendor'),
						'GatePass'=>$this->input->post('gatepass'),
						'destination'=>$this->input->post('Destination'),
						'checkedby'=>$this->input->post('check'),
						'date'=>$this->input->post('date'),
	     );

       $this->Security_model->update_stockin($id,$data1);
       $this->session->set_flashdata('feedback','Successfully Updated');
       redirect('security/stockin_view');  
}
  public function anonymous_insert()
    {
        
		  
		  
		   $datetime=date('Y-m-d')." ".date('H:i:sa');
           $default="unknown";
		
		$data1= array(
					    'invoice_no' =>$default,
						'invoice_date' =>"2019-11-26",
						'purpose'=>$default,
						'vendor'=>$default,
						'GatePass'=>$default,
						'destination'=>$default,
						'checkedby'=>$this->input->post('check'),
						'date'=>$datetime,
			        );
		
				   $this->Security_model->insert_materialin($data1);
				   $insert_id = $this->db->insert_id();
				   $part=$this->input->post('matimg');
				   $particular=$this->input->post('particules');
				   $quantity=$this->input->post('quantity');
					for($count=0;$count<count($particular);$count++)
					{
							   $data3=array(
								   'particules'=>$this->input->post('particules')[$count],
								   'quantity'=>$this->input->post('quantity')[$count],
								   'id'=>$insert_id,
							   );	
							   
						  $this->Security_model->inward_particules($data3);
					}
					$insert_id = $this->db->insert_id();	
				
                   $data2=array(
				       'part_image'=>$part,
                       'gatein'=>$datetime,
					   'vechicle_no'=>$this->input->post('vechNo'),
					   'driver_name'=>$this->input->post('Dname'),
					   'driver_phone'=>$this->input->post('Dphone'),
                       'comp_name'=>$this->input->post('Cour'),
                       'material_type'=>$this->input->post('Type'),
					   'driver_identity'=>trim($this->input->post('imgname')," "),
					   'vechicle_type'=>$this->input->post('Vtype'),
                       'mode'=>$this->input->post('mode'),
                       'checkedby'=>$this->input->post('check'),
					   'ipid'=>$insert_id,
				   );
				   
					$this->Security_model->inward_time($data2);
					$comment="Material has been Arrived on".date('H:i:s');
					$status=0;
					$subject="Material inward Notify";
					$dc=array(
					     'comment'=>$comment,
						 'status'=>$status,
						 'subject'=>$subject,
					);
					$this->Security_model->insert_comment($dc);
					$result=$this->Security_model->Getconfig();
					$msg="
					    <html>
						    <head>
							     <head>
									<style>
									#customers {
									  font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif;
									  border-collapse: collapse;
									  width: 100%;
									}

									#customers td, #customers th {
									  border: 1px solid #ddd;
									  padding: 8px;
									}

									#customers tr:nth-child(even){background-color: #f2f2f2;}

									#customers tr:hover {background-color: #ddd;}

									#customers th {
									  padding-top: 12px;
									  padding-bottom: 12px;
									  text-align: left;
									  background-color: #f2f2f2 ;
									  color: white;
									}
									</style>
                            </head>
                            <body>
							          <div class='card shadow ele1'>
         
            <div class='table-responsive'>
              <table border='1' id='customers'> 
                <tbody>
                    <tr>
						<td style='width:50%;padding-left: 62px;'>
						   
							     <img src='./assets/images/poc.jpg'  id='printTable' /></br>
							
						</td>
						<td style='width:50%;'>
							 <p style=' font-size: 12px;font-weight: 900;margin-top: 11px;margin-left: 25px;'>
								<span style='color:blue'>POCLAIN HYDRAULICS PVT LTD</span></br>
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
					   <td style='width:50%;padding-left: 77px;'>Gate Pass In   : ".$gatepass."</td>
					   <td style='width:50%;padding-left: 77px;'>Gate Pass Date : ".$datetime."</td>
					</tr>
					<tr>
					   <td style='width:50%'><img src='./assets/upload/".trim($this->input->post('imgname')," ")."'  style='width: 154px;margin-top: 10px;margin-left: 142px;margin-bottom: 26px;'/></td>
					   <td style='width:50%'>
							<table  style='width:100%'>
								<tr>
								   <td style='font-weight:900'>Invoice No </td>
								   <td>:</td>
								   <td style='font-weight:900'>".ucfirst($this->input->post('invoiceno'))."</td>
								</tr>
								<tr>
								   <td style='font-weight:900'>Invoice Date </td>
								   <td>:</td>
								   <td style='font-weight:900'>".$this->input->post('invoicedate')."</td>
								</tr>
								<tr>
								   <td style='font-weight:900'>Destination </td>
								   <td>:</td>
								   <td style='font-weight:900'>".ucfirst($this->input->post('Destination'))."</td>
								</tr>
								<tr>
								   <td style='font-weight:900'>Purpose</td>
								   <td>:</td>
								   <td style='font-weight:900'>".ucfirst($this->input->post('purpose'))."</td>
								</tr>
							</table>
					   </td>
					</tr>					 
                </tbody>
              </table>
            </div>
           
          </div>
                            </body>							
						</html>
					";
				    foreach($result as $value)
	             	{
						     $mail1=$value->level1;
							 $mail=trim($this->Security_model->getmail($mail1)," ");
		                     $sub="Material Inward";
		                     $this->mail($sub,$msg,$mail);
							 
					}
					  foreach($result as $value)
	             	{
						     $mail2=$value->level2;
				             $mail=trim($this->Security_model->getmail($mail2)," ");
		                     $sub="Material Inward";
		                     $this->mail($sub,$msg,$mail);
							 
					}
					  foreach($result as $value)
	             	{
						     $mail3=$value->level3;
							 $mail=trim($this->Security_model->getmail($mail3)," ");
		                     $sub="Material Inward";
		                     $this->mail($sub,$msg,$mail);
							
					}
					$this->session->set_flashdata('feedback','Successfully Added');
					redirect('security/stockin_view');
    }
	public function mail($sub,$msg,$mail)
	{
			$name="arun";
					$email=$mail;
					$password="arun543@!";
					$subject=$sub;
					$message=$msg;
					$file_to_attach='';
					$bccmail="info@thirunallarutemple.org";
					
				
					try {
					$mail = new PHPMailer();
						$mail->isSMTP();
						$mail->SMTPDebug = 0;
						$mail->SMTPAuth = TRUE;
						$mail->SMTPSecure = 'ssl'; // tls or ssl
						$mail->Port     = 465;
									   $mail->SMTPOptions = array(
													 'ssl' => array(
							'verify_peer' => false,
							'verify_peer_name' => false,
							'allow_self_signed' => true
						)
					);
						    $mail->Username = "info@thirunallarutemple.org";
							$mail->Password = "info543@!";
							$mail->Host     = "thirunallarutemple.org";
							$mail->Mailer   = "smtp";
							$mail->setFrom("Hrms","sample");
						$mail->addAddress($email);
						$mail->Subject =($subject);
						$mail->MsgHTML($message);
						$mail->IsHTML(true); 
						if($mail->Send()) {
													
					  echo "1 successs";

					} else {
					echo "2 not";    
					}

					$mail->smtpClose();  
					} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
	}
  

}
?>