<?php 
function Update_data(){ 
$db = new database();
$kd_lokasi = $_GET['id'];
$lokasi = $db->tampil_update_lokasi($kd_lokasi);
?>

<form method="POST" action="<?php echo"proses_data_lokasi.php?aksi=update"; ?>">
<div class="text-center">
<h3 class="h4 text-gray-900 mb 4">Form Edit Data Lokasi</h3>
</div>
	<div class="form-group">
	<label>Kode Lokasi :</label>
	<input type="text" name="kd_lokasi" class="form-control" value="<?php echo $lokasi['kd_lokasi'] ?>" readonly>
	</div>

	<div class="form-group">
	<label>Nama Destinasi :</label>
	<input type="text" name="nm_destinasi" class="form-control" value="<?php echo $lokasi['nm_destinasi'] ?>">
	</div>

	<div class="form-group">
	<label>Lokasi Destinasi :</label>
	<input type="text" name="tempat_destinasi" class="form-control" value="<?php echo $lokasi['tempat_destinasi'] ?>">
	</div>

	<div class="form-group">
	<input type="submit" class="btn btn-info" value="Update Data">
	<a href="data_lokasi.php" class="btn btn-success">Kembali</a>
	</div>

</form>

<?php }

function Tambah_data(){ ?>
<form method="POST" action="<?php echo"proses_data_lokasi.php?aksi=tambah" ?>">
<div class="text-center">
<h3 class="h4 text-gray-900 mb 4">Form Input Data Lokasi</h3>
</div>
	<div class="form-group">
	<label>Kode Lokasi :</label>
	<input type="text" name="kd_lokasi" class="form-control">
	</div>

	<div class="form-group">
	<label>Nama Destinasi :</label>
	<input type="text" name="nm_destinasi" class="form-control">
	</div>

	<div class="form-group">
	<label>Lokasi Destinasi :</label>
	<input type="text" name="tempat_destinasi" class="form-control">
	</div>

	<div class="form-group">
	<input type="submit" value="Simpan Data">
	</div>

</form>

<?php } ?>


<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
$edit = $_GET['edit'];
if($edit == "update"){
	Update_data();
}else{
	Tambah_data();
}
?>