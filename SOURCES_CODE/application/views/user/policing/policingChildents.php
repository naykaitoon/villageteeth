<script src="<?php echo base_url();?>js/pageSection.js" type="text/javascript"></script>
<script type="text/javascript">
			 $(".searchBox").keyup(function(event){
				   event.preventDefault();
        		 $.post( 
             "<?php echo base_url();?>index.php/officials/policeSearch",
             { key: $("#searchBox").val() },
             function(data) {
                $('#searchResult').html(data);
             }

          ); 
		
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

<div id="headTitleContentbg">
 <h2 id="headTitleContent">ลงข้อมูลการตรวจ</h2>
 </div>
 <br>
<div class="table"align="left">
<br>
  <p>
    <label for="textfield">ค้นหา:</label>
    <input type="text" name="searchBox" id="searchBox" class="searchBox" placeholder="ID CARD , ชื่อ หรือ นามสกุล">
</p>
  <br>
    <div id="searchResult">
<table width="100%" border="0" align="center" cellpadding="7" cellspacing="3">

    <tr>   
    <th align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p>รหัสเด็ก</p></th>
    	<th align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p>ชื่อ - สกุล</p></th>
      <th align="center" valign="middle" nowrap="nowrap" style="text-align: center; font-size: 12px;"><p>รหัสประจำตัวประชาชน</p></th>
 
      <th align="center" valign="middle" nowrap="nowrap" style="font-size: 12px">อายุ</th>
      <th align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p>อยู่ในเขต</p></th>
      <th align="center" valign="middle" nowrap="nowrap" style="font-size: 12px">ลงข้อมูล</th>
    </tr>
    <?php
	$i = 1;
	 foreach($childent as $c){?>
    <tr>    
           <td align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p><?php echo $c['childrenId'];?></p></td>  
       <td align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p><?php echo $c['childrenName'];?>&nbsp;&nbsp;<?php echo $c['childrenLastName'];?></p></td>
      <td align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p ><?php idFormat($c['childrenIDCard']);?></p></td>
      <td align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p><?php echo $c['childrenAge'];?></p></td>
      <td align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p><?php echo $c['cantonName'];?>&nbsp;อ.<?php echo $c['districtName'];?>&nbsp;จ.<?php echo $c['provinceName'];?></p></td>
      <td align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><a href="<?php echo base_url();?>index.php/officials/policing/<?php echo $c['childrenId'];?>" class="policing">
      <img class="iconAction" src="<?php echo base_url();?>img/checkIcon.png" width="30px" height="30px"  style="margin-bottom:-5px;margin-top:-5px;">
      </a></td>
    </tr>
    <?php $i++; }?>
 	<tr>
  	<td colspan="8" align="center"><div class="ajax_paging"><?php echo $this->pagination->create_links(); ?></div></td>
  </tr>
</table>
<script>
 $(".policing").click(function(event){
				   event.preventDefault();
        		 var href = $(this).attr('href');
				 $('.content').load(href);
				 $('#linkPopupclick').val(href);
		
      });
</script>
</div>
</div>

