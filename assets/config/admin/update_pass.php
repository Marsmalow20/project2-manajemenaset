<?php
    include "../koneksi.php";

    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $sql = "UPDATE user SET password = '$password' WHERE username = '$username'";
    $q = mysqli_query($con, $sql);

    if ($q) {
        echo "
            <script>
                alert('Password berhasil diubah!');
                window.location.href = '../../../page/admin/pegawai_home.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Password gagal diubah!');
                window.location.href = '../../../page/admin/pegawai_home.php';
            </script>
        ";
    }
?>