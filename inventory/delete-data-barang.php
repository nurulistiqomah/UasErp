<br />
<?php
$Open = mysql_connect("localhost","root","");
	if (!$Open){
	die ("Koneksi ke Engine MySQL Gagal !<br>");
		}
$Koneksi = mysql_select_db("inventory");
	if (!$Koneksi){
	die ("Koneksi ke Database Gagal !");
	}
// Cek Kode
if (isset($_GET['kode_brg'])) {
	$kode_brg = $_GET['kode_brg'];
	$query   = "SELECT * FROM barang WHERE kode_brg='$kode_brg'";
	$hasil   = mysql_query($query);
	$data    = mysql_fetch_array($hasil);
	}
	else {
		die ("Error. Tidak ada Kode yang dipilih Silakan cek kembali! ");	
	}
	//proses delete data
	if (!empty($kode_brg) && $kode_brg != "") {
		$hapus = "DELETE FROM barang WHERE kode_brg='$kode_brg'";
		$sql = mysql_query ($hapus);
		if ($sql) {		
			?>
				<script language="JavaScript">
				alert('Data Barang Berhasil dihapus');
				document.location='homegudang.php?page=lihat-data-barang';
				</script>
			<?php		
		} else {
			echo "<h2><font color=red><center>Data Barang gagal dihapus</center></font></h2>";	
		}
	}
//Tutup koneksi engine MySQL
	mysql_close($Open);
?>