<div id="headTitleContentbg">
 <h2 id="headTitleContent">รายการข้อมูลหมวดหมู่พฤติกรรมทัตสุขภาพ</h2>
 </div>
<div class="table"align="center"><br>
 <p style="float:left; margin-left:50%;"><a class="addBehaviorType fancybox.iframe" id="addButtonForAll"  href="<?php echo base_url();?>index.php/boss/addBehaviorMagType"><img class="iconAction" src="<?php echo base_url()?>img/icon/behaviorTypeIconAdd.png" width="40px"/>เพิ่มข้อมูลหมวดหมู่พฤติกรรมทัตสุขภาพ</a></p><br><br><br>
<table width="60%" border="0" align="center" cellpadding="7" cellspacing="3">

    <tr>   
    <th width="84" align="center" valign="middle" nowrap="nowrap" ><p>ลำดับที่</p></th>
    	<th width="207" align="center" valign="middle" nowrap="nowrap" ><p>ชื่อหมวดหมู่</p></th>
      <th width="61" align="center" valign="middle" nowrap="nowrap" >แก้ไข</th>
      <th width="63" align="center" valign="middle" nowrap="nowrap" >ลบ</th>
    </tr>
    <?php
		$i=1;
	 foreach($behaviorMagType as $c){?>
    <tr>    
           <td align="center" valign="middle" nowrap="nowrap" ><p><?php echo $i;?></p></td>  
       <td align="left" valign="middle" nowrap="nowrap" ><p>&nbsp;- <?php echo $c['behaviorTypeName'];?></p></td>
 <td align="center" valign="middle" nowrap="nowrap" ><a class="editBehaviorType fancybox.iframe"  href="<?php echo base_url();?>index.php/boss/editBehaviorMagType/<?php echo $c['behaviorTypeId'];?>"> <img class="iconAction" src="<?php echo base_url();?>img/editIcon.png" width="25px" height="25px"  style="margin-bottom:-8px;"></a></td>
      <td align="center" valign="middle" nowrap="nowrap" ><a class="deleteBehaviorType fancybox.iframe" href="<?php echo base_url();?>index.php/boss/deleteBehaviorMagType/<?php echo $c['behaviorTypeId'];?>" > <img class="iconAction" src="<?php echo base_url();?>img/deleteIcon.png" width="25px" height="25px"  style="margin-bottom:-8px;"></a></td>
    </tr>
    <?php 
	$i++;
	 }?>
</table>
<br>
<br>
<p>&nbsp;</p>
</div>

