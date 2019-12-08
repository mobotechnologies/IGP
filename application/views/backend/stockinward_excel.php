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
						->setCellValue('N8','Return Type')
						->setCellValue('O8','Charge Type')
						->setcellvalue('P8','Purpose')
						->setcellvalue('Q8','Remark')
						->setcellvalue('R8','Checkedby')
						->setcellvalue('S8','Status');
			$spreadsheet->getActiveSheet()->setTitle('Report');
			$spreadsheet->setActiveSheetIndex(0);
			$writer = new Xlsx($spreadsheet);
			
			$writer->save(getcwd().'\application\views\backend\rkmvc.xlsx');
   
    ?>
	<center><a href="<?php echo base_url(); ?>application/views/backend/rkmvc.xlsx" download ><button class="btn btn-lg btn-primary">Download the Report</button></a></center>
      </body>
  </html>