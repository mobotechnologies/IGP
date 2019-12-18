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
				->setDescription('Stock_inward_report ')
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
	         $spreadsheet->getActiveSheet()->getStyle('A4:O4')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('6666ff');
	         $spreadsheet->getActiveSheet()->mergeCells("D4:H4");
			 $spreadsheet->getActiveSheet()->getCell('G1')->setValue('Stock Inward Report');
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
						->setCellValue('B4','Invoice No')
						->setcellvalue('C4','Invoice Date')
						->setcellvalue('D4','Material List')
						->setcellvalue('I4','Vendor')
						->setCellValue('J4','GatePass')
						->setCellValue('K4','GateDate')
						->setcellvalue('L4','Purpose')
						->setcellvalue('M4','Remark')
						->setcellvalue('N4','Checkedby')
						->setcellvalue('O4','Status');
			$n=5;
			$s=1;
            foreach ($materialall as $key => $value)
			{
				  $spreadsheet->getActiveSheet()->getStyle('D'.$n.':H'.$n)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('ffff99');
				 $spreadsheet->setActiveSheetIndex(0)
                 ->setCellValue('A'.$n,$s)
				 ->setCellValue('B'.$n,$value->invoice_no)
				 ->setcellvalue('C'.$n,$value->invoice_date)
				 ->setcellvalue('D'.$n,'Particules')
				 ->setcellvalue('E'.$n,'Quantity')
				 ->setcellvalue('F'.$n,'Timein')
				 ->setcellvalue('G'.$n,'Timeout')
				 ->setcellvalue('H'.$n,'checkedby')
				 ->setcellvalue('I'.$n,$value->vendor)
				 ->setCellValue('J'.$n,$value->GatePass)
				 ->setCellValue('K'.$n,$value->date)
				 ->setcellvalue('L'.$n,$value->purpose)
				 ->setcellvalue('M'.$n,$value->remark)
				 ->setcellvalue('N'.$n,$value->checkedby)
				 ->setcellvalue('O'.$n,$value->status); 
                 $result=$this->Security_model->inmateriallist($value->id);
				 foreach($result as $particules)
                 {
					  $n++;
					  $spreadsheet->setActiveSheetIndex(0)
					  ->setcellvalue('D'.$n,$particules->particules)
				      ->setcellvalue('E'.$n,$particules->quantity);
					  $resulttime=$this->Security_model->inmaterialpart($particules->ipid);		
                      foreach($resulttime as $time)
                      {
						   $spreadsheet->setActiveSheetIndex(0)
						  ->setcellvalue('F'.$n,$time->gatein)
						  ->setcellvalue('G'.$n,$time->gateout)
						  ->setcellvalue('H'.$n,$time->checkedby);
					  }
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