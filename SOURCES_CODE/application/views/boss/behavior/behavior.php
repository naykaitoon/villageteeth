<div id="headTitleContentbg">
 <h2 id="headTitleContent">รายการข้อมูลพฤติกรรมทัตสุขภาพ</h2>
 </div>
<div class="table"align="center"><br>
  <p style="float:left; margin-left:65%;"><a class="addBehavior fancybox.iframe" id="addButtonForAll" style="font-size:12px" href="<?php echo base_url();?>index.php/boss/addBehavior"><img src="<?php echo base_url()?>img/icon/behaviorIconAdd.png" width="40px" class="iconAction"/>เพิ่มข้อมูลพฤติกรรมทัตสุขภาพ</a></p><br><br><br>
<table width="608" border="0" align="center" cellpadding="7" cellspacing="3">

    <tr>   
    <th width="90" align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p>ลำดับที่</p></th>
    	<th width="69" align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p>ชื่อพฤติกรรม</p></th>
                <th width="128" align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p>ประเภทพฤติกรรม</p></th>
        <th width="115" align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p>หมวดหมู่พฤติกรรม</p></th>
      <th width="46" align="center" valign="middle" nowrap="nowrap" style="font-size: 12px">แก้ไข</th>
      <th width="55" align="center" valign="middle" nowrap="nowrap" style="font-size: 12px">ลบ</th>
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
      <td align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><a class="editBehavior fancybox.iframe" href="<?php echo base_url();?>index.php/boss/editBehavior/<?php echo $c['behaviorId'];?>"> <img class="iconAction" src="<?php echo base_url();?>img/editIcon.png" width="25px" height="25px"  style="margin-bottom:-8px;"></a></td>
      <td align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><a class="deleteBehavior fancybox.iframe" href="<?php echo base_url();?>index.php/boss/deleteBehavior/<?php echo $c['behaviorId'];?>" > <img class="iconAction" src="<?php echo base_url();?>img/deleteIcon.png" width="25px" height="25px"  style="margin-bottom:-8px;"></a></td>
    </tr>
    <?php  
	$i++;
	}?>
</table>
<br>
<br>
<p>&nbsp;</p>
</div>

