<?php
    include "../../assets/config/koneksi.php";

    if (!isset($_SESSION['login'])) {
        header('Location: ../../index.html');
    }

    $username = $_SESSION['login'];

    $sql = "SELECT * FROM user WHERE username = '$username'";
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
<nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Application</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
            <h3>Edit Password</h3>
        </div>
        <form method="POST" action="../../assets/config/pegawai/update_pass.php">
            <?php foreach($q as $data) : ?>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control bg-disabled" id="username" name="username" value="<?= $data['username'] ?>" aria-describedby="emailHelp" readonly>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password Baru</label>
                <input type="password" class="form-control bg-light" id="password" name="password" aria-describedby="emailHelp" autocomplete="off" onkeyup="check();" required>
            </div>
            <div class="mb-3">
                <label for="confirm_password" class="form-label">Konfirmasi Password Baru</label>
                <input type="password" class="form-control bg-light" id="confirm_password" name="confirm_password" aria-describedby="emailHelp" autocomplete="off" onkeyup="check();" required>
            </div>
            <div class="pesan" id="pesan">
                <span id='icon'></span>
                <span id='message'></span>
            </div>
            <button type="submit" class="btn btn-primary float-right" id="konfirmasi">Save</button>
            <?php endforeach; ?>
        </form>
    </div>

    <script>
        var check = function() {
            if (document.getElementById('password').value == "" || document.getElementById('confirm_password').value == ""){
                document.getElementById('message').style.color = 'red';
                document.getElementById('icon').innerHTML = '<i class="fas fa-times" style="color: red;"></i>';
                document.getElementById('pesan').classList.remove("background-green");
                document.getElementById('pesan').classList.add("background-red");
                document.getElementById('message').innerHTML = 'Field masih kosong!';
                document.getElementById('konfirmasi').disabled = true;
                document.getElementById('konfirmasi').classList.add("disabled");
            } else {
                if (document.getElementById('password').value == document.getElementById('confirm_password').value) {
                    document.getElementById('icon').innerHTML = '<i class="fas fa-check" style="color: green;"></i>';
                    document.getElementById('pesan').classList.add("background-green");
                    document.getElementById('message').style.color = 'green';
                    document.getElementById('message').innerHTML = 'Password sudah siap diubah';
                    document.getElementById('konfirmasi').disabled = false;
                    document.getElementById('konfirmasi').classList.remove("disabled");
                } else {
                    document.getElementById('icon').innerHTML = '<i class="fas fa-times" style="color: red;"></i>';
                    document.getElementById('pesan').classList.remove("background-green");
                    document.getElementById('pesan').classList.add("background-red");
                    document.getElementById('message').style.color = 'red';
                    document.getElementById('message').innerHTML = 'Isian harus sama!';
                    document.getElementById('konfirmasi').disabled = true;
                    document.getElementById('konfirmasi').classList.add("disabled");
                }
            }
        }
    </script>
    <script src="../../js/all.js"></script>
    <script src="../../js/bootstrap.js"></script>
    <script src="../../js/bootstrap.bundle.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>

</html>