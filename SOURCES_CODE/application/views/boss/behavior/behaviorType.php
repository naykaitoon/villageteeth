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
 <h2 id="headTitleContent">รายการข้อมูลหมวดหมู่พฤติกรรมทัตสุขภาพ</h2>
 </div>
 <p style="margin-top:16px;"><a class="fancyboxMini" style="font-size:12px" href="<?php echo base_url();?>index.php/boss/addDistance"><img src="<?php echo base_url()?>img/icon/distanceIconAdd.png" width="40px"/>เพิ่มช่วงอายุ</a></p>
<div class="table"align="center"><br>
<table border="0" align="center" cellpadding="7" cellspacing="3">

    <tr>   
    <th width="72" align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p>รหัสข้อมูลหมวดหมู่</p></th>
    	<th width="67" align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p>ชื่อหมวดหมู่</p></th>
      <th width="22" align="center" valign="middle" nowrap="nowrap" style="font-size: 12px">แก้ไข</th>
      <th width="22" align="center" valign="middle" nowrap="nowrap" style="font-size: 12px">ลบ</th>
    </tr>
    <?php

	 foreach($behaviorMagType as $c){?>
    <tr>    
           <td align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p><?php echo $c['behaviorTypeId'];?></p></td>  
       <td align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p><?php echo $c['behaviorTypeName'];?></p></td>
 <td align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><a class="fancyboxMini" href="<?php echo base_url();?>index.php/boss/editDistance/<?php echo $c['behaviorTypeId'];?>">แก้ไข</a></td>
      <td align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><a class="fancyboxDelete" href="<?php echo base_url();?>index.php/boss/deleteDistanceData/<?php echo $c['behaviorTypeId'];?>" >ลบ</a></td>
    </tr>
    <?php  }?>
</table>
<p>&nbsp;</p>
</div>

