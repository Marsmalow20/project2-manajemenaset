<?php
    include "../koneksi.php";

    $id_pinjam = $_GET['id_pinjam'];

    $sql = "UPDATE peminjaman SET status = 1 WHERE id_pinjam = '$id_pinjam'";
    $q = mysqli_query($con, $sql);

    if ($q) {
        echo "
            <script>
                alert('Peminjaman telah berhasil ter-Verifikasi!');
                window.location.href = '../../../page/admin/list_peminjaman.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Peminjaman gagal di-Verifikasi!');
                window.location.href = '../../../page/admin/list_peminjaman.php';
            </script>
        ";
    }
?>