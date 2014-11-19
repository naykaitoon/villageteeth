<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>My Project DB</title>
<style>
table td { padding:5px;
border:1px dotted #CCC;
}
.pk{
	color:#E10002;
}
.fk{
	color:#60C410;
}
.pkText{
text-decoration: underline;
}
</style>
</head>

<body>
<?php
////// ตั้งค่า user pass และ db ฐานข้อมูล ////////////////////////////////////
$mysqli = new mysqli("localhost", "root", "", "dentalhealth");
////////////////////////////////////////////////////////////////////
$str = array('unsigned zerofill', 'PRI', 'MUL');
$str2 = array('', '<font class="pk">คีย์หลัก</font>', '<font class="fk">คีย์รอง</font>');

$result =$mysqli->query("SHOW TABLES");
$mysqli->query("SET NAMES UTF8");
while($row = mysqli_fetch_array($result, MYSQLI_NUM)){
		$results = $mysqli->query("SHOW FULL columns FROM ".$row["0"]);
		if (!$results) {
  		  printf("Error: %s\n", mysqli_error($mysqli));
   		 exit();
		}			
echo '
<table border="0" align="center" cellpadding="5" cellspacing="0">
    <tbody>
      <tr>
        <th colspan="3" align="center" nowrap bgcolor="#6F6F6F" style="color: #FFFFFF">ตารางชื่อ&nbsp;'.$row["0"].'</th>
      </tr>
      <tr>
        <td align="center" valign="middle" nowrap bgcolor="#D0D0D0">ชื่อ </td>
        <td align="center" valign="middle" nowrap bgcolor="#D0D0D0">ชนิด</td>
        <td align="center" valign="middle" nowrap bgcolor="#D0D0D0">รายละเอียด</td>
   <!--       <td align="center" valign="middle" nowrap bgcolor="#D0D0D0">ตัวอย่างข้อมูล</td>-->
      </tr>';
		while($r = mysqli_fetch_array($results, MYSQLI_NUM)){
		if($r['4']=="PRI"){
			$class = 'pkText';
			$span = "";
			$span2 = "";
			
		}else if($r['4']=="MUL"){
			$class = 'fkText';
			$span = "<span style='border-bottom: black 1px dotted'>";
			$span2 = "</span>";
		}else{
			$class = 'none';
			$span = "";
			$span2 = "";
		}
	echo '
      <tr>
        <td align="center" valign="middle" nowrap>'.$span.'<font class="'.$class.'">'.$r['0'].'</font>'.$span2.'</td>
        <td align="left" valign="middle" nowrap><font class="dataType">'.str_replace($str,$str2,$r['1']).'</font>&nbsp;'.str_replace($str,$str2,$r['4']).'</td>
        <td align="center" valign="middle" nowrap>'.$r['8'].'</td>
     <!--   <td align="center" valign="middle" nowrap></td> -->
      </tr>';

		}  
		echo '</tbody></table>';
		echo '<br>';
		echo '<hr>';
		echo '<br>';
}
?>

</body>
</html>

