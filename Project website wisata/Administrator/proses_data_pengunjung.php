<?php
include 'database.php';
$db = new database();


$aksi = $_GET['aksi'];
	if($aksi == "tambah"){
		$db->input_pengunjung($_POST['no_ktp'], 
				   $_POST['nm_pengunjung'],
				   $_POST['tgl_lahir'],
				   $_POST['gender'],
				   $_POST['alamat']);
		echo"
			<script language = 'JavaScript'>
			alert('Data Berhasil Disimpan');
			document.location='index.php?page=data_pengunjung';
			</script>
		";
	}else if($aksi == "update"){
		$db->update_pengunjung($_POST['no_ktp'],
				   $_POST['nm_pengunjung'],
				   $_POST['tgl_lahir'],
				   $_POST['gender'],
				   $_POST['alamat']);
		echo"
			<script language = 'JavaScript'>
			alert('Data Berhasil Diupdate');
			document.location='index.php?page=data_pengunjung';
			</script>
		";
	}else if($aksi=="delete"){
		$no_ktp = $_GET['id'];
		$db->delete_pengunjung($no_ktp);
		header('location:index.php?page=data_pengunjung');
	}else{
		echo"Database Anda Error silahkan kembali lagi <a href='input_data_pengunjung.php'>Klik Disini</a>";
	}

?>