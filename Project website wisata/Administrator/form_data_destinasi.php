<?php
	$db = new database();
	$data_pegawai = $db->data_pegawai();
	$data_lokasi = $db->data_lokasi();
?>

<form method="POST" action="<?php echo"proses_data_destinasi.php?aksi=tambah" ?>">
<div class="text-center">
<h3 class="h4 text-gray-900 mb 4">Form Input Data Destinasi</h3>
</div>
	<div class="form-group">
	<label>Kode Destinasi :</label>
	<input type="text" name="kd_destinasi" class="form-control">
	</div>

	<div class ="form-group">
	<label>Nama Destinasi :</label>
	<select id="nm_destinasi" name="nm_destinasi" class="form-control" onchange="changeValue2(this.value)">
		<option value="0">~ Pilih Nama Destinasi ~</option>
		<?php
			$no = 1;
			$jsArray2 = "var prdDestinasi = new Array();\n";
			foreach ($data_lokasi as $row){
				echo '<option value="'.$row['nm_destinasi'].'">'.$row['nm_destinasi'].'</option>';
				
				$jsArray2 .= "prdDestinasi['".$row['nm_destinasi']."'] = {tempat_destinasi:'".addslashes($row['tempat_destinasi'])."'};\n ";
			}
		?>
	</select>
</div>

	<div class="form-group">
	<labalel>Lokasi Destinasi :</labalel>
	<input type="text" name="tempat_destinasi" id="tempat_destinasi" class="form-control" readonly="readonly">
	</div>

	<div class ="form-group">
	<label>Pemandu Wisata :</label>
	<select id="no_pegawai" name="no_pegawai" class="form-control" onchange="changeValue1(this.value)">
		<option value="0">~ Pilih Nama Pemandu ~</option>
		<?php
			$no = 1;
			$jsArray1 = "var prdPegawai = new Array();\n";
			foreach ($data_pegawai as $row){
				echo '<option value="'.$row['no_pegawai'].'">'.$row['no_pegawai'].'</option>';
				
				$jsArray1 .= "prdPegawai['".$row['no_pegawai']."'] = {nm_pegawai:'".addslashes($row['nm_pegawai'])."',alamat:'".addslashes($row['alamat'])."'};\n";
			}
		?>
	</select>
</div>

	<div class="form-group">
	<label>Nama Pemandu Wisata :</label>
	<input type="text" name="nm_pegawai" id="nm_pegawai" class="form-control" readonly="readonly">
	</div>

	<div class="form-group">
	<label>Alamat Pemandu :</label>
	<input type="text" name="alamat" id="alamat" class="form-control" readonly="readonly">
	</div>

	<div class="form-group">
		<input type="submit" value="Simpan Data Siswa">
	</div>

</form>

<script type="text/javascript">
	<?php echo $jsArray1; ?>
	function changeValue1(x) {
		document.getElementById('nm_pegawai').value = prdPegawai[x].nm_pegawai;
		document.getElementById('alamat').value = prdPegawai[x].alamat; 
	}
	<?php echo $jsArray2; ?>
	function changeValue2(x) {
		document.getElementById('tempat_destinasi').value = prdDestinasi[x].tempat_destinasi; 
	}
</script>