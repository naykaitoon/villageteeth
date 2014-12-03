<!doctype html>
<html>
<head>
<meta charset="utf-8">
</head>
<style>
#chartResult_div{
	margin-left:10%;
	margin-right:10%;
}

</style>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" style="text-align: center">
<?php
   echo 	$this->gcharts->PieChart('Policings')->outputInto('chartResult_div');
    echo $this->gcharts->div(635,450);

    
?>
</body>
</html>