    <link rel="stylesheet" href="<?php echo base_url();?>css/table.css">
        <link rel="stylesheet" href="<?php echo base_url();?>css/boxFormMain.css">
      <script src="<?php echo base_url();?>js/jscolor.js" type="text/javascript"></script>

<div class="table" align="center" >
<form action="<?php echo base_url();?>index.php/boss/addBehaviorAction" method="post">
  <table width="100%" border="0" align="center" cellpadding="7" cellspacing="3">    
 <tr>   
    <th colspan="2" align="center" valign="baseline" nowrap="nowrap" style="font-size: 12px"><p>เพิ่มข้อมูลพฤติกรรมทัตสุขภาพ</p></th>
   	</tr>

    <tr>    
           <td width="61" align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p>ชื่อพฤติกรรม</p></td>  
       <td width="158" align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p><input  type="text" name="behaviorName" id="behaviorName"  required ></p></td>

   
    </tr>
 <tr>    
           <td width="61" align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p>ประเภทพฤติกรรม</p></td>  
       <td width="158" align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p>
         <select name="behaviorType" id="behaviorType">  
           <option value="normal">ข้อความ</option>
           <option value="photo">การตรวจฟัน(รูปภาพ)</option>
         </select>
       </p></td>

   
    </tr>

 <tr>    
           <td width="61" align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p>หมวดหมู่พฤติกรรม</p></td>  
       <td width="158" align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p>
         <select name="behaviorTypeId" id="behaviorTypeId">
        <?php foreach($behaviortype as $b){?>
           <option value="<?php echo $b['behaviorTypeId'];?>"><?php echo $b['behaviorTypeName'];?></option>
           <?php }?>
         </select>
       </p></td>

   
    </tr>
 <tr>    
           <td width="61" align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p>สีกราฟใน Report</p></td>  
       <td width="158" align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p><input type="text" name="colorCode" id="colorCode"  class="color" required ></p></td>

   
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

