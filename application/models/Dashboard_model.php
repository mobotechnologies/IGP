<?php

	class Dashboard_model extends CI_Model{


	function __consturct(){
	parent::__construct();
	
	}
    public function insert_tododata($data){
        $this->db->insert('to-do_list',$data);
    }
	
	public function inwardcount(){
    $sql = "SELECT count(*) as inward FROM stock_inward";
        $query=$this->db->query($sql);
        $result = $query->result();
        return $result;
  }
   public function outwardcount(){
    $sql = "SELECT count(*) as outward FROM stock_outward";
        $query=$this->db->query($sql);
        $result = $query->result();
        return $result;
  }
   public function visitor(){
    $sql = "SELECT count(*) as vistor FROM visitor_management";
        $query=$this->db->query($sql);
        $result = $query->result();
        return $result;
  }
 public function outcomp(){
        $sql = "SELECT count(*) as outcomp FROM stock_outward where status='Closed'";
        $query=$this->db->query($sql);
        $result = $query->result();
        return $result;
  }
  public function pending()
  {
         $sql = "SELECT count(*) as pending FROM stock_inward where GatePass='NULL'";
        $query=$this->db->query($sql);
        $result = $query->result();
        return $result;
  }
 public function outnotcomp(){
        $sql = "SELECT count(*) as outnotcomp FROM stock_outward where status='NULL' OR status='Opened'";
        $query=$this->db->query($sql);
        $result = $query->result();
        return $result;
  }
  public function cab(){
    $sql = "SELECT count(*) as cab FROM cab";
        $query=$this->db->query($sql);
        $result = $query->result();
        return $result;
  }
  public function expense(){
    $sql = "SELECT count(*) as expense FROM expenses";
        $query=$this->db->query($sql);
        $result = $query->result();
        return $result;
  }

		
    public function GettodoInfo($userid){
        $sql = "SELECT * FROM `to-do_list` WHERE `user_id`='$userid' ORDER BY `date` DESC";
        $query=$this->db->query($sql);
        $result = $query->result();
        return $result;
    }
    public function GetRunningProject(){
        $sql = "SELECT * FROM `project` WHERE `pro_status`='running' ORDER BY `id` DESC";
        $query=$this->db->query($sql);
        $result = $query->result();
        return $result;
    }
    public function GetHolidayInfo(){
        $sql = "SELECT * FROM `holiday` ORDER BY `id` DESC LIMIT 10";
        $query=$this->db->query($sql);
        $result = $query->result();
        return $result;
    }
	public function UpdateTododata($id,$data){
		$this->db->where('id', $id);
		$this->db->update('to-do_list',$data);		
	}        
    }
?>