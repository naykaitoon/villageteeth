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
 <p style="margin-top:16px;"><a class="addBehavior" style="font-size:12px" href="<?php echo base_url();?>index.php/boss/addBehavior"><img src="<?php echo base_url()?>img/icon/distanceIconAdd.png" width="40px" class="iconAction"/>เพิ่มข้อมูลพฤติกรรมทัตสุขภาพ</a></p>
<div class="table"align="center"><br>
<table border="0" align="center" cellpadding="7" cellspacing="3">

    <tr>   
    <th width="72" align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p>รหัสพฤติกรรม</p></th>
    	<th width="67" align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p>ชื่อพฤติกรรม</p></th>
                <th width="86" align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p>ประเภทพฤติกรรม</p></th>
        <th width="70" align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p>หมวดหมู่พฤติกรรม</p></th>
        <th width="72" align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p>สีกราฟใน Report</p></th>
      <th width="22" align="center" valign="middle" nowrap="nowrap" style="font-size: 12px">แก้ไข</th>
      <th width="22" align="center" valign="middle" nowrap="nowrap" style="font-size: 12px">ลบ</th>
    </tr>
    <?php

	 foreach($behavior as $c){?>
    <tr>    
           <td align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p><?php echo $c['behaviorId'];?></p></td>  
       <td align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p><?php echo $c['behaviorName'];?></p></td>
 <td align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p>
 <?php if($c['behaviorType']=='normal'){ echo 'แบบข้อความ';}else{echo 'ใช้รูปฟัน';}?></p></td>
  <td align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p><?php echo $c['behaviorTypeName'];?></p></td>
   <td align="center" valign="middle" nowrap="nowrap" style="font-size: 12px" ><p style="background-color:#<?php echo $c['colorCode'];?>;width:50px;padding:2;" class="colorsCode"><?php echo $c['colorCode'];?></p></td>
      <td align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><a class="editBehavior" href="<?php echo base_url();?>index.php/boss/editBehavior/<?php echo $c['behaviorId'];?>"> <img class="iconAction" src="<?php echo base_url();?>img/editIcon.png" width="25px" height="25px"  style="margin-bottom:-8px;"></a></td>
      <td align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><a class="fancyboxDelete" href="<?php echo base_url();?>index.php/boss/deleteBehavior/<?php echo $c['behaviorId'];?>" > <img class="iconAction" src="<?php echo base_url();?>img/deleteIcon.png" width="25px" height="25px"  style="margin-bottom:-8px;"></a></td>
    </tr>
    <?php  }?>
</table>
<p>&nbsp;</p>
</div>

