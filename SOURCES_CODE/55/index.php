<script type="text/javascript" src="<?php echo base_url()?>js/jquery-1.11.1.min.js?v=1001"></script>
<?php

require_once('tcpdf/setPDF.php'); // เรียกไฟล์ตั้งค่าเบื้องต้นในการสร้างไฟล์ PDF

$resolution= array(139.7, 254); // 10x5.5 inch
$pdf->AddPage('L', $resolution);
$html = <<<EOD
EOD;

$html=AdjustHTML(stripslashes($html));
$pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);

$filename = date('Y-m-d_hms');
$printer = "printer"; // ใส่ชื่อPrinter
for($i=1;$i<2;$i++){
	exec('SumatraPDF.exe -print-to "'.$printer.'" "'.$filename.'.PDF" -exit-on-print'); // ส่งไฟล์ PDF ไปยัง Printer โดยใช้ Program SumatraPDF เป็นตัวกลาง
	
	$pdf->Output($filename.'.PDF', 'F');
	echo "Complete Print <a href='".$filename.".PDF' target=_blank>".$filename.".PDF</a> to ".$filename;
	sleep(2);
}



?>

