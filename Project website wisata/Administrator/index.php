<?php
session_start();
if(!isset($_SESSION['namauser'])){
	echo"<script language = 'JavaScript'>
	confirm('Anda Harus Login');
	document.location='../index.php';
	</script>";
}
?>
<html>
<head>
	<meta charset="UTF-8">
	<title>Sistem Pariwisata Indonesia</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body>
<div class="header">
			<h1>Sistem Pariwisata Indonesia</h1>
		</div>
<div class="row">
	<div class="col-xl-12 col-lg-12 col-md-12">
	<div class="card shadow-sm my-0">
	<div class="card-body p-4">
	<div class="row">

	<div class="col-lg-2">
		<h3 align="center">Menu</h3>
  			<ul>
    			<li><a href="index.php">Dashboard</a></li>
    			<li><a href="index.php?page=data_pengunjung">Data Pengunjung</a></li>
     			<li><a href="index.php?page=data_pegawai">Data Pegawai</a></li>
     			<li><a href="index.php?page=data_lokasi">Data Destinasi</a></li>
				 <li><a href="index.php?page=data_jadwal">Data Jadwal</a></li>
				 <li><a href="index.php?page=data_destinasi">Data Pesanan</a></li>
    			<li><a href="<?php echo"../proses_login.php?aksi=logout" ?>">logout</a></li>
  			</ul>
	</div>

	<div class="col-lg-10">
		<?php
			if (isset($_GET['page'])){
				$page = $_GET['page'];

				switch ($page){
					case 'data_pengunjung':
					include"data_pengunjung.php";
					break;
					case 'data_pegawai':
					include"data_pegawai.php";
					break;
					case 'data_destinasi':
					include"data_destinasi.php";
					break;
					case 'data_jadwal':
					include"data_jadwal.php";
					break;
					case 'data_pembayaran':
					include"data_pembayaran.php";
					break;
					case 'data_lokasi':
					include"data_lokasi.php";
					break;
					case 'data_nilai':
					include"data_nilai.php";
					break;

					default:
					echo"Maaf, Halaman Tidak Ditemukan";
					break;
				}
			}
			else{
				include"beranda.php";
			}
		?>
    </div>

</div>
</div>
</div>
</div>
</div>

<div class="footer">
<p align="center">Copyright &copy; 2022 Wakidin Nur Akirini <br> 20200123017 <br> Manajemen Informatika 1/3</p></div>
</div>
</body>
</html>




