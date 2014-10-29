 <link rel="stylesheet" href="<?php echo base_url();?>css/table.css">
<div class="table"align="center" >
  <table width="40%" border="0" align="center" cellpadding="7" cellspacing="3">    
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
       <td align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p><input type="number" name="distanceMonth" id="distanceMonth" value="<?php echo $c['distanceMonth'];?>"></p></td>

   
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
</div>

