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
echo "<img src='../assets/images/poc.jpg' /><h1 class='middle'>";
  echo "Vistor's Report";
  echo "</h1>";
  echo "From Date :", $date1,'<br>' ;
  echo "To Date    :   ",  $date2,'<br>';
  echo "Filter By:   ",  $emp,'<br><br>';
     
          $output .='

          <table class="table marleft"  cellpadding="10" border="1">

     
          <tr>
          <th>Sl.No</th>
          <th>Date</th>
          <th>In Time</th>
               <th>Out Time</th>
               <th>passno</th>
          <th>Name</th>
          <th>Phone</th>
          <th>Email No</th>
          <th>Address</th>
          <th>Meeting_to</th>
          <th>Purpose</th>
         <th>Visitor Company</th>
          <th>Accompanied By</th>
            <th>Ttem Carried</th>
              <th>Item Issued</th>
                
                  <th>Item Deposited</th>
                    <th>  Organization</th>
                      <th>Company Phone</th>
                        <th>Company Address</th>
                          

        </tr>
          

          ';
        

        $i =1;

        foreach ($visitor as $key => $value) {

            
       $output .= '<table border=1><tr>
       <td>'.$id.'</td>
        <td>'.$value->date.'</td>
       <td>'.$value->in.'</td>
       <td>'.$value->out.'</td>
       <td>'.$value->name.'</td>
       <td>'.$value->vechicle_type.'</td>
       <td>'.$value->phone.'</td>
      <td>'.$value->email.'</td>
  <td>'.$value->address.'</td>
    <td>'.$value->meeting_to.'</td>
      <td>'.$value->driver_name.'</td>
        <td>'.$value->driver_phone.'</td>
          
            <td>'.$value->purpose.'</td>
              <td>'.$value->visitor_company.'</td>
                <td>'.$value->accompanied_by.'</td>
                  <td>'.$value->item_carried.'</td>
                    <td>'.$value->item_issued.'</td>
                      <td>'.$value->item_deposited.'</td>
                        <td>'.$value->organization.'</td>
                            <td>'.$value->companyphone.'</td>
                              <td>'.$value->companyaddress.'</td>
                                

       </tr></table>';
               

        
     }
       
     


               
        

       echo $output;   


             header("Content-Type: application/xls");        


            header("Content-Disposition: attachment; filename=Vistors_Report.xls");
           
    ?>
      </body>
  </html>