<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery-1.11.1.min.js"></script>
<script>
$(document).ready(function(e) {
				var num=0;
			var check=0;
	setInterval(function (){

			$.get( '<?php echo base_url();?>index.php/home/ccc', function( data ) {
			

				if(check != data){

					$( ".result thead" ).append(
					"<tr>"+
						"<td>"+data+"</td>"+
					"</tr>");
					
					$.get( '<?php echo base_url();?>index.php/home/outPDF', function( dataf ) {

					$( ".result thead" ).append(
					"<tr>"+
						"<td>"+dataf+"</td>"+
					"</tr>");

			});
				}

				check = data;

			});
			
				
	}, 1000);		
		
});
</script>
<style>
.bodys{
	width:1800px;
	margin-top:0;
	margin-left:0;
	margin-right:0;
	margin-bottom:0;
	overflow:hidden;
	-webkit-transition: all ease-in-out 1s; /* Safari 3.1 to 6.0 */
     transition: all ease-in-out 1s;
}

</style>
</head>

<body>

<table class="result">			
		<thead>
			<tr>
				<th>555555</th>
			</tr>
		</thead>
	
	</table>

</body>
</html>