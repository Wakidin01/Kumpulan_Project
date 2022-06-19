<?php 
function Update_data(){ 
$db = new database();
$no_ktp = $_GET['id'];
$pengunjung = $db->tampil_update_pengunjung($no_ktp);
?>

<form method="POST" action="<?php echo"proses_data_pengunjung.php?aksi=update"; ?>">
<div class="text-center">
<h3 class="h4 text-gray-900 mb 4">Form Edit Data pengunjung</h3>
</div>
	<div class="form-group">
	<label>No KTP :</label>
	<input type="text" name="no_ktp" class="form-control" value="<?php echo $pengunjung['no_ktp'] ?>" readonly>
	</div>

	<div class="form-group">
	<label>Nama pengunjung :</label>
	<input type="text" name="nm_pengunjung" class="form-control" value="<?php echo $pengunjung['nm_pengunjung'] ?>">
	</div>

	<div class="form-group">
	<label>Tanggal Lahir :</label>
	<input type="date" name="tgl_lahir" class="form-control" value="<?php echo $pengunjung['tgl_lahir'] ?>">
	</div>

	<div class="form-group">
	<label>Gender :</label><br>
	<input type="radio" name="gender" value="Laki-Laki" <?php if($pengunjung['gender']== 'Laki-Laki') echo "checked='checked'" ?>> Laki-Laki
	<input type="radio" name="gender" value="Perempuan" <?php if($pengunjung['gender']== 'Perempuan') echo "checked='checked'" ?>> Perempuan
	</div>

	<div class="form-group">
	<label>Alamat pengunjung :</label>
	<TEXTAREA name="alamat" class="form-control"><?php echo $pengunjung['alamat'] ?></TEXTAREA></div>

	<div class="form-group">
	<input type="submit" class="btn btn-info" value="Update Data Pengunjung">
	<a href="data_pengunjung.php" class="btn btn-success">Kembali</a>
	</div>

</form>

<?php }

function Tambah_data(){ ?>
<form method="POST" action="<?php echo"proses_data_pengunjung.php?aksi=tambah" ?>">
<div class="text-center">
<h3 class="h4 text-gray-900 mb 4">Form Input Data Pengunjung</h3>
</div>
	<div class="form-group">
	<label>NO KTP :</label>
	<input type="text" name="no_ktp" class="form-control">
	</div>

	<div class="form-group">
	<label>Nama pengunjung :</label>
	<input type="text" name="nm_pengunjung" class="form-control">
	</div>

	<div class="form-group">
	<label>Tanggal Lahir :</label>
	<input type="date" name="tgl_lahir" class="form-control">
	</div>

	<div class="form-group">
	<label>gender :</label><br>
	<input type="radio" name="gender" value="Laki-Laki"> Laki-Laki
	<input type="radio" name="gender" value="Perempuan"> Perempuan
	</div>

	<div class="form-group">
	<label>Alamat pengunjung :</label>
	<TEXTAREA name="alamat" class="form-control"></TEXTAREA></div>

	<div class="form-group">
	<input type="submit" value="Simpan Data Pengunjung">
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