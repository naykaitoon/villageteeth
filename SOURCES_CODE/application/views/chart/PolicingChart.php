<html>
<head>
<meta charset="utf-8">
<title>สถิติเด็กที่เข้ารับการตรวจ</title>
<link rel="stylesheet" href="<?php echo base_url();?>css/font.css?v=1001">
<style type="text/css" media="all">
#printPreview{
	display:none;	
}
body{
	margin-top:-30;	
	align-content:center;
	overflow:hidden;
}

</style>


</head>
<center>
<?php echo '<br><br>'; echo $graph;?>
<?php if($_GET['print']==1){?>
<a class="popupPrint" href="<?php echo base_url();?>index.php/report/chartsPolicingsReportPrint" ><img src="<?php echo base_url();?>img/printicon.png" width="50px;"/>พิมพ์</a>
<?php }?>
</center>

</html>