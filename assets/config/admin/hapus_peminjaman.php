<?php
    include "../koneksi.php";

    $id_pinjam = $_GET['id_pinjam'];

    $sql = "SELECT * FROM peminjaman WHERE id_pinjam = '$id_pinjam'";
    $q = mysqli_query($con, $sql);
    $result = mysqli_fetch_assoc($q);

    if ($result['status'] == 1) {
        echo "
            <script>
                alert('Peminjaman gagal dihapus, Karena sudah ter-verifikasi!');
                window.location.href = '../../../page/admin/list_peminjaman.php';
            </script>
        ";
    } else {
        $id_aset = $result['id_aset'];
        $sql = "DELETE FROM peminjaman WHERE id_pinjam = '$id_pinjam';
                UPDATE aset SET status = 'Available' WHERE id_aset = '$id_aset';
                ";
        
        $q = mysqli_multi_query($con, $sql);

        if ($q) {
            echo "
                <script>
                    alert('Peminjaman telah berhasil dihapus!');
                    window.location.href = '../../../page/admin/list_peminjaman.php';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('Maaf, gagal menghapus peminjaman');
                    window.location.href = '../../../page/pegawai/list_peminjaman.php';
                </script>
            ";
        }
    }
?>