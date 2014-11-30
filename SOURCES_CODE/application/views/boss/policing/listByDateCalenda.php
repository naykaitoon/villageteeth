<script src="<?php echo base_url();?>js/pageSection.js" type="text/javascript"></script>
	  <script>
      $(".policing").click(function(event){
				   event.preventDefault();
        		 var href = $(this).attr('href');
				 $('.content').load(href);
				 $('#linkPopupclick').val(href);
		
      });
	  	
</script>
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
<table width="100%" border="0" align="center" cellpadding="7" cellspacing="3">

    <tr>   
    <th width="16%" align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p>รหัสเด็ก</p></th>
    	<th width="20%" align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p>ชื่อ - สกุล</p></th> 
      <th width="13%" align="center" valign="middle" nowrap="nowrap" style="font-size: 12px">อายุ</th>
      <th width="13%" align="center" valign="middle" nowrap="nowrap" style="font-size: 12px">ผู้ตรวจ</th>
      <th width="18%" align="center" valign="middle" nowrap="nowrap" style="font-size: 12px">ลงข้อมูลการตรวจ</th>
    </tr>
    <?php
	$i = 1;
	 foreach($policings as $c){?>
    <tr>    
           <td align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p><?php echo $c['childrenId'];?></p></td>  
       <td align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p><?php echo $c['childrenName'];?>&nbsp;&nbsp;<?php echo $c['childrenLastName'];?></p></td>
      <td align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p><?php echo $c['childrenAge'];?></p></td>
      <td align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p><?php echo $c['memberName'].'  '.$c['memberLastName'];?></p></td>
           <td align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><a href="<?php echo base_url();?>index.php/boss/policing/<?php echo $c['childrenId'];?>" class="policing">
           <img class="iconAction" src="<?php echo base_url();?>img/checkIcon.png" width="30px" height="30px"  style="margin-bottom:-5px;margin-top:-5px;">
        </a></td>
    </tr>
    <?php $i++; }?>
 	<tr>
  	<td colspan="10" align="center"><div class="ajax_paging"><?php echo $this->pagination->create_links(); ?></div></td>
  </tr>
</table>

