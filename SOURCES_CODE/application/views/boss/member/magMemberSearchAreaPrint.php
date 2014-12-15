<link rel="stylesheet" href="<?php echo base_url();?>css/tableBox.css">    
<link rel="stylesheet" href="<?php echo base_url();?>css/font.css">
<script type="text/javascript" src="<?php echo base_url()?>js/jquery-1.11.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('#printtt').click(function() {
			$('#hinddd').hide();
			window.print() ;
		});
		 $( "#province" ).click(function() {
				var str = "";
					$( "select#province option:selected" ).each(function() {
						str += $( this ).val() + " ";
						$('#titleP').html('จังหวัด : '+$( this ).text());
					});
						$.post("<?php echo base_url()?>index.php/boss/getDistrict",
						  {
							provinceId:str
						  },
						  function(data){

							$("#district").removeAttr('disabled');
							$("#canton").attr('disabled','disabled');
							$("#zipcode").attr('disabled','disabled');
							$('#district').html(data);
						  });
				})
		.trigger( "change" );
		  
		 $( "#district" )
			.change(function() {
				var str = "";
					$( "select#district option:selected" ).each(function() {
						str += $( this ).val() + " ";
						$('#titleD').html('อำเภอ : '+$( this ).text());
					});
						$.post("<?php echo base_url()?>index.php/boss/getCanton",
						  {
							districtId:str
						  },
						  function(data){
							 
							$('#canton').html(data);
						  });
				})
		.trigger( "change" );
		
		 $( "#canton" ).change(function() {
				var cantonId = 0;
				var districtId = 0;
				var provinceId = 0;
					$( "select#canton option:selected" ).each(function() {
						cantonId += $( this ).val() + " ";
						$('#titleC').html('ตำบล : '+$( this ).text());
					});
						$.post("<?php echo base_url()?>index.php/boss/memberByAreaSearchPrint",
						  {
							cantonId:cantonId,
							districtId:districtId,
							provinceId:provinceId
						  },
						  function(data){
							$('#listDataMember').html(data);
						  });
				}).trigger( "change" );
	
			 $( "#district" ).change(function() {
				var cantonId = 0;
				var districtId = 0;
				var provinceId = 0;
					$( "select#district option:selected" ).each(function() {
						districtId += $( this ).val() + " ";
					});
						$.post("<?php echo base_url()?>index.php/boss/memberByAreaSearchPrint",
						  {
							cantonId:cantonId,
							districtId:districtId,
							provinceId:provinceId
						  },
						  function(data){
							$('#listDataMember').html(data);
						  });
				}).trigger( "change" );		 
				
		$( "#province" ).change(function() {
				var cantonId = 0;
				var districtId = 0;
				var provinceId = 0;
					$( "select#province option:selected" ).each(function() {
						provinceId += $( this ).val() + " ";
					});
						$.post("<?php echo base_url()?>index.php/boss/memberByAreaSearchPrint",
						  {
							cantonId:cantonId,
							districtId:districtId,
							provinceId:provinceId
						  },
						  function(data){
							$('#listDataMember').html(data);
						  });
				});
	});
	</script>
<div id="headTitleContentbg">
 <h2 id="headTitleContent">รายชื่อผู้ใช้งานตามเขตรับผิดชอบ</h2>
 </div>
<div class="table"align="center">
<br>
  <p id="hinddd">
    <label for="textfield">จังหวัด:</label>
    <select class="address" name="province" id="province">
  <option value="0">กรุณาเลือก</option>
  <?php foreach($province as $p){?>
  <option value="<?php echo $p['provinceId']?>"><?php echo $p['provinceName']?></option>
  <?php }?>
  </select>
    <label for="textfield">อำเภอ:</label>
     <select class="address" name="district"  id="district"  >
    		<option value="0" >กรุณาเลือกจังหวัด</option>
  	 </select>
    <label for="textfield">ตำบล:</label>
    <select class="address" name="canton"  id="canton" >
 
    <option value="0" >กรุณาเลือกอำเภอ</option>

  </select>
    <input type="button" name="button" id="printtt" value="พิมพ์" >
  </p>
 รายชื่อประจำพื้นที่ <a id="titleC"></a>&nbsp;|&nbsp;<a id="titleD"></a>&nbsp;|&nbsp;<a id="titleP"></a>
  <div id="listDataMember">
  </div>
  <p>&nbsp;</p>
</div>

