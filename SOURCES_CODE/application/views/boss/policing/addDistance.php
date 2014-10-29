    <link rel="stylesheet" href="<?php echo base_url();?>css/table.css">
        <link rel="stylesheet" href="<?php echo base_url();?>css/boxFormMain.css">
<div class="table"align="center" >
<form action="<?php echo base_url();?>index.php/boss/addDistanceAction" method="post">
  <table width="40%" border="0" align="center" cellpadding="7" cellspacing="3">    
 <tr>   
    <th colspan="2" align="center" valign="baseline" nowrap="nowrap" style="font-size: 12px"><p>เพิ่มระยะช่วงเวลา</p></th>
   	</tr>

    <tr>    
           <td width="61" align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p>ระยะเวลา/เดือน</p></td>  
       <td width="158" align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p><input class="tinNumber" type="number" name="distanceMonth" id="distanceMonth" ></p></td>

   
    </tr>

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

