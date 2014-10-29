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
 <p style="margin-top:16px;"><a class="fancyboxMini" href="<?php echo base_url();?>index.php/boss/addDistance">เพิ่มช่วงอายุ</a></p>
<div class="table"align="center"><br>
<table width="50%" border="0" align="center" cellpadding="7" cellspacing="3">

    <tr>   
    <th width="122" align="center" valign="baseline" nowrap="nowrap" style="font-size: 12px"><p>รหัสช่วงอายุ</p></th>
    	<th width="198" align="center" valign="baseline" nowrap="nowrap" style="font-size: 12px"><p>ระยะเวลา/เดือน</p></th>
      <th width="71" align="center" valign="baseline" nowrap="nowrap" style="font-size: 12px">แก้ไข</th>
      <th width="72" align="center" valign="baseline" nowrap="nowrap" style="font-size: 12px">ลบ</th>
    </tr>
    <?php
	$i = 1;
	 foreach($distance as $c){?>
    <tr>    
           <td align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p><?php echo $c['distanceId'];?></p></td>  
       <td align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p><?php echo $c['distanceMonth'];?></p></td>

      <td align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><a class="fancyboxMini" href="<?php echo base_url();?>index.php/boss/editDistance/<?php echo $c['distanceId'];?>">แก้ไข</a></td>
      <td align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><a class="fancyboxDelete" href="<?php echo base_url();?>index.php/boss/deleteDistanceData/<?php echo $c['distanceId'];?>" >ลบ</a></td>
    </tr>
    <?php $i++; }?>
</table>
</div>

