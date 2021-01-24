<?php
    include "../koneksi.php";

    $id_aset = $_POST['id_aset'];
    $nama_aset = $_POST['nama_aset'];
    $departemen = $_POST['departemen'];
    $tgl_beli = $_POST['tgl_beli'];

    $foto = $_FILES['foto']['name'];
    $tmpFoto = $_FILES['foto']['tmp_name'];
    $ekstensi = explode('.', $foto);
    $ekstensi = strtolower(end($ekstensi));

    $namaFile = uniqid();
    $namaFile .= ".";
    $namaFile .= $ekstensi;

    move_uploaded_file($tmpFoto, '../../img/upload/' . $namaFile);

    $sql = "INSERT INTO aset VALUES ('$id_aset', '$nama_aset', '$departemen', '$tgl_beli', 'Available', '$namaFile')";
    $q = mysqli_query($con, $sql);

    if ($q) {
        echo "
            <script>
                alert('Data telah berhasil ditambahkan!');
                window.location.href = '../../../page/admin/list_aset.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data gagal ditambahkan!');
                window.location.href = '../../../page/admin/list_aset.php';
            </script>
        ";
    }
?>