<?php
    include "../../assets/config/koneksi.php";

    if (!isset($_SESSION['login'])) {
        header('Location: ../../index.html');
    }

    $sql = "SELECT COUNT(*) FROM peminjaman WHERE status = 0";
    $q = mysqli_query($con, $sql);
    $result = mysqli_fetch_assoc($q);

    $sql2 = "SELECT COUNT(*) FROM `pengembalian` WHERE status_k = 0";
    $q2 = mysqli_query($con, $sql2);
    $result2 = mysqli_fetch_assoc($q2);
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
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="list_aset.php">Aset</a>
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

    <div class="container">
        <div class="row my-4">
            <div class="col text-center">
                <h1>Menu</h1>
            </div>
        </div>
        <center>
            <div class="row">
                <div class="col">
                    <a href="" class="btn">
                        <div class="card border-0">
                            <img src="../../assets/img/home.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <p class="card-text">Home</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="list_aset.php" class="btn">
                        <div class="card border-0">
                            <img src="../../assets/img/aset.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <p class="card-text">Aset</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="list_pegawai.php" class="btn">
                        <div class="card border-0">
                            <img src="../../assets/img/pegawai.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <p class="card-text">Pegawai</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="list_peminjaman.php" class="btn">
                        <div class="card border-0">
                            <img src="../../assets/img/peminjaman.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <p class="card-text">
                                    Peminjaman
                                    <?= ($result['COUNT(*)'] > 0) ? "<span class='badge rounded-pill bg-danger'>" . $result['COUNT(*)'] . "</span>" : "" ?>
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="list_pengembalian.php" class="btn">
                        <div class="card border-0">
                            <img src="../../assets/img/pengembalian.png" class="card-img-top" alt="...">
                            <div class="card-body">
                            <p class="card-text">
                                    Pengembalian
                                    <?= ($result2['COUNT(*)'] > 0) ? "<span class='badge rounded-pill bg-danger'>" . $result2['COUNT(*)'] . "</span>" : "" ?>
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </center>
    </div>

    <script src="../../js/all.js"></script>
    <script src="../../js/bootstrap.js"></script>
    <script src="../../js/bootstrap.bundle.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>

</html>