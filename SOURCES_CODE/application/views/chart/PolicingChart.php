<!doctype html>
<html>
<head>
<meta charset="utf-8">
<style>
#chartResult_div{
	width:100%;

}
text{
	font-size:30px;
}
</style>
</head>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" style="text-align: center">
<?php

   echo 	$this->gcharts->PieChart('Policings')->outputInto('PolicingsId');

    
?>

</body>
</html>