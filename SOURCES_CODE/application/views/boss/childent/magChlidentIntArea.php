<script src="<?php echo base_url();?>js/jquery.maskedinput.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>js/pageSection.js" type="text/javascript"></script>
<script>
jQuery(function($){
   $(".idcard").mask("9-9999-99999-99-9");
});
  </script>

<div id="headTitleContentbg">
 <h2 id="headTitleContent">รายชื่อเด็กในเขตความรับผิดชอบ</h2>
 </div>
<div class="table"align="center">
<br>
  <p>
    <label for="textfield">ค้นหา:</label>
    <input type="text" name="searchBox" id="searchBox" class="searchBox">
    <a href="#" class="searchBt">ค้นหา</a>
  <a href="<?php echo base_url();?>index.php/Boss/addChillent" class="fancybox" style="font-size:12px"><img src="<?php echo base_url();?>img/icon/addChilldent.png" width="40px" height="40px"/>
  เพิ่มข้อมูลเด็ก</a>
</p>
  <br>
<table width="100%" border="0" align="center" cellpadding="7" cellspacing="3">

    <tr>   
    <th width="61" align="center" valign="baseline" nowrap="nowrap" style="font-size: 12px"><p>ลำดับที่</p></th>
    	<th width="158" align="center" valign="baseline" nowrap="nowrap" style="font-size: 12px"><p>ชื่อ - สกุล</p></th>
      <th width="169" align="center" valign="baseline" nowrap="nowrap" style="text-align: center; font-size: 12px;"><p>รหัสประจำตัวประชาชน</p></th>
 
      <th width="105" align="center" valign="baseline" nowrap="nowrap" style="font-size: 12px">อายุ</th>
      <th width="80" align="center" valign="baseline" nowrap="nowrap" style="font-size: 12px"><p>วันเกิด</p></th>
      <th width="91" align="center" valign="baseline" nowrap="nowrap" style="font-size: 12px"><p>อยู่ในเขต</p></th>
      <th width="46" align="center" valign="baseline" nowrap="nowrap" style="font-size: 12px">แก้ไข</th>
      <th width="46" align="center" valign="baseline" nowrap="nowrap" style="font-size: 12px">ลบ</th>
    </tr>
    <?php
	$i = 1;
	 foreach($childent as $c){?>
    <tr>    
           <td align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p><?php echo $i;?></p></td>  
       <td align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p><?php echo $c['childrenName'];?>&nbsp;&nbsp;<?php echo $c['childrenLastName'];?></p></td>
      <td align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p ><input style="text-align:center" type="text" class="idcard" value="<?php echo $c['childrenIDCard'];?>" size="16" maxlength="17" readonly /></p></td>
      <td align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p><?php echo $c['childrenAge'];?></p></td>
      <td align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p><?php echo $c['childrenBirthday'];?></p></td>
      <td align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p><?php echo $c['cantonName'];?>&nbsp;อ.<?php echo $c['districtName'];?>&nbsp;จ.<?php echo $c['provinceName'];?></p></td>
      <td align="center" valign="middle" nowrap="nowrap" style="font-size: 12px">แก้ไข</td>
      <td align="center" valign="middle" nowrap="nowrap" style="font-size: 12px">ลบ</td>
    </tr>
    <?php $i++; }?>
 	<tr>
  	<td colspan="8" align="center"><div class="ajax_paging"><?php if($this->pagination->create_links()!=''){echo $this->pagination->create_links();}else{ echo "1"; }?></div></td>
  </tr>
</table>
</div>

