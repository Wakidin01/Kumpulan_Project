<body onload="javascript:window.print()" style="margin: 0 auto; width: 1000px">
    
    <div style="margin-left:20px"></div>

    <div style="margin: auto; top: 27%; left:25%; display: block; position: absolute; opacity: 0.2; font-size: 150pt; filter: alpha(opacity=50);">
    <!-- <img src="Image/ttd.png" width="100%"> -->
    <label>ASLI</label>
    </div>

    <p>&nbsp;</p>
    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td><div align="center"><font size="7">PARIWISATA INDONESIA</font></div></td>
        </tr>
        <tr>
            <td><div align="center"><font size="5">Dinas Pariwisata Kabupaten Cirebon</font></div></td>
        </tr>
        <tr>
            <td><div align="center"><font size="3">Jl. Ki Gede Mayung, Desa Mayung, Gunung Jati, Cirebon, Jawa Barat</font></div></td>
        </tr>
    </table> <hr>

    <label><font size="5"><u><center>Laporan Pariwisata</center></u></font></label><p></p>

    <table style="border: 1px solid gray;" width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <th style="border-right: 1px solid gray">No</th>
            <th style="border-right: 1px solid gray">No KTP</th>
            <th style="border-right: 1px solid gray">Nama</th>
            <th style="border-right: 1px solid gray">Tgl Lahir</th>
            <th style="border-right: 1px solid gray">Gender</th>
            <th style="border-right: 1px solid gray">Alamat</th>
        </tr>
    
    <?php
    include 'database.php';
    $db = new database();
    $data_pengunjung = $db->data_pengunjung();

        $no = 1;
        foreach ($data_pengunjung as $row) {
        ?>
        <tr>
            <td align="center" style="border-right: 1px solid gray; border-top: 1px solid gray; padding: 3px 5px;"><?php echo $no++; ?></td>
            <td align="center" style="border-right: 1px solid gray; border-top: 1px solid gray; padding: 3px 5px;"><?php echo $row['no_ktp'] ?></td>
            <td align="center" style="border-right: 1px solid gray; border-top: 1px solid gray; padding: 3px 5px;"><?php echo $row['nm_pengunjung'] ?></td>
            <td align="center" style="border-right: 1px solid gray; border-top: 1px solid gray; padding: 3px 5px;"><?php echo $row['tgl_lahir'] ?></td>
            <td align="center" style="border-right: 1px solid gray; border-top: 1px solid gray; padding: 3px 5px;"><?php echo $row['gender'] ?></td>
            <td align="center" style="border-right: 1px solid gray; border-top: 1px solid gray; padding: 3px 5px;"><?php echo $row['alamat'] ?></td>
        </tr>
        <?php
        }
        ?>
    </table>

    <p>&nbsp;</p>

    <table align="right" cellpadding="0" cellspacing="0">
        <tr>
            <td>Cirebon, <?php echo date("d F Y") ?></td>
        </tr>
        <tr><td>
            <center>Kepala Pariwisata</center>
            <p align="center"><img src="Image/ttd.png" width="30%"></p>
            <center><u>Amirudin, M.Pd.</u></center>
            <td></tr>

    </table>
    
</body>