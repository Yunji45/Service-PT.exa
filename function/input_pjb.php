<?php
 include '../db/koneksi.php';
 session_start();
 if (isset($_SESSION['level'])){
   if($_SESSION['level'] == "sales") {

    $id_pjb = $_POST['id_pjb'];
    $id_login = $_POST['id_login'];
    $no_surat = $_POST['no_surat'];
    $tgl_pjb = $_POST['tgl_pjb'];
    $nama_pembeli = $_POST['nama_pembeli'];
    $nm_unit = $_POST['nm_unit'];
    $alamat_pembeli = $_POST['alamat_pembeli'];
    $spek_unit = $_POST['spek_unit'];
    $jml_unit = $_POST['jml_unit'];
    $tgl_penyerahan = $_POST['tgl_penyerahan'];
    $tmp_penyerahan = $_POST['tmp_penyerahan'];
    $harga = $_POST['harga'];
    $txtPPN = $_POST['txtPPN'];
    $txtDisplay = $_POST['txtDisplay'];
    $lain = $_POST['lain'];
    $validasi = $_POST['validasi'];

    $sql = "INSERT INTO `pjb_form`(`id_pjb`, `id_login`, `no_pjb`, `tgl_pjb`, `nm_pbl_pjb` , `alamat_pbl_pjb`, `nm_produk_pjb`, `spek_pjb`, `jml_pjb`, `tgl_penyerahan_pjb`, `tmp_penyerahan_pjb`,`hrg_pjb`, `ppn_pjb`, `total_hrg_pjb`, `lain_pjb`, `validasi`) VALUES ('$id_pjb','$id_login','$no_surat','$tgl_pjb', '$nama_pembeli' ,'$alamat_pembeli','$nm_unit','$spek_unit','$jml_unit','$tgl_penyerahan','$tmp_penyerahan', '$harga', '$txtPPN', '$txtDisplay', '$lain', '$validasi')";

    $rs = mysqli_query($conn, $sql);
    
    if($rs)
    {
	header('Location: ../sales/pjb.php');
} else{
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">

    <title>Hello, world!</title>
  </head>
  <body>
  <div class="kotaknotif">
        <h3 class="txtnotif">DATA GAGAL DIMASUKKAN</h3>
        <a href="../mechanic/rqs.php"><button class="btn btn-warning tblback" >Back</button></a>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    -->
  </body>
</html>

<?php
    }
}
    };
?>