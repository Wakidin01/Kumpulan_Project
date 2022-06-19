<?php
$db = new database();
$data_nilai = $db->data_nilai();
$data_pengunjung = $db->data_pengunjung();
$data_destinasi = $db->data_destinasi();

?>

<form method="POST" action="<?php echo "proses_data_nilai.php?aksi=tambah"; ?>">
    <div class="text-center">
        <h3 class="h4 text-gray-900 mb 4">Input Data Penilaian</h3>
    </div>

    <div class="form-group">
        <label>ID Nilai :</label>
        <input type="text" name="id_nilai" class="form-control">
    </div>

    <div class="form-group">
	<label>No KTP :</label>
	<select name="no_ktp" id="no_ktp" class="form-control" onchange="changeValue2(this.value)">
		<option value="0">Pilih No KTP</option>
		<?php
			$jsArray2 = "var prdPengunjung = new Array();\n";
			foreach ($data_pengunjung as $row) {
				echo '<option value="'.$row['no_ktp'].'">'.$row['no_ktp'].'</option>';

				$jsArray2 .= "prdPengunjung['".$row['no_ktp']."'] = {nm_pengunjung:'".addslashes($row['nm_pengunjung'])."'};\n ";
			}
		?>
	</select></div>

	<div class="form-group">
	<label>Nama Pengunjung :</label>
	<input type="text" name="nm_pengunjung" id="nm_pengunjung" class="form-control" readonly="readonly">
	</div>

    

    <div class="form-group">
	<label>Kode Destinasi :</label>
	<select name="kd_destinasi" id="kd_destinasi" class="form-control" onchange="changeValue1(this.value)">
		<option value="0">Pilih Kode Destinasi</option>
		<?php
			$jsArray1 = "var prdDestinasi = new Array();\n";
			foreach ($data_destinasi as $row) {
				echo '<option value="'.$row['kd_destinasi'].'">'.$row['kd_destinasi'].'</option>';
				
				$jsArray1 .= "prdDestinasi['".$row['kd_destinasi']."'] = {nm_destinasi:'".addslashes($row['nm_destinasi'])."'};\n ";
			}
		?>
	</select>
	</div>

	<div class="form-group">
	<label>Nama Destinasi :</label>
	<input type="text" name="nm_destinasi" id="nm_destinasi" class="form-control" readonly="readonly">
	</div>

    <div class="form-group">
        <label>Nilai Pelayanan : </label>
        <input type="number" name="nilai_pelayanan" class="form-control">
    </div>

    <div class="form-group">
        <label>Nilai Sikap : </label>
        <input type="number" name="nilai_sikap" class="form-control">
    </div>

    <div class="form-group">
        <label>Nilai Penampilan : </label>
        <input type="number" name="nilai_penampilan" class="form-control">
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-info" value="Simpan Data">
    </div>

</form>


<script type="text/javascript">
	<?php echo $jsArray1; ?>
	function changeValue1(x) {
		document.getElementById("nm_destinasi").value = prdDestinasi[x].nm_destinasi;
	}
	<?php echo $jsArray2; ?>
	function changeValue2(x) {
		document.getElementById("nm_pengunjung").value = prdPengunjung[x].nm_pengunjung; 
	}
</script>
