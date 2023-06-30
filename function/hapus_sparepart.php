<?php

include "../db/koneksi.php";
session_start();
if (isset($_SESSION['level'])){
if($_SESSION['level'] == "admin") {
 $sql = "DELETE FROM `sparepart` WHERE id_barang = '".$_GET['id_barang']."'";


 mysqli_query($conn, $sql);
 mysqli_close($conn);

 header('Location: ../admin/sparepart.php');
    }
} 
 
?>