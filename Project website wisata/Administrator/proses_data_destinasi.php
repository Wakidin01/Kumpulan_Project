<?php
include 'database.php';
$db = new database();

$aksi = $_GET['aksi'];
	if($aksi == "tambah"){
		$db->input_destinasi($_POST['kd_destinasi'], 
				   $_POST['no_pegawai'],
				   $_POST['nm_destinasi'],
				   $_POST['tempat_destinasi']);
		echo"
			<script language = 'JavaScript'>
			alert('Data Berhasil Disimpan');
			document.location='index.php?page=data_destinasi';
			</script>
		";
	}else if($aksi == "update"){
		$db->update_destinasi($_POST['kd_destinasi'], 
					$_POST['no_pegawai'],
					$_POST['nm_destinasi'],
					$_POST['tempat_destinasi']);
		echo"
			<script language = 'JavaScript'>
			alert('Data Berhasil Diupdate');
			document.location='index.php?page=data_destinasi';
			</script>
		";
	}else if($aksi=="delete"){
		$kd_destinasi = $_GET['id'];
		$db->delete_destinasi($kd_destinasi);
		header('location:index.php?page=data_destinasi');
	}else{
		echo"Database Anda Error silahkan kembali lagi <a href='input_data_destinasi.php'>Klik Disini</a>";
	}

?>