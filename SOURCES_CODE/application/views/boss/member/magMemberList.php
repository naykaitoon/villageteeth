<script src="<?php echo base_url();?>js/jquery.maskedinput.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>js/pageSection.js" type="text/javascript"></script>
<div id="headTitleContentbg">
 <h2 id="headTitleContent">รายชื่อผู้ใช้งาน</h2>
 </div>
<div class="table"align="center">
<br>
  <p>
    <label for="textfield">ค้นหา:</label>
    <input type="text" name="searchBox" id="searchBox" class="searchBox">
    <a href="#" class="searchBt">ค้นหา</a>
  <a href="<?php echo base_url();?>index.php/boss/addMember" class="fancybox" style="font-size:12px"><img src="<?php echo base_url();?>img/icon/addChilldent.png" width="40px" height="40px"/>เพิ่มข้อมูลผู้ใช้งาน</a>
 
</p>
  <br>
<table width="100%" border="0" align="center" cellpadding="7" cellspacing="3">

    <tr>   
    <th width="61" align="center" valign="baseline" nowrap="nowrap" style="font-size: 12px"><p>รหัสสมาชิก</p></th>
      <th width="77" align="center" valign="baseline" nowrap="nowrap" style="font-size: 12px"><p>ชื่อ - สกุล</p></th>
      <th width="78" align="center" valign="baseline" nowrap="nowrap" style="font-size: 12px"><p>ชื่อเข้าใช้งาน</p></th>
      <th width="44" align="center" valign="baseline" nowrap="nowrap" style="font-size: 12px"><p>เขตการดูแล</p></th>
      <th width="44" align="center" valign="baseline" nowrap="nowrap" style="font-size: 12px">สถานะบัญชี</th>
      <th width="44" align="center" valign="baseline" nowrap="nowrap" style="font-size: 12px">สถานะ เปิด/ปิด</th>
      <th width="46" align="center" valign="baseline" nowrap="nowrap" style="font-size: 12px">แก้ไข</th>
      <th width="46" align="center" valign="baseline" nowrap="nowrap" style="font-size: 12px">ลบ</th>
    </tr>
    <?php

	 foreach($member as $c){?>
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
      <td align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><?php 
	  if($c['memberActiveStatus']=="activated"){
	  	echo "<font color='green'>เปิดใช้งาน</font>";
	  }else{
		  	echo "<font color='red'>ปิดใช้งาน</font>";
	  }?></td>
      <td align="center" valign="middle" nowrap="nowrap" style="font-size: 12px">แก้ไข</td>
      <td align="center" valign="middle" nowrap="nowrap" style="font-size: 12px">ลบ</td>
    </tr>
    <?php  }?>
 	<tr>
  	<td colspan="10" align="center"><div class="ajax_paging"><?php if($this->pagination->create_links()!=''){echo $this->pagination->create_links();}else{ echo "1"; }?></div></td>
  </tr>
</table>
</div>

