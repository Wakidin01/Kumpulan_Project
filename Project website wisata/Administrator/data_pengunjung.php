<?php
include 'database.php';
$db = new database();
$data_pengunjung = $db->data_pengunjung();


?>
<html>
<head>
	<title>Aplikasi Kelola Data Pariwisata</title>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<header><h1 align="center">SISTEM INFORMASI PARIWISATA INDONESIA</h1></header>

<body>
	<div class="row justify-content-center">
	<div class="col-xl-12 col-lg-12 col-md-12">
	<div class="card shadow-sm my-0">
	<div class="card-body p-4">
	<div class="row">

	<div class="col-lg-3">
		<?php
		include"form_data_pengunjung.php";
		?>
		
	</div>

	<div class="col-lg-9">

		<form action="index.php?page=data_pengunjung" method="POST">
			<div class="Form-group">
				<input type="text" name="cari" class="col-lg-4">
				<button type="submit" value="cari" class="btn btn-sm btn-info mb-2 mt-1">Search Data</button>
				<a href="data_pengunjung_cetak.php" target="_blank" class="btn btn-sm btn-primary mb-2 mt-1">Cetak Data</a>
			</div>
		</form>

		<div class="table-responsive">
		<table class="table table-striped table-bordered">
			<thead>
			<tr>
				<td>No.</td>
				<td>NO KTP</td>
				<td>NAMA PENGUNJUNG</td>
				<td>TANGGAL LAHIR</td>
				<td>GENDER</td>
				<td>ALAMAT</td>
				<td>ACTION</td>
			<tr>		
			</thead>

			<tbody>
				<?php
				$no = 1;
				foreach($data_pengunjung as $row){
				?>
				<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $row['no_ktp'] ?></td>
			<td><?php echo $row['nm_pengunjung'] ?></td>
			<td><?php echo $row['tgl_lahir'] ?></td>
			<td><?php echo $row['gender'] ?></td>
			<td><?php echo $row['alamat'] ?></td>
			<td>
				<a href="<?php echo "index.php?page=data_pengunjung&&edit=update&&id=$row[no_ktp]" ?>">Edit</a> |
				<a href="<?php echo"proses_data_pengunjung.php?aksi=delete&&id=$row[no_ktp]"; ?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini ?')">Delete</a>
			</td>

				</tr>
				<?php
				}
				?>
			</tbody>

		</table>
		</div>
	</div>

	</div>
	</div>
	</div>
	</div>
	</div>

</body>
</html>