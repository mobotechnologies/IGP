<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Travel extends CI_Controller 
{
	function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('login_model');
        $this->load->model('dashboard_model'); 
        $this->load->model('employee_model');
        $this->load->model('settings_model');    
        $this->load->model('notice_model');    
        $this->load->model('project_model');    
        $this->load->model('leave_model');  
        $this->load->model('Security_model');
        $this->load->model('dashboard_model');
        $this->load->model('employee_model');
		$this->load->model('travel_model');
        $this->load->model('login_model');
         $this->load->model('security_model');
    $this->load->model('Security_model');
    }
	public function filter_expense()
	{
		
		$data["date1"]=$this->input->post('From');
		$data["date2"]=$this->input->post('To');
	    $data["expreport"]=$this->travel_model->selectexpdail($data);
		$this->load->view('backend/expense_excel.php',$data);
	}
	public function expense_insert()
	{ 

    $filearray=array();
	  $cpt = count($_FILES['bill']['name']);
    for($i=0; $i<$cpt; $i++)
    {     		
	          $lname = "expense"; 
	        $emrand = substr($lname,0,3).rand(1000,2000);
		    $file_name = $_FILES['bill']['name'][$i];
		    $fileSize = $_FILES["bill"]["size"][$i]/1024;
			$fileType = $_FILES["bill"]["type"][$i];
            $str=explode("/",$fileType);
		//	$new_file_name='';
            $new_file_name = $emrand.'.'.$str[1];
			 move_uploaded_file($_FILES['bill']['tmp_name'][$i],'./assets/expense/'.$new_file_name);
			 array_push($filearray,$new_file_name);			

	}
	$myJSON = json_encode($filearray);


					 $data = array(
						'id' => $this->input->post('emid'),
						'exp_category'=>$this->input->post('category'),
						'currency'=>$this->input->post('currency'),
						'purpose' => $this->input->post('purpose'),
						'amount' => $this->input->post('amount'),
						'date' =>date('Y-m-d'),
						'Bill_document'=>$myJSON,
						
			        );
										     $msg="<html>
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
			  	       <tr>
				       <td><img src='./assets/images/poc.jpg'  id='printTable' /></td>
					   <td>
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
				       <td colspan='2'>Expense Request</td>
				   </tr>
			       <tr>
				       <td>Exp_category</td>
					   <td>".$this->input->post('category')."</td>
				   </tr>
				   <tr>
				       <td>Currency</td>
					   <td>".$this->input->post('currency')."</td>
				   </tr>
				   <tr>
				       <td>Purpose</td>
					   <td>". $this->input->post('purpose')."</td>
				   </tr>
				    <tr>
				       <td>Amount</td>
					   <td>".$this->input->post('amount')."</td>
				    </tr>
					<tr>
				       <td>Date</td>
					   <td>".date("Y-m-d")."</td>
				    </tr>
			    </table>
            </div>
           
          </div>
                            </body>							
						</html>";
			$this->travel_model->Add_expense($data);
			redirect('travel/expense_view');
	}
	public function filter_cab()
	{
		
			$data["status"]=$this->input->post('status');
			$data["date1"]=$this->input->post('From');
			$data["date2"]=$this->input->post('To');
			$data["emid"]=$this->input->post('emid');
			$data['cabreport']=$this->travel_model->selectcabdail($data);
		    $count = sizeof($data['cabreport']);
			if($count>0)
			{
				
				$this->load->view('backend/cab_excel.php',$data);
				
			}
			else
			{
				echo "<script type='text/javascript'>alert('No Data On Your Choosen day');
				window.location.href = 'http://localhost/hrmsproduct/Travel/cab_report';
				</script>";
			}
			
	}
	public function expense_report()
	{
	   $data['employee']=$this->employee_model->emselect();
	   $this->load->view('backend/expensereport',$data);
	}
	public function cab_report()
	{
	   $data['state']=$this->travel_model->selectstate();
	   if($this->session->userdata('user_type')=='EMPLOYEE')
	   {
		    $emid1= $this->session->userdata('user_login_id');
	        $this->load->view('backend/cabreport',$data);
		    $data['employee']=$this->employee_model->emselectByID($emid1);
	   }
	   else
	   {
		   $data['employee']=$this->employee_model->emselect();
		   $this->load->view('backend/cabreport',$data);
	   }
	}
	public function cab_form()
	{
		$data['state']=$this->travel_model->selectstate();
		if($this->session->userdata('user_type')=='EMPLOYEE'){
	    $emid1= $this->session->userdata('user_login_id');
		$emid= $this->session->userdata('user_id');
        $data['employee']=$this->employee_model->emselectByID($emid1);
	    $this->load->view('backend/cabform',$data);
		}
		else
		{
			$data['employee']=$this->employee_model->emselect();
		    $this->load->view('backend/cabform',$data);
		}
	}
	public function get_district()
	{
		if(!empty($this->input->post('state_id')))
		{
			$state=$this->input->post('state_id');
			$data=$this->travel_model->selectdistrict($state);
		
			foreach($data as $value)
			{
				echo "<option value=".$value->DistCode.">".$value->DistrictName."</option>";
			}
			
		}
	}
	public function Expense_form()
	{
			if($this->session->userdata('user_type')=='EMPLOYEE'){
             $emid= $this->session->userdata('user_login_id');
             $data['employe']=$this->employee_model->emselectByID($emid);
             $data['employee']=$this->employee_model->emexpenseByID($emid);
		      $this->load->view('backend/expenseform',$data);
		}
		else
		{
			$data['employe']=$this->employee_model->emselect();
		    $this->load->view('backend/expenseform',$data);
		}
	}
	public function Cab_insert()
	{
		$name="arun";
		$phone="7358637373";
		$data = array(
						'id' => $this->input->post('emid'),
						'purpose' => $this->input->post('purpose'),
						'travel_from'=>$this->input->post('from'),
						'travel_to'=>$this->input->post('to'),
						'Travel_date'=>$this->input->post('travel_date'),
						'Return_date'=>$this->input->post('return_date'),
						'travel_type'=>$this->input->post('travel_type'),
						'DistCode'=>$this->input->post('district'),
						'StCode'=>$this->input->post('state'),
						'location'=>$this->input->post('location'),
						'Expected_expense'=>$this->input->post('Expected'),
						'driver_name'=>$name,
						'driver_phone'=>$phone,
						'drop_type'=>$this->input->post('droptype'),
						'date' =>date('Y-m-d'),
						
			        );
						 $this->travel_model->Add_cab($data);
						 $sub="Cab Request Notification";
					     $msg="<html>
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
			       <tr>
				       <td><img src='./assets/images/poc.jpg'  id='printTable' /></td>
					   <td>
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
				       <td colspan='2'>Cab Request</td>
				   </tr>
			       <tr>
				       <td>Emreference</td>
					   <td>".$this->input->post('emid')."</td>
				   </tr>
				   <tr>
				       <td>Purpose</td>
					   <td>".$this->input->post('purpose')."</td>
				   </tr>
				   <tr>
				       <td>Travel From</td>
					   <td>".$this->input->post('from')."</td>
				   </tr>
				    <tr>
				       <td>Travel To</td>
					   <td>".$this->input->post('to')."</td>
				    </tr>
					<tr>
				       <td>Location</td>
					   <td>".$this->input->post('location')."</td>
				    </tr>
					<tr>
				       <td>Date</td>
					   <td>".$this->input->post('travel_date')."</td>
				    </tr>
			    </table>
            </div>
           
          </div>
                            </body>							
						</html>";
				         $this->mail($sub,$msg);
						 $this->session->set_flashdata('feedback','Request successfully');
                        redirect('Travel/Cab_view');
	}
    public function Cab_view()
	{
		if($this->session->userdata('user_type')=='EMPLOYEE'){
	    $emid1= $this->session->userdata('user_login_id');
		$emid= $this->session->userdata('user_id');
        $data['employee']=$this->employee_model->emselectByID($emid1);
        $data['cab']=$this->travel_model->emcabByID($emid);
	    $this->load->view('backend/cab',$data);
		}
		else
		{
			$data['employee']=$this->employee_model->emselect();
			$data['cab']=$this->travel_model->emcab();
		    $this->load->view('backend/cab',$data);
		}
	}
	public function Expense_pay()
	{
		$id=$this->input->post('Expcode');
		$data=array(
		              'payment_method'=>$this->input->post('pmethod'),
					  'payee'=>$this->input->post('payee'),
					  'payment_method'=>$this->input->post('amount'),
					  'payment_date'=>date('Y-m-d'),
					  'exp_status'=>"unpaid",
		            );
	   $this->travel_model->update_payment($id,$data);
       $this->session->set_flashdata('feedback','Payed successfully');
	   redirect('travel/expense_view');
	}
	public function expsingleview()
	{
		
		if($this->session->userdata('user_type')=='EMPLOYEE'){
        $emid= $this->session->userdata('user_id');
		$id = base64_decode($this->input->get('I'));
		
        $data['employe']=$this->employee_model->emselectByID($emid);
        $data['employee']=$this->travel_model->singlexpensebyid($emid,$id);
		
		$this->load->view('backend/expenseoverview',$data);
		}
		else
		{
			$id = base64_decode($this->input->get('I'));
			$data['employee']=$this->travel_model->singlexpense($id);
			
		    $this->load->view('backend/expenseoverview',$data);
		}
		
	}
    public function cabsingleview()
	{
		
		if($this->session->userdata('user_type')=='EMPLOYEE'){
        $emid= $this->session->userdata('user_id');
		$id = base64_decode($this->input->get('I'));
        $data['employe']=$this->employee_model->emselectByID($emid);
        $data['cabover']=$this->travel_model->singlecabyid($emid,$id);
		$this->load->view('backend/caboverview',$data);
		}
		else
		{
			$id = base64_decode($this->input->get('I'));
			$data['cabover']=$this->travel_model->singlecab($id);
		    $this->load->view('backend/caboverview',$data);
		}
		
	}
	 public function Expense_view()
	{
		if($this->session->userdata('user_type')=='EMPLOYEE'){
        $emid= $this->session->userdata('user_login_id');
        $data['employe']=$this->employee_model->emselectByID($emid);
        $data['employee']=$this->travel_model->emexpenseByID($emid);
		$this->load->view('backend/expense',$data);
		}
		else
		{
			$data['employee']=$this->travel_model->emexp();
		    $this->load->view('backend/expense',$data);
		}
	}
   public function mail($sub,$msg)
	{
			$name="arun";
					$email="arunold2000@gmail.com";
					$password="arun543@!";
					$subject=$sub;
					$message=$msg;
					$file_to_attach='';
					$bccmail="info@thirunallarutemple.org";
					
					require  APPPATH.'third_party/PHPMailer/PHPMailerAutoload.php';
					
					//     $mail = new PHPMailer();
					//     $mail->isSMTP();
					//     $mail->SMTPDebug = 0;
					//     $mail->Port     = 25;
					//     $mail->SMTPOptions = array(
					//                             'ssl' => array(
					//         'verify_peer' => false,
					//         'verify_peer_name' => false,
					//         'allow_self_signed' => true
					//     )
					// );
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
							$mail->setFrom("HRMS","Sample");
					//$mail->addBCC($bccmail,"Thirunallaru");
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