<?php
    include "../koneksi.php";

    $id_pinjam = $_POST['id_pinjam'];
    $tgl_pengembalian = $_POST['tgl_pengembalian'];

    $sql = "INSERT INTO pengembalian VALUES ('', '$id_pinjam', '$tgl_pengembalian', '0')";
    $q = mysqli_query($con, $sql);

    if ($q) {
        echo "
            <script>
                alert('Pengembalian telah berhasil ditambahkan!');
                window.location.href = '../../../page/pegawai/list_pengembalian.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Pengembalian gagal ditambahkan!');
                window.location.href = '../../../page/pegawai/list_pengembalian.php';
            </script>
        ";
    }
?>