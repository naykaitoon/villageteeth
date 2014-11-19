<script type="text/javascript">
		$(document).ready(function(){
			$(".searchBox").focus();
			 $(".searchBox").keyup(function(event){
				   event.preventDefault();
				    if($("#searchBox").val()!=""){
        		 $.post( 
             "<?php echo base_url();?>index.php/boss/childentAllSearch",
             { key: $("#searchBox").val() },
             function(data) {
                $('#searchResult').html(data);
             }

          ); 
		   }else{
			 $('.content').load("<?php echo base_url();?>index.php/boss/childentAllProfile");
		  }
		
      });
	 
	

 });
		
</script>
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
 <h2 id="headTitleContent">รายชื่อเด็กทั้งหมด</h2>
 </div>
<div class="table" align="center">
<br>
  <p>
    <label for="textfield">ค้นหา:</label>
    <input type="text" name="searchBox" id="searchBox" class="searchBox" placeholder="ชื่อ หรือ รหัสประจำตัวประชาชน">
  <a href="<?php echo base_url();?>index.php/boss/addChillent" class="fancyboxMagChildentAll" style="font-size:12px"><img src="<?php echo base_url();?>img/icon/addChilldent.png" width="40px" height="40px" class="iconAction"/>เพิ่มข้อมูลเด็ก</a>
 
</p>
  <br>
  <div id="searchResult">
<table width="100%" border="0" align="center" cellpadding="7" cellspacing="3">

    <tr>   
    <th align="center" valign="baseline" nowrap="nowrap" style="font-size: 12px"><p>รหัสเด็ก</p></th>
    	<th align="center" valign="baseline" nowrap="nowrap" style="font-size: 12px"><p>ชื่อ - สกุล</p></th>
      <th align="center" valign="baseline" nowrap="nowrap" style="text-align: center; font-size: 12px;"><p>รหัสประจำตัวประชาชน</p></th>
 
      <th align="center" valign="baseline" nowrap="nowrap" style="font-size: 12px">อายุ</th>
      <th align="center" valign="baseline" nowrap="nowrap" style="font-size: 12px"><p>วันเกิด</p></th>
      <th align="center" valign="baseline" nowrap="nowrap" style="font-size: 12px"><p>อยู่ในเขต</p></th>
      <th align="center" valign="baseline" nowrap="nowrap" style="font-size: 12px">แก้ไข</th>
      <th align="center" valign="baseline" nowrap="nowrap" style="font-size: 12px">ลบ</th>
    </tr>
    <?php
	if($childent){
	$i = 1;
	 foreach($childent as $c){?>
    <tr>    
           <td align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p><?php echo $c['childrenId'];?></p></td>  
       <td align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p><?php echo $c['childrenName'];?>&nbsp;&nbsp;<?php echo $c['childrenLastName'];?></p></td>
      <td align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p ><?php idFormat($c['childrenIDCard']);?></p></td>
      <td align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p><?php echo $c['childrenAge'];?></p></td>
      <td align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p><?php
	  $date = new DateTime($c['childrenBirthday']);
echo $date->format('d-m-Y');
	  ?></p></td>
      <td align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p><?php echo $c['cantonName'];?>&nbsp;อ.<?php echo $c['districtName'];?>&nbsp;จ.<?php echo $c['provinceName'];?></p></td>
      <td align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><a href="<?php echo base_url();?>index.php/boss/editChildent/<?php echo $c['childrenId'];?>" class="fancyboxMagChildentAll">
      <img class="iconAction" src="<?php echo base_url();?>img/editIcon.png" width="25px" height="25px"  style="margin-bottom:-8px;">
      </a></td>
      <td align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><a href="<?php echo base_url();?>index.php/boss/deleteChildentData/<?php echo $c['childrenId'];?>/<?php echo $c['addressId'];?>" class="deletechildentAll">
      <img class="iconAction" src="<?php echo base_url();?>img/deleteIcon.png" width="25px" height="25px"  style="margin-bottom:-8px;">
      </a></td>
    </tr>
    <?php $i++; }?>
<tr>
  	<td colspan="8" align="center"><div class="ajax_paging"><?php echo $this->pagination->create_links(); ?></div></td>
  </tr>
   <?php 	}else{?>
  	<tr>
  	<td colspan="8" align="center">ไม่พบข้อมูล</td>
  </tr>
  <?php }?>
</table>
<br>
<br>
<br>
</div>
</div>

