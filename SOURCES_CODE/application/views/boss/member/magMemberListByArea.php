<script>
$(function() {
    applyPagination();
    function applyPagination() {
      $(".ajax_paging a").click(function() {
        var url = $(this).attr("href");
        $.ajax({
          type: "POST",
          data: "$page=1",
          url: url,
          beforeSend: function() {
            $("#listDataMember").load(url);
          },
          success: function(msg) {
            $("#listDataMember").load(url);
            applyPagination();
          }
        });
        return false;
      });
    }
  });
</script>
<table width="100%" border="0" align="center" cellpadding="7" cellspacing="3">

    <tr>   
    <th width="61" align="center" valign="baseline" nowrap="nowrap" style="font-size: 12px"><p>ลำดับที่</p></th>
      <th width="77" align="center" valign="baseline" nowrap="nowrap" style="font-size: 12px"><p>ชื่อ - สกุล</p></th>
      <th width="78" align="center" valign="baseline" nowrap="nowrap" style="font-size: 12px"><p>ชื่อเข้าใช้งาน</p></th>
      <th width="91" align="center" valign="baseline" nowrap="nowrap" style="font-size: 12px"><p>อยู่ในเขต</p></th>
      <th width="46" align="center" valign="baseline" nowrap="nowrap" style="font-size: 12px">แก้ไข</th>
      <th width="46" align="center" valign="baseline" nowrap="nowrap" style="font-size: 12px">ลบ</th>
    </tr>
    <?php
	if($member){
	 foreach($member as $c){?>
    <tr>    
           <td align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p><?php echo $c['memberId'];?></p></td>  
       <td align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p><?php echo $c['memberName'];?>&nbsp;&nbsp;<?php echo $c['memberLastName'];?></p></td>
       <td align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><?php echo $c['memberUsername'];?></td>
      <td align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p><?php echo $c['cantonName'];?>&nbsp;อ.<?php echo $c['districtName'];?>&nbsp;จ.<?php echo $c['provinceName'];?></p></td>
      <td align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><a href="<?php echo base_url();?>index.php/boss/editChildentInArea/<?php echo $c['memberId'];?>" class="fancyboxMagChildent">
      <img class="iconAction" src="<?php echo base_url();?>img/editIcon.png" width="25px" height="25px"  style="margin-bottom:-8px;">
      </a></td>
      <td align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><a href="<?php echo base_url();?>index.php/boss/deleteChildentData/<?php echo $c['memberId'];?>/<?php echo $c['addressId'];?>/" class="deletechildentInArea">
         <img class="iconAction" src="<?php echo base_url();?>img/deleteIcon.png" width="25px" height="25px"  style="margin-bottom:-8px;">
      </a></td>
    </tr>
    <?php  }}else{?>
     <tr>    
           <td colspan="6" align="center" valign="middle" nowrap="nowrap" style="font-size: 12px"><p>ไม่พบข้อมูล</p></td>  
    </tr>
    <?php }?>
 <tr>
  	<td colspan="9" align="center"><div class="ajax_paging"><?php echo $this->pagination->create_links(); ?></div></td>
  </tr>
</table>
