<?php
    include "../../assets/config/koneksi.php";

    if (!isset($_SESSION['login'])) {
        header('Location: ../../index.html');
    }

    $id_aset = $_GET['id_aset'];

    $sql = "SELECT * FROM aset WHERE id_aset = '$id_aset'";
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
    <title>Admin Home</title>
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
                            <li><a class="dropdown-item" href="edit_user.php">Edit Account</a></li>
                            <li><a class="dropdown-item" href="edit_pass.php">Change Password</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="../../assets\config\logout.php">Logout <i class="fa fa-power-off" style="color: #cbc;"></i></a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="admin_home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="list_aset.php">Aset</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="list_pegawai.php">Pegawai</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="list_peminjaman.php">Peminjaman</a>
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
            <h3>Edit Aset</h3>
        </div>
        <form method="POST" action="../../assets/config/admin/update_aset.php" enctype="multipart/form-data">
            <?php foreach ($q as $data): ?>
            <div class="mb-3">
                <label for="id_aset" class="form-label">ID Aset</label>
                <input type="text" class="form-control bg-disabled" id="id_aset" name="id_aset" aria-describedby="emailHelp" autocomplete="off" value="<?= $data['id_aset'] ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="nama_aset" class="form-label">Nama</label>
                <input type="text" class="form-control bg-light" id="nama_aset" name="nama_aset" aria-describedby="emailHelp" autocomplete="off" value="<?= $data['nama_aset'] ?>">
            </div>
            <div class="mb-3">
                <label for="nama_aset" class="form-label">Kategori</label>
                <class="form-control bg-light" id="nama_aset" name="nama_aset" aria-describedby="emailHelp" autocomplete="off">
                <br>
                    <select name="kategori" id="" style="width: 355px; height: 40px; border-radius: 5px">
                        <option>Kendaraan</option>
                        <option>Hardware</option>
                        <option>Accesories</option>
                        <option>Property</option>
                    </select>
            </div>
            <div class="mb-3">
                <label for="departemen" class="form-label">Departemen</label>
                <input type="text" class="form-control bg-light" id="departemen" name="departemen" aria-describedby="emailHelp" autocomplete="off" value="<?= $data['departemen'] ?>">
            </div>
            <div class="mb-3">
                <label for="tgl_beli" class="form-label">Tanggal Beli</label>
                <input type="date" class="form-control bg-light" id="tgl_beli" name="tgl_beli" aria-describedby="emailHelp" autocomplete="off" value="<?= $data['tgl_beli'] ?>">
            </div>
            <label for="tgl_beli" class="form-label">Status</label>
            <select class="form-select" aria-label="Default select example" name="status">
                <option  value="Available" <?php if($data['status']=='Available') echo 'selected'?>>Available</option>
                <option  value="Unavailable" <?php if($data['status']=='Unavailable') echo 'selected'?>>Unavailable</option>
            </select>
            <div class="mb-3">
                <label for="formFile" class="form-label">Foto</label>
                <div class="row">
                    <div class="col-2"><img src="../../assets/img/upload/<?= $data['foto'] ?>" width="50" class="rounded-circle"></div>
                    <div class="col"><input class="form-control bg-light" type="file" id="formFile" name="foto"></div>
                </div>
                <input type="hidden" name="fotoLama" value="<?= $data['foto'] ?>">
            </div>
            <button type="submit" class="btn btn-primary float-right">Tambah</button>
            <?php endforeach; ?>
        </form>
    </div>

    <script src="../../js/all.js"></script>
    <script src="../../js/bootstrap.js"></script>
    <script src="../../js/bootstrap.bundle.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>

</html>