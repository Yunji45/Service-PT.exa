<?php
    include "../db/koneksi.php";
    session_start();
    if (isset($_SESSION['level'])){
    if($_SESSION['level'] == "admin") {
        
      $id_barang = $_POST['id_barang'];
      $id_sps = $_POST['id_sps'];
      $unit = $_POST['unit'];
      $merk = $_POST['merk'];
      $model = $_POST['model'];
      $serial_number = $_POST['serial_number'];
      $tanggal = $_POST['tanggal'];
      $qty = $_POST['qty'];

        $sql = "INSERT INTO `sps_form`( `id_sps`,`id_barang`,`unit`, `merk`, `model`, `serial_number`, `tanggal`, `qty_keluar`) VALUES ('$id_sps','$id_barang', '$unit','$merk','$model', '$serial_number', '$tanggal','$qty')";


        mysqli_query($conn, $sql);
    mysqli_close($conn);

    header('Location: ../admin/sps.php');
    
    }
}
?>
        