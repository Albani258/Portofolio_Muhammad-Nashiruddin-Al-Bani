<?php include("config.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Pemesanan Tiket Bus Online| PT GOING</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script type="text/javascript">
        function pilih_bus(){
            var idbus = $("#idbus").val();
            $.ajax({
                type: 'POST',
                url: 'z-load-bus.php',
                data:'id_bus=' +idbus ,
                success: function (data) {
                $('#namabus').html(data);
                }
            });
        }
    </script>
    <!-- Select2 -->
    <script src="vendor/select2/dist/js/select2.min.js"></script>
</head>


<?php
    // membuat id jadwal secara otomatis

    $getId = mysqli_query($db, "SELECT max(id_jadwal) as idTerbesar FROM tabel_jadwal");
    $data = mysqli_fetch_array($getId);
    $idjadwal = $data['idTerbesar'];
    // mengambil angka dari id jadwal terbesar, menggunakan fungsi substr
	// dan diubah ke integer dengan (int)
	$urutan = (int) substr($idjadwal, 3, 3);
 
	// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
	$urutan++;
 
	// membentuk id jadwal baru
	// perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
	// misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
	// angka yang diambil tadi digabungkan dengan id huruf yang kita inginkan, misalnya BRG 
	$huruf = "SC";
	$idjadwal = $huruf . sprintf("%03s", $urutan);
?>
<?php
  // $Id = mysqli_fetch_array(mysqli_query($db, "SELECT b.id_bus FROM  tabel_jadwal AS j, tabel_bus AS b WHERE j.id_bus="id_bus"); -->
  // $idbus = $Id[0];
  // $namabus = mysqli_fetch_array(mysqli_query($db, "SELECT b.nama_bus FROM  tabel_jadwal AS j, tabel_bus AS b WHERE b.id_bus='$idbus'")); | <required="required" value="<?php echo $namabus[0]
?>

<body>
    <header>
        <h3>Tambah Daftar Jadwal</h3>
    </header>

    <form action="proses-tambah-jadwal.php" method="POST">

        <fieldset>

        <p>
            <label for="nama">ID Jadwal</label>
            <input type="text" name="idjadwal" required="required" value="<?php echo $idjadwal ?>" readonly>
        </p>
        <p>
            <label for="nama">Bus</label>
            <select name="idbus" id="idbus"> <br />
            <?php 
                $id= mysqli_query ($db, "SELECT id_bus FROM tabel_bus");
            ?>
			<option value="">--Pilih Bus--</option>
            <?php while($idbus = mysqli_fetch_array($id)) { ?>
            <option value="<?php echo $idbus[0] ?>"> <?php echo $idbus[0] ?> </option>
            <?php } ?>
			</select>
		</p>
		<p>
            <label for="nama">Nama Bus</label>
            <input name="namabus" id="namabus">
        </p>
        <p>
            <label for="nama">Kota Keberangkatan</label>
            <input type="text" name="kotakeberangkatan" placeholder="Kota Keberangkatan"/>
        </p>
        <p>
            <label for="nama">Tanggal Keberangkatan</label>
            <input type="date" name="tglkeberangkatan" placeholder="Tanggal Keberangkatan"/>
        </p>
        <p>
            <label for="nama">Waktu Keberangkatan</label>
            <input type="text" name="waktukeberangkatan" placeholder="Waktu Keberangkatan"/>
        </p>
        <p>
            <label for="nama">Kota Tujuan</label>
            <input type="text" name="kotatujuan" placeholder="Kota Tujuan"/>
        </p>
        <p>
            <label for="nama">Tanggal Tiba</label>
            <input type="date" name="tgltiba" placeholder="Tanggal Tiba"/>
        </p>
        <p>
            <label for="nama">Waktu Tiba</label>
            <input type="text" name="waktutiba" placeholder="Waktu Tiba"/>
        </p>
        <p>
            <label for="nama">Harga Tiket</label>
            <input type="text" name="hargatiket" placeholder="Harga Tiket"/>
        </p>
        <p>
            <input type="submit" value="Daftar" name="daftar" />
        </p>

        </fieldset>

    </form>

</body>
</html>