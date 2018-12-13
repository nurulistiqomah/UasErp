<div style="border:1px solid rgb(238,238,238); padding:10px; overflow:auto; width:1114px; height:375px;">
<?php
$Open = mysql_connect("localhost","root","");
		if (!$Open){
		die ("Koneksi ke Engine MySQL Gagal !<br>");
		}
$Koneksi = mysql_select_db("inventory");
		if (!$Koneksi){
		die ("Koneksi ke Database Gagal !");
		}
if (isset($_GET['kode_brg'])) {
	$kode_brg = $_GET['kode_brg'];
} else {
	die ("Error. No Kode Selected! ");	
}
//Tampilkan data dari tabel barang
	$query = "SELECT * FROM barang WHERE kode_brg='$kode_brg'";
	$sql = mysql_query ($query);
	$hasil = mysql_fetch_array ($sql);
	$kode_brg	= $hasil['kode_brg'];
	$nama_brg	= $hasil['nama_brg'];
	$jenis_brg	= $hasil['jenis_brg'];
	$kuantitas	= $hasil['kuantitas'];
//proses edit data barang
if (isset($_POST['Edit'])) {
	$kode_brg	= $_POST['hkode_brg'];
	$nama_brg	= $_POST['nama_brg'];
	$jenis_brg	= $_POST['jenis_brg'];
	$kuantitas	= $_POST['kuantitas'];
		
	//update data
	$query = "UPDATE barang SET nama_brg='$nama_brg', jenis_brg='$jenis_brg', kuantitas='$kuantitas' WHERE kode_brg='$kode_brg'";
	$sql = mysql_query ($query);
	//setelah berhasil update
	if ($sql) {
		echo "<h3><font color=#8BB2D9><center><blink>Data Barang Berhasil diedit</blink></center></font></h3>
			<input type='button' value='Back To View' onclick=location.href='homegudang.php?page=lihat-data-barang' title='kembali ke form lihat data barang'><br><br>";	
	} else {
		echo "<h3><font color=red><center>Data Barang gagal diedit</center></font></h3>";	
	}
}
?>
<form action="#" method="POST" name="edit-data-barang" enctype="multipart/form-data">
<table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
		<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td width="550">&nbsp;</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td width="550"><font color="orange" size="4" face="arial"><b>Edit Data Barang</b></font></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td width="550">&nbsp;</td>
		</tr>
		<tr bgcolor="#DFE6EF" height="20">
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td width="550" align="center"><b>Data Barang</b></td>
		</tr>
		<tr>
			<td width="18">&nbsp;</td>
			<td width="142" height="36">Kode Barang</td>
			<td width="550">:<b><?=$kode_brg?>
				<input type="hidden" name="hkode_brg" value="<?=$kode_brg?>"></b></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td height="36">Nama Barang</td>
			<td><input type="text" name="nama_brg" size="30" maxlength="30" value="<?=$nama_brg?>"></td>
		</tr>
		<tr>
			<td >&nbsp;</td>
			<td height="36">Jenis Barang</td>
			<td><input type="text" name="jenis_brg" size="20" maxlength="20" value="<?=$jenis_brg?>"></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td height="36">Kuantitas</td>
			<td><input type="text" name="kuantitas" size="10" maxlength="7" value="<?=$kuantitas?>"></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td height="20">&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td height="20">&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td><input type="submit" name="Edit" value="Edit Data">&nbsp;&nbsp;
				<input type="button" value="Cancel" onclick=location.href="homegudang.php?page=lihat-data-barang" title="kembali ke lihat data barang"></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td height="32">&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
	</table>
</form>
<?php
//Tutup koneksi engine MySQL
	mysql_close($Open);
?>
</div>