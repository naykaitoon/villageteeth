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
 <p style="margin-top:16px;"><a class="fancyboxMini" style="font-size:12px" href="<?php echo base_url();?>index.php/boss/addBehaviorMagType"><img class="iconAction" src="<?php echo base_url()?>img/icon/distanceIconAdd.png" width="40px"/>เพิ่มข้อมูลหมวดหมู่พฤติกรรมทัตสุขภาพ</a></p>
<div class="table"align="center"><br>
<table border="0" align="center" cellpadding="7" cellspacing="3">

    <tr>   
    <th width="72" align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p>รหัสหมวดหมู่</p></th>
    	<th width="67" align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p>ชื่อหมวดหมู่</p></th>
      <th width="22" align="center" valign="middle" nowrap="nowrap" style="font-size: 12px">แก้ไข</th>
      <th width="22" align="center" valign="middle" nowrap="nowrap" style="font-size: 12px">ลบ</th>
    </tr>
    <?php

	 foreach($behaviorMagType as $c){?>
    <tr>    
           <td align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p><?php echo $c['behaviorTypeId'];?></p></td>  
       <td align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p><?php echo $c['behaviorTypeName'];?></p></td>
 <td align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><a class="behaviorTypeEdit" href="<?php echo base_url();?>index.php/boss/editBehaviorMagType/<?php echo $c['behaviorTypeId'];?>"> <img class="iconAction" src="<?php echo base_url();?>img/editIcon.png" width="25px" height="25px"  style="margin-bottom:-8px;"></a></td>
      <td align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><a class="behaviorTypeDelete" href="<?php echo base_url();?>index.php/boss/deleteBehaviorMagType/<?php echo $c['behaviorTypeId'];?>" > <img class="iconAction" src="<?php echo base_url();?>img/deleteIcon.png" width="25px" height="25px"  style="margin-bottom:-8px;"></a></td>
    </tr>
    <?php  }?>
</table>
<p>&nbsp;</p>
</div>

