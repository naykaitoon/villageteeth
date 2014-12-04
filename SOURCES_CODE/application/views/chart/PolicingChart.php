<div style="margin-top:-20">
<?php echo $graph ?>
</div>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>print preview</title>

<?php if($_GET['print_preview']==1){ ?>
<style type="text/css" media="all">
button#printPreview{
	display:none;	
}
body{
	padding:10px;	
}
</style>
<?php }else{ ?>
<style type="text/css" media="print">
button#printPreview{
	display:none;	
}
</style>
<?php } ?>
</head>

<body>

<p>ตัวอย่าง ต่อไปนี้เป็นโค้ดสำหรับการสั่ง print preview ซึ่งทำงานได้เฉพาะ IE เท่านั้น แต่เราสามารถประยุกต์<br />
เพิ่มเติม ตามตัวอย่างโค้ด ด้านล่าง สำหรับกรณี browser อื่นๆ </p>

<script type="text/javascript">
function printPreview() {
	if(navigator.appName == "Microsoft Internet Explorer"){
	if(!document._wb){
		var obj="<object id='_wb' width='0' height='0' ";
		obj+=" classid='CLSID:8856F961-340A-11D0-A96B-00C04FD705A2'></object>";
		document.body.insertAdjacentHTML(
			"beforeEnd",obj
		); 
	}
	
	_wb.ExecWB(7,1)
	}else{
		var windowWidth=850;
		var windowHeight=550;
		var myleft=(screen.width)?(screen.width-windowWidth)*0.5:100;    
   		var mytop=(screen.height)?(screen.height-windowHeight)*0.5:100;
		var feature='left='+myleft+',top='+eval(mytop-50)+',width='+windowWidth+',height='+windowHeight+',';
		feature+='menubar=yes,status=no,location=no,toolbar=no,scrollbars=yes';
		window.open(window.location+'?print_preview=1','welcome',feature);
	}
}
</script>

<button id="printPreview" onclick="printPreview()">Print Preview</button>

</body>
</html>