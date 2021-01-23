<?php
    include "../koneksi.php";

    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "INSERT INTO user VALUES ('$nama', '$username', '$password')";
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