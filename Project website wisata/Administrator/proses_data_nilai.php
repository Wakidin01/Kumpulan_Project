<?php
include 'database.php';
$db = new database();

$aksi = $_GET['aksi'];
if ($aksi == "tambah") {
    $total = ($_POST['nilai_pelayanan'] * 0.1) + ($_POST['nilai_sikap'] * 0.2) + ($_POST['nilai_penampilan'] * 0.3);
    if($total >= 85){
        $grade = "A";
    } else if($total >= 75){
        $grade = "B";
    } else if($total >= 65){
        $grade = "C";
    } else if($total >= 55){
        $grade = "D";
    } else {
        $grade = "E";
    }
    $db->input_nilai(
        $_POST['no_ktp'],
        $_POST['kd_destinasi'],
        $_POST['nilai_pelayanan'],
        $_POST['nilai_sikap'],
        $_POST['nilai_penampilan'],
        $total,
        $grade);
		echo"
			<script language = 'JavaScript'>
			alert('Data Berhasil Disimpan');
			document.location='index.php?page=data_nilai';
			</script>
		";
	}else if($aksi == "update"){
		$db->update_nilai(
            $_POST['no_ktp'],
            $_POST['kd_destinasi'],
            $_POST['nilai_pelayanan'],
            $_POST['nilai_sikap'],
            $_POST['nilai_penampilan'],
            $total,
            $grade);
		echo"
			<script language = 'JavaScript'>
			alert('Data Berhasil Diupdate');
			document.location='index.php?page=data_nilai';
			</script>
		";
	}else if($aksi=="delete"){
		$id_nilai = $_GET['id'];
		$db->delete_nilai($id_nilai);
		header('location:index.php?page=data_nilai');
	}else{
		echo"Database Anda Error silahkan kembali lagi <a href='input_data_nilai.php'>Klik Disini</a>";
	}

?>