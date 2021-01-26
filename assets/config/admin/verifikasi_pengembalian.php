<?php
    include "../koneksi.php";

    $id_pengembalian = $_GET['id_pengembalian'];
    $id_aset = $_GET['id_aset'];

    $sql = "UPDATE pengembalian SET status_k = 1 WHERE id_pengembalian = '$id_pengembalian';
            UPDATE aset SET status = 'Available' WHERE id_aset = '$id_aset';
            ";
    $q = mysqli_multi_query($con, $sql);

    if ($q) {
        echo "
            <script>
                alert('Pengembalian telah berhasil ter-Verifikasi!');
                window.location.href = '../../../page/admin/list_pengembalian.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Pengembalian gagal di-Verifikasi!');
                window.location.href = '../../../page/admin/list_pengembalian.php';
            </script>
        ";
    }
?>