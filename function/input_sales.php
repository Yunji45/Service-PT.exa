<?php
     include '../db/koneksi.php';
     session_start();
     if (isset($_SESSION['level'])){
       if($_SESSION['level'] == "sales") {
    
    $id_customer = $_POST['id_customer'];
    $id_login = $_POST['id_login'];
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

    $sql = "INSERT INTO `sales_form`(`id_customer`, `id_login`, `nama_customer`, `no_telp_customer`, `email_customer` , `perusahaan_customer`, `alamat_perusahaan`, `bidang_perusahaan`, `tanggal_laporan_sales`, `kebutuhan_alat`, `perencanaan_alat`, `validasi_sales`) VALUES ('$id_customer','$id_login','$nama_customer','$no_telp_customer', '$email' ,'$nama_perusahaan','$alamat_perusahaan','$bidang_perusahaan','$tanggal','$kebutuhan','$perencanaan', '$validasi')";

    


    $rs = mysqli_query($conn, $sql);
    
    if($rs)
    {
	header('Location: ../sales/sales.php');
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