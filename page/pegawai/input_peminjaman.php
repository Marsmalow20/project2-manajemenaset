<?php
    include "../../assets/config/koneksi.php";

    if (!isset($_SESSION['login'])) {
        header('Location: ../../index.html');
    }

    $sql = "SELECT * FROM aset WHERE status = 'Available' ORDER BY nama_aset";
    $q = mysqli_query($con, $sql);
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
    <nav class="navbar navbar-expand-lg navbar-custom sticky-top">
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
                            <li><a class="dropdown-item" href="edit_user.php">Edit Akun</a></li>
                            <li><a class="dropdown-item" href="edit_pass.php">Ubah Password</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="../../assets\config\logout.php">Logout <i class="fa fa-power-off" style="color: #cbc;"></i></a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="pegawai_home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="list_peminjaman.php">Peminjaman</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="list_pengembalian.php">Pengembalian</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container" style="width: 30%">
        <div class="col text-center my-4">
            <h3>Input Peminjaman</h3>
        </div>
        <form method="POST" action="../../assets/config/pegawai/tambah_peminjaman.php" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control bg-disable" id="username" name="username" aria-describedby="emailHelp" value="<?= $_SESSION['login'] ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="id_aset" class="form-label">Nama Aset</label>
                <input list="brow" class="form-control bg-light" id="id_aset" name="id_aset">
                <datalist id="brow">
                    <?php foreach ($q as $data) : ?>
                    <option value="<?= $data['id_aset'] ?>"><?= $data['nama_aset'] ?></option>
                    <?php endforeach; ?>
                </datalist>
            </div>
            <div class="mb-3">
                <label for="tgl_pinjam" class="form-label">Tanggal Pinjam</label>
                <input type="date" class="form-control bg-light" id="tgl_pinjam" name="tgl_pinjam" aria-describedby="emailHelp" autocomplete="off">
            </div>
            <div class="form-floating mb-3">
                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="keterangan"></textarea>
                <label for="floatingTextarea">Keterangan</label>
            </div>
            <a href="list_peminjaman.php">Record Peminjaman Saya</a>
            <button type="submit" class="btn btn-primary float-right">Tambah</button>
        </form>
    </div>

    <script src="../../js/all.js"></script>
    <script src="../../js/bootstrap.js"></script>
    <script src="../../js/bootstrap.bundle.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>

</html>