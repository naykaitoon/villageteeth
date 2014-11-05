<script type="text/javascript" src="<?php echo base_url()?>js/jquery-1.11.1.min.js"></script>
 <link rel="stylesheet" href="<?php echo base_url();?>css/table.css">
         <link rel="stylesheet" href="<?php echo base_url();?>css/boxFormMain.css">    
         <div class="table"align="center" >
  <table width="80%" border="0" align="center" cellpadding="5" cellspacing="0">
    <tbody>
      <tr>
        <th colspan="2" align="center" valign="middle" nowrap="nowrap">แก้ไขข้อมูลเด็กในพื้นที่</th>
      </tr>
      <tr>
        <td width="48%" align="right" valign="middle">ชื่อ - นามสกุล : </td>
        <td width="52%" align="left" valign="middle"><?php echo $childent[0]['childrenName'];?> - <?php echo $childent[0]['childrenLastName'];?></td>
      </tr>
      <tr>
        <td align="right" valign="middle">เลขบัตรประจำตัวประชาชน : </td>
        <td align="left" valign="middle"><?php echo $childent[0]['childrenIDCard'];?></td>
      </tr>
      <tr>
        <td align="right" valign="middle">วันเกิด ป/ด/ว: </td>
        <td align="left" valign="middle"><?php echo $childent[0]['childrenBirthday'];?></td>
      </tr>
      <tr>
        <td align="right" valign="middle">ที่อยู่บ้านเลขที่/หมู่/ซอย : </td>
        <td align="left" valign="middle"><?php echo $childent[0]['addressDetial'];?></td>
      </tr>
       <tr>
        <td align="right" valign="middle">ถนน</td>
        <td align="left" valign="middle"><?php echo $childent[0]['street'];?></td>
      </tr>
      <tr>
        <td align="right" valign="middle">จังหวัด</td>
        <td align="left" valign="middle"><?php echo $childent[0]['provinceName']?></td>
      </tr>
      <tr>
        <td align="right" valign="middle">อำเภอ</td>
        <td align="left" valign="middle"><?php echo $childent[0]['districtName']?></td>
      </tr>
      <tr>
        <td align="right" valign="middle">ตำบล</td>
        <td align="left" valign="middle"><?php echo $childent[0]['cantonName']?></td>
      </tr>
      <tr>
        <td align="right" valign="middle">รหัสไปรษณีย์:</td>
        <td align="left" valign="middle"><?php echo $childent[0]['zipcode']?></td>
      </tr>
       <?php foreach($tel as $t){?>
       <tr>
     <td align="right" valign="middle">เบอร์โทร - หมายเหตุเบอร์โทร</td>
        <td align="left" valign="middle"><?php echo $t['tel']?> - <?php echo $t['telNote']?></td>
      </tr>
        <?php }?>
   

    </tbody>
  </table>
  </div>

