<!DOCTYPE html>
<html>
<head>
    <title>Pemesanan Tiket Bus Online| PT GOING</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
</head>

<body>
    <header>
        <div class="bg-primary py-5" id="center">
        <div class="container">

            <h3 class="display-4 text-white">Pemesanan Tiket Bus Online</h3>
            <h1 class="display-4 text-white">PT GOING Together</h1>

        </div>
    </header>


    <nav id="center" > 
    <h4>Menu</h4> 
    <?php if(isset($_GET['status'])): ?>
        <p>
            <?php
                if($_GET['status'] == 'sukses'){ 
                    echo "Pendataan berhasil!"; 
                } else {
                    echo "Pendataan gagal!";
                }
            ?>
        </p>
    <?php endif; ?> 
    <ul> 
        <li type="button" class="btn btn-outline-primary"><a href="list-transaksi.php">Daftar Pemesanan Tiket</a></li> 
        <li type="button" class="btn btn-outline-primary"><a href="list-bus.php">Daftar Bus</a></li> 
        <li type="button" class="btn btn-outline-primary"><a href="list-penumpang.php">Daftar Penumpang</a></li>  
        <li type="button" class="btn btn-outline-primary"><a href="list-kota.php">Daftar Kota</a></li> 
        <li type="button" class="btn btn-outline-primary"><a href="list-jadwal.php">Daftar Jadwal Bus</a></li>
        <li type="button" class="btn btn-outline-primary"><a href="list-admin.php">Daftar Admin</a></li>

    </ul> 
</nav> 
</body> 
</html>
