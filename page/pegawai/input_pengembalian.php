<?php
    include "../../assets/config/koneksi.php";

    if (!isset($_SESSION['login'])) {
        header('Location: ../../index.html');
    }

    $id_pinjam = $_GET['id_pinjam'];

    $sql = "SELECT peminjaman.id_pinjam, user.nama, aset.id_aset, aset.nama_aset, aset.foto, peminjaman.tgl_pinjam, peminjaman.status, peminjaman.keterangan FROM peminjaman INNER JOIN user ON peminjaman.username = user.username INNER JOIN aset ON peminjaman.id_aset = aset.id_aset WHERE peminjaman.id_pinjam = '$id_pinjam'";
    $q = mysqli_query($con, $sql);

    $result = mysqli_fetch_assoc($q);

    if ($result['status'] == 0) {
        echo "
            <script>
                alert('Tidak dapat melakukan Konfirmasi Pengembalian karena peminjaman belum di-Konfirmasi oleh admin!');
                window.location.href = 'list_pengembalian.php';
            </script>
        ";
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css\bootstrap.css">
    <link rel="stylesheet" href="../../css/bootstrap-grid.css">
    <link rel="stylesheet" href="../../css/bootstrap-reboot.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>Home</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Application</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?= $_SESSION['login']; ?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="../../assets\config\logout.php">Logout <i class="fa fa-power-off" style="color: #cbc;"></i></a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pricing</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container" style="width: 50%">
        <div class="col text-center my-4">
            <h3>Konfirmasi Pengembalian</h3>
        </div>
        <div class="row">
            <?php foreach ($q as $data) : ?>
            <div class="col-5">
                <div class="card" style="width: 16rem;">
                    <img src="../../assets/img/upload/<?= $data['foto'] ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?= $data['nama_aset'] . " - " . $data['id_aset'] ?></h5>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><?= $data['nama'] ?></li>
                        <li class="list-group-item"><?= date('d M Y', strtotime($data["tgl_pinjam"])) ?></li>
                        <li class="list-group-item"><?= $data['keterangan'] ?></li>
                    </ul>
                </div>
            </div>
            <div class="col">
                <form method="POST" action="../../assets/config/pegawai/tambah_pengembalian.php" enctype="multipart/form-data">
                <div class="mb-3">
                        <label for="id_pinjam" class="form-label">ID Peminjaman</label>
                        <input type="text" class="form-control bg-disabled" id="id_pinjam" name="id_pinjam" aria-describedby="emailHelp" value="<?= $data['id_pinjam'] ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="tgl_pengembalian" class="form-label">Tanggal Pengembalian</label>
                        <input type="date" class="form-control bg-light" id="tgl_pengembalian" name="tgl_pengembalian" aria-describedby="emailHelp">
                    </div>
                    <button type="submit" class="btn btn-primary float-right">Konfirmasi</button>
                </form>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script src="../../js/all.js"></script>
    <script src="../../js/bootstrap.js"></script>
    <script src="../../js/bootstrap.bundle.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>

</html>