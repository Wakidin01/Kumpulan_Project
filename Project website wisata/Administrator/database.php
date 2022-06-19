<?php
class database{

	var $host = "localhost";
	var $user = "root";
	var $pass = "";
	var $db = "wisata";
	var $koneksi = "";

	function __construct(){
		$this->koneksi = mysqli_connect($this->host, $this->user, $this->pass, $this->db);
	}

//---------- Data Pengunjung --------------

	function input_pengunjung($no_ktp, $nm_pengunjung, $tgl_lahir, $gender, $alamat){
		mysqli_query($this->koneksi,"insert into pengunjung values ('$no_ktp','$nm_pengunjung','$tgl_lahir','$gender','$alamat')");
	}

	function data_pengunjung(){
		if(isset($_POST['cari'])) {
			$cari = $_POST['cari'];
			$data = mysqli_query($this->koneksi,"select * from pengunjung where nm_pengunjung like '%".$cari."%' OR no_ktp like '%".$cari."%' ");
		while($row = mysqli_fetch_array($data)){
			$hasil[] = $row;
		}
		return $hasil;
		} else {
			$data = mysqli_query($this->koneksi,"select * from pengunjung");
		while($row = mysqli_fetch_array($data)){
			$hasil[] = $row;
		}
		return $hasil;
		}

	}

	function tampil_update_pengunjung($no_ktp){
		$query = mysqli_query($this->koneksi, "Select * From pengunjung where no_ktp = '$no_ktp' ");
		return $query->fetch_array();
	}

	function update_pengunjung($no_ktp, $nm_pengunjung, $tgl_lahir, $gender, $alamat){
		$query = mysqli_query($this->koneksi," Update pengunjung set nm_pengunjung='$nm_pengunjung', tgl_lahir='$tgl_lahir', gender='$gender', alamat='$alamat' where no_ktp='$no_ktp' ");
	}

	function delete_pengunjung($no_ktp){
		$query = mysqli_query($this->koneksi,"Delete from pengunjung where no_ktp = '$no_ktp'");
	}

//---------- Data Pegawai --------------

	function input_pegawai($no_pegawai, $nm_pegawai, $gender, $alamat){
		mysqli_query($this->koneksi,"insert into pegawai values ('','$no_pegawai','$nm_pegawai','$gender','$alamat')");
	}

	function data_pegawai(){
		$data_pegawai = mysqli_query($this->koneksi,"select * from pegawai");
		while($row = mysqli_fetch_array($data_pegawai)){
			$hasil_pegawai[] = $row;
		}
		return $hasil_pegawai;
	}

	function tampil_update_pegawai($no_pegawai){
		$query = mysqli_query($this->koneksi, "Select * From pegawai where no_pegawai = '$no_pegawai' ");
		return $query->fetch_array();
	}

	function update_pegawai($no_pegawai, $nm_pegawai, $gender, $alamat){
		$query = mysqli_query($this->koneksi," Update pegawai set nm_pegawai='$nm_pegawai', gender='$gender', alamat='$alamat' where no_pegawai='$no_pegawai' ");
	}

	function delete_pegawai($no_pegawai){
		$query = mysqli_query($this->koneksi,"Delete from pegawai where no_pegawai = '$no_pegawai'");
	}

	//----- Data Destinasi

	function input_destinasi($kd_destinasi, $nm_destinasi, $nm_pemandu, $lokasi){
		mysqli_query($this->koneksi,"insert into destinasi values ('$kd_destinasi','$nm_destinasi','$nm_pemandu','$lokasi')");
	}

	function data_destinasi(){
		if(isset($POST['cari'])) {
			$cari = $POST['cari'];
			$data = mysqli_query($this->koneksi,"select * from destinasi where nm_pegawai like '%".$cari."%' OR no_pegawai like '%".$cari."%' ");
		while($row = mysqli_fetch_array($data)){
			$hasil[] = $row;
		}
		return $hasil;
		} else {
			$data = mysqli_query($this->koneksi,"select destinasi.*, pegawai.* from destinasi JOIN pegawai ON destinasi.no_pegawai = pegawai.no_pegawai");
		while($row = mysqli_fetch_array($data)){
			$hasil[] = $row;
		}
		return $hasil;
		}

	}

	function tampil_update_destinasi($kd_destinasi){
		$query = mysqli_query($this->koneksi, "select destinasi.*, pegawai.* from matakuliah JOIN pegawai ON matakuliah.kd_pegawai = pegawai.kd_pegawai where kd_destinasi = '$kd_destinasi'");
		return $query->fetch_array();
	}

	function update_destinasi($kd_destinasi, $nm_destinasi, $nm_pemandu, $lokasi){
		$query = mysqli_query($this->koneksi," Update destinasi set kd_destinasi='$kd_destinasi', nm_destinasi='$nm_destinasi', nm_pemandu='$nm_pemandu', lokasi='$lokasi' where kd_destinasi='$kd_destinasi' ");
	}

	function delete_destinasi($kd_destinasi){
		$query = mysqli_query($this->koneksi,"Delete from destinasi where kd_destinasi = '$kd_destinasi'");
	}

	//----- Data Jadwal

	function input_jadwal($kd_jadwal, $hari, $jam, $kd_destinasi, $no_ktp){
		mysqli_query($this->koneksi,"insert into jadwal values ('$kd_jadwal','$hari','$jam','$kd_destinasi','$no_ktp')");
	}

	function data_jadwal(){
		$data_jadwal = mysqli_query($this->koneksi,"SELECT jadwal.*, destinasi.*, pengunjung.* FROM jadwal JOIN destinasi ON jadwal.kd_destinasi = destinasi.kd_destinasi JOIN pengunjung ON jadwal.no_ktp = pengunjung.no_ktp");
		while ($row = mysqli_fetch_array($data_jadwal)){
			$hasil_jadwal[] = $row;
		}
		return $hasil_jadwal;
	}

	function tampil_update_jadwal($kd_jadwal){
		$query = mysqli_query($this->koneksi, "Select * From jadwal where kd_jadwal = '$kd_jadwal' ");
		return $query->fetch_array();
	}

	function update_jadwal($kd_jadwal, $hari, $jam, $kd_destinasi, $no_ktp){
		$query = mysqli_query($this->koneksi," Update jadwal set kd_jadwal='$kd_jadwal', hari='$hari', jam='$jam', kd_destinasi='$kd_destinasi', no_ktp='$no_ktp' where kd_jadwal='$kd_jadwal' ");
	}

	function delete_jadwal($kd_jadwal){
		$query = mysqli_query($this->koneksi,"Delete from jadwal where kd_jadwal = '$kd_jadwal'");
	}

	//----- Data Pembayaran

	function data_pembayaran(){
		if(isset($_POST['dari']) && isset($_POST['sampai'])) {
			$dari = $_POST['dari'];
			$sampai = $_POST['sampai'];
			$data_pembayaran = mysqli_query($this->koneksi,"select pembayaran.*, pengunjung.* from pembayaran JOIN pengunjung ON pembayaran.no_ktp = pengunjung.no_ktp where pembayaran.tgl_pembayaran between '$dari' and '$sampai' ");
		while ($row = mysqli_fetch_array($data_pembayaran)){
			$hasil_pembayaran[] = $row;
		}
		return $hasil_pembayaran;
		} else {
		$data_pembayaran = mysqli_query($this->koneksi,"select pembayaran.*, pengunjung.* from pembayaran JOIN pengunjung ON pembayaran.no_ktp = pengunjung.no_ktp");
			while ($row = mysqli_fetch_array($data_pembayaran)){
				$hasil_pembayaran[] = $row;
			}
			return $hasil_pembayaran;
		}
	}

	//----- Data Lokasi

	function input_lokasi($kd_lokasi, $nm_destinasi, $tempat_destinasi){
		mysqli_query($this->koneksi,"insert into lokasi values ('$kd_lokasi','$nm_destinasi','$tempat_destinasi')");
	}

	function data_lokasi(){
		if(isset($_POST['cari'])) {
			$cari = $_POST['cari'];
			$data = mysqli_query($this->koneksi,"select * from lokasi where nm_destinasi like '%".$cari."%' OR tempat_destinasi like '%".$cari."%' ");
		while($row = mysqli_fetch_array($data)){
			$hasil[] = $row;
		}
		return $hasil;
		} else {
			$data = mysqli_query($this->koneksi,"select * from lokasi");
		while($row = mysqli_fetch_array($data)){
			$hasil[] = $row;
		}
		return $hasil;
		}

	}

	function tampil_update_lokasi($kd_lokasi){
		$query = mysqli_query($this->koneksi, "Select * From lokasi where kd_lokasi = '$kd_lokasi' ");
		return $query->fetch_array();
	}

	function update_lokasi($kd_lokasi, $nm_destinasi, $tempat_destinasi){
		$query = mysqli_query($this->koneksi," Update lokasi set nm_destinasi='$nm_destinasi', tempat_destinasi='$tempat_destinasi' where kd_lokasi='$kd_lokasi' ");
	}

	function delete_lokasi($kd_lokasi){
		$query = mysqli_query($this->koneksi,"Delete from lokasi where kd_lokasi = '$kd_lokasi'");
	}

	//----- Data Penilaian

	function input_nilai($no_ktp, $kd_destinasi, $nilai_pelayanan, $nilai_sikap, $nilai_penampilan, $total, $grade)
	{
		mysqli_query($this->koneksi, "insert into penilaian values ('', '$no_ktp', '$kd_destinasi', '$nilai_pelayanan', '$nilai_sikap', '$nilai_penampilan', '$total', '$grade')");
	}

	function data_nilai()	
	{
		$data_nilai = mysqli_query($this->koneksi, "select penilaian.*, pengunjung.*, destinasi.* from penilaian JOIN pengunjung ON penilaian.no_ktp = pengunjung.no_ktp JOIN destinasi ON penilaian.kd_destinasi = destinasi.kd_destinasi");
		while ($row = mysqli_fetch_array($data_nilai)) {
			$hasil_nilai[] = $row;
		}
		return $hasil_nilai;
	}

	function data_rata()	
	{
		$data_rata = mysqli_query($this->koneksi, "select AVG(total) as nilai_total from penilaian");
		($row_rata = mysqli_fetch_array($data_rata));
			$hasil_rata[] = $row_rata;
		return $hasil_rata;
	}

	function data_tertinggi()	
	{
		$data_tertinggi = mysqli_query($this->koneksi, "select MAX(total) as nilai_tertinggi from penilaian");
		($row_tertinggi = mysqli_fetch_array($data_tertinggi));
			$hasil_tertinggi[] = $row_tertinggi;
		return $hasil_tertinggi;
	}

	function data_terendah()	
	{
		$data_terendah = mysqli_query($this->koneksi, "select MIN(total) as nilai_terendah from penilaian");
		($row_terendah = mysqli_fetch_array($data_terendah));
			$hasil_terendah[] = $row_terendah;
		return $hasil_terendah;
	}

	function tampil_update_nilai($id_nilai){
		$query = mysqli_query($this->koneksi, "Select * From penilaian where id_nilai = '$id_nilai' ");
		return $query->fetch_array();
	}

	function update_nilai($id_nilai, $no_ktp, $kd_destinasi, $nilai_pelayanan, $nilai_sikap, $nilai_penampilan, $total, $grade){
		$query = mysqli_query($this->koneksi," Update penilaian set id_nilai='$id_nilai', no_ktp='$no_ktp', kd_destinasi='$kd_destinasi', nilai_pelayanan='$nilai_pelayanan', nilai_sikap='$nilai_sikap', nilai_penampilan='$nilai_penampilan', total='$total', grade='$grade' where id_nilai='$id_nilai' ");
	}

	function delete_nilai($id_nilai){
		$query = mysqli_query($this->koneksi,"Delete from penilaian where id_nilai = '$id_nilai'");
	}

}

?>