<?php include("config.php"); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Pemesanan Tiket Bus Online| PT GOING</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
</head>

<body>
    <header>
        <h3>Daftar Transaksi Pemesanan</h3>
    </header>

    <nav>
        <a type='button' class='btn btn-success' href="tambah-transaksi.php">Tambah Data</a>
    </nav>

    <br>

	<table class="table table-striped">
	<thead>
        <tr>
            <!--<th class="text-center">#</th>-->
				<th class="text-center">ID Tiket</th>
				<th class="text-center">ID Jadwal</th>
				<th class="text-center">ID Penumpang</th>
                <th class="text-center">Tanggal Transaksi</th>
				<th class="text-center">Jumlah Tiket</th>
                <th class="text-center">Total Pembayaran</th>
				<th class="text-center">Status Pembayaran</th>
                <th class="text-center">Action</th>

			</tr>
	</thead>
</body>
    <tbody>
    <?php
        $sql = "SELECT * FROM tabel_pemesanan_tiket";
        $query = mysqli_query($db, $sql);
        while($tiket = mysqli_fetch_array($query)){
            echo "<tr>";

            echo "<td>".$tiket['id_tiket']."</td>";
            echo "<td>".$tiket['id_jadwal']."</td>";
            echo "<td>".$tiket['id_penumpang']."</td>";
            echo "<td>".$tiket['tgl_pesan']."</td>";
            echo "<td>".$tiket['qty']."</td>";
            echo "<td>".$tiket['harga_tiket_akhir']."</td>";
            echo "<td>".$tiket['status']."</td>";

            echo "<td>";
            echo "<a type='button' class='btn btn-primary' href='form-edit-transaksi.php?id=".$tiket['id_tiket']."'>Edit</a> | ";
            echo "<a type='button' class='btn btn-danger'href='hapus_transaksi.php?id=".$tiket['id_tiket']."'>Hapus</a>";
            echo "</td>";
            echo "</tr>";
        }
        ?>
</tbody>
    </table>
    <p>Total: <?php echo mysqli_num_rows($query) ?></p>
    </body>
</html>