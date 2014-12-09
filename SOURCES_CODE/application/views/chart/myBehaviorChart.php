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
#chartResult_div{
	margin-left:-60px;
}
</style>


</head>
<center>

<?php 
if(!$_GET){
$_GET['print']=0;
}
if($_GET['print']==1){?>
<a class="popupPrint" href="<?php echo base_url();?>index.php/report/myPolicingsBehaviorMagChartPrint/<?php echo $year;?>" ><img src="<?php echo base_url();?>img/printicon.png" width="50px;"/>พิมพ์</a>
<?php }?>
<?php echo '<br><br>'; echo $graph;?>
<div class="table">

  <table width="50%" border="0" align="center" cellpadding="10" cellspacing="0">
      <tr>
        <th colspan="6" align="center" valign="middle" nowrap="nowrap"><p>สถิติการเข้ารับการตรวจแบ่งตามพฤติกรรม</p></th>
      </tr>
      <tr>
        <th width="10%" align="center" valign="middle" nowrap="nowrap" style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;font-size:14px;"><p>ลำดับ</p></th>
        <th width="49%" align="center" valign="middle" nowrap="nowrap" style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;font-size:14px;"><p>ชื่อพฤติกรรม</p></th>
        <th width="20%" align="center" valign="middle" nowrap="nowrap" style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;font-size:14px;"><p>มี,ทำ</p></th>
        <th width="21%" align="center" valign="middle" nowrap="nowrap" style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;font-size:14px;"><p>ไม่มี,ไท่ทำ</p></th>
        <th width="20%" align="center" valign="middle" nowrap="nowrap" style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;font-size:14px;"><p>มี,ทำ(ร้อยละ)</p></th>
        <th width="21%" align="center" valign="middle" nowrap="nowrap" style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;font-size:14px;"><p>ไม่มี,ไท่ทำ(ร้อยละ)</p></th>
      </tr>
      <?php
	  $i=1;
	   foreach($data as $d){
		   $sum = $d['positive']+$d['nagative'];
		    ?>
      <tr>
        <td align="center" valign="middle" nowrap="nowrap" style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;font-size:14px;"><?php echo $i;?></td>
        <td align="left" valign="middle" nowrap="nowrap" style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;font-size:14px;">- <?php echo $d['behaviorName'];?></td>
        <td align="center" valign="middle" nowrap="nowrap" style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;font-size:14px;"><?php echo $d['positive'];?>&nbsp;คน</td>
        <td align="center" valign="middle" nowrap="nowrap" style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;font-size:14px;"><?php echo $d['nagative'];?>&nbsp;คน</td>
        <td align="center" valign="middle" nowrap="nowrap" style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;font-size:14px;"><?php if($d['positive']!='0'){ echo number_format(($d['positive']*100)/$sum,2,'.',',');}else{ echo 0.00;}?>&nbsp;%</td>
        <td align="center" valign="middle" nowrap="nowrap" style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;font-size:14px;"><?php if($d['nagative']!='0'){ echo number_format(($d['nagative']*100)/$sum,2,'.',',');}else{ echo 0.00;}?>&nbsp;%</td>
      </tr>
      <?php
	  $i++;
	   }?>
	</table>
    </div>
</center>

</html>