<?php	
	$db = new database();
	$data_destinasi = $db->data_destinasi();
	$data_pengunjung = $db->data_pengunjung();
?>

<form method="POST" action="<?php echo"proses_data_jadwal.php?aksi=tambah" ?>">
<div class="text-center">
<h3 class="h4 text-gray-900 mb 4">Form Input Jadwal Wisata</h3>
</div>
	<div class="form-group">
	<label>Kode Jadwal :</label>
	<input type="text" name="kd_jadwal" class="form-control">
	</div>

	<div class="form-group">
	<label>Hari :</label>
	<input type="text" name="hari" class="form-control">
	</div>	

	<div class="form-group">
	<label>Jam :</label>
	<input type="time" name="jam" id="jam" class="form-control">
	</div>

	<div class="form-group">
	<label>Kode Destinasi :</label>
	<select name="kd_destinasi" id="kd_destinasi" class="form-control" onchange="changeValue1(this.value)">
		<option value="0">Pilih Kode Destinasi</option>
		<?php
			$jsArray1 = "var prdMatkul = new Array();\n";
			foreach ($data_destinasi as $row) {
				echo '<option value="'.$row['kd_destinasi'].'">'.$row['kd_destinasi'].'</option>';
				
				$jsArray1 .= "prdMatkul['".$row['kd_destinasi']."'] = {nm_destinasi:'".addslashes($row['nm_destinasi'])."'};\n ";
			}
		?>
	</select></div>

	<div class="form-group">
	<label>Nama Destinasi :</label>
	<input type="text" name="nm_destinasi" id="nm_destinasi" class="form-control" readonly="readonly">
	</div>

	<div class="form-group">
	<label>No KTP :</label>
	<select name="no_ktp" id="no_ktp" class="form-control" onchange="changeValue2(this.value)">
		<option value="0">Pilih No KTP</option>
		<?php
			$jsArray2 = "var prdSiswa = new Array();\n";
			foreach ($data_pengunjung as $row) {
				echo '<option value="'.$row['no_ktp'].'">'.$row['no_ktp'].'</option>';

				$jsArray2 .= "prdSiswa['".$row['no_ktp']."'] = {nm_pengunjung:'".addslashes($row['nm_pengunjung'])."'};\n ";
			}
		?>
	</select></div>

	<div class="form-group">
	<label>Nama Pengunjung :</label>
	<input type="text" name="nm_pengunjung" id="nm_pengunjung" class="form-control" readonly="readonly">
	</div>

	<div class="form-group">
		<input type="submit" value="Simpan Data Siswa">
	</div>

</form>


<script type="text/javascript">
	<?php echo $jsArray1; ?>
	function changeValue1(x) {
		document.getElementById("nm_destinasi").value = prdMatkul[x].nm_destinasi;
	}
	<?php echo $jsArray2; ?>
	function changeValue2(x) {
		document.getElementById("nm_pengunjung").value = prdSiswa[x].nm_pengunjung; 
	}
</script>