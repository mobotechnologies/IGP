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
   use PhpOffice\PhpSpreadsheet\Helper\Sample;
   use PhpOffice\PhpSpreadsheet\IOFactory;
   use PhpOffice\PhpSpreadsheet\Spreadsheet;
   use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
   require 'excel/vendor/autoload.php';
   $spreadsheet = new Spreadsheet();
   $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
   $drawing->setName('Paid');
   $drawing->setDescription('Paid');
   $drawing->setPath(getcwd().'/assets/images/poc.png'); // put your path and image here
   $drawing->setHeight(50);
   $drawing->setCoordinates('A1');
   $drawing->getShadow()->setVisible(true);
   $drawing->getShadow()->setDirection(45);
   $drawing->setWorksheet($spreadsheet->getActiveSheet());
	$spreadsheet->getProperties()->setCreator('Arunachalam')
				->setLastModifiedBy('Binary2quantum Techbase')
				->setTitle('InternalGatePass')
				->setSubject('Poclain_report')
				->setDescription('Expense_report ')
				->setKeywords('developed_by')
				->setCategory('Arunachalam(b2qtb041)');
				
$styleArray = array(
    'font'  => array(
        'bold'  => true,
        'color' => array('rgb' => 'Black'),
        'size'  => 15,
        'name'  => 'Bold'
    ));
	         $spreadsheet->getActiveSheet()->getStyle('D4:H4')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
	         $spreadsheet->getActiveSheet()->getStyle('A4:P4')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('6666ff');
	         $spreadsheet->getActiveSheet()->mergeCells("D4:H4");
			 $spreadsheet->getActiveSheet()->getCell('G1')->setValue('Expense Report');
			 $spreadsheet->setActiveSheetIndex(0)->getStyle('G1')->applyFromArray($styleArray);
             $spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(10);
		     $spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(15);
			 $spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(15);
			 $spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(15);
			 $spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(15);
		     $spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(15);
		     $spreadsheet->getActiveSheet()->getColumnDimension('G')->setWidth(15);
		     $spreadsheet->getActiveSheet()->getColumnDimension('H')->setWidth(15);
		     $spreadsheet->getActiveSheet()->getColumnDimension('I')->setWidth(15);
		     $spreadsheet->getActiveSheet()->getColumnDimension('J')->setWidth(15);
			 $spreadsheet->getActiveSheet()->getColumnDimension('K')->setWidth(15);
			 $spreadsheet->getActiveSheet()->getColumnDimension('L')->setWidth(15);
			 $spreadsheet->getActiveSheet()->getColumnDimension('M')->setWidth(15);
			 $spreadsheet->getActiveSheet()->getColumnDimension('N')->setWidth(15);
			 $spreadsheet->getActiveSheet()->getColumnDimension('O')->setWidth(15);
			 $spreadsheet->getActiveSheet()->getColumnDimension('P')->setWidth(15);
			 $spreadsheet->getActiveSheet()->getColumnDimension('Q')->setWidth(15);
			 $spreadsheet->getActiveSheet()->getColumnDimension('R')->setWidth(15);
			 $spreadsheet->setActiveSheetIndex(0)          
						->setCellValue('A4','Sl.No')
						->setCellValue('B4','Employee_name')
						->setcellvalue('C4','Category')
						->setcellvalue('D4','Attachment')
						->setcellvalue('I4','Purpose')
						->setCellValue('J4','Payment method')
						->setCellValue('K4','Payee')
						->setcellvalue('L4','Amount')
						->setcellvalue('M4','Currency')
						->setcellvalue('N4','Payment_date')
						->setcellvalue('O4','PaymentStatus')
						->setcellvalue('P4','Status');
			$n=5;
			$s=1;
         	foreach($expreport as $value) 
			{
				//  $spreadsheet->getActiveSheet()->getStyle('D'.$n.':H'.$n)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('ffff99');
				 $spreadsheet->setActiveSheetIndex(0)
                 ->setCellValue('A'.$n,$s)
				 ->setCellValue('B'.$n,$value->first_name)
				 ->setcellvalue('C'.$n,$value->exp_category)
				 ->setcellvalue('I'.$n,$value->purpose)
				 ->setCellValue('J'.$n,$value->payment_method)
				 ->setCellValue('K'.$n,$value->payee)
				 ->setcellvalue('L'.$n,$value->amount)
				 ->setcellvalue('M'.$n,$value->currency)
				 ->setcellvalue('N'.$n,$value->payment_date)
				 ->setcellvalue('O'.$n,$value->exp_status)
              	 ->setcellvalue('P'.$n, $value->t_status);
				  $dec=json_decode($value->Bill_document);
				if(is_array($dec))
				{	 
				     foreach($dec as $key => $val)
					 {
					      
					       $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
						   $drawing->setName('Paid');
						   $drawing->setDescription('Paid');
						   $drawing->setPath(getcwd().'/assets/expense/'.$val); // put your path and image here
						   $drawing->setHeight(50);
						   $drawing->setCoordinates('D'.$n);
						   $drawing->getShadow()->setVisible(true);
						   $drawing->getShadow()->setDirection(45);
						   $drawing->setWorksheet($spreadsheet->getActiveSheet());
						   $n=$n+5;
					 }
				}
				else
				{
				   $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
				   $drawing->setName('Paid');
				   $drawing->setDescription('Paid');
				   $drawing->setPath(getcwd().'/assets/expense/'.$value->Bill_document); // put your path and image here
				   $drawing->setHeight(50);
				   $drawing->setCoordinates('D'.$n);
				   $drawing->getShadow()->setVisible(true);
				   $drawing->getShadow()->setDirection(45);
				   $drawing->setWorksheet($spreadsheet->getActiveSheet());
				}
				 

				
				 $n++;
		         $s++;				 
			}
			$spreadsheet->getActiveSheet()->setTitle('Report');
			$spreadsheet->setActiveSheetIndex(0);
			$writer = new Xlsx($spreadsheet);
			
			$writer->save(getcwd().'\application\views\backend\poclain_report.xlsx');
   
    ?>   
	  <h1 style="font-color:green">Your download will start automatically........</h1>
      </body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	  <script>
	     $(document).ready(function(){
             window.location.href ="<?php echo base_url(); ?>application/views/backend/poclain_report.xlsx";
             setTimeout(function() {window.location.href ="<?php echo base_url(); ?>security/stockin_report"},1000);
});
	  </script>
  </html>