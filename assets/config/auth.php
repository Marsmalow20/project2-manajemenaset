<?php
    include "koneksi.php";
    
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
    $q = mysqli_query($con, $sql);
    $result = $q->fetch_assoc();    

    if($q) {
        $_SESSION['login'] = $result['username'];
        if ($_SESSION['login'] == 'admin') {
            echo "
                <script>
                    window.location.href = '../../page/admin/admin_home.php';
                </script>
            ";
        } else {
            if ($_SESSION['login'] == 'eksekutif') {
                echo "
                    <script>
                        window.location.href = '../../page/pemimpin/pemimpin_home.php';
                    </script>
                ";
            } else {
                echo "
                    <script>
                        window.location.href = '../../page/pegawai/pegawai_home.php';
                    </script>
                ";
            }
        }
    }
?>