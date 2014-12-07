<html>
<head>
<meta charset="utf-8">
<title>print preview</title>
<style>
#chartResult_div{
	width:100%;

}
iframe{
	background-color:#FFFFFF;
	width:650px;
	margin-left:-40px;
	height:600px;
	border:2px #A2A2A2 solid;
	border-radius:10px;
	box-shadow:2px 2px 2px #2A2A2A;

}
iframe #chartResult_divColumn{
	margin-left:-50px;
}

.popupPrint{
	font-size:25px;
	color:#414141;
	font-weight:bold;
}

</style>
<link rel="stylesheet" href="<?php echo base_url();?>css/font.css">
</head>
<body>
<div id="headTitleContentbg">
 <h2 id="headTitleContent">สถิติเด็กที่เข้ารับการตรวจ</h2>
</div><div id="print"><br><br>

<a class="popupPrint" href="<?php echo base_url();?>index.php/report/chartsPolicingsReport?print=1" ><img src="<?php echo base_url();?>img/printpreview.png" width="50px;"/>ดู/พิมพ์</a>


</div><br>
<div class="table" align="center">
<iframe src="<?php echo base_url();?>index.php/report/chartsPolicingsReport" scrolling="no"></iframe>

<br><br>


<br>
<br>
</div>
</body>
</html>