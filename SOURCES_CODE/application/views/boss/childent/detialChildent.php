<link rel="stylesheet" href="<?php echo base_url();?>css/tableBox.css">    
<link rel="stylesheet" href="<?php echo base_url();?>css/font.css">
<style>
	body{
		font-family: thaisanslite_r1 Vera Serif Bold;
		margin:0;
		margin-top:-18px;
		}
</style>
         <div class="table"align="center" >
  <table width="100%" border="0" align="center" cellpadding="5" cellspacing="1">
    <tbody>
      <tr>
        <th colspan="2" align="center" valign="middle" nowrap="nowrap">ประวัติส่วนตัวเด็กในพื้นที่</th>
      </tr>
      <tr>
        <td width="50%" align="right" valign="middle">ชื่อ - นามสกุล : </td>
        <td width="50%" align="left" valign="middle"><?php echo $childent[0]['childrenName'];?> - <?php echo $childent[0]['childrenLastName'];?></td>
      </tr>
      <tr>
        <td align="right" valign="middle">เลขบัตรประจำตัวประชาชน : </td>
        <td align="left" valign="middle"><?php echo $childent[0]['childrenIDCard'];?></td>
      </tr>
      <tr>
        <td align="right" valign="middle">วันเกิด ป/ด/ว : </td>
        <td align="left" valign="middle"><?php echo $childent[0]['childrenBirthday'];?></td>
      </tr>
      <tr>
        <td align="right" valign="middle">ที่อยู่บ้านเลขที่/หมู่/ซอย : </td>
        <td align="left" valign="middle"><?php echo $childent[0]['addressDetial'];?></td>
      </tr>
       <tr>
        <td align="right" valign="middle">ถนน : </td>
        <td align="left" valign="middle"><?php echo $childent[0]['street'];?></td>
      </tr>
      <tr>
        <td align="right" valign="middle">จังหวัด : </td>
        <td align="left" valign="middle"><?php echo $childent[0]['provinceName']?></td>
      </tr>
      <tr>
        <td align="right" valign="middle">อำเภอ : </td>
        <td align="left" valign="middle"><?php echo $childent[0]['districtName']?></td>
      </tr>
      <tr>
        <td align="right" valign="middle">ตำบล : </td>
        <td align="left" valign="middle"><?php echo $childent[0]['cantonName']?></td>
      </tr>
      <tr>
        <td align="right" valign="middle">รหัสไปรษณีย์:</td>
        <td align="left" valign="middle"><?php echo $childent[0]['zipcode']?></td>
      </tr>
      <tr>
        <td align="right" valign="middle">โรคประจำตัว : </td>
        <td align="left" valign="middle"><?php echo $childent[0]['diseasesName'];?></td>
      </tr>
       <tr>
        <td align="right" valign="middle">ยาที่กินประจำ : </td>
        <td align="left" valign="middle"><?php echo $childent[0]['medicine'];?></td>
      </tr>
             <tr>
        <td align="right" valign="middle">ยาที่แพ้ : </td>
        <td align="left" valign="middle"><?php echo $childent[0]['allergicMedicine'];?></td>
      </tr>
       <?php foreach($tel as $t){?>
       <tr>
     <td align="right" valign="middle">เบอร์โทร - หมายเหตุเบอร์โทร : </td>
        <td align="left" valign="middle"><?php echo $t['tel']?> - <?php echo $t['telNote']?></td>
      </tr>
        <?php }?>
   

    </tbody>
  </table>
  </div>
