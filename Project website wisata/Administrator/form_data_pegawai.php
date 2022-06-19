<?php 
function Update_data(){ 
$db = new database();
$no_pegawai = $_GET['id'];
$pegawai = $db->tampil_update_pegawai($no_pegawai);
?>

<form method="POST" action="<?php echo"proses_data_pegawai.php?aksi=update"; ?>">
<div class="text-center">
<h3 class="h4 text-gray-900 mb 4">Form Edit Data Pegawai</h3>
</div>
	<div class="form-group">
	<label>No Pegawai :</label>
	<input type="number" name="no_pegawai" class="form-control" value="<?php echo $pegawai['no_pegawai'] ?>" readonly>
	</div>

	<div class="form-group">
	<label>Nama pegawai :</label>
	<input type="text" name="nm_pegawai" class="form-control" value="<?php echo $pegawai['nm_pegawai'] ?>">
	</div>

	<div class="form-group">
	<label>Gender :</label><br>
	<input type="radio" name="gender" value="Laki-Laki" <?php if($pegawai['gender']== 'Laki-Laki') echo "checked='checked'" ?>> Laki-Laki
	<input type="radio" name="gender" value="Perempuan" <?php if($pegawai['gender']== 'Perempuan') echo "checked='checked'" ?>> Perempuan
	</div>

	<div class="form-group">
	<label>Alamat Pegawai :</label>
	<TEXTAREA name="alamat" class="form-control"><?php echo $pegawai['alamat'] ?></TEXTAREA></div>

	<div class="form-group">
	<input type="submit" class="btn btn-info" value="Update Data">
	<a href="index.php?page=data_pegawai.php" class="btn btn-success">Kembali</a>
	</div>

</form>

<?php }

function Tambah_data(){ ?>
<form method="POST" action="<?php echo"proses_data_pegawai.php?aksi=tambah"; ?>">
<div class="text-center">
<h3 class="h4 text-gray-900 mb 4">Input Data Pegawai</h3>
</div>
	<div class="form-group">
	<label>No Pegawai :</label>
	<input type="number" name="no_pegawai" class="form-control">
	</div>

	<div class="form-group">
	<label>Nama Pegawai :</label>
	<input type="text" name="nm_pegawai" class="form-control">
	</div>

	<div class="form-group">
	<label>Gender :</label><br>
	<input type="radio" name="gender" value="Laki-Laki"> Laki-Laki
	<input type="radio" name="gender" value="Perempuan"> Perempuan
	</div>

	<div class="form-group">
	<label>Alamat Pegawai :</label>
	<TEXTAREA name="alamat" class="form-control"></TEXTAREA></div>

	<div class="form-group">
	<input type="submit" class="btn btn-info" value="Simpan Data">
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