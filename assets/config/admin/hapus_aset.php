<?php
    include "../koneksi.php";

    $id_aset = $_GET['id_aset'];

    $sql = "DELETE FROM aset WHERE id_aset = '$id_aset'";
    $q = mysqli_query($con, $sql);

    if ($q) {
        echo "
            <script>
                alert('Data telah berhasil dihapus!');
                window.location.href = '../../../page/admin/list_aset.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Maaf, tidak dapat menghapus data');
                window.location.href = '../../../page/admin/list_aset.php';
            </script>
        ";
    }
?>