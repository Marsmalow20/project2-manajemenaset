<?php
    include "../koneksi.php";

    $id_pinjam = $_POST['id_pinjam'];
    $username = $_POST['username'];
    $id_aset = $_POST['id_aset'];
    $tgl_pinjam = $_POST['tgl_pinjam'];
    $keterangan = $_POST['keterangan'];

    $sql = "SELECT * FROM peminjaman WHERE id_pinjam = '$id_pinjam'";
    $q = mysqli_query($con, $sql);
    $result = mysqli_fetch_assoc($q);

    if ($result['status'] == 1) {
        echo "
            <script>
                alert('Peminjaman gagal diedit, Karena sudah ter-verifikasi!');
                window.location.href = '../../../page/pegawai/list_peminjaman.php';
            </script>
        ";
    } else {
        $id_aset_lama = $result['id_aset'];
        $sql = "UPDATE aset SET status = 'Available' WHERE id_aset = '$id_aset_lama';
                UPDATE aset SET status = 'Unavailable' WHERE id_aset = '$id_aset';
                UPDATE peminjaman SET id_aset = '$id_aset', tgl_pinjam = '$tgl_pinjam', keterangan = '$keterangan' WHERE id_pinjam = '$id_pinjam';
                ";
        
        $q = mysqli_multi_query($con, $sql);

        if ($q) {
            echo "
                <script>
                    alert('Peminjaman telah berhasil diedit!');
                    window.location.href = '../../../page/pegawai/list_peminjaman.php';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('Maaf, gagal mengedit peminjaman');
                    window.location.href = '../../../page/pegawai/list_peminjaman.php';
                </script>
            ";
        }
    }
?>