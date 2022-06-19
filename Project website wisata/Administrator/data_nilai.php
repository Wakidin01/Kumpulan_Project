<?php
include 'database.php';
$db = new database();
$data_nilai = $db->data_nilai();
$data_rata = $db->data_rata();
$data_tertinggi = $db->data_tertinggi();
$data_terendah = $db->data_terendah();


?>
<html>

<head>
    <title>Aplikasi Kelola Data Pariwisata</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<header>
    <h1 align="center">SISTEM INFORMASI PARIWISATA INDONESIA</h1>
</header>

<body>
    <div class="row justify-content-center">
        <div class="col-xl-12 col-lg-12 col-md-12">
            <div class="card shadow-sm my-0">
                <div class="card-body p-4">
                    <div class="row">

                        <div class="col-lg-3">
                            <?php
                            include "form_data_nilai.php";
                            ?>

                        </div>

                        <div class="col-lg-9">

                        <form action="index.php?page=data_nilai" method="POST">
                            <div class="Form-group">
                                <input type="text" name="cari" class="col-lg-4">
                                <button type="submit" value="cari" class="btn btn-sm btn-info mb-2 mt-1">Search Data</button>
                                <a href="data_nilai_cetak.php" target="_blank" class="btn btn-sm btn-primary mb-2 mt-1">Cetak Data</a>
                            </div>
                        </form>

                            <div class="col-lg-13">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <td>NO.</td>
                                                <td>ID NILAI</td>
                                                <td>NO KTP</td>
                                                <td>KODE DESTINASI</td>
                                                <td>NILAI PELAYANAN</td>
                                                <td>NILAI SIKAP</td>
                                                <td>NILAI PENAMPILAN</td>
                                                <td>TOTAL</td>
                                                <td>GRADE</td>
                                                <td>ACTION</td>
                                            <tr>
                                        </thead>

                                 <tbody>
                                         <?php
                                    		$no = 1;
                                            foreach ($data_nilai as $row) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $no++; ?></td>
                                                    <td><?php echo $row['id_nilai'] ?></td>
                                                    <td><?php echo $row['no_ktp'] ?></td>
                                                    <td><?php echo $row['kd_destinasi'] ?></td>
                                                    <td><?php echo $row['nilai_pelayanan'] ?></td>
                                                    <td><?php echo $row['nilai_sikap'] ?></td>
                                                    <td><?php echo $row['nilai_penampilan'] ?></td>
                                                    <td><?php echo $row['total'] ?></td>
                                                    <td><?php echo $row['grade'] ?></td>
                                                    <td>
                                                        <a href="<?php echo "index.php?page=data_nilai&&edit=update&&id=$row[id_nilai]" ?>">Edit</a> |
                                                        <a href="<?php echo"proses_data_nilai.php?aksi=delete&&id=$row[id_nilai]"; ?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini ?')">Delete</a>
                                                    </td>

                                                </tr>

                                                <?php
                                                }
                                                ?>
                                                
                                            <tr>
                                                <td colspan="8">Nilai Rata-Rata Siswa</td>
                                                <?php
                                                foreach ($data_rata as $rata) {
                                                ?>
                                                <td colspan="3"><?php echo $rata['nilai_total'] ?></td>
                                            
                                            <?php
                                            }
                                            ?>
                                            </tr>
                                            <tr>
                                                <td colspan="8">Nilai Tertinggi Siswa</td>
                                                <?php
                                                foreach ($data_tertinggi as $tertinggi) {
                                                ?>
                                                <td colspan="3"><?php echo $tertinggi['nilai_tertinggi'] ?></td>
                                            
                                            <?php
                                            }
                                            ?>
                                            </tr>
                                            <tr>
                                                <td colspan="8">Nilai Terendah Siswa</td>
                                                <?php
                                                foreach ($data_terendah as $terendah) {
                                                ?>
                                                <td colspan="3"><?php echo $terendah['nilai_terendah'] ?></td>
                                            
                                            <?php
                                            }
                                            ?>
                                            </tr>

                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>