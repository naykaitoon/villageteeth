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
 <p style="margin-top:16px;"><a class="fancyboxMini" style="font-size:12px" href="<?php echo base_url();?>index.php/officials/addDistance"><img src="<?php echo base_url()?>img/icon/distanceIconAdd.png" width="40px" class="iconAction"/>เพิ่มช่วงอายุ</a></p>
<div class="table"align="center"><br>
<table width="50%" border="0" align="center" cellpadding="7" cellspacing="3">

    <tr>   
    <th width="72" align="center" valign="baseline" nowrap="nowrap" style="font-size: 12px"><p>ลำดับที่</p></th>
    	<th width="296" align="center" valign="baseline" nowrap="nowrap" style="font-size: 12px"><p>ระยะเวลา/เดือน</p></th>
      <th width="83" align="center" valign="baseline" nowrap="nowrap" style="font-size: 12px">แก้ไข</th>
      <th width="86" align="center" valign="baseline" nowrap="nowrap" style="font-size: 12px">ลบ</th>
    </tr>
    <?php
	$i = 1;
	 foreach($distance as $c){?>
    <tr>    
           <td align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p><?php echo $i;?></p></td>  
       <td align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p><?php echo $c['distanceMonth'];?>&nbsp;เดือน</p></td>

      <td align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><a class="fancyboxMini" href="<?php echo base_url();?>index.php/officials/editDistance/<?php echo $c['distanceId'];?>">      <img class="iconAction" src="<?php echo base_url();?>img/editIcon.png" width="25px" height="25px" style="margin-bottom:-8px;"></a></td>
      <td align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><a class="fancyboxdistanceDataList" href="<?php echo base_url();?>index.php/officials/deleteDistanceData/<?php echo $c['distanceId'];?>" > <img class="iconAction" src="<?php echo base_url();?>img/deleteIcon.png" width="25px" height="25px"  style="margin-bottom:-8px;"></a></td>
    </tr>
    <?php $i++; }?>
</table>
</div>

