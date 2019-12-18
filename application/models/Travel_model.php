
<?php

	class Travel_model extends CI_Model
	{
		
		 public function emexpenseByID($emid)
		 {
			   $sql = "SELECT * FROM expenses left join employee on employee.id=expenses.id
			   WHERE employee.em_id='$emid'";
			   $query=$this->db->query($sql);
			   $result = $query->result();
			   return $result;
	    }
		public function singlexpense($id)
		{
		   $sql = "SELECT * FROM expenses left join employee on employee.id=expenses.id WHERE expenses.yid='$id'";
		   $query=$this->db->query($sql);
		   $result = $query->result();
		   return $result;
		}
		public function singlexpensebyid($emid,$id)
		{
		   $sql = "SELECT * FROM expenses right join employee on employee.id=expenses.id WHERE expenses.yid='$id' AND  employee.id='$emid'";
		   
		   $query=$this->db->query($sql);
		   $result = $query->result();
		   return $result;
		}
		public function singlecab($id)
		{
		   $sql = "SELECT * FROM cab left join employee on employee.em_id=cab.id WHERE cab.cabid='$id'";
		   $query=$this->db->query($sql);
		   $result = $query->result();
		   return $result;
		}
		public function singlecabyid($emid,$id)
		{
		   $sql = "SELECT * FROM cab right join employee on employee.em_id=cab.id WHERE cab.cabid='$id' AND  employee.id='$emid'";
		   $query=$this->db->query($sql);
		   $result = $query->result();
		   return $result;
		}
		public function selectstate()
		{
			 $query = $this->db->get('state');
             $result = $query->result();
             return $result;
		}
		public function selectdistrict($state)
		{
		   $sql = "SELECT * FROM district WHERE StCode = '" . $_POST["state_id"] . "'";
		   $query=$this->db->query($sql);
		   $result = $query->result();
		   return $result;
		}
		public function emexp()
		{
		   $sql = "SELECT * FROM expenses left join employee on employee.id=expenses.id";
		   $query=$this->db->query($sql);
		   $result = $query->result();
		   return $result;
		}
		public function emcabByID($emid)
		{
		   $sql = "SELECT * FROM cab left join employee on employee.em_id=cab.id
		   WHERE employee.em_id='$emid'";
		   $query=$this->db->query($sql);
		   $result = $query->result();
		   return $result;
	    }
        public function emcab()
	    {
		   $sql = "SELECT * FROM cab left join employee on employee.em_id=cab.id";
		   $query=$this->db->query($sql);
		   $result = $query->result();
		   return $result;
	    }
		 public function Add_expense($data){
        $this->db->insert('expenses',$data);
      }
		public function selectexpdail($data)
		{
			  $sql = "SELECT * FROM expenses left join employee  on employee.id=expenses.id  WHERE expenses.yid>0";
			  if($data["date"]!="")
			  {
				$sql.=" AND expenses.date='".$data["date"]."'";
			  }
			  if($data["date1"]!="")
			  {
				    $sql.=" AND expenses.date>='".$data["date1"]."'";
			  }
			  if($data["date2"]!="")
			  {
				 $sql.=" AND expenses.date<='".$data["date2"]."'";
			  }
			  if($data["pay"]!="")
			  {
				 $sql.=" AND expenses.exp_status<='".$data["pay"]."'";
			  }
			   if($data["status"]!="")
			  {
				 $sql.=" AND expenses.t_status<='".$data["status"]."'";
			  }
			    $query=$this->db->query($sql);
	          $result = $query->result();
	          return $result;
			 
		}
		public function selectcabdail($data)
		{
			  $sql = "SELECT * FROM cab left join employee  on employee.id=cab.id  WHERE cab.cabid>0";
			  if($data["date1"]!="")
			  {
				    $sql.=" AND cab.date>='".$data["date1"]."'";
			  }
			  if($data["date2"]!="")
			  {
				 $sql.=" AND cab.date<='".$data["date2"]."'";
			  }
			  if($data["emid"]!="all")
			  {
				   $sql.=" AND cab.id='".$data["emid"]."'";
			  }
              $query=$this->db->query($sql);
	          $result = $query->result();
	          return $result;
		}
		public function Add_cab($data)
		{
            $this->db->insert('cab',$data);
        }
	}
?>