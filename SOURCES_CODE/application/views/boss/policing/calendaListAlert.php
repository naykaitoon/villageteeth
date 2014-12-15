<link rel="stylesheet" href="<?php echo base_url();?>css/tableBox.css">    
<link rel="stylesheet" href="<?php echo base_url();?>css/font.css">    
	<style>
	  .sunday{color: white;background-color:#FF8D8D;}
     .saturday{color: white;background-color:#FF8D8D;}
     .default{color: black;background-color:white;}
     .today{color: #FFFFFF;background-color:#3B8600;}
	  table#calenda{
	 	border-radius:3px;
		background-color:#BFE4FF;
	 }
	#calenda th{
		border-radius:3px;
		background-color:#58A4EB;
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
	.meettingAlert a{

		padding:10;
	}
.listmeettingAlert{
	width:100%;
	margin-left:10px;
	margin-top:10px;
}
.table{
	border-radius:3px;
	width:90%;

}
.table table{
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
</style>
<div id="headTitleContentbg">
 <h2 id="headTitleContent">ตารางการนัดเด็กของฉัน</h2>
</div>
<div class="table">
<table width="100%;" align="center" cellpadding="0" cellspacing="1" bgcolor="#BFE4FF" id="bodycalenda" >
    <tr>
        <td width="50%" align="center" valign="middle" bgcolor="#BFE4FF" bordercolor="#BFE4FF"><?php echo $html;?></td>
        <td width="50%" align="center" valign="middle"  bgcolor="#BFE4FF" bordercolor="#BFE4FF">
        <div class="listmeettingAlert">
        </div>
        </td>
    </tr>
</table>
</div>
