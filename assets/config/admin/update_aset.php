<?php
    include "../koneksi.php";

    $id_aset = $_POST['id_aset'];
    $nama_aset = $_POST['nama_aset'];
    $departemen = $_POST['departemen'];
    $tgl_beli = $_POST['tgl_beli'];
    $status = $_POST['status'];
    $fotoLama = $_POST['fotoLama'];

    if (!file_exists($_FILES['foto']['tmp_name']) || !is_uploaded_file($_FILES['foto']['tmp_name'])) {
        $namaFile = $fotoLama;
    } else {
        $tmpFoto = $_FILES['foto']['tmp_name'];
        $ekstensi = explode('.', $fotoLama);
        $ekstensi = strtolower(end($ekstensi));

        $namaFile = uniqid();
        $namaFile .= ".";
        $namaFile .= $ekstensi;
    }

    move_uploaded_file($tmpFoto, '../../img/upload/' . $namaFile);

    $sql = "UPDATE aset SET nama_aset = '$nama_aset', departemen = '$departemen', tgl_beli = '$tgl_beli', status = '$status', foto = '$namaFile' WHERE id_aset = '$id_aset'";
    $q = mysqli_query($con, $sql);

    if ($q) {
        echo "
            <script>
                alert('Data telah berhasil diedit!');
                window.location.href = '../../../page/admin/list_aset.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data gagal diedit!');
                window.location.href = '../../../page/admin/list_aset.php';
            </script>
        ";
    }
?>