
       <tbody>
         <tr>
           <th colspan="2" nowrap="nowrap">ลืมรหัสผ่าน</th>
         </tr>
         <tr>
           <td width="139" align="right" valign="middle" nowrap="nowrap">ชื่อเข้าใช้งาน / E-mail&nbsp;:&nbsp;</td>
           <td width="291" align="left" valign="middle" nowrap="nowrap">&nbsp;             <input type="text" class="formInputLogin" name="usernameAndEmail" id="usernameAndEmail" required/></td>
         </tr>
         <tr>
           <td colspan="2" align="center" valign="middle" nowrap="nowrap"><a href="<?php echo base_url();?>index.php/home/loginForm" id="loginForm" class="loginFormButtom">กลับ</a>&nbsp;&nbsp;<input class="loginFormButtom" type="button" value="ยืนยัน" onClick="disabled" id="sent"></td>
         </tr>
           <tr>
           <td colspan="2" align="center" valign="middle" nowrap="nowrap"><a id="resultLogin"></a></td>
         </tr>
    <script>
 $("#loginForm").click(function(event) {
	  event.preventDefault();
                var href = $(this).attr('href');
                $('.load').fadeOut("fast").hide().load( href ).fadeIn('fast');

            });
$("#sent").click(function(event) {
	 event.preventDefault();
	 	$("#sent").hide();
	 $.post("<?php echo base_url();?>index.php/login/forgetPassword",
			  {
				usernameAndEmail:$("#usernameAndEmail").val()
			  },
			  function(data){
				  
					$("#resultLogin").html(data).hide().fadeIn('fast');
					var str = data; 
   					var res = str.match(/red/);
					if(res){
						$("#sent").show();
					}
				
			  });
});

</script>


       </tbody>

