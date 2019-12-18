<?php

	class Security_model extends CI_Model
	{
     public function Update_stockin($id,$data){
		$this->db->where('id', $id);
		$this->db->update('stock_inward',$data);        
     }
	 public function Update_stockoutapprove($id,$data){
		$this->db->where('id', $id);
		$this->db->update('stock_outward',$data);        
     }
		public function insert_materialin($data)
		{
			 $this->db->insert("stock_inward", $data);
		}
		public function insert_materialout($data)
		{
			$this->db->insert("stock_outward", $data);
		}
		public function insert_particules($data)
		{
			 $this->db->insert("outward_particules",$data);
		}
		public function inward_particules($data)
		{
			 $this->db->insert("inward_particules",$data);
		}
		public function inward_time($data)
		{
			 $this->db->insert("inward_time",$data);
		}
		public function outward_time($data)
		{
			 $this->db->insert("outward_time",$data);
		}
		public function insert_visitor($data)
		{
			$this->db->insert("visitor_management", $data);
		}
		public function getmaxid()
		{
			 $this->db->select('max(id)');
            $this->db->from('stock_outward');
			return $this->db->get()->row('max(id)');
			
		}
	    public function getmaxid2()
		{
			 $this->db->select('max(id)');
            $this->db->from('stock_inward');
			return $this->db->get()->row('max(id)');
			
		}
        public function insert_comment($dc)
		{
			$this->db->insert("comments",$dc);
		}
        public function getconfig()
       {
            $sql ="SELECT * FROM configuration";
			$query=$this->db->query($sql);
            $result = $query->result(); 
	        return $result;
        }
		public function getmail($to)
		{
		
			  $this->db->select('em_email');
              $this->db->from('employee');
              $this->db->where('em_id',$to);
              return $this->db->get()->row('em_email');

		}
		public function selectoutmat()
		{
			 $query = $this->db->get('stock_outward');
             $result = $query->result();
             return $result;
		}
		public function selectconfig()
		{
			 $query = $this->db->get('configuration');
             $result = $query->result();
             return $result;
		} 
	    public function selectconfig2()
		{
			 $query = $this->db->get('config2');
             $result = $query->result();
             return $result;
		} 
		public function selectvisitor()
		{
			$query = $this->db->get('visitor_management');
             $result = $query->result();
             return $result;
		}
		public function selectinmat()
		{
		     $query = $this->db->get('stock_inward');
             $result = $query->result();
             return $result;
		}
        public function selectvendor()
        {
             
		    $sql = "SELECT DISTINCT vendor from stock_inward";
            $query=$this->db->query($sql);
            $result = $query->result(); 
	        return $result;
        }
     public function selectchecked()
        {
             
		    $sql = "SELECT DISTINCT checkedby from stock_inward";
            $query=$this->db->query($sql);
            $result = $query->result(); 
	        return $result;
        }
		public function selectcomment()
		{
			$sql ="SELECT * FROM comments WHERE status = 0";
			$query=$this->db->query($sql);
            $result = $query->result(); 
	        return $result;
		}
		public function selectinmatdail($data)
		{

				  $sql = "SELECT * FROM stock_inward  WHERE id>0 AND ".$data["datetype"]." between '".$data["date1"]."' AND '".$data["date2"]."'";

              $query=$this->db->query($sql);

                  $result = $query->result();
			 
	          return $result;
		}
		public function update_inward1($data,$id)
		{

           $this->db->where('id',$id);
		   $this->db->update('stock_inward',$data); 
		}	
		  public function update_inward2($data,$id)
		{

           $this->db->where('id',$id);
		   $this->db->update('stock_inward',$data); 
		}	
		public function update_inward3($data,$id)
		{

           $this->db->where('id',$id);
		   $this->db->update('stock_inward',$data); 
		}	
        public function update_level1($data,$id)
		{

           $this->db->where('id',$id);
		   $this->db->update('configuration',$data); 
		}		
        public function update_level2($data,$id)
		{

           $this->db->where('id',$id);
		   $this->db->update('configuration',$data); 
		}
        public function update_level3($data,$id)
		{

           $this->db->where('id',$id);
		   $this->db->update('configuration',$data); 
		}
		 public function update_level4($data,$id)
		{

           $this->db->where('id',$id);
		   $this->db->update('config2',$data); 
		}
		 public function update_level5($data,$id)
		{

           $this->db->where('id',$id);
		   $this->db->update('config2',$data); 
		}
		 public function update_level6($data,$id)
		{

           $this->db->where('id',$id);
		   $this->db->update('config2',$data); 
		}
        public function update_email1($data,$id)
		{

           $this->db->where('id',$id);
		   $this->db->update('stock_outward',$data); 
		}		
        public function update_email2($data,$id)
		{

           $this->db->where('id',$id);
		   $this->db->update('stock_outward',$data); 
		}
        public function update_email3($data,$id)
		{

           $this->db->where('id',$id);
		   $this->db->update('stock_outward',$data); 
		}		
		public function Update_ingat($id,$data)
		{
		$this->db->where('ipid', $id);
		$this->db->update('inward_time',$data);        
        }
		public function Update_outgat($id,$data)
		{
		$this->db->where('id', $id);
		$this->db->update('stock_outward',$data);        
        }
	    public function update_stockinremark($id,$data)
		{
			$this->db->where('id', $id);
		    $this->db->update('stock_inward',$data);      
		}
		public function update_stockoutremark($id,$data)
		{
			$this->db->where('id', $id);
		    $this->db->update('stock_outward',$data);      
		}
		public function update_visitorremark($id,$data)
		{
			$this->db->where('id', $id);
		    $this->db->update('visitor_management',$data);      
		}
		public function Update_visitgat($id,$data)
		{
		   $this->db->where('id', $id);
		   $this->db->update('visitor_management',$data);        
        }
		public function  getaddmails($id)
		{
			  $sql = "SELECT email1,email2,email3,GatePass FROM stock_inward   WHERE id='$id'";
              $query=$this->db->query($sql);
	          $result = $query->result();
	          return $result;
		}
		public function emmailcode($code)
		{
			  $sql = "SELECT em_email FROM employee  WHERE em_code='$code'";
              $query=$this->db->query($sql);
	          $result = $query->result();
	          return $result;
		}
		public function singlestockin($id)
		{
			  $sql = "SELECT * FROM stock_inward   WHERE id='$id'";
              $query=$this->db->query($sql);
	          $result = $query->result();
	          return $result;
		}
		public function singlestockover($id)
		{
			  $sql = "SELECT * FROM stock_outward    WHERE id='$id'";
              $query=$this->db->query($sql);
	          $result = $query->result();
	          return $result;
		}
	    public function singlestockpartover($id)
		{
			  $sql = "SELECT * FROM outward_particules   WHERE id='$id'";
              $query=$this->db->query($sql);
	          $result = $query->result();
	          return $result;
		}
        public function inmateriallist($id)
		{
			  $sql = "SELECT * FROM inward_particules   WHERE id='$id'";
              $query=$this->db->query($sql);
	          $result = $query->result();
	          return $result;
		}
		  public function inmaterialpart($id)
		{
			  $sql = "SELECT * FROM inward_time   WHERE ipid='$id'";
              $query=$this->db->query($sql);
	          $result = $query->result();
	          return $result;
		}
		public function singlevisitor($id)
		{
			  $sql = "SELECT * FROM visitor_management   WHERE id='$id'";
              $query=$this->db->query($sql);
	          $result = $query->result();
	          return $result;
		}
		public function countcomment()
		{
			$sql="SELECT * FROM comments WHERE status = 0";
			$query=$this->db->query($sql);
		    $result = $query->num_rows();
		    return $result;
		}
		public function updatecomment()
		{
			$sql="UPDATE comments SET status=1 WHERE status=0";
			$this->db->query($sql);
		}
	    public function selectoutmatdail_locket($data)
		{

          $sql = "SELECT * FROM stock_outward   WHERE id>0 AND  approve1='Yes' AND approve2='Yes'  AND approve3='Yes'  AND locket = '".$data["datetype"]."' OR gatepass ='".$data["datetype"]."'";
	      $query=$this->db->query($sql);
				  $result = $query->result();
				  return $result;

	          
}
		public function selectoutmatdail($data)
		{
		    $sql = "SELECT * FROM stock_outward   WHERE id>0 AND ".$data["datetype"]." between '".$data["date1"]."' AND '".$data["date2"]."'";
            $query=$this->db->query($sql);
	        $result = $query->result();
	        return $result;
		}
		public function jan()
		{
			$sql="SELECT COUNT(id) as count FROM visitor_management WHERE month(date)='1'   AND year(date)='".date('Y')."'";
		    $query=$this->db->query($sql);
	        $result = $query->result();
	        return $result;
		}
	    public function feb()
		{
			$sql="SELECT COUNT(id) as count FROM visitor_management WHERE month(date)='2'   AND year(date)='".date('Y')."'";
		    $query=$this->db->query($sql);
	        $result = $query->result();
	        return $result;
		}	
		public function mar()
		{
			$sql="SELECT COUNT(id) as count FROM visitor_management WHERE month(date)='3'   AND year(date)='".date('Y')."'";
		    $query=$this->db->query($sql);
	        $result = $query->result();
	        return $result;
		}	
		public function april()
		{
			$sql="SELECT COUNT(id) as count FROM visitor_management WHERE month(date)='4'   AND year(date)='".date('Y')."'";
		    $query=$this->db->query($sql);
	        $result = $query->result();
	        return $result;
		}	
		public function may()
		{
			$sql="SELECT COUNT(id) as count FROM visitor_management WHERE month(date)='5'   AND year(date)='".date('Y')."'";
		    $query=$this->db->query($sql);
	        $result = $query->result();
	        return $result;
		}	
	    public function june()
		{
			$sql="SELECT COUNT(id) as count FROM visitor_management WHERE month(date)='6'   AND year(date)='".date('Y')."'";
		    $query=$this->db->query($sql);
	        $result = $query->result();
	        return $result;
		}	
		public function july()
		{
			$sql="SELECT COUNT(id) as count FROM visitor_management WHERE month(date)='7'   AND year(date)='".date('Y')."'";
		    $query=$this->db->query($sql);
	        $result = $query->result();
	        return $result;
		}	
		public function aug()
		{
			$sql="SELECT COUNT(id) as count FROM visitor_management WHERE month(date)='8'   AND year(date)='".date('Y')."'";
		    $query=$this->db->query($sql);
	        $result = $query->result();
	        return $result;
		}	
		public function sept()
		{
			$sql="SELECT COUNT(id) as count FROM visitor_management WHERE month(date)='9'   AND year(date)='".date('Y')."'";
		    $query=$this->db->query($sql);
	        $result = $query->result();
	        return $result;
		}
        public function oct()
		{
			$sql="SELECT COUNT(id) as count FROM visitor_management WHERE month(date)='10'   AND year(date)='".date('Y')."'";
		    $query=$this->db->query($sql);
	        $result = $query->result();
	        return $result;
		}	
        public function nov()
		{
			$sql="SELECT COUNT(id) as count FROM visitor_management WHERE month(date)='11'   AND year(date)='".date('Y')."'";
		    $query=$this->db->query($sql);
	        $result = $query->result();
			
	        return $result;
		}	
		public function dec()
		{
			$sql="SELECT COUNT(id) as count FROM visitor_management WHERE month(date)='12'   AND year(date)='".date('Y')."'";
		    $query=$this->db->query($sql);
	        $result = $query->result();
	        return $result;
		}	
		public function cabchart1()
		{
			$sql="SELECT COUNT(id) as count FROM cab WHERE cab_status='Yes'  group by MONTH(date)";
		    $query=$this->db->query($sql);
	        $result = $query->result();
	        return $result;
		}
		public function cabchart2()
		{
			$sql="SELECT COUNT(id) as count FROM cab WHERE cab_status='No' group by MONTH(date)";
		    $query=$this->db->query($sql);
	        $result = $query->result();
	        return $result;
		}
	    public function expchart1()
		{
			$sql="SELECT COUNT(id) as count FROM cab WHERE cab_status='Yes'  group by MONTH(date)";
		    $query=$this->db->query($sql);
	        $result = $query->result();
	        return $result;
		}
		public function expchart2()
		{
			$sql="SELECT COUNT(id) as count FROM cab WHERE cab_status='No' group by MONTH(date)";
		    $query=$this->db->query($sql);
	        $result = $query->result();
	        return $result;
		}
		public function selectvisitdail($data)
		{

			  
			  $sql = "SELECT * FROM visitor_management WHERE id>0 AND date BETWEEN '".$data["date1"]."' AND '".$data["date2"]."'";
			  if($data["emid"]!="")
			  {
				  $sql.=" AND meeting_to='".$data["emid"]."'"; 
			  }


              $query=$this->db->query($sql);
	          $result = $query->result();
	          return $result;
		}
		public function stockin_del($id)
		{
			 $this->db->delete('stock_inward',array('id'=> $id));
			 $this->db->delete('inward_particules',array('id'=> $id));
		}
		public function stockout_del($id)
		{
			 $this->db->delete('stock_outward',array('id'=> $id));
			 $this->db->delete('outward_particules',array('id'=> $id));
		}
		public function visitor_del($id)
		{
			 $this->db->delete('visitor_management',array('id'=> $id));
		}
		public function cab_del($id)
		{
			 $this->db->delete('cab',array('id'=> $id));
		}
		public function expense_del($id)
		{
			 $this->db->delete('expenses',array('id'=> $id));
		}
	}