<html>
<head>
<title>Modul Inventory</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<br>
<table width="1306" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
	<td width="10" bgcolor="#6495ED">&nbsp;</td>
	<td width="140" height="120" bgcolor="#6495ED"><div align="center"><img src="image/logo.png" width="100" height="90"></div></td>
	<td width="10" bgcolor="#6495ED">&nbsp;</td>
	<td width="1136" bgcolor="#6495ED"><div align="center"><span class="header">INVENTORY<br><br></span>
	<td width="10" bgcolor="#6495ED"></td>
</tr>
<tr bgcolor="#ADD8E6">
	<td>&nbsp;</td>
	<td height="27"><div align="left"><strong><? echo "Tanggal : ".date("d-M-y");?></strong></div></td>
	<td>&nbsp;</td>
	<td align="center">Selamat Datang&nbsp;</td>
	<td>&nbsp;</td>
</tr>
<tr bgcolor="white">
	<td>&nbsp;</td>
	<td rowspan="4" valign="top"></td>
	<td rowspan="4">&nbsp;</td>
	<td rowspan="4" valign="top"><table width="1136" height="400" bgcolor="white" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td width="936" valign="top">
			<?php
			$page = (isset($_GET['page']))? $_GET['page'] : "main";
			switch ($page) {
				default : include 'default.php';	
			}
			?></td>	
		</tr></table></td>
	<td rowspan="4">&nbsp;</td>
</tr>
<tr bgcolor="white">
    	<td>&nbsp;</td>
</tr>
<tr bgcolor="white">
    	<td>&nbsp;</td>
</tr>
<tr bgcolor="white">
    	<td>&nbsp;</td>
</tr>
<tr bgcolor="#F8F8FF">
    	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>	
</tr>
<tr bgcolor="#6495ED">
	<td height="36" colspan="5" bgcolor="#6495ED"><div align="right" style="margin:0 10px 0 0;"><font color="#000">Project UAS ERP</font><br></div></td>
</tr>
</table>
<div align="center"></div>
</body>
</html>