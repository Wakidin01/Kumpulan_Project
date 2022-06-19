<?php
include'database.php';
$db = new database();


$aksi = $_GET['aksi'];
	if($aksi == "tambah"){
		$db->input_pegawai($_POST['no_pegawai'], 
				   $_POST['nm_pegawai'],
				   $_POST['gender'],
				   $_POST['alamat']);
		echo"
			<script language = 'JavaScript'>
			alert('Data Berhasil Disimpan');
			document.location='index.php?page=data_pegawai';
			</script>
		";
	}else if($aksi == "update"){
		$db->update_pegawai($_POST['no_pegawai'],
				   $_POST['nm_pegawai'],
				   $_POST['gender'],
				   $_POST['alamat']);
		echo"
			<script language = 'JavaScript'>
			alert('Data Berhasil Diupdate');
			document.location='index.php?page=data_pegawai';
			</script>
		";
	}else if($aksi=="delete"){
		$no_pegawai = $_GET['id'];
		$db->delete_pegawai($no_pegawai);
		header('location:index.php?page=data_pegawai');
	}else{
		echo"Database Anda Error silahkan kembali lagi <a href='index.php?page=data_pegawai'>Klik Disini</a>";
	}

?>