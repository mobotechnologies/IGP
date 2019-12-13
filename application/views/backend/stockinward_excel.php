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
   $drawing->setPath(getcwd().'/assets/images/poc.jpg'); // put your path and image here
   $drawing->setCoordinates('C2');
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
        'color' => array('rgb' => 'Blue'),
        'size'  => 15,
        'name'  => 'Bold'
    ));
	         $spreadsheet->getActiveSheet()->getStyle('E8:I8')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
	         $spreadsheet->getActiveSheet()->getStyle('B8:S8')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('6666ff');
	         $spreadsheet->getActiveSheet()->mergeCells("E8:I8");
			 $spreadsheet->getActiveSheet()->getCell('F4')->setValue('Stock Inward Report');
			 $spreadsheet->setActiveSheetIndex(0)->getStyle('F4')->applyFromArray($styleArray);
             $spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(10);
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
			 $spreadsheet->getActiveSheet()->getColumnDimension('S')->setWidth(15);
			 $spreadsheet->setActiveSheetIndex(0)          
						->setCellValue('B8','Sl.No')
						->setCellValue('C8','Invoice No')
						->setcellvalue('D8','Invoice Date')
						->setcellvalue('E8','Material List')
						->setcellvalue('K8','Vendor')
						->setCellValue('L8','GatePass')
						->setCellValue('M8','GateDate')
						->setcellvalue('N8','Purpose')
						->setcellvalue('O8','Remark')
						->setcellvalue('P8','Checkedby')
						->setcellvalue('Q8','Status');
			$n=9;
			$s=1;
            foreach ($materialall as $key => $value)
			{
				  $spreadsheet->getActiveSheet()->getStyle('E'.$n.':J'.$n)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('6666ff');
				 $spreadsheet->setActiveSheetIndex(0)
                 ->setCellValue('B'.$n,$s)
				 ->setCellValue('C'.$n,$value->invoice_no)
				 ->setcellvalue('D'.$n,$value->invoice_date)
				 ->setcellvalue('E'.$n,'Particules')
				 ->setcellvalue('F'.$n,'Quantity')
				 ->setcellvalue('G'.$n,'Timein')
				 ->setcellvalue('H'.$n,'Timeout')
				 ->setcellvalue('I'.$n,'checkedby')
				 ->setcellvalue('J'.$n,'test')
				 ->setcellvalue('K'.$n,$value->vendor)
				 ->setCellValue('L'.$n,$value->GatePass)
				 ->setCellValue('M'.$n,$value->date)
				 ->setcellvalue('N'.$n,$value->purpose)
				 ->setcellvalue('O'.$n,$value->remark)
				 ->setcellvalue('P'.$n,$value->checkedby)
				 ->setcellvalue('Q'.$n,$value->status); 
                 $result=$this->Security_model->inmateriallist($value->id);
				 foreach($result as $particules)
                 {
					  $n++;
					  $spreadsheet->setActiveSheetIndex(0)
					  ->setcellvalue('E'.$n,$particules->particules)
				      ->setcellvalue('F'.$n,$particules->quantity);
					  $resulttime=$this->Security_model->inmaterialpart($particules->ipid);		
                      foreach($resulttime as $time)
                      {
						   $spreadsheet->setActiveSheetIndex(0)
						  ->setcellvalue('G'.$n,$time->gatein)
						  ->setcellvalue('H'.$n,$time->gateout)
						  ->setcellvalue('I'.$n,$time->checkedby)
						  ->setcellvalue('J'.$n,'test');
					  }
				 }
				 $n+2;
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