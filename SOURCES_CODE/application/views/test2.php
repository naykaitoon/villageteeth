<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery-1.11.1.min.js"></script>
<script>
$(document).ready(function(e) {
	 $('.next').click(function() {
		 $('body').css('margin-left','-900px');
	 });
  	 $('.back').click(function() {
		 $('body').css('margin-left','0px');
	 });
});
</script>
<style>
body{
	width:1800px;
	margin-top:0;
	margin-left:0;
	margin-right:0;
	margin-bottom:0;
	overflow:hidden;
	-webkit-transition: all ease-in-out 1s; /* Safari 3.1 to 6.0 */
     transition: all ease-in-out 1s;
}
#page1{
	width:900px;
	height:550px;
	background-color:#7C4041;
	float:left;
}
#page2{
	margin-top:-20px;
	width:900px;
	height:550px;
	background-color:#406C7C;
	float:left;
}
</style>
</head>

<body>
<div id="page1"><input type="button" value="next" class="next"/></div>
<div id="page2"><input type="button" value="back" class="back"/></div>
</body>
</html>