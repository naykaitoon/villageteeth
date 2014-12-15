<table width="100%" border="0" align="center" cellpadding="7" cellspacing="3">

    <tr>   
      <th width="12%" align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p>รหัสสมาชิก</p></th>
      <th width="29%" align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p>ชื่อ - สกุล</p></th>
      <th width="12%" align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p>ชื่อเข้าใช้งาน</p></th>
      <th width="16%" align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p>เขตการดูแล</p></th>
      <th width="10%" align="center" valign="middle" nowrap="nowrap" style="font-size: 12px">สถานะบัญชี</th>
      <th width="7%" align="center" valign="middle" nowrap="nowrap" style="font-size: 12px">สถานะ เปิด/ปิด</th>
    </tr>
    <?php
	if($member){
	 foreach($member as $c){ if($c['memberStatus']!='boss'){?>
    <tr>    
           <td align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p><?php echo $c['memberId'];?></p></td>  
       <td align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p><?php echo $c['memberName'];?>&nbsp;&nbsp;<?php echo $c['memberLastName'];?></p></td>
       <td align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><?php echo $c['memberUsername'];?></td>
      <td align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p><?php echo $c['cantonName'];?>&nbsp;อ.<?php echo $c['districtName'];?>&nbsp;จ.<?php echo $c['provinceName'];?></p></td>
      <td align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><?php 
	  if($c['memberStatus']=="boss"){
	  	  echo "ผู้ดูแลระบบ";
	  }else{
		  echo "เจ้าหน้าที่อนามัย";
	  }
	  ?></td>
      <td align="center" valign="middle" nowrap="nowrap" style="font-size: 12px">
      <?php
	   if($c['memberActiveStatus']=="activated"){
	  	  echo "เปิดการใช้งาน";
	  }else{
		  echo "ปิดการใช้งาน";
	  }
	  ?>
      </td>
    </tr>
    <?php }}?>
 	<tr>
  	<td colspan="8" align="center"><div class="ajax_paging"><?php echo $this->pagination->create_links(); ?></div></td>
  </tr>
  <?php }else{?>
  <tr>
  	<td colspan="8" align="center">ไม่พบข้อมูล</td>
  </tr>
      <?php  }?>
</table>
