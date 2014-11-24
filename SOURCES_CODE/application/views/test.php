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
    <script>
	 $('.fancybox').fancybox({
				height : 550,
				width :	900,
				fitToView	: false,
				scrolling : 'on',
				autoSize : false,
				type				: 'iframe',
				overlay : {
            				css : {
               				 'background' : 'rgba(58, 42, 45, 0.95)',
           				 }
				}
	
});
	</script>
</head>

<body>
<a class="fancybox" href="<?php echo base_url()?>index.php/home/test2">ssss </a>
</body>
</html>