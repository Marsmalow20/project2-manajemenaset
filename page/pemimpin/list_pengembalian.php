<?php
    include "../../assets/config/koneksi.php";

    if (!isset($_SESSION['login'])) {
        header('Location: ../../index.html');
    }

    $username = $_SESSION['login'];

    $sql = "SELECT pengembalian.id_pengembalian, user.nama, aset.id_aset, aset.nama_aset, peminjaman.tgl_pinjam, peminjaman.keterangan, pengembalian.tgl_pengembalian, pengembalian.status_k AS status_pengembalian 
            FROM peminjaman INNER JOIN user ON peminjaman.username = user.username 
            INNER JOIN aset ON peminjaman.id_aset = aset.id_aset 
            INNER JOIN pengembalian ON peminjaman.id_pinjam = pengembalian.id_pinjam  
            ORDER BY pengembalian.id_pengembalian DESC";
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
    <title>Eksekutif</title>
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
                        <a class="nav-link" aria-current="page" href="pemimpin_home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="list_aset.php">Aset</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="list_pengembalian.php">Laporan</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="col text-center mt-4">
            <h3>Laporan Data Peminjaman</h3>
        </div>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">ID</th>
                <th scope="col">Nama Peminjam</th>
                <th scope="col">Nama Aset</th>
                <th scope="col">Tanggal Pinjam</th>
                <th scope="col">Tanggal Kembali</th>
                <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $i = 1;
                    foreach ($q as $data):
                        $status = "";
                        if ($data['status_pengembalian'] == 1) {
                            $status = "<i class='fas fa-check-circle'></i>";
                        } else {
                            $status = "<i class='fas fa-times-circle'></i>";
                        }
                ?>
                <tr>
                    <th scope="row"><?= $i++ ?></th>
                    <td><?= $data['id_pengembalian'] ?></td>
                    <td><?= $data['nama'] ?></td>
                    <td><?= $data['nama_aset'] ?></td>
                    <td><?= date('d M Y', strtotime($data["tgl_pinjam"])) ?></td>
                    <td><?= date('d M Y', strtotime($data["tgl_pengembalian"])) ?></td>
                    <td class="<?= ($data['status_pengembalian'] == 1) ? "text-success" : "text-secondary" ?>" title="<?= ($data['status_pengembalian'] == 1) ? "Ter-Verifikasi" : "Belum Ter-Verifikasi" ?>">
                        <?= $status ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="../../js/all.js"></script>
    <script src="../../js/bootstrap.js"></script>
    <script src="../../js/bootstrap.bundle.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>

</html>