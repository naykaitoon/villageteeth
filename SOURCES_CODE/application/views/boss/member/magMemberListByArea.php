<table width="100%" border="0" align="center" cellpadding="7" cellspacing="3">

    <tr>   
    <th width="61" align="center" valign="baseline" nowrap="nowrap" style="font-size: 12px"><p>ลำดับที่</p></th>
      <th width="77" align="center" valign="baseline" nowrap="nowrap" style="font-size: 12px"><p>ชื่อ - สกุล</p></th>
      <th width="78" align="center" valign="baseline" nowrap="nowrap" style="font-size: 12px"><p>ชื่อเข้าใช้งาน</p></th>
      <th width="91" align="center" valign="baseline" nowrap="nowrap" style="font-size: 12px"><p>อยู่ในเขต</p></th>
      <th width="46" align="center" valign="baseline" nowrap="nowrap" style="font-size: 12px">แก้ไข</th>
      <th width="46" align="center" valign="baseline" nowrap="nowrap" style="font-size: 12px">ลบ</th>
    </tr>
    <?php
	if($member){
	 foreach($member as $c){?>
    <tr>    
           <td align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p><?php echo $c['memberId'];?></p></td>  
       <td align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p><?php echo $c['memberName'];?>&nbsp;&nbsp;<?php echo $c['memberLastName'];?></p></td>
       <td align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><?php echo $c['memberUsername'];?></td>
      <td align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p><?php echo $c['cantonName'];?>&nbsp;อ.<?php echo $c['districtName'];?>&nbsp;จ.<?php echo $c['provinceName'];?></p></td>
      <td align="center" valign="middle" nowrap="nowrap" style="font-size: 12px">แก้ไข</td>
      <td align="center" valign="middle" nowrap="nowrap" style="font-size: 12px">ลบ</td>
    </tr>
    <?php  }}else{?>
     <tr>    
           <td colspan="6" align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p>ไม่พบข้อมูล</p></td>  
    </tr>
    <?php }?>
 	<tr>
  	<td colspan="9" align="center"><div class="ajax_paging"><?php if($this->pagination->create_links()!=''){echo $this->pagination->create_links();}else{ echo "1"; }?></div></td>
  </tr>
</table>