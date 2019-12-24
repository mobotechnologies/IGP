  <!DOCTYPE html>
  <html>
  <head>
    <title></title>
    <meta charset="utf-8">
    <style type="text/css">
 
  .middle{

    text-align: center;
  }

  .totalright{

  margin-left:  540px; 
  }
  table {
      border-collapse: collapse;

  }td{
    align: :center;
  }

    </style>
  </head>

  <body>

    <?php
//     echo '<pre>';
// print_r($materialall);
//  echo '</pre>';
 error_reporting(0);
echo "<h1 class='middle'>";
  echo "Stock Inward Report";
  echo "</h1>";
  echo "From Date :", $date1,'<br>' ;
  echo "To Date    :   ",  $date2,'<br>';
  echo "Filter By:   ",  $datetype,'<br><br>';
     
          $output .='

          <table class="table marleft"  cellpadding="10" border="1">

     
          <tr>
          <th>Sl.No</th>
          <th>Category</th>
          <th>Type</th>
          <th>Subcategory</th>
          <th>Cost Center</th>
          <th>
            Return Date</th>
          <th>Organization Address</th>
         <th>Reason</th>
          <th>Approx Value</th>
            <th>Status</th>
              <th>Date</th>
                
                  <th>Approve Date</th>
                    <th> Gateout</th>
                      <th>Gate In</th>
                        <th>Gatout Date</th>
                          <th>Gate Indate</th>
                            <th>Gate Pass</th>
                              <th>Gate Date</th>
                                <th>Vechicle_no</th>
                                  <th>Vechicle Type</th>
                                    <th>Driver Name</th>
                                      <th>Driver Phone</th>
                                      <th>Depart Manager</th>
                                        <th>Operation  Manger</th>
                                          <th>Locket</th>

<th>To</th> 
<th>From</th> 

        </tr>
          

          ';
        

        $i =1;

        foreach ($materialout as $key => $value) {

      
          
       $output .= '<table border=1><tr>
       <td>'.$id.'</td>
       <td>'.$value->category.'</td>
       <td>'.$value->type.'</td>
       <td>'.$value->subcategory.'</td>
       <td>'.$value->costcenter.'</td>
       <td>'.$value->returndate.'</td>
      <td>'.$value->organization_address.'</td>
  <td>'.$value->reason.'</td>
    <td>'.$value->approx_value.'</td>
      <td>'.$value->status.'</td>
        <td>'.$value->date.'</td>
          
            <td>'.$value->approve_date.'</td>
              <td>'.$value->gateout.'</td>
                <td>'.$value->gatein.'</td>
                  <td>'.$value->gatoutdate.'</td>
                    <td>'.$value->gateindate.'</td>
                      <td>'.$value->gatepass.'</td>
                        <td>'.$value->vechicle_no.'</td>
                            <td>'.$value->vechicle_type.'</td>
                              <td>'.$value->driver_name.'</td>
                                <td>'.$value->driver_phone.'</td>
                                  <td>'.$value->departmanager.'</td>
                                     <td>'.$value->operationmanger.'</td>
                                        <td>'.$value->locket.'</td>
                                           <td>'.$value->to.'</td>
                                              <td>'.$value->from.'</td>


       </tr></table>';
               

        
     }
       
     


               
        

       echo $output;   


             header("Content-Type: application/xls");        


            header("Content-Disposition: attachment; filename=Stock_Outward_Report.xls");
           
    ?>
      </body>
  </html>