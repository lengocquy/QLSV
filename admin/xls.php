<?php
include_once('../config/config.php');
	$masv = $_GET["masv"];
	$hk = $_GET["hk"];
    $sql = "SELECT * FROM `diem`,`monhoc` WHERE diem.MaMH = monhoc.MaMH and `MSSV` = '$masv' and `IdHocKy` = '$hk'";
    $qr = mysqli_query($conn, $sql);
    while($num=mysqli_fetch_array($qr))
         $data[]=$num; 

require 'Classes/PHPExcel.php';
 
$PHPExcel = new PHPExcel();
 
$PHPExcel->setActiveSheetIndex(0);
 
$PHPExcel->getActiveSheet()->setTitle('Bảng Điểm');
 

$PHPExcel->getActiveSheet()->setCellValue('A1', 'STT');
$PHPExcel->getActiveSheet()->setCellValue('B1', 'Tên Môn Học');
$PHPExcel->getActiveSheet()->setCellValue('C1', 'Điểm Giữa Kỳ');
$PHPExcel->getActiveSheet()->setCellValue('D1', 'Điểm Cuối Kỳ');
$PHPExcel->getActiveSheet()->setCellValue('E1', 'Điểm tổng kết MH theo thang điểm 10');
$PHPExcel->getActiveSheet()->setCellValue('F1', 'Điểm tổng kết MH theo thang điểm 4'); 

$rowNumber = 2;
foreach ($data as $index => $item) 
{
    // A1, A2, A3, ...
    $PHPExcel->getActiveSheet()->setCellValue('A' . $rowNumber, ($index + 1));
     
    // B1, B2, B3, ...
    $PHPExcel->getActiveSheet()->setCellValue('B' . $rowNumber, $item[9]);
 
    // C1, C2, C3, ...
    $PHPExcel->getActiveSheet()->setCellValue('C' . $rowNumber, $item[4]);
    $PHPExcel->getActiveSheet()->setCellValue('D' . $rowNumber, $item[5]);
    $PHPExcel->getActiveSheet()->setCellValue('E' . $rowNumber, $item[6]);
    $PHPExcel->getActiveSheet()->setCellValue('F' . $rowNumber, $item[7]);

    $rowNumber++;
}
 

$objWriter = PHPExcel_IOFactory::createWriter($PHPExcel, 'Excel5');
 
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="bang_diem.xls"');
header('Cache-Control: max-age=0');
if (isset($objWriter)) {
    $objWriter->save('php://output');
}
exit;
?>