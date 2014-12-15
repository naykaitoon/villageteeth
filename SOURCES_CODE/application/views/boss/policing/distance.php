<div id="headTitleContentbg">
 <h2 id="headTitleContent">รายการช่วงอายุการตรวจ</h2>
 </div>
<div class="table"align="center"><br>
 <p style="float:left; margin-left:68%;"><a class="addDistance fancybox.iframe" id="addButtonForAll" style="font-size:12px" href="<?php echo base_url();?>index.php/boss/addDistance"><img src="<?php echo base_url()?>img/icon/distanceIconAdd.png" width="40px" class="iconAction"/>เพิ่มช่วงอายุ</a></p>
 <br>
 <br>
<br>
<table width="50%" border="0" align="center" cellpadding="7" cellspacing="3">

    <tr>   
    <th width="91" align="center" valign="baseline" nowrap="nowrap" style="font-size: 12px"><p>ลำดับที่</p></th>
    	<th width="277" align="center" valign="baseline" nowrap="nowrap" style="font-size: 12px"><p>ระยะเวลา/เดือน</p></th>
      <th width="83" align="center" valign="baseline" nowrap="nowrap" style="font-size: 12px">แก้ไข</th>
      <th width="86" align="center" valign="baseline" nowrap="nowrap" style="font-size: 12px">ลบ</th>
    </tr>
    <?php
	$i = 1;
	 foreach($distance as $c){?>
    <tr>    
           <td align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p><?php echo $i;?></p></td>  
       <td align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p><?php echo $c['distanceMonth'];?>&nbsp;เดือน</p></td>

      <td align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><a class="editDistance fancybox.iframe" href="<?php echo base_url();?>index.php/boss/editDistance/<?php echo $c['distanceId'];?>">      <img class="iconAction" src="<?php echo base_url();?>img/editIcon.png" width="25px" height="25px" style="margin-bottom:-8px;"></a></td>
      <td align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><a class="deleteDistance fancybox.iframe" href="<?php echo base_url();?>index.php/boss/deleteDistanceData/<?php echo $c['distanceId'];?>" > <img class="iconAction" src="<?php echo base_url();?>img/deleteIcon.png" width="25px" height="25px"  style="margin-bottom:-8px;"></a></td>
    </tr>
    <?php $i++; }?>
</table>
  <br>
 <br>  <br>
 <br>
</div>

