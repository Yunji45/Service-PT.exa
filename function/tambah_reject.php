<?php
    include "../db/koneksi.php";
    session_start();
    if (isset($_SESSION['level'])){
    if($_SESSION['level'] == "manager") {
        
        $norqs = $_POST['norqs'];
        $tanggal = $_POST['tanggal'];
        $catatan = $_POST['catatan'];
        $jam = $_POST['jam'];

        $sql = "UPDATE `rqs_form` SET `tanggal_reject` = '$tanggal', `catatan_reject` = '$catatan', `jam_reject` = '$jam' WHERE `id_rqs` = '$norqs'";
       
        mysqli_query($conn, $sql);
    mysqli_close($conn);

    header('Location: ../manager/admin.php');
    
    }
}
?>
        