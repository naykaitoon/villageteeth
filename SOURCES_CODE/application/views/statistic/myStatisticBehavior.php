<html>
<head>
<meta charset="utf-8">
<title>print preview</title>
<script>

$('.year').click(function(event) {
				 event.preventDefault();
				var href = $(this).attr('href');


                $('iframe').attr('src',href); 
				$('.popupPrintBehavior').attr('href',href+'?print=1'); 


	});
</script>
<style>
#chartResult_div{
	width:100%;

}
iframe{
	background-color:#FFFFFF;
	width:950;
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
<link rel="stylesheet" href="<?php echo base_url();?>css/font.css">
</head>
<body>
<div id="headTitleContentbg">
 <h2 id="headTitleContent">สถิติการตรวจตามพฤติกรรม</h2>
</div>
<a class="popupPrintBehavior" href="<?php echo base_url();?>index.php/report/myChartsBehaviorReport?print=1" ><img src="<?php echo base_url();?>img/printpreview.png" width="50px;"/>ดู/พิมพ์</a><br><br>
<div align="left" style="padding-left:20;">
<?php 
		$all = '<a href="'.base_url().'index.php/report/myChartsBehaviorReport" class="year">ทั้งหมด</a>|';
		echo $all;
	foreach($year as $y){
		$yea = date('Y', strtotime($y['policingDate']));
		$link = '<a href="'.base_url().'index.php/report/myChartsBehaviorReport/'.
		$yea
		.'" class="year">'.$yea.'</a> |';
	echo $link;
	}
?>
</div>
<br>
<div class="table" align="center">
<iframe src="<?php echo base_url();?>index.php/report/myChartsBehaviorReport" scrolling="auto"></iframe><br><br>
<br>


<br>
<br>
</div>
</body>
</html>