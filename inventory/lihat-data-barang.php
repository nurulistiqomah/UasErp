<div style="border:1px solid rgb(238,238,238); padding:10px; overflow:auto; width:1114px; height:375px;">
<h2 align="center"><font color="orange" size="4" face="arial"><b>Data Barang</b></font></h2><br>
<input type="button" value="Export To PDF" title="Save as PDF Format" onclick=window.open('http:/gudang/laporan-data-barang.php','_blank');><br><br>
<table width="1100" border="0" align="center" cellpadding="0" cellspacing="0">
<tr bgcolor="#FF6600">
	<th width="5">No</td>&nbsp;
	<th width="80" height="42">Image</td>&nbsp;
	<th width="80">Kode Barang</td>&nbsp;
	<th width="170">Nama Barang</td>&nbsp;
	<th width="70">Jenis Barang</td>&nbsp;      
	<th width="60">Stock </td>&nbsp;
	<th width="80">Action</td>&nbsp;     
</tr>
<?php
	$Open = mysql_connect("localhost","root","");
		if (!$Open){
		die ("Koneksi ke Engine MySQL Gagal !<br>");
		}
	$Koneksi = mysql_select_db("inventory");
		if (!$Koneksi){
		die ("Koneksi ke Database Gagal !");
		}
	$Cari="SELECT * FROM barang ORDER BY kode_brg";
	$Tampil = mysql_query($Cari);
	$nomer=0;
    while (	$hasil = mysql_fetch_array ($Tampil)) {
			$kode_brg	= stripslashes ($hasil['kode_brg']);
			$nama_brg	= stripslashes ($hasil['nama_brg']);
			$jenis_brg	= stripslashes ($hasil['jenis_brg']);
			$kuantitas	= stripslashes ($hasil['kuantitas']);
		{
	$nomer++;
?>
	<tr align="center" bgcolor="#DFE6EF">
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr align="center">
		<td height="32"><?=$nomer?><div align="center"></div></td>
		<td><?php
		?>&nbsp;</td>
		<td><?=$kode_brg?><div align="center"></div></td>
		<td><?=$nama_brg?><div align="center"></div></td>
		<td><?=$jenis_brg?><div align="center"></div></td>
		<td><?=$kuantitas?><div align="center"></div></td>
		<td bgcolor="#EEF2F7"><div align="center"><a href="homegudang.php?page=edit-data-barang&kode_brg=<?=$kode_brg?>">Edit</a> | <a href="homegudang.php?page=delete-data-barang&kode_brg=<?=$kode_brg?>">Delete</a></div></td>
	</tr>
	<tr align="center" bgcolor="#DFE6EF">
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td> 
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
<?php  
		}
	}
	mysql_close($Open);
?>
</table>
</div>
