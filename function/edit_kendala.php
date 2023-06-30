<?php
include "../db/koneksi.php";
session_start();
if (isset($_SESSION['level'])){
if($_SESSION['level'] == "mekanik") {

    $unit = $_POST['unit'];
    $merk = $_POST['merk'];
    $tipe = $_POST['tipe'];
    $serial_number = $_POST['serial_number'];
    $keterangan = $_POST['txt_keterangan'];
    $id_kendala = $_POST['id_kendala'];

    $sql = "UPDATE `kendala_form` SET `unit_kendala`='$unit',`merk_kendala`='$merk', `tipe_kendala` = '$tipe',`serial_number_kendala`='$serial_number',`keterangan_kendala`= '$keterangan' WHERE id_kendala = '$id_kendala'";

    mysqli_query($conn, $sql);
    mysqli_close($conn);
    
    header('Location: ../mechanic/kendala.php');
   
    }
};
?>