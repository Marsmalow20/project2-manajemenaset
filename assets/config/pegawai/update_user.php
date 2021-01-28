<?php
    include "../koneksi.php";

    $username = $_POST['username'];
    $nama = $_POST['nama'];

    $sql = "UPDATE user SET nama = '$nama' WHERE username = '$username'";
    $q = mysqli_query($con, $sql);

    if ($q) {
        echo "
            <script>
                alert('Data berhasil diubah!');
                window.location.href = '../../../page/pegawai/pegawai_home.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data gagal diubah!');
                window.location.href = '../../../page/pegawai/pegawai_home.php';
            </script>
        ";
    }
?>