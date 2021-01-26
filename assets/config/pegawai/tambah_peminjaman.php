<?php
    include "../koneksi.php";

    $username = $_POST['username'];
    $id_aset = $_POST['id_aset'];
    $tgl_pinjam = $_POST['tgl_pinjam'];
    $keterangan = $_POST['keterangan'];

    $sql = "INSERT INTO peminjaman VALUES ('', '$username', '$id_aset', '$tgl_pinjam', '$keterangan', '0');
            UPDATE aset SET status = 'Unavailable' WHERE id_aset = '$id_aset';
            ";
    $q = mysqli_multi_query($con, $sql);

    if ($q) {
        echo "
            <script>
                alert('Peminjaman telah berhasil ditambahkan!');
                window.location.href = '../../../page/pegawai/list_peminjaman.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Peminjaman gagal ditambahkan!');
                window.location.href = '../../../page/pegawai/list_peminjaman.php';
            </script>
        ";
    }
?>