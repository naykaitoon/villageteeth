    <link rel="stylesheet" href="<?php echo base_url();?>css/table.css">
        <link rel="stylesheet" href="<?php echo base_url();?>css/boxFormMain.css">
      <script src="<?php echo base_url();?>js/jscolor.js" type="text/javascript"></script>

<div class="table" align="center" >
<?php foreach($behaviorMagType as $d){?>
<form action="<?php echo base_url();?>index.php/boss/editBehaviorMagTypeAction" method="post">
  <table width="100%" border="0" align="center" cellpadding="7" cellspacing="3">    
 <tr>   
    <th colspan="2" align="center" valign="baseline" nowrap="nowrap" style="font-size: 12px"><p>เพิ่มข้อมูลหมวดหมู่พฤติกรรมทัตสุขภาพ</p></th>
   	</tr>

    <tr>    
           <td width="61" align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p>ชื่อหมวดหมู่</p></td>  
       <td width="158" align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p><input name="behaviorTypeName"  type="text"  required id="behaviorTypeName" value="<?php echo $d['behaviorTypeName'];?>" size="50" ><input  type="hidden" name="behaviorTypeId" id="behaviorTypeId" value="<?php echo $d['behaviorTypeId'];?>"  required ></p></td>

   
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
<?php } ?>

</div>

