<?php
     include '../db/koneksi.php';
     session_start();
     if (isset($_SESSION['level'])){
       if($_SESSION['level'] == "mekanik") {
    
    $no_knd = $_POST['no_knd'];
    $id_login = $_POST['id_login'];
    $tgl_kendala = $_POST['tanggal'];
    $jam_kendala = $_POST['jam_kendala'];
    $merk = $_POST['txtmerk'];
    $tipe = $_POST['txttipe'];
    $unit = $_POST['txtunit'];
    $sn = $_POST['txtserialnumber'];
    $txt_keterangan = $_POST['txt_keterangan'];
    $cek = $_POST['setuju'];


    $sql = "INSERT INTO `kendala_form`(`id_kendala`, `id_login`, `tanggal_kendala`, `jam_kendala`, `unit_kendala`, `merk_kendala`, `tipe_kendala`, `serial_number_kendala`, `keterangan_kendala`, `cek_kendala`, `status_kendala`) VALUES ('$no_knd','$id_login','$tgl_kendala','$jam_kendala', '$unit' ,'$merk','$tipe','$sn', '$txt_keterangan', '$cek', 'DILAPORKAN')";

    $rs = mysqli_query($conn, $sql);
    
    if($rs)
    {
	header('Location: ../mechanic/kendala.php');
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