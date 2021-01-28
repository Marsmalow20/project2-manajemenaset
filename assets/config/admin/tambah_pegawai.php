<?php
    include "../koneksi.php";

    $username = $_POST['username'];
    $nama = $_POST['nama'];
    $password = md5($_POST['password']);

    $sql = "INSERT INTO user VALUES ('$username', '$nama', '$password')";
    $q = mysqli_query($con, $sql);

    if ($q) {
        echo "
            <script>
                alert('Data telah berhasil ditambahkan!');
                window.location.href = '../../../page/admin/list_pegawai.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data gagal ditambahkan!');
                window.location.href = '../../../page/admin/list_pegawai.php';
            </script>
        ";
    }
?>