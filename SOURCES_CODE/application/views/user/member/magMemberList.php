<script type="text/javascript">
		$(document).ready(function(){
			$(".searchBox").focus();
			 $("#searchBox").keyup(function(event){
				   event.preventDefault();
				    if($("#searchBox").val()!=""){
        		 $.post( 
             "<?php echo base_url();?>index.php/officials/memberAllSearch",
             { key: $("#searchBox").val() },
             function(data) {
                $('#searchResult').html(data);
             }

          ); 
		   }else{
			 $('.content').load("<?php echo base_url();?>index.php/officials/memberAll");
		  }
		
      });
	 
	$('.memberActiveStatus').click(function(event){
	 		event.preventDefault();
			 var href = $(this).attr('href');
			 $('.content').load(href);
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
 <h2 id="headTitleContent">รายชื่อผู้ใช้งานทั้งหมด</h2>
 </div>
<div class="table"align="center">
<br>
  <p>
    <label for="textfield">ค้นหา:</label>
    <input type="text" name="searchBox" id="searchBox" class="searchBox">
  <a href="<?php echo base_url();?>index.php/officials/addMember" class="AddMember" style="font-size:12px"><img src="<?php echo base_url();?>img/icon/addMember.png" width="40px" height="40px"/>เพิ่มข้อมูลผู้ใช้งาน</a>
 
</p>
  <br>
  <div id="searchResult">
<table width="100%" border="0" align="center" cellpadding="7" cellspacing="3">

    <tr>   
      <th width="12%" align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p>รหัสสมาชิก</p></th>
      <th width="29%" align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p>ชื่อ - สกุล</p></th>
      <th width="12%" align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p>ชื่อเข้าใช้งาน</p></th>
      <th width="16%" align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p>เขตการดูแล</p></th>
      <th width="10%" align="center" valign="middle" nowrap="nowrap" style="font-size: 12px">สถานะบัญชี</th>
      <th width="7%" align="center" valign="middle" nowrap="nowrap" style="font-size: 12px">สถานะ เปิด/ปิด</th>
      <th width="8%" align="center" valign="middle" nowrap="nowrap" style="font-size: 12px">แก้ไข</th>
      <th width="6%" align="center" valign="middle" nowrap="nowrap" style="font-size: 12px">ลบ</th>
    </tr>
    <?php
 $loginData = $this->session->userdata('loginData');
 $loginId = $loginData['id'];
 if($member){
	 foreach($member as $c){
		if($loginId!=$c['memberId']&&$c['memberStatus']!='boss'){
		 ?>
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
	  	  echo "
		  <a href='".base_url()."index.php/officials/switchMembers/off/".$c['memberId']."' class='memberActiveStatus' onClick='return updateStatus();'>
		  <img src='".base_url()."img/icon/onSwich.png' class='swich'/>
		  </a>
		  ";
	  }else{
		  echo "
		    <a href='".base_url()."index.php/officials/switchMembers/on/".$c['memberId']."' class='memberActiveStatus' onClick='return updateStatus();'>
		  <img src='".base_url()."img/icon/offSwich.png' class='swich'/>
		  </a>
		  ";
	  }
	  ?>
      </td>
      <td align="center" valign="middle" nowrap="nowrap" style="font-size: 12px">
    <a href="<?php echo base_url();?>index.php/officials/editMembers/<?php echo $c['memberId'];?>" class="fancyboxMagMemberAll">
  <img class="iconAction" src="<?php echo base_url();?>img/editIcon.png" width="25px" height="25px"  style="margin-bottom:-8px;">
    </a>
      </td>
      <td align="center" valign="middle" nowrap="nowrap" style="font-size: 12px">
  <a href="<?php echo base_url();?>index.php/officials/deleteMembers/<?php echo $c['memberId'];?>" class="deleteMemberAll">
  <img class="iconAction" src="<?php echo base_url();?>img/deleteIcon.png" width="25px" height="25px"  style="margin-bottom:-8px;">
  </a></td>
    </tr>
    <?php  
		}
	}?>
 	<tr>
  	<td colspan="8" align="center"><div class="ajax_paging"><?php echo $this->pagination->create_links(); ?></div></td>
  </tr>
  <?php }else{ ?>
  <tr>
  	<td colspan="8" align="center">ไม่พบข้อมูล</td>
  </tr>
  <?php } ?>
</table>
<br>
<br>
<br>
</div>
</div>

