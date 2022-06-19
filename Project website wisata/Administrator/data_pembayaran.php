<?php
include 'database.php';
$db = new database();
$data_pembayaran = $db->data_pembayaran();


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

	<div class="col-lg-9">

		<form action="index.php?page=data_pembayaran" method="POST">
			<div class="Form-group">
				<input type="date" name="dari" class="col-lg-3"> s/d
				<input type="date" name="sampai" class="col-lg-3">
				<button type="submit" value="cari" class="btn btn-sm btn-info mb-2 mt-1">Search Data</button>
			</div>
		</form>

		<div class="table-responsive">
		<table class="table table-striped table-bordered">
			<thead>
			<tr>
				<td>No.</td>
				<td>ID PEMBAYARAN</td>
				<td>TANGGAL PEMBAYARAN</td>
				<td>NO KTP</td>
				<td>USIA</td>
				<td>ACTION</td>
			<tr>		
			</thead>

			<tbody>
				<?php
				$no = 1;
				foreach($data_pembayaran as $row){ 	
				?>
				<tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $row['id_pembayaran'] ?></td>
                    <td><?php echo $row['tgl_pembayaran'] ?></td>
                    <td><?php echo $row['no_ktp'] ?></td>
                    <td><?php echo $row['usia'] ?></td>
                    <td>
						<a href="<?php echo "index.php?page=data_pembayaran&&edit=update&&id=$row[id_pembayaran]" ?>">Edit</a> |
						<a href="<?php echo"proses_data_pembayaran.php?aksi=delete&&id=$row[id_pembayaran]"; ?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini ?')">Delete</a>
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