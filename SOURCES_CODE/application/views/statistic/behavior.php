<script src="<?php echo base_url();?>js/jquery.maskedinput.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>js/pageSection.js" type="text/javascript"></script>
<style>
.colorsCode{
	color:#FFFFFF;
	font-weight:bold;
	text-shadow:0px 3px 3x #000000;
}
</style>

<div id="headTitleContentbg">
 <h2 id="headTitleContent">รายการข้อมูลพฤติกรรมทัตสุขภาพ</h2>
</div>
<div class="table"align="center"><br>
<table width="441" border="0" align="center" cellpadding="7" cellspacing="3">

    <tr>   
    <th width="63" align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p>ลำดับที่</p></th>
    	<th width="62" align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p>ชื่อพฤติกรรม</p></th>
                <th width="102" align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p>ประเภทพฤติกรรม</p></th>
        <th width="91" align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p>หมวดหมู่พฤติกรรม</p></th>
      <th width="35" align="center" valign="middle" nowrap="nowrap" style="font-size: 12px">ดูสถิติ</th>
    </tr>
    <?php
$i=1;
	 foreach($behavior as $c){?>
    <tr>    
           <td align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p><?php echo $i;?></p></td>  
       <td align="left" valign="middle" nowrap="nowrap" style="font-size: 12px"><p>&nbsp;-&nbsp;<?php echo $c['behaviorName'];?></p></td>
 <td align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p>
 <?php if($c['behaviorType']=='normal'){ echo 'แบบข้อความ';}else{echo 'ใช้รูปฟัน';}?></p></td>
  <td align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p><?php echo $c['behaviorTypeName'];?></p></td>
      <td align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><a class="viewstatisticBehavior" href="<?php echo base_url();?>index.php/report/myChartsPolicingsReportByBehaviorId/<?php echo $c['behaviorId'];?>"> <img class="iconAction" src="<?php echo base_url();?>img/viewIcon.png" width="25px" height="25px"  style="margin-bottom:-8px;"></a></td>
    </tr>
    <?php  
	$i++;
	}?>
</table>
<p>&nbsp;</p>
</div>


