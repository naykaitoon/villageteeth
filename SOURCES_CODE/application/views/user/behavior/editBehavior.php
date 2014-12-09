    <link rel="stylesheet" href="<?php echo base_url();?>css/table.css">
        <link rel="stylesheet" href="<?php echo base_url();?>css/boxFormMain.css">

<div class="table" align="center" >
<?php foreach($behavior as $d){?>
<form action="<?php echo base_url();?>index.php/officials/editBehaviorAction" method="post">
  <table width="100%" border="0" align="center" cellpadding="7" cellspacing="3">    
 <tr>   
    <th colspan="2" align="center" valign="baseline" nowrap="nowrap" style="font-size: 12px"><p>เพิ่มข้อมูลพฤติกรรมทัตสุขภาพ</p></th>
   	</tr>

    <tr>    
           <td width="61" align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p>ชื่อพฤติกรรม</p></td>  
       <td width="158" align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p><input  type="hidden" name="behaviorId" id="behaviorId" value="<?php echo $d['behaviorId'];?>"  required ><input  type="text" name="behaviorName" id="behaviorName" value="<?php echo $d['behaviorName'];?>"  required ></p></td>

   
    </tr>
 <tr>    
           <td width="61" align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p>ประเภทพฤติกรรม</p></td>  
       <td width="158" align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p>
         <select name="behaviorType" id="behaviorType">  
           <option value="normal" <?php if($d['behaviorType']=='normal'){echo 'selected';}?>>ข้อความ</option>
           <option value="photo"  <?php if($d['behaviorType']=='photo'){echo 'selected';}?>>การตรวจฟัน(รูปภาพ)</option>
         </select>
       </p></td>

   
    </tr>

 <tr>    
           <td width="61" align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p>หมวดหมู่พฤติกรรม</p></td>  
       <td width="158" align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p>
         <select name="behaviorTypeId" id="behaviorTypeId">
        <?php foreach($behaviortype as $b){?>
           <option value="<?php echo $b['behaviorTypeId'];?>"
            <?php if($d['behaviorTypeId']==$b['behaviorTypeId']){echo 'selected';}?>><?php echo $b['behaviorTypeName'];?></option>
           <?php }?>
         </select>
       </p></td>

   
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
<?php }?>
</div>

