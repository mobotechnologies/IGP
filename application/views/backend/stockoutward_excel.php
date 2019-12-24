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
				->setDescription('Stock_outward_report ')
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
			 $spreadsheet->getActiveSheet()->getCell('G1')->setValue('Stock Outward Report');
			 $spreadsheet->setActiveSheetIndex(0)->getStyle('G1')->applyFromArray($styleArray);
             $spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(10);
		     $spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(15);
			 $spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(15);
			 $spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(15);
			 $spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(15);
		     $spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(23);
		     $spreadsheet->getActiveSheet()->getColumnDimension('G')->setWidth(23);
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
						->setCellValue('B4','Category')
						->setcellvalue('C4','Type')
						->setcellvalue('D4','Material List')
						->setcellvalue('I4','Subcategory')
						->setCellValue('J4','Cost Center')
						->setCellValue('K4','Return Date')
						->setcellvalue('L4','Organization Address')
						->setcellvalue('M4','Reason')
						->setcellvalue('N4','Approx value')
						->setcellvalue('O4','status');
			$n=5;
			$s=1;
               foreach ($materialout as $key => $value) 
			   {
				  $spreadsheet->getActiveSheet()->getStyle('D'.$n.':H'.$n)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('ffff99');
				 $spreadsheet->setActiveSheetIndex(0)
                 ->setCellValue('A'.$n,$s)
				 ->setCellValue('B'.$n,$value->category)
				 ->setcellvalue('C'.$n,$value->type)
				 ->setcellvalue('D'.$n,'Particules')
				 ->setcellvalue('E'.$n,'Quantity')
				 ->setcellvalue('F'.$n,'Timein/check')
				 ->setcellvalue('G'.$n,'Timeout/check')
				 ->setcellvalue('I'.$n,$value->subcategory)
				 ->setCellValue('J'.$n,$value->costcenter)
				 ->setCellValue('K'.$n,$value->returndate)
				 ->setcellvalue('L'.$n,$value->organization_address)
				 ->setcellvalue('M'.$n,$value->reason)
				 ->setcellvalue('N'.$n,$value->approx_value)
				 ->setcellvalue('O'.$n,$value->status); 
                 $result=$this->Security_model->outmateriallist($value->id);
				 foreach($result as $particules)
                 {
					  $n++;
					  $spreadsheet->setActiveSheetIndex(0)
					  ->setcellvalue('D'.$n,$particules->particulars)
				      ->setcellvalue('E'.$n,$particules->quantity);
					  $resulttime=$this->Security_model->outmaterialin($particules->pid);		
                      foreach($resulttime as $time)
                      {
						   $spreadsheet->setActiveSheetIndex(0)
						  ->setcellvalue('F'.$n,$time->gatein.'/check:'.$time->checkedby);
					  }
					  $resulttime2=$this->Security_model->outmaterialout($particules->pid);		
                      foreach($resulttime2 as $time)
                      {
						   $spreadsheet->setActiveSheetIndex(0)
						  ->setcellvalue('G'.$n,$time->gateout.'/check:'.$time->checkedby);
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
             setTimeout(function() {window.location.href ="<?php echo base_url(); ?>dashboard/Dashboard"},1000);
});
	  </script>
  </html>