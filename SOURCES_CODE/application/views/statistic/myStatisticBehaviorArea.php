<script type="text/javascript" src="<?php echo base_url()?>js/jquery-1.11.1.min.js"></script>
<script type="text/javascript">
		$(document).ready(function() {
		 $( "#province" ).click(function() {
				var str = "";
					$( "select#province option:selected" ).each(function() {
						str += $( this ).val() + " ";
					});
						$.post("<?php echo base_url()?>index.php/report/getDistrict",
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
					});
						$.post("<?php echo base_url()?>index.php/report/selectByAreaSearch",
						  {
							cantonId:cantonId,
							districtId:districtId,
							provinceId:provinceId
						  },
						  function(data){
							$('iframe').attr('src',data);
						  });
				}).trigger( "change" );
	
			 $( "#district" ).change(function() {
				var cantonId = 0;
				var districtId = 0;
				var provinceId = 0;
					$( "select#district option:selected" ).each(function() {
						districtId += $( this ).val() + " ";
					});
						$.post("<?php echo base_url()?>index.php/report/selectByAreaSearch",
						  {
							cantonId:cantonId,
							districtId:districtId,
							provinceId:provinceId
						  },
						  function(data){
							$('iframe').attr('src',data);
						  });
				}).trigger( "change" );		 
				
		$( "#province" ).change(function() {
				var cantonId = 0;
				var districtId = 0;
				var provinceId = 0;
					$( "select#province option:selected" ).each(function() {
						provinceId += $( this ).val() + " ";
					});
						$.post("<?php echo base_url()?>index.php/report/selectByAreaSearch",
						  {
							cantonId:cantonId,
							districtId:districtId,
							provinceId:provinceId
						  },
						  function(data){
							  alert(data);
							$('iframe').attr('src',data);
						  });
				});
	
		});
	
	</script>
    <style>
#chartResult_div{
	width:100%;

}
iframe{
	background-color:#FFFFFF;
	width:900;
	margin-left:-10px;
	height:1300;
	border:2px #A2A2A2 solid;
	border-radius:10px;
	box-shadow:2px 2px 2px #2A2A2A;

}
iframe #chartResult_divColumn{
	margin-left:-50px;
}

.popupPrintBehavior{
	font-size:25px;
	color:#414141;
	font-weight:bold;
	
}
.year{
	font-size:20px;
	padding-right:10;
	padding-left:10;
	color:#414141;
	font-weight:bold;
}

</style>
<div id="headTitleContentbg">
 <h2 id="headTitleContent">สถิติพฤติกรรมตรวจตามเขตพื้นที่</h2>
 </div>
<div class="table"align="center">
<br>
  <p>
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
  </p>
  <a class="popupPrintBehavior" href="<?php echo base_url();?>index.php/report/chartsBehaviorReport?print=1" ><img src="<?php echo base_url();?>img/printpreview.png" width="50px;"/>ดู/พิมพ์</a><br><br>
<div align="left" style="padding-left:20;">
</div>
 <div class="table" id="chartsPolicingsReport" align="center">
 <br>
<br>
<iframe src="<?php echo base_url();?>index.php/report/getlinkAreaSearch" scrolling="no"></iframe>

<br><br>


<br>
<br>
</div>
  
  <p>&nbsp;</p>
</div>

