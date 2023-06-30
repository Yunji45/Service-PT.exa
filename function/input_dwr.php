<?php

// database connection code
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');

$con = mysqli_connect('localhost', 'root', '','admin_exxa');
session_start();
    if (isset($_SESSION['level'])){
    if($_SESSION['level'] == "mekanik") {

// get the post records
$nama = $_POST['nama'];
$nodwr = $_POST['nodwr'];
$id_login = $_POST['id_login'];
$tanggal = $_POST['tanggal'];
$jam_masuk = $_POST['jam_masuk'];
$jam_pulang = $_POST['jam_pulang'];
$txtunit = $_POST['txtunit'];
$txtmerk = $_POST['txtmerk'];
$txttipe = $_POST['txttipe'];
$txtserialnumber = $_POST['txtserialnumber'];
$txtpekerjaan_1 = $_POST['txtpekerjaan_1'];
$txtpekerjaan_2 = $_POST['txtpekerjaan_2'];
$txtpekerjaan_3 = $_POST['txtpekerjaan_3'];
$txtpekerjaan_4 = $_POST['txtpekerjaan_4'];
$txtpekerjaan_5 = $_POST['txtpekerjaan_5'];
$setuju = isset($_POST['setuju']) ?  $_POST['setuju'] : 0;

$gbr = '';
// upload gambar 
if(isset($_FILES['gambar'])) {
  if( $_FILES['gambar']['size'] > 0 && 
                $_FILES['gambar']['size'] < 5000000
            ){
  $target_dir = "gambar_dwr/gambar_1/";
  $name = '';
  $name = substr(str_shuffle(MD5(microtime())), 0, 12).'-'.$_FILES['gambar']['name'];
  $target_file = '../'.$target_dir . basename($name);

  //memilih tipe file
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // tipe file yang di perbolehkan

  $extensions_arr = array("jpg","jpeg","png","pdf","gif");

  // upload file
  if( in_array($imageFileType,$extensions_arr)){
  move_uploaded_file($_FILES['gambar']['tmp_name'],'../'.$target_dir.$name);
  }


$gbr = $target_dir.$name;

  }
}

$gbr2 = '';

// upload gambar 
if(isset($_FILES['gambar2'])) {
  if( $_FILES['gambar2']['size'] > 0 && 
                $_FILES['gambar2']['size'] < 5000000
            ){
  $target_dir = "gambar_dwr/gambar_2/";
  $name = '';
  $name = substr(str_shuffle(MD5(microtime())), 0, 12).'-'.$_FILES['gambar2']['name'];
  $target_file = '../'.$target_dir . basename($name);

  //memilih tipe file
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // tipe file yang di perbolehkan

  $extensions_arr = array("jpg","jpeg","png","pdf","gif");

  // upload file
  if( in_array($imageFileType,$extensions_arr)){
  move_uploaded_file($_FILES['gambar2']['tmp_name'],'../'.$target_dir.$name);
  }


$gbr2 = $target_dir.$name;

  }
}

$gbr3 = '';

// upload gambar 
if(isset($_FILES['gambar3'])) {
  if( $_FILES['gambar3']['size'] > 0 && 
                $_FILES['gambar3']['size'] < 5000000
            ){
  $target_dir = "gambar_dwr/gambar_3/";
  $name = '';
  $name = substr(str_shuffle(MD5(microtime())), 0, 12).'-'.$_FILES['gambar3']['name'];
  $target_file = '../'.$target_dir . basename($name);

  //memilih tipe file
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // tipe file yang di perbolehkan

  $extensions_arr = array("jpg","jpeg","png","pdf","gif");

  // upload file
  if( in_array($imageFileType,$extensions_arr)){
  move_uploaded_file($_FILES['gambar3']['tmp_name'],'../'.$target_dir.$name);
  }


$gbr3 = $target_dir.$name;

  }
}

$gbr4 = '';

// upload gambar 
if(isset($_FILES['gambar4'])) {
  if( $_FILES['gambar4']['size'] > 0 && 
                $_FILES['gambar4']['size'] < 5000000
            ){
  $target_dir = "gambar_dwr/gambar_4/";
  $name = '';
  $name = substr(str_shuffle(MD5(microtime())), 0, 12).'-'.$_FILES['gambar4']['name'];
  $target_file = '../'.$target_dir . basename($name);

  //memilih tipe file
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // tipe file yang di perbolehkan

  $extensions_arr = array("jpg","jpeg","png","pdf","gif");

  // upload file
  if( in_array($imageFileType,$extensions_arr)){
  move_uploaded_file($_FILES['gambar4']['tmp_name'],'../'.$target_dir.$name);
  }


$gbr4 = $target_dir.$name;

  }
}

$gbr5 = '';

// upload gambar 
if(isset($_FILES['gambar5'])) {
  if( $_FILES['gambar5']['size'] > 0 && 
                $_FILES['gambar5']['size'] < 5000000
            ){
  $target_dir = "gambar_dwr/gambar_5/";
  $name = '';
  $name = substr(str_shuffle(MD5(microtime())), 0, 12).'-'.$_FILES['gambar5']['name'];
  $target_file = '../'.$target_dir . basename($name);

  //memilih tipe file
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // tipe file yang di perbolehkan

  $extensions_arr = array("jpg","jpeg","png","pdf","gif");

  // upload file
  if( in_array($imageFileType,$extensions_arr)){
  move_uploaded_file($_FILES['gambar5']['tmp_name'],'../'.$target_dir.$name);
  }


$gbr5 = $target_dir.$name;

  }
}

// database insert SQL code
$sql = "INSERT INTO `dwr_form`( `id_dwr`,`id_login`,`nama`,`tanggal`,`jam_masuk`,`jam_pulang`,`unit`,`merk`, `tipe`, `serial_number`, `laporan_kerja_1`, `laporan_kerja_2`, `laporan_kerja_3`, `laporan_kerja_4`, `laporan_kerja_5`,`gambar`,`gambar_2` , `gambar_3` ,`gambar_4` ,`gambar_5` ,`status`, `validasi`) VALUES ('$nodwr','$id_login','$nama','$tanggal','$jam_masuk','$jam_pulang', '$txtunit','$txtmerk', '$txttipe', '$txtserialnumber', '$txtpekerjaan_1', '$txtpekerjaan_2', '$txtpekerjaan_3', '$txtpekerjaan_4', '$txtpekerjaan_5','$gbr', '$gbr2' , '$gbr3' ,'$gbr4' ,'$gbr5' ,'DILAPORKAN','".$setuju."')";

// insert in database 
$rs = mysqli_query($con, $sql);

if($rs)
{
	header('Location: ../mechanic/dwr.php');
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
        <h3 class="txtnotif">NOMOR RQS SUDAH ADA</h3>
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