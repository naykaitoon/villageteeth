<script src="<?php echo base_url();?>js/pageSection.js" type="text/javascript"></script>
<?php 
function idFormat($idCard){
	 $id1 = substr($idCard, 0, 1);
	 $id2= substr($idCard, 1, 4);
	 $id3= substr($idCard, 5, 5);
	 $id4= substr($idCard, 10, 2);
	 $id5= substr($idCard, 12, 1);
	 echo $id1.'-'.$id2.'-'.$id3.'-'.$id4.'-'.$id5;
}
?>
<div id="headTitleContentbg">
 <h2 id="headTitleContent">รายชื่อประวัติเด็กทั้งหมด</h2>
 </div>
<div class="table"align="center">
<br>
  <p>
    <label for="title">ค้นหา:</label>
    <input type="text" name="searchBox" id="searchBox" class="searchBox">
    <a href="#" class="searchBt">ค้นหา</a>
  <a href="<?php echo base_url();?>index.php/boss/addChillent" class="fancybox" style="font-size:12px"><img src="<?php echo base_url();?>img/icon/addChilldent.png" width="40px" height="40px"/>
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
      <th width="46" align="center" valign="baseline" nowrap="nowrap" style="font-size: 12px">ประวัติ</th>
    </tr>
    <?php
	$i = 1;
	 foreach($childent as $c){?>
    <tr>    
           <td align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p><?php echo $c['childrenId'];?></p></td>  
       <td align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p><?php echo $c['childrenName'];?>&nbsp;&nbsp;<?php echo $c['childrenLastName'];?></p></td>
      <td align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p ><?php idFormat($c['childrenIDCard']);?></p></td>
      <td align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p><?php echo $c['childrenAge'];?></p></td>
      <td align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p><?php echo $c['childrenBirthday'];?></p></td>
      <td align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><a href="<?php echo base_url();?>index.php/boss/childentAddress/<?php echo $c['addressId'];?>" class="fancybox">คลิก</a></td>
    </tr>
    <?php $i++; }?>
<tr>
  	<td colspan="8" align="center"><div class="ajax_paging"><?php echo $this->pagination->create_links(); ?></div></td>
  </tr>
</table>
</div>

