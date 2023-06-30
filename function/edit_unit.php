<?php
include "../db/koneksi.php";
session_start();
if (isset($_SESSION['level'])){
if($_SESSION['level'] == "logistik") {

    $id_unit = $_POST['id_unit'];
    $jenis = $_POST['jenis'];
    $model = $_POST['model'];
    $serial_number = $_POST['serial_number'];
    $lokasi = $_POST['lokasi'];

    $sql = "UPDATE `unit_hmap` SET `id_unit`='$id_unit',`jenis`='$jenis',`model`='$model',`serial_number`='$serial_number',`lokasi`='$lokasi' WHERE id_unit = '$id_unit'";

  

    mysqli_query($conn, $sql);
    mysqli_close($conn);
    
    header('Location: ../logistic/hmap.php');
   
    }
};
?>