<?php
include 'database.php';
$db = new database();


$aksi = $_GET['aksi'];
	if($aksi == "tambah"){
		$db->input_jadwal($_POST['kd_jadwal'], 
				   $_POST['hari'],
				   $_POST['jam'],
				   $_POST['kd_destinasi'],
				   $_POST['no_ktp']);
		echo"
			<script language = 'JavaScript'>
			alert('Data Berhasil Disimpan');
			document.location='index.php?page=data_jadwal';
			</script>";
	}else if($aksi == "update"){
		$db->update_jadwal($_POST['kd_jadwal'], 
				   $_POST['hari'],
				   $_POST['jam'],
				   $_POST['kd_destinasi'],
				   $_POST['no_ktp']);
		echo"
			<script language = 'JavaScript'>
			alert('Data Berhasil Diupdate');
			document.location='index.php?page=data_jadwal';
			</script>
		";
	}else if($aksi=="delete"){
		$kd_jadwal = $_GET['id'];
		$db->delete_jadwal($kd_jadwal);
		header('location:index.php?page=data_jadwal');
	}else{
		echo"Database Anda Error silahkan kembali lagi <a href='input_data_jadwal.php'>Klik Disini</a>";
	}

?>