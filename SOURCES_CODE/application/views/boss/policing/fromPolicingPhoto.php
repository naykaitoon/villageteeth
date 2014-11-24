<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>PhotoPolincy</title>
<style>
.policyPhoto{
	transform: scale(0.75, 0.75);
	margin-top: -100px;
	text-align: center;
}
body {
	margin-left: 0px;
	margin-top: -30px;
	margin-right: 0px;
	margin-bottom: 0px;
	overflow:hidden;
}
</style>
</head>

<body>
<form action="<?php echo base_url();?>index.php/boss/addPolicingPhoto/<?php echo $behavior[0]['behaviorId'];?>/<?php echo $childentId;?>" method="post">
<div class="policyPhoto">

<p style="font-size:28px;"><?php  echo $behavior[0]['behaviorName'];?></p>
<table width="701" border="0" align="center" cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
      <td width="123" align="center" valign="top"><table width="123" border="0" cellspacing="0" cellpadding="0">
        <tbody>
          <tr>
            <td height="54" align="center" valign="middle" bgcolor="#A9212F" style="color: #FFFCFC"><input name="up[]" <?php if($pImg['u5']){ ?> checked="checked" <?php }?> type="checkbox" id="up5" value="5">
            51</td>
          </tr>
          <tr>
            <td height="55" align="center" valign="middle" bgcolor="#F08D3A" style="color: #FFFCFC"><input name="up[]" <?php if($pImg['u4']){ ?> checked="checked" <?php }?> type="checkbox" id="up4" value="4">
            <label for="up4"> 52</label></td>
          </tr>
          <tr>
            <td height="54" align="center" valign="middle" bgcolor="#50A760" style="color: #FFFCFC"><input name="up[]" <?php if($pImg['u3']){ ?> checked="checked" <?php }?> type="checkbox" id="up3" value="3">
              <label for="up3">53</label></td>
          </tr>
          <tr>
            <td height="55" align="center" valign="middle" bgcolor="#3360B3" style="color: #FFFCFC"><input name="up[]" <?php if($pImg['u2']){ ?> checked="checked" <?php }?> type="checkbox" id="up2" value="2">
              54
                <label for="up2"></label></td>
          </tr>
          <tr>
            <td height="54" align="center" valign="middle" bgcolor="#673371" style="color: #FFFCFC"><input name="up[]" <?php if($pImg['u1']){ ?> checked="checked" <?php }?> type="checkbox" id="up1" value="1">
              <label for="up1">55</label></td>
          </tr>
          <tr>
            <td height="56" align="center" valign="middle" style="color: #FFFCFC">&nbsp;</td>
          </tr>
          <tr>
            <td height="54" align="center" valign="middle" bgcolor="#673371" style="color: #FFFCFC"><input name="down[]" <?php if($pImg['d1']){ ?> checked="checked" <?php }?> type="checkbox" id="down1" value="1">
              <label for="down1">81</label></td>
          </tr>
          <tr>
            <td height="54" align="center" valign="middle" bgcolor="#3360B3" style="color: #FFFCFC"><input name="down[]" <?php if($pImg['d2']){ ?> checked="checked" <?php }?> type="checkbox" id="down2" value="2">
              <label for="down2">82</label></td>
          </tr>
          <tr>
            <td height="55" align="center" valign="middle" bgcolor="#50A760" style="color: #FFFCFC"><input name="down[]" <?php if($pImg['d3']){ ?> checked="checked" <?php }?> type="checkbox" id="down3" value="3">
              <label for="down3">83</label></td>
          </tr>
          <tr>
            <td height="54" align="center" valign="middle" bgcolor="#F08D3A" style="color: #FFFCFC"><input name="down[]" <?php if($pImg['d4']){ ?> checked="checked" <?php }?> type="checkbox" id="down4" value="4">
<label for="down4"> 84</label></td>
          </tr>
          <tr>
            <td height="55" align="center" valign="middle" bgcolor="#A9212F" style="color: #FFFCFC"><input name="down[]" <?php if($pImg['d5']){ ?> checked="checked" <?php }?> type="checkbox" id="down5" value="5">
              <label for="down5">85</label></td>
          </tr>
        </tbody>
      </table></td>
      <td width="455"><img src="<?php echo base_url();?>img/1.jpg" height="600px" width"455px">
</td>
      <td width="123" align="center" valign="top"><table width="123" border="0" cellspacing="0" cellpadding="0">
        <tbody>
          <tr>
            <td height="55" align="center" valign="middle" bgcolor="#A9212F" style="color: #FFFFFF"><input name="up[]" <?php if($pImg['u6']){ ?> checked="checked" <?php }?> type="checkbox" id="up6" value="6">
              <label for="up6">61<span style="color: #FFFCFC"></span></label></td>
          </tr>
          <tr>
            <td height="54" align="center" valign="middle" bgcolor="#F08D3A" style="color: #FFFFFF"><input name="up[]" <?php if($pImg['u7']){ ?> checked="checked" <?php }?> type="checkbox" id="up7" value="7">
              62
                <label for="up7"><span style="color: #FFFCFC"></span></label></td>
          </tr>
          <tr>
            <td height="54" align="center" valign="middle" bgcolor="#50A760" style="color: #FFFFFF"><input name="up[]" <?php if($pImg['u8']){ ?> checked="checked" <?php }?> type="checkbox" id="up8" value="8">
              <span style="color: #FFFCFC">63</span>              <label for="up8"><span style="color: #FFFCFC"></span></label></td>
          </tr>
          <tr>
            <td height="56" align="center" valign="middle" bgcolor="#3360B3" style="color: #FFFFFF"><input name="up[]" <?php if($pImg['u9']){ ?> checked="checked" <?php }?> type="checkbox" id="up9" value="9">
              <label for="up9">64<span style="color: #FFFCFC"></span></label></td>
          </tr>
          <tr>
            <td height="54" align="center" valign="middle" bgcolor="#673371" style="color: #FFFFFF"><input name="up[]" <?php if($pImg['u10']){ ?> checked="checked" <?php }?> type="checkbox" id="up10" value="10">
              <label for="up10">65<span style="color: #FFFCFC"></span></label></td>
          </tr>
          <tr>
            <td height="56" align="center" valign="middle" style="color: #FFFFFF">&nbsp;</td>
          </tr>
          <tr>
            <td height="54" align="center" valign="middle" bgcolor="#673371" style="color: #FFFFFF"><input name="down[]" <?php if($pImg['d10']){ ?> checked="checked" <?php }?> type="checkbox" id="down10" value="10">
              <label for="down10">71<span style="color: #FFFCFC"></span></label></td>
          </tr>
          <tr>
            <td height="54" align="center" valign="middle" bgcolor="#3360B3" style="color: #FFFFFF"><input name="down[]" <?php if($pImg['d9']){ ?> checked="checked" <?php }?> type="checkbox" id="down9" value="9">
              <label for="down9">72<span style="color: #FFFCFC"></span></label></td>
          </tr>
          <tr>
            <td height="55" align="center" valign="middle" bgcolor="#50A760" style="color: #FFFFFF"><input name="down[]" <?php if($pImg['d8']){ ?> checked="checked" <?php }?> type="checkbox" id="down8" value="8">
              <label for="down8">73</label></td>
          </tr>
          <tr>
            <td height="54" align="center" valign="middle" bgcolor="#F08D3A" style="color: #FFFFFF"><input name="down[]" <?php if($pImg['d7']){ ?> checked="checked" <?php }?> type="checkbox" id="down7" value="7">
              <label for="down7">74<span style="color: #FFFCFC"></span></label></td>
          </tr>
          <tr>
            <td height="55" align="center" valign="middle" bgcolor="#A9212F" style="color: #FFFFFF"><input name="down[]" <?php if($pImg['d6']){ ?> checked="checked" <?php }?> type="checkbox" id="down6" value="6">
              75
                <label for="down6"><span style="color: #FFFCFC"></span></label></td>
          </tr>
        </tbody>
      </table></td>
    </tr>
  </tbody>
</table>
<center><p style="transform: scale(1.25, 1.25);"><input type="submit" value="บันทึก">&nbsp;&nbsp;&nbsp;
<input type="reset" value="ล้างค่าใหม่" >&nbsp;&nbsp;&nbsp;<input type="button" value="ยกเลิก" onClick="parent.$.fancybox.close();"></p></center>
</div>
</form>
</body>
</html>
