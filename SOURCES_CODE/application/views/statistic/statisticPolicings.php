<style>
#chartResult_div{
	width:100%;

}
iframe{
	background-color:#FFFFFF;
	width:650px;
	margin-left:-40px;
	height:400px;
	border:2px #A2A2A2 solid;
	border-radius:10px;
	box-shadow:2px 2px 2px #2A2A2A;

}
iframe #chartResult_divColumn{
	margin-left:-50px;
}

</style>
<div id="headTitleContentbg">
 <h2 id="headTitleContent">สถิติเด็กที่เข้ารับการตรวจ</h2>
 </div>
<div class="table"align="center"><br>
<iframe src="<?php echo base_url();?>index.php/report/chartsPolicingsReport" scrolling="no"/></iframe>
<center><a class="popupPrint" href="<?php echo base_url();?>index.php/report/chartsPolicingsReport">พิมพ์</a></center>

<br>
<br>
<br>
</div>

