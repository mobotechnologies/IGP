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
		
		$this->load->view('backend/expensereportdown',$data);
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
			$new_file_name='';
            $new_file_name .= $emrand;
			echo $new_file_name;
           
            $config = array(
                'file_name' => $new_file_name,
                'upload_path' => "./assets/images/users/expense",
                'allowed_types' => "gif|jpg|png|jpeg|pdf|doc|docx|txt",
                'overwrite' => False,
                'max_size' => "50720000"
            );
            $this->load->library('Upload', $config);
			$this->upload->initialize($config);      
	     
           
			print_r($this->upload->do_upload());
            if (!$this->upload->do_upload('bill')) {
                echo $this->upload->display_errors();
				//die;
			}
   
			else {
                $path = $this->upload->data();
                $img_url = $path['file_name'];
			}	
 //array_push($filearray,$emrand.".".$str[1]);			

	}
	die;
					 $data = array(
						'id' => $this->input->post('emid'),
						'exp_category'=>$this->input->post('category'),
						'currency'=>$this->input->post('currency'),
						'purpose' => $this->input->post('purpose'),
						'amount' => $this->input->post('amount'),
						'Bill_document'=>$filearray(),
						
			        );
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
					     $msg="<br>Hi,employee has  requested  for cab</br>";
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
		//print_r($data);
	    $this->load->view('backend/cab',$data);
		}
		else
		{
			$data['employee']=$this->employee_model->emselect();
			$data['cab']=$this->travel_model->emcab();
		    $this->load->view('backend/cab',$data);
		}
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