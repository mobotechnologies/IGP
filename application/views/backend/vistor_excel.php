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
				->setDescription('Visitor_report')
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
	         $spreadsheet->getActiveSheet()->getStyle('A4:S4')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('6666ff');
	       //  $spreadsheet->getActiveSheet()->mergeCells("D4:H4");
			 $spreadsheet->getActiveSheet()->getCell('G1')->setValue('Visitor Report');
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
		     $spreadsheet->getActiveSheet()->getColumnDimension('O')->setWidth(15);
		     $spreadsheet->getActiveSheet()->getColumnDimension('M')->setWidth(15);
		     $spreadsheet->getActiveSheet()->getColumnDimension('N')->setWidth(15);
		     $spreadsheet->getActiveSheet()->getColumnDimension('P')->setWidth(15);
			 $spreadsheet->getActiveSheet()->getColumnDimension('Q')->setWidth(15);
			 $spreadsheet->getActiveSheet()->getColumnDimension('R')->setWidth(15);
			 $spreadsheet->getActiveSheet()->getColumnDimension('S')->setWidth(15);
			 $spreadsheet->setActiveSheetIndex(0)          
						->setCellValue('A4','Sl.No')
						->setCellValue('B4','Date')
						->setcellvalue('C4','In Time')
						->setcellvalue('D4','Out Time')
						->setcellvalue('E4','passno')
						->setCellValue('F4','Name')
						->setCellValue('G4','Phone')
						->setcellvalue('H4','Email No')
						->setcellvalue('I4','Address')
						->setcellvalue('J4','Meeting_to')
						->setcellvalue('K4','Purpose')
						->setcellvalue('L4','Visitor Company')
						->setcellvalue('M4','Accompanied By')
						->setcellvalue('N4','Ttem Carried')
						->setcellvalue('O4','Item Issued')
						->setcellvalue('P4','Item Deposited')
						->setcellvalue('Q4','Company Phone')
						->setcellvalue('R4','Company Address');
			$n=5;
			$s=1;
            foreach ($visitor as $key => $value)
			{
				//$spreadsheet->getActiveSheet()->getStyle('D'.$n.':H'.$n)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('ffff99');
				 $spreadsheet->setActiveSheetIndex(0)
                 ->setCellValue('A'.$n,$s)
				 ->setCellValue('B'.$n,$value->date)
				 ->setcellvalue('C'.$n,$value->intime)
				 ->setcellvalue('D'.$n,$value->out)
				 ->setcellvalue('E'.$n,$value->passno)
				 ->setcellvalue('F'.$n,$value->name)
				 ->setcellvalue('G'.$n,$value->phone)
				 ->setcellvalue('H'.$n,$value->email)
				 ->setcellvalue('I'.$n,$value->address)
				 ->setcellvalue('J'.$n,$value->meeting_to)
				 ->setcellvalue('K'.$n,$value->purpose)
				 ->setcellvalue('L'.$n,$value->organization)
				 ->setcellvalue('M'.$n,$value->accompanied_by)
				 ->setcellvalue('N'.$n,$value->item_carried)
				 ->setcellvalue('O'.$n,$value->item_issued)
				 ->setcellvalue('P'.$n,$value->item_deposited)
				 ->setcellvalue('Q'.$n,$value->companyphone)
				 ->setcellvalue('R'.$n,$value->companyaddress);
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