 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	    function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Dhaka');
        $this->load->database();
        $this->load->model('login_model');
        $this->load->model('dashboard_model'); 
        $this->load->model('employee_model');
        $this->load->model('settings_model');    
        $this->load->model('notice_model');    
        $this->load->model('project_model');    
        $this->load->model('leave_model');   
         $this->load->model('security_model');
		  $this->load->model('Security_model');
    }
    
	public function index()
	{
		#Redirect to Admin dashboard after authentication
        if ($this->session->userdata('user_login_access') == 1)
            redirect('dashboard/Dashboard');
            $data=array();
            #$data['settingsvalue'] = $this->dashboard_model->GetSettingsValue();
			$this->load->view('login');
	}
  function Dashboard(){
        if($this->session->userdata('user_login_access') != False) {
    $data=array();
    $data['inward'] = $this->dashboard_model->inwardcount($data);
    $data['outward'] = $this->dashboard_model->outwardcount($data);
    $data['vistor'] = $this->dashboard_model->visitor($data);
    $data['cab'] = $this->dashboard_model->cab($data);
    $data['expense'] = $this->dashboard_model->expense($data);
    $data['outwardcomplete']=$this->dashboard_model->outcomp($data);
    $data['outwardnotcomplete']=$this->dashboard_model->outnotcomp($data);
    $data['inwardpending']=$this->dashboard_model->pending($data);
	   $data1=[];
	   $data2=[];
	   $data3=[];
	   $result1=$this->security_model->jan();
	   $result2=$this->security_model->feb();
	   $result3=$this->security_model->mar();
	   $result4=$this->security_model->april();
	   $result5=$this->security_model->may();
	   $result6=$this->security_model->june();
	   $result7=$this->security_model->july();
	   $result8=$this->security_model->aug();
	   $result9=$this->security_model->sept();
	   $result10=$this->security_model->oct();
	   $result11=$this->security_model->nov();
	   $result12=$this->security_model->dec();
	   $cabresult1=$this->security_model->cabchart1();
	   $cabresult2=$this->security_model->cabchart2();
	   $expresult1=$this->security_model->expchart1();
	   $expresult2=$this->security_model->expchart2();
	   foreach($result1 as $row)
	   {
		$data1['data'][]=$row->count;
	   }
		foreach($result2 as $row)
	   {
		$data1['data'][]=$row->count;
	   }
	foreach($result3 as $row)
	   {
		$data1['data'][]=$row->count;
	   }
		foreach($result4 as $row)
	   {
		$data1['data'][]=$row->count;
	   }
	foreach($result5 as $row)
	   {
		$data1['data'][]=$row->count;
	   }
		foreach($result6 as $row)
	   {
		$data1['data'][]=$row->count;
	   }
		foreach($result7 as $row)
	   {
		$data1['data'][]=$row->count;
	   }
		foreach($result8 as $row)
	   {
		$data1['data'][]=$row->count;
	   }
		foreach($result9 as $row)
	   {
		$data1['data'][]=$row->count;
	   }
		foreach($result10 as $row)
	   {
		$data1['data'][]=$row->count;
	   }
		foreach($result11 as $row)
	   {
		$data1['data'][]=$row->count;
	   }
		foreach($result12 as $row)
	   {
		$data1['data'][]=$row->count;
	   }
	   foreach($cabresult1 as $row)
	   {
		   $data2['data'][]=$row->count;
	   }
	   foreach($cabresult2 as $row)
	   {
		   $data2['data'][]=$row->count;
	   }
	    foreach($expresult1 as $row)
	   {
		   $data3['data'][]=$row->count;
	   }
	   foreach($expresult2 as $row)
	   {
		   $data3['data'][]=$row->count;
	   }
		$data['visit'] = json_encode($data1);
		$data['cabcharts']=json_encode($data2);
	    $data['exp']=json_encode($data3);
        $this->load->view('backend/dashboard',$data);
        }
    else{
		redirect(base_url() , 'refresh');
	}            
    }
   
    public function add_todo(){
        $userid = $this->input->post('userid');
        $tododata = $this->input->post('todo_data');
        $date = date("Y-m-d h:i:sa");
        $this->load->library('form_validation');
        //validating to do list data
        $this->form_validation->set_rules('todo_data', 'To-do Data', 'trim|required|min_length[5]|max_length[150]|xss_clean');        
        if($this->form_validation->run() == FALSE){
            echo validation_errors();
        } else {
        $data=array();
        $data = array(
        'user_id' => $userid,
        'to_dodata' =>$tododata,
        'value' =>'1',
        'date' =>$date    
        );
        $success = $this->dashboard_model->insert_tododata($data);
            #echo "successfully added";
            if($this->db->affected_rows()){
                echo "successfully added";
            } else {
                echo "validation Error";
            }
        }        
    }
	public function Update_Todo(){
        $id = $this->input->post('toid');
		$value = $this->input->post('tovalue');
			$data = array();
			$data = array(
				'value'=> $value
			);
        $update= $this->dashboard_model->UpdateTododata($id,$data);
        $inserted = $this->db->affected_rows();
		if($inserted){
			$message="Successfully Added";
			echo $message;
		} else {
			$message="Something went wrong";
			echo $message;			
		}
	}    
    
}