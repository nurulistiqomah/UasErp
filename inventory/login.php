<?php
session_start();
include "koneksi.php";
$user = $_POST['username'];
$password = $_POST['password'];
$op = $_GET['op'];

if($op=="in"){
    $sql = mysql_query("SELECT * FROM login WHERE username='$username' AND password='$password'");
    if(mysql_num_rows($sql)==1){
        $qry = mysql_fetch_array($sql);
        $_SESSION['username'] = $qry['username'];
		$_SESSION['nama'] = $qry['nama'];
			if($qry['level']=="Admin"){
            header("location:homeadmin.php");
        }
    }else{
		?>
		<script language="JavaScript">
			alert('Username atau Password tidak sesuai. Silahkan diulang kembali!');
			document.location='index.php';
		</script>
		<?php
    }
}else if($op=="out"){
    unset($_SESSION['username']);
    header("location:index.php");
}
?>
