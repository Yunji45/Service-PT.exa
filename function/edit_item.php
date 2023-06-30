<?php
include "../db/koneksiBrg.php";
session_start();
if (isset($_SESSION['level'])){
if($_SESSION['level'] == "admin") {

    $id_barang = $_POST['id_barang'];
    $no_rak = $_POST['no_rak'];
    $nama_barang = $_POST['nama_barang'];
    $part_number = $_POST['part_number'];
    $brand_barang = $_POST['brand_barang'];
    $qty_barang = $_POST['qty_barang'];

    $sql = "UPDATE `sparepart` SET `nama_barang`='$nama_barang',`part_number`='$part_number',`brand_barang`='$brand_barang',`qty_barang`='$qty_barang',`no_rak`='$no_rak' WHERE `id_barang` = '$id_barang'";


    mysqli_query($conn, $sql);
    mysqli_close($conn);
    
    header('Location: ../admin/sparepart.php');
   
    }
};
?>