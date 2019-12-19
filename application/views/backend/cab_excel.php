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
				->setDescription('Cab_report ')
				->setKeywords('developed_by')
				->setCategory('Arunachalam(b2qtb041)');
				
$styleArray = array(
    'font'  => array(
        'bold'  => true,
        'color' => array('rgb' => 'Black'),
        'size'  => 15,
        'name'  => 'Bold'
    ));
	       //  $spreadsheet->getActiveSheet()->getStyle('D4:H4')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
	         $spreadsheet->getActiveSheet()->getStyle('A4:O4')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('6666ff');
	       //  $spreadsheet->getActiveSheet()->mergeCells("D4:H4");
			 $spreadsheet->getActiveSheet()->getCell('G1')->setValue('Cab Report');
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
			 $spreadsheet->setActiveSheetIndex(0)          
						->setCellValue('A4','Sl.No')
						->setCellValue('B4','EmpCode')
						->setcellvalue('C4','EmpName')
						->setcellvalue('D4','EmpPhone')
						->setcellvalue('E4','EmpEmail')
						->setCellValue('F4','Purpose')
						->setCellValue('G4','Location')
						->setcellvalue('H4','Driver Name')
						->setcellvalue('I4','Driver Phone')
						->setcellvalue('J4','Status');
			$n=5;
			$s=1;
            foreach($cabreport as $value)
			{
				//$spreadsheet->getActiveSheet()->getStyle('D'.$n.':H'.$n)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('ffff99');
				 $spreadsheet->setActiveSheetIndex(0)
                 ->setCellValue('A'.$n,$s)
				 ->setCellValue('B'.$n,$value->em_code)
				 ->setcellvalue('C'.$n, $value->first_name."".$value->last_name)
				 ->setcellvalue('D'.$n,$value->em_phone)
				 ->setcellvalue('E'.$n,$value->em_email)
				 ->setcellvalue('F'.$n,$value->purpose)
				 ->setcellvalue('G'.$n,$value->location)
				 ->setcellvalue('H'.$n,$value->driver_name)
				 ->setcellvalue('I'.$n,$value->driver_phone);
			   if(($value->approve1=="Yes" || $value->approve1=="No")   && ($value->approve2=="Yes" ||$value->approve2=="No" ) && ($value->approve3=="Yes" || $value->approve3=="No") )
			   {
					 if($value->approve1 =="Yes" && ($value->approve2=="Yes" || $value->approve3=="Yes"))
					  {
								  $spreadsheet->setActiveSheetIndex(0)
								 ->setcellvalue('J'.$n,'Approved');
					  }
					  else
				      {
						   $spreadsheet->setActiveSheetIndex(0)
						  ->setcellvalue('J'.$n,'Rejected');
					  }
			   }
			   else
			   {
				   
						   $spreadsheet->setActiveSheetIndex(0)
						  ->setcellvalue('J'.$n,'Requested');
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