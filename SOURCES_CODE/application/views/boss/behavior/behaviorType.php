<div id="headTitleContentbg">
 <h2 id="headTitleContent">รายการข้อมูลหมวดหมู่พฤติกรรมทัตสุขภาพ</h2>
 </div>
 <p style="margin-top:16px;"><a class="fancyboxMiniBehaviorType" style="font-size:12px" href="<?php echo base_url();?>index.php/boss/addBehaviorMagType"><img class="iconAction" src="<?php echo base_url()?>img/icon/behaviorTypeIconAdd.png" width="40px"/>เพิ่มข้อมูลหมวดหมู่พฤติกรรมทัตสุขภาพ</a></p>
<div class="table"align="center"><br>
<table width="60%" border="0" align="center" cellpadding="7" cellspacing="3">

    <tr>   
    <th width="84" align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p>ลำดับที่</p></th>
    	<th width="207" align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p>ชื่อหมวดหมู่</p></th>
      <th width="61" align="center" valign="middle" nowrap="nowrap" style="font-size: 12px">แก้ไข</th>
      <th width="63" align="center" valign="middle" nowrap="nowrap" style="font-size: 12px">ลบ</th>
    </tr>
    <?php
		$i=1;
	 foreach($behaviorMagType as $c){?>
    <tr>    
           <td align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p><?php echo $i;?></p></td>  
       <td align="left" valign="middle" nowrap="nowrap" style="font-size: 12px"><p>&nbsp;- <?php echo $c['behaviorTypeName'];?></p></td>
 <td align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><a class="behaviorTypeEdit" href="<?php echo base_url();?>index.php/boss/editBehaviorMagType/<?php echo $c['behaviorTypeId'];?>"> <img class="iconAction" src="<?php echo base_url();?>img/editIcon.png" width="25px" height="25px"  style="margin-bottom:-8px;"></a></td>
      <td align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><a class="behaviorTypeDelete" href="<?php echo base_url();?>index.php/boss/deleteBehaviorMagType/<?php echo $c['behaviorTypeId'];?>" > <img class="iconAction" src="<?php echo base_url();?>img/deleteIcon.png" width="25px" height="25px"  style="margin-bottom:-8px;"></a></td>
    </tr>
    <?php 
	$i++;
	 }?>
</table>
<p>&nbsp;</p>
</div>

