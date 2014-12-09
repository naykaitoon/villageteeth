<script src="<?php echo base_url();?>js/jquery.maskedinput.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>js/pageSection.js" type="text/javascript"></script>
<script>
jQuery(function($){
   $(".idcard").mask("9-9999-99999-99-9");
});
function confirmDel(){
	 var c = confirm('คุณต้องการลบหรือไม่\n');
	 if(c){
	 	return true;
	 }else{
	 	return false;
	 }
}
  </script>

<div id="headTitleContentbg">
 <h2 id="headTitleContent">รายการช่วงอายุการตรวจ</h2>
 </div>
 <p style="margin-top:16px;"><br>
</p>
 <div class="table"align="center">
   <table width="50%" border="0" align="center" cellpadding="7" cellspacing="3">

    <tr>   
    <th width="72" align="center" valign="baseline" nowrap="nowrap" style="font-size: 12px"><p>ลำดับที่</p></th>
    	<th width="296" align="center" valign="baseline" nowrap="nowrap" style="font-size: 12px"><p>ระยะเวลา/เดือน</p></th>
      <th width="86" align="center" valign="baseline" nowrap="nowrap" style="font-size: 12px">ดูสถิติ</th>
    </tr>
    <?php
	$i = 1;
	 foreach($distance as $c){?>
    <tr>    
           <td align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p><?php echo $i;?></p></td>  
       <td align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p><?php echo $c['distanceMonth'];?>&nbsp;เดือน</p></td>

      <td align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><a class="viewstatisticBehavior" href="<?php echo base_url();?>index.php/report/myChartsPolicingsReportByDistanceId/<?php echo $c['distanceId'];?>" > <img class="iconAction" src="<?php echo base_url();?>img/viewIcon.png" width="25px" height="25px"  style="margin-bottom:-8px;"></a></td>
    </tr>
    <?php $i++; }?>
</table>
</div>

