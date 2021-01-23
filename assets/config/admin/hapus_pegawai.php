<?php
    include "../koneksi.php";

    $username = $_GET['username'];

    $sql = "DELETE FROM user WHERE username = '$username'";
    
    if ($username !== 'admin' || $username !== 'eksekutif') {
        $q = mysqli_query($con, $sql);
        echo "
            <script>
                alert('Data telah berhasil dihapus!');
                window.location.href = '../../../page/admin/list_pegawai.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Maaf, tidak dapat menghapus data');
                window.location.href = '../../../page/admin/list_pegawai.php';
            </script>
        ";
    }
?>