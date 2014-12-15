<?php if(!$childent){
	echo '<script>
	alert("ไม่พบข้อมูลการตรวจ");
	parent.$.fancybox.close();
	</script>';
}else{?>
<link rel="stylesheet" href="<?php echo base_url();?>css/tableBox.css">    
<link rel="stylesheet" href="<?php echo base_url();?>css/font.css">
<style>
	body{
		font-family: thaisanslite_r1 Vera Serif Bold;
		margin:0;
		margin-top:-18px;
		}
body,td p,th p{
	font-size: 18px;
}
#print{
	height:30px;
	width:60px;
	font-size:18px;
}
</style>
<div id="headTitleContentbg">
 <h2 id="headTitleContent" align="center">รายละเอียดการตรวจ</h2>
 </div>
<div class="table"align="left"><br>
    <div id="searchResult">
<table width="100%" border="0" align="center" cellpadding="7" cellspacing="1">
    <?php
	$i = 1;
	 foreach($childent as $c){?>
    <tr>   
    <th width="21%" align="center" valign="middle" nowrap="nowrap" ><p>รหัสเด็ก</p></th>
    	<th width="27%" align="center" valign="middle" nowrap="nowrap" ><p>ชื่อ - สกุล</p></th>
      <th width="52%" align="center" valign="middle" nowrap="nowrap" style="text-align: center; font-size: 12px;"><p>ช่วงระยะเวลา</p></th>
    </tr>

    <tr>    
           <td align="center" valign="middle" nowrap="nowrap" ><p><?php echo $c['childrenId'];?></p></td>  
       <td align="center" valign="middle" nowrap="nowrap" ><p><?php echo $c['childrenName'];?>&nbsp;&nbsp;<?php echo $c['childrenLastName'];?></p></td>
      <td align="center" valign="middle" nowrap="nowrap" ><p ><?php echo $c['distanceMonth'].' เดือน'?></p></td>
    </tr>
      <tr>
   		<th colspan="3"><p>รายละเอีด</th>
    </tr>
     <tr>
    		<th align="center" ><p>ชื่อพฤติกรรม</p></th>
            <th align="center" ><p>ผลการตรวจ</p></td>
            <th align="center" ><p>รายละเอีด</p></th>
    </tr>
    <?php for($iii = 0; $iii<count($poli);$iii++){ if($c['distanceId']==$poli[$iii]['distanceId']){?>
     <tr>
    		<td align="left" ><p><?php echo $poli[$iii]['behaviorName']?></p></td>
            <td align="center" ><p><?php $va =  $poli[$iii]['policingDetialValue'];
			if($va == 0){
				echo 'ไม่ทำ';
			}else if($va == 1){
				echo 'ทำ';
			}else{
				echo 'การตรวจฟัน';
			}
			?></p></td>
            <td align="center" ><?php 
			if($va == 3){ echo 'ซี้ที่ : ';
				for($aa = 0;$aa<count($teeth);$aa++){if($teeth[$aa]['policingDetialId']==$poli[$iii]['policingDetialId']){
					echo $teeth[$aa]['brokenToothNumber'].$teeth[$aa]['brokenToothSide'].',';
				}}
			}else{
				echo '-';
			}?></p></td>
    </tr>
    <?php }}?>
    <?php $i++; }?>
 	<tr>
  	<td colspan="8" align="center"><div class="ajax_paging"><?php echo $this->pagination->create_links(); ?></div></td>
  </tr>
</table>
</div>
</div>
<center><input type="button" id="print" onClick="window.print();" value="พิมพ์"/></center>
<?php }?>

