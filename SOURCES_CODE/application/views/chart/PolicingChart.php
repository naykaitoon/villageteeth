<html>
<head>
<meta charset="utf-8">
<title>สถิติเด็กที่เข้ารับการตรวจ</title>
<link rel="stylesheet" href="<?php echo base_url();?>css/font.css?v=1001">
<link rel="stylesheet" href="<?php echo base_url();?>css/table.css?v=1001">
<style type="text/css" media="all">
#printPreview{
	display:none;	
}
body{
	margin-top:-30;	
	align-content:center;
}

</style>


</head>
<center>
<?php
if(!$_GET){
$_GET['print']=0;
}
 if($_GET['print']==1){?>
<a class="popupPrint" href="<?php echo base_url();?>index.php/report/chartsPolicingsReportPrint" ><img src="<?php echo base_url();?>img/printicon.png" width="50px;"/>พิมพ์</a>
<?php }?>
<?php echo '<br><br>'; echo $graph;?>


<div class="table">
  <table width="50%" border="0" align="center" cellpadding="10" cellspacing="0">
      <tr>
        <th colspan="2" align="center" valign="middle" nowrap="nowrap"><p>สถิติการเข้ารับการตรวจโดยรวม</p></th>
      </tr>
      <tr>
        <td width="29%" align="right" valign="middle" nowrap="nowrap" style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;font-size:14px;">เด็กที่ไม่ได้รับการตรวจ</td>
        <td width="71%" align="center" valign="middle" nowrap="nowrap" style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;font-size:14px;">คิดเป็นร้อยละ <?php echo number_format($NotPolicings,2,'.',',');?>% ของทั้งหมด</td>
      </tr>
      <tr>
        <td align="right" valign="middle" nowrap="nowrap" style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;font-size:14px;">เด็กที่ได้รับการตรวจ</td>
        <td align="center" valign="middle" nowrap="nowrap" style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;font-size:14px;">คิดเป็นร้อยละ <?php echo number_format($Policings,2,'.',',');?>% ของทั้งหมด</td>
      </tr>
	</table>

</div>
</center>

</html>