<?php
include 'database.php';
$db = new database();


$aksi = $_GET['aksi'];
	if($aksi == "tambah"){
		$db->input_lokasi($_POST['kd_lokasi'], 
				   $_POST['nm_destinasi'],
				   $_POST['tempat_destinasi']);
		echo"
			<script language = 'JavaScript'>
			alert('Data Berhasil Disimpan');
			document.location='index.php?page=data_lokasi';
			</script>
		";
	}else if($aksi == "update"){
		$db->update_lokasi($_POST['kd_lokasi'], 
                    $_POST['nm_destinasi'],
                    $_POST['tempat_destinasi']);
		echo"
			<script language = 'JavaScript'>
			alert('Data Berhasil Diupdate');
			document.location='index.php?page=data_lokasi';
			</script>
		";
	}else if($aksi=="delete"){
		$kd_lokasi = $_GET['id'];
		$db->delete_lokasi($kd_lokasi);
		header('location:index.php?page=data_lokasi');
	}else{
		echo"Database Anda Error silahkan kembali lagi <a href='input_data_lokasi.php'>Klik Disini</a>";
	}

?>