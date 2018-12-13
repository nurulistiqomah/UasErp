<div style="border:1px solid rgb(238,238,238); padding:10px; overflow:auto; width:1114px; height:377px;">
	<?php //fungsi kode otomatis
		$host = "localhost";
		$username = "root";
		$password = "";
		$db = "inventory";
		mysql_connect($host,$username,$password) or die("Koneksi gagal");
		mysql_select_db($db) or die("Database tidak bisa dibuka");
		
		function kdauto($tabel, $inisial){
		$struktur   = mysql_query("SELECT * FROM $tabel");
		$field      = mysql_field_name($struktur,0);
		$panjang    = mysql_field_len($struktur,0);
		$qry  = mysql_query("SELECT max(".$field.") FROM ".$tabel);
		$row  = mysql_fetch_array($qry);
		if ($row[0]=="") {
		$angka=0;
		}
		else {
		$angka= substr($row[0], strlen($inisial));
		}
		$angka++;
		$angka      =strval($angka);
		$tmp  ="";
		for($i=1; $i<=($panjang-strlen($inisial)-strlen($angka)); $i++) {
		$tmp=$tmp."0";
		}
		return $inisial.$tmp.$angka;
		}
	?>
	<form action="homegudang.php?page=input-barang-masuk" method="POST" name="form-input-barang-masuk" enctype="multipart/form-data">
		<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
			<tr>
				<td width="5%">&nbsp;</td>
				<td width="25%">&nbsp;</td>
				<td width="70%">&nbsp;</td>
				</tr>
			<tr>
				<td height="36">&nbsp;</td>
				<td>&nbsp;</td>
				<td><font size="3"><b>FORM INPUT BARANG MASUK</b></font></td>
			</tr>
			<tr>
				<td width="5%" height="36">&nbsp;</td>
				<td width="25%">&nbsp;</td>
				<td width="70%">&nbsp;</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>ID Transaction</td>
				<td><input name="id_tran_msk" type="text" id="id_tran_msk" size="15" value="<?php echo kdauto("histori_brg_msk","IN-"); ?>" disabled="disabled" />
					<input name="id_tran_msk" type="hidden" id="id_tran_msk" value="<?php echo kdauto("histori_brg_msk","IN-"); ?>" /></td>
			</tr>
			<tr>
				<td height="36">&nbsp;</td>
				<td>Tanggal</td>
				<td><select name="tgl_msk">
					<?php
						for ($i=1; $i<=31; $i++) {
							$tg = ($i<10) ? "0$i" : $i;
							echo "<option value='$tg'>$tg</option>";	
						}
					?>
					</select> -
					<select name="bln_msk">
					<?php
						for($bln=1;$bln<=12;$bln++){
							$nama_bln = array (1=>"Jan","Feb","Mar","Apr","Mei","Jun","Jul","Aug","Sep","Okt","Nov","Des");
							echo "<option value=$bln>$nama_bln[$bln]</option>";
						}
					?>
					</select> - 
					<select name="thn_msk">
					<?php
						for ($i=2015; $i<=2020; $i++) {
							echo "<option value='$i'>$i</option>";	
						}
					?>
					</select>
				</td>
			</tr>
			<tr>
				<td height="36">&nbsp;</td>
				<td>Kode Barang</td>
				<td><?php
					mysql_connect($host,$username,$password) or die("Koneksi gagal");
					mysql_select_db($db) or die("Database tidak bisa dibuka");
					$result = mysql_query("SELECT * FROM barang");    
					$jsArray = "var nama_brg = new Array();\n";    
					echo '<select name="kode_brg" onchange="changeValue(this.value)">';    
					echo '<option> -Pilih Kode Barang- </option>';    
					while ($row = mysql_fetch_array($result)) {    
						echo '<option value="' . $row['kode_brg'] . '">' . $row['kode_brg'] . '</option>';    
						$jsArray .= "nama_brg['" . $row['kode_brg'] . "'] = {name:'" . addslashes($row['nama_brg']) . "',jenis:'".addslashes($row['jenis_brg'])."'};\n";    
					}    
					echo '</select>';
					?>
					<script type="text/javascript">    
						<?php echo $jsArray; ?>  
						function changeValue(id){  
						document.getElementById('nama_brg').value = nama_brg[id].name;  
						document.getElementById('jenis_brg').value = nama_brg[id].jenis;  
						};  
					</script>
				</td>
			</tr>
			<tr>
				<td height="36">&nbsp;</td>
				<td>Nama Barang</td>
				<td><input type="text" name="nama_brg" id="nama_brg" size="40" /></td>
			</tr>
			<tr>
				<td height="36">&nbsp;</td>
				<td>Jenis Barang</td>
				<td><input type="text" name="jenis_brg" id="jenis_brg" size="40" /></td>
			</tr>
			<tr>
				<td height="36">&nbsp;</td>
				<td>Jumlah Barang Masuk</td>
				<td><input type="text" name="jml_msk" size="7">&nbsp; *Harus di Isi</td>
			</tr>
			<tr>
				<td height="72">&nbsp;</td>
				<td>&nbsp;</td>
				<td><input type="submit" name="submit" value="Submit">&nbsp;&nbsp;&nbsp;
					<input type="reset" name="reset" value="Reset"></td>
			</tr>
			<tr>
				<td width="5%">&nbsp;</td>
				<td width="25%">&nbsp;</td>
				<td width="70%">&nbsp;</td>
			</tr>
		</table>
	</form>
</div>