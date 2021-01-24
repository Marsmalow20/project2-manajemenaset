<?php
    include "../koneksi.php";

    $username = $_POST['username'];
    $nama = $_POST['nama'];

    $sql = "UPDATE user SET nama = '$nama' WHERE username = '$username'";
    $q = mysqli_query($con, $sql);

    if ($q) {
        echo "
            <script>
                alert('Data telah berhasil diedit!');
                window.location.href = '../../../page/admin/list_pegawai.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data gagal diedit!');
                window.location.href = '../../../page/admin/list_pegawai.php';
            </script>
        ";
    }
?>