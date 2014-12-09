 <link rel="stylesheet" href="<?php echo base_url();?>css/table.css">
         <link rel="stylesheet" href="<?php echo base_url();?>css/boxFormMain.css">     
            <script language="javascript">
function chkSubmit()
	{
			a = document.getElementById("distanceMonth");
			if(a.value*1!=a.value){
				alert('กรุณาระบุเป็นตัวเลขหรือค่าที่ไม่ติดลบ');
				return false;
			}else{
				return true;
			}
	}
function checkValue(){
	var num = document.getElementById("distanceMonth").value;
	if(num<0){
		alert('กรุณาระบุเป็นตัวเลขที่ค่าที่ไม่ติดลบ และไม่ใช่ 0');
		document.getElementById("distanceMonth").value = 0;
	}
}
</script>

<div class="table"align="center" >
<form action="<?php echo base_url();?>index.php/officials/editDistanceAction" method="post" onsubmit="return chkSubmit(); ">
  <table width="100%" border="0" align="center" cellpadding="7" cellspacing="3">    
 <tr>   
    <th colspan="2" align="center" valign="baseline" nowrap="nowrap" style="font-size: 12px"><p>แก้ไขระยะช่วงเวลา</p></th>
   	</tr><?php
	 foreach($distance as $c){?>
    <tr>   
    <td width="61" align="center" valign="baseline" nowrap="nowrap" style="font-size: 12px"><p>รหัสช่วงอายุ</p></td>
    	<td width="158" align="center" valign="baseline" nowrap="nowrap" style="font-size: 12px"><p><?php echo $c['distanceId'];?><input type="hidden" name="distanceId" id="distanceId" value="<?php echo $c['distanceId'];?>"></p></td>
    </tr>

    <tr>    
           <td align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p>ระยะเวลา/เดือน</p></td>  
       <td align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p><input type="number" name="distanceMonth" id="distanceMonth" onKeyUp="checkValue();" onClick="checkValue();" value="<?php echo $c['distanceMonth'];?>"></p></td>

   
    </tr>
    <?php  }?>
  <tr>    
           <td colspan="2" align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p>
             <input type="submit" name="save" id="save" value="บันทึก">
             &nbsp;&nbsp;
             <input type="button" name="cancle" id="cancle" onClick="parent.jQuery.fancybox.close();" value="ยกเลิก">
           </p></td>  
    </tr>
</table>
</form>
</div>

