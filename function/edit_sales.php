<?php
include "../db/koneksi.php";
session_start();
if (isset($_SESSION['level'])){
if($_SESSION['level'] == "sales") {

    $id_customer = $_POST['id_customer'];
    $nama_customer = $_POST['nama_customer'];
    $nama_perusahaan = $_POST['nama_perusahaan'];
    $no_telp_customer = $_POST['no_telp_customer'];
    $alamat_perusahaan = $_POST['alamat_perusahaan'];
    $email = $_POST['email_perusahaan'];
    $tanggal = $_POST['tanggal'];
    $bidang_perusahaan = $_POST['bidang_perusahaan'];
    $kebutuhan = $_POST['kebutuhan'];
    $perencanaan = $_POST['perencanaan'];
    $validasi = $_POST['validasi'];

    $sql = "UPDATE `sales_form` SET `nama_customer` = '$nama_customer',`perusahaan_customer`= '$nama_perusahaan', `no_telp_customer` = '$no_telp_customer',`alamat_perusahaan`= '$alamat_perusahaan',`email_customer`= '$email', `tanggal_laporan_sales`= '$tanggal', `bidang_perusahaan`= '$bidang_perusahaan', `kebutuhan_alat`= '$kebutuhan',`perencanaan_alat`= '$perencanaan', `validasi_sales`= '$validasi' WHERE id_customer = '$id_customer'";

   

    mysqli_query($conn, $sql);
    mysqli_close($conn);
    
    header('Location: ../sales/sales.php');
   
    }
};
?>