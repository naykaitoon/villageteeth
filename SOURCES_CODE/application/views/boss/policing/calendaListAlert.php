<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>js/fancy/lib/jquery.mousewheel-3.0.6.pack.js?v=1001"></script>
	<script type="text/javascript" src="<?php echo base_url()?>js/fancy/source/jquery.fancybox.pack.js?v=1001&?v=2.1.5"></script>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>js/fancy/source/jquery.fancybox-thumbs.css?v=1001&?v=2.1.5" media="screen" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>js/fancy/source/jquery.fancybox.css?v=1001&?v=2.1.5" media="screen" />
    <style>
	  .sunday{color: white;background-color:#FD4545;}
     .saturday{color: #000000;background-color:#FFCB99;}
     .default{color: black;background-color:white;}
     .today{color: #FFFFFF;background-color:#0074FF;}
	  table#calenda{
	 	border-radius:3px;
	 }
	#calenda th{
		border-radius:3px;
		color:#F7F7F7;
		background-color:#0084FF;
		padding-left:20;
		padding-right:20;
		padding:5;
	}
	#calenda td{

		padding:10 20;
	}
	.meettingAlert{
		background-color:#FFB600;
	}
	</style>
</head>

<body>
<?php echo $html;?>

</body>
</html>