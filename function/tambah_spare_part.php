<?php
    include "../db/koneksi.php";
    session_start();
    if (isset($_SESSION['level'])){
    if($_SESSION['level'] == "admin") {
        
      $id_barang = $_POST['nobrg'];
      $no_rak = $_POST['no_rak'];
      $nama_barang = $_POST['nama_barang'];
      $part_number = $_POST['part_number'];
      $brand_barang = $_POST['brand_barang'];
      $qty_barang = $_POST['qty_barang'];

        $sql = "INSERT INTO `sparepart`( `id_barang`,`no_rak`, `nama_barang`, `part_number`, `brand_barang`, `qty_barang`) VALUES ('$id_barang','$no_rak', '$nama_barang','$part_number','$brand_barang', '$qty_barang')";

       

        mysqli_query($conn, $sql);
    mysqli_close($conn);

    header('Location: ../admin/sparepart.php');
    
    }
}
?>
        