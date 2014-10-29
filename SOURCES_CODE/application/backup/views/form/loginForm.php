<tbody>
         <tr>
           <th colspan="2" nowrap="nowrap">ลงชื่อเข้าใช้งานระบบ</th>
         </tr>
         <tr>
           <td width="139" align="right" valign="middle" nowrap="nowrap">ชื่อเข้าใช้งาน&nbsp;:&nbsp;</td>
           <td width="291" align="left" valign="middle" nowrap="nowrap">&nbsp;             <input type="text" class="formInputLogin" name="username" id="username" required/></td>
         </tr>
         <tr>
           <td align="right" valign="middle" nowrap="nowrap">รหัสผ่าน&nbsp;:&nbsp;</td>
           <td align="left" valign="middle" nowrap="nowrap">&nbsp;             <input type="password" class="formInputLogin" name="password" id="password" required/></td>
         </tr>
         <tr>
           <td colspan="2" align="center" valign="middle" nowrap="nowrap"><input class="loginFormButtom" type="button" value="ลงชื่อเข้าใช้" id="login" >&nbsp;&nbsp;<a href="<?php echo base_url();?>index.php/home/forgetPassword" id="forgetPassword" class="loginFormButtom">ลืมรหัสผ่าน</a></td>
         </tr>
           <tr>
           <td id="tdLast" colspan="2" align="center" valign="middle" nowrap="nowrap"><a id="resultLogin"></a></td>
         </tr>
     
          <script>

	 $(document).ready(function(){
			$("#login").click(function(){
			  $.post("<?php echo base_url();?>index.php/login/",
			  {
				username:$("#username").val(),
				password:$("#password").val()
			  },
			  function(data){
				if(data==0){
					$("#resultLogin").html("<font color='red'>ไม่มีผู้ใช้งานนี้อยู่ในระบบ</font>").hide().fadeIn('fast');
				}else{
					$('#formLoginPost').submit();
				}
			  });
			});
$('.formInputLogin').keypress(function (e) {
  if (e.which == 13) {
    $( "#login" ).trigger( "click" );
  }
});
 $("#forgetPassword").click(function(event) {
	  event.preventDefault();
                var href = $(this).attr('href');
                $('.load').fadeOut("fast").hide().load( href ).fadeIn('fast');

            });
  });
</script>
  </tbody>
