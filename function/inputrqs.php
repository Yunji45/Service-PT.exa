<?php

// database connection code
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');

$con = mysqli_connect('localhost', 'root', '','admin_exxa');
session_start();
    if (isset($_SESSION['level'])){
    if($_SESSION['level'] == "mekanik") {

// get the post records
$nama = $_POST['nama'];
$norqs = $_POST['norqs'];
$id_login = $_POST['id_login'];
$tanggal = $_POST['tanggal'];
$txtmerk = $_POST['txtmerk'];
$txttipe = $_POST['txttipe'];
$txtunit = $_POST['txtunit'];
$txtserialnumber = $_POST['txtserialnumber'];
$txtperm1 = $_POST['txtperm1'];
$txtperm2 = $_POST['txtperm2'];
$txtperm3 = $_POST['txtperm3'];
$txtperm4 = $_POST['txtperm4'];
$txtperm5 = $_POST['txtperm5'];
$txtperm6 = $_POST['txtperm6'];
$txtperm7 = $_POST['txtperm7'];
$txtperm8 = $_POST['txtperm8'];
$txtperm9 = $_POST['txtperm9'];
$txtperm10= $_POST['txtperm10'];
$qty1 = $_POST['qty1'];
$qty2 = $_POST['qty2'];
$qty3 = $_POST['qty3'];
$qty4 = $_POST['qty4'];
$qty5 = $_POST['qty5'];
$qty6 = $_POST['qty6'];
$qty7 = $_POST['qty7'];
$qty8 = $_POST['qty8'];
$qty9 = $_POST['qty9'];
$qty10 = $_POST['qty10'];
$sat1 = $_POST['sat1'];
$sat2 = $_POST['sat2'];
$sat3 = $_POST['sat3'];
$sat4 = $_POST['sat4'];
$sat5 = $_POST['sat5'];
$sat6 = $_POST['sat6'];
$sat7 = $_POST['sat7'];
$sat8 = $_POST['sat8'];
$sat9 = $_POST['sat9'];
$sat10 = $_POST['sat10'];
$sn1 = $_POST['sn1'];
$sn2 = $_POST['sn2'];
$sn3 = $_POST['sn3'];
$sn4 = $_POST['sn4'];
$sn5 = $_POST['sn5'];
$sn6 = $_POST['sn6'];
$sn7 = $_POST['sn7'];
$sn8 = $_POST['sn8'];
$sn9 = $_POST['sn9'];
$sn10 = $_POST['sn10'];

$setuju = isset($_POST['setuju']) ?  $_POST['setuju'] : 0;

// GAMBAR 1

if(isset($_FILES['gambar_1'])) {
  $target_dir = "gambar_rqs/mekanik/permintaan_1/";
  $name = '';
  $name = substr(str_shuffle(MD5(microtime())), 0, 12).'-'.$_FILES['gambar_1']['name'];
  $target_file = '../'.$target_dir . basename($name);

  //memilih tipe file
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // tipe file yang di perbolehkan

  $extensions_arr = array("jpg","jpeg","png","pdf","gif");

  // upload file
  if( in_array($imageFileType,$extensions_arr)){
  move_uploaded_file($_FILES['gambar_1']['tmp_name'],'../'.$target_dir.$name);
  }


$gbr_1 = $target_dir.$name;

}else{
  $gbr_1 = " ";
}

// GAMBAR 2

if(isset($_FILES['gambar_2'])) {
  $target_dir = "gambar_rqs/mekanik/permintaan_2/";
  $name = '';
  $name = substr(str_shuffle(MD5(microtime())), 0, 12).'-'.$_FILES['gambar_2']['name'];
  $target_file = '../'.$target_dir . basename($name);

  //memilih tipe file
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // tipe file yang di perbolehkan

  $extensions_arr = array("jpg","jpeg","png","pdf","gif");

  // upload file
  if( in_array($imageFileType,$extensions_arr)){
  move_uploaded_file($_FILES['gambar_2']['tmp_name'],'../'.$target_dir.$name);
  }


$gbr_2 = $target_dir.$name;

}else{
  $gbr_2 = " ";
}

// GAMBAR 3

if(isset($_FILES['gambar_3'])) {
  $target_dir = "gambar_rqs/mekanik/permintaan_3/";
  $name = '';
  $name = substr(str_shuffle(MD5(microtime())), 0, 12).'-'.$_FILES['gambar_3']['name'];
  $target_file = '../'.$target_dir . basename($name);

  //memilih tipe file
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // tipe file yang di perbolehkan

  $extensions_arr = array("jpg","jpeg","png","pdf","gif");

  // upload file
  if( in_array($imageFileType,$extensions_arr)){
  move_uploaded_file($_FILES['gambar_3']['tmp_name'],'../'.$target_dir.$name);
  }


$gbr_3 = $target_dir.$name;

}else{
  $gbr_3= " ";
}

// GAMBAR 4

if(isset($_FILES['gambar_4'])) {
  $target_dir = "gambar_rqs/mekanik/permintaan_4/";
  $name = '';
  $name = substr(str_shuffle(MD5(microtime())), 0, 12).'-'.$_FILES['gambar_4']['name'];
  $target_file = '../'.$target_dir . basename($name);

  //memilih tipe file
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // tipe file yang di perbolehkan

  $extensions_arr = array("jpg","jpeg","png","pdf","gif");

  // upload file
  if( in_array($imageFileType,$extensions_arr)){
  move_uploaded_file($_FILES['gambar_4']['tmp_name'],'../'.$target_dir.$name);
  }


$gbr_4 = $target_dir.$name;

}else{
  $gbr_4 = " ";
}


// GAMBAR 5

if(isset($_FILES['gambar_5'])) {
  $target_dir = "gambar_rqs/mekanik/permintaan_5/";
  $name = '';
  $name = substr(str_shuffle(MD5(microtime())), 0, 12).'-'.$_FILES['gambar_5']['name'];
  $target_file = '../'.$target_dir . basename($name);

  //memilih tipe file
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // tipe file yang di perbolehkan

  $extensions_arr = array("jpg","jpeg","png","pdf","gif");

  // upload file
  if( in_array($imageFileType,$extensions_arr)){
  move_uploaded_file($_FILES['gambar_5']['tmp_name'],'../'.$target_dir.$name);
  }


$gbr_5 = $target_dir.$name;

}else{
  $gbr_5 = " ";
}

// GAMBAR 6

if(isset($_FILES['gambar_6'])) {
  $target_dir = "gambar_rqs/mekanik/permintaan_6/";
  $name = '';
  $name = substr(str_shuffle(MD5(microtime())), 0, 12).'-'.$_FILES['gambar_6']['name'];
  $target_file = '../'.$target_dir . basename($name);

  //memilih tipe file
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // tipe file yang di perbolehkan

  $extensions_arr = array("jpg","jpeg","png","pdf","gif");

  // upload file
  if( in_array($imageFileType,$extensions_arr)){
  move_uploaded_file($_FILES['gambar_6']['tmp_name'],'../'.$target_dir.$name);
  }


$gbr_6 = $target_dir.$name;

}else{
  $gbr_6 = " ";
}

// GAMBAR 7

if(isset($_FILES['gambar_7'])) {
  $target_dir = "gambar_rqs/mekanik/permintaan_7/";
  $name = '';
  $name = substr(str_shuffle(MD5(microtime())), 0, 12).'-'.$_FILES['gambar_7']['name'];
  $target_file = '../'.$target_dir . basename($name);

  //memilih tipe file
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // tipe file yang di perbolehkan

  $extensions_arr = array("jpg","jpeg","png","pdf","gif");

  // upload file
  if( in_array($imageFileType,$extensions_arr)){
  move_uploaded_file($_FILES['gambar_7']['tmp_name'],'../'.$target_dir.$name);
  }


$gbr_7 = $target_dir.$name;

}else{
  $gbr_7 = " ";
}

// GAMBAR 8

if(isset($_FILES['gambar_8'])) {
  $target_dir = "gambar_rqs/mekanik/permintaan_8/";
  $name = '';
  $name = substr(str_shuffle(MD5(microtime())), 0, 12).'-'.$_FILES['gambar_8']['name'];
  $target_file = '../'.$target_dir . basename($name);

  //memilih tipe file
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // tipe file yang di perbolehkan

  $extensions_arr = array("jpg","jpeg","png","pdf","gif");

  // upload file
  if( in_array($imageFileType,$extensions_arr)){
  move_uploaded_file($_FILES['gambar_8']['tmp_name'],'../'.$target_dir.$name);
  }


$gbr_8 = $target_dir.$name;

}else{
  $gbr_8 = " ";
}

// GAMBAR 9

if(isset($_FILES['gambar_9'])) {
  $target_dir = "gambar_rqs/mekanik/permintaan_9/";
  $name = '';
  $name = substr(str_shuffle(MD5(microtime())), 0, 12).'-'.$_FILES['gambar_9']['name'];
  $target_file = '../'.$target_dir . basename($name);

  //memilih tipe file
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // tipe file yang di perbolehkan

  $extensions_arr = array("jpg","jpeg","png","pdf","gif");

  // upload file
  if( in_array($imageFileType,$extensions_arr)){
  move_uploaded_file($_FILES['gambar_9']['tmp_name'],'../'.$target_dir.$name);
  }


$gbr_9 = $target_dir.$name;

}else{
  $gbr_9 = " ";
}

// GAMBAR 10

if(isset($_FILES['gambar_10'])) {
  $target_dir = "gambar_rqs/mekanik/permintaan_10/";
  $name = '';
  $name = substr(str_shuffle(MD5(microtime())), 0, 12).'-'.$_FILES['gambar_10']['name'];
  $target_file = '../'.$target_dir . basename($name);

  //memilih tipe file
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // tipe file yang di perbolehkan

  $extensions_arr = array("jpg","jpeg","png","pdf","gif");

  // upload file
  if( in_array($imageFileType,$extensions_arr)){
  move_uploaded_file($_FILES['gambar_10']['tmp_name'],'../'.$target_dir.$name);
  }


$gbr_10 = $target_dir.$name;

}else{
  $gbr_10 = " ";
}


// database insert SQL code
$sql = "INSERT INTO `rqs_form`( `id_rqs`,`nama`,`id_login`,`tanggal`, `merk`, `tipe`, `unit`, `serial_number`, `permintaan_1`,`sn_permintaan_1` ,`qty_1`,`satuan_1`,`gambar_1`,`permintaan_2`,`sn_permintaan_2` ,`qty_2`,`satuan_2`,`gambar_2`,`permintaan_3`,`sn_permintaan_3` ,`qty_3`,`satuan_3`,`gambar_3`,`permintaan_4`,`sn_permintaan_4` ,`qty_4`,`satuan_4`,`gambar_4`,`permintaan_5`,`sn_permintaan_5` ,`qty_5`,`satuan_5`,`gambar_5`,`permintaan_6`,`sn_permintaan_6` ,`qty_6`,`satuan_6`,`gambar_6`,`permintaan_7`,`sn_permintaan_7` ,`qty_7`,`satuan_7`,`gambar_7`,`permintaan_8`,`sn_permintaan_8` ,`qty_8`,`satuan_8`,`gambar_8`,`permintaan_9`,`sn_permintaan_9` ,`qty_9`,`satuan_9`,`gambar_9`,`permintaan_10`,`sn_permintaan_10` ,`qty_10`,`satuan_10`,`gambar_10`, `status`, `validasi`) VALUES ('$norqs','$nama','$id_login','$tanggal','$txtmerk','$txttipe','$txtunit','$txtserialnumber','$txtperm1','$sn1','$qty1','$sat1','$gbr_1','$txtperm2','$sn2','$qty2','$sat2','$gbr_2','$txtperm3','$sn3','$qty3','$sat3','$gbr_3','$txtperm4','$sn4','$qty4','$sat4','$gbr_4','$txtperm5','$sn5','$qty5','$sat5','$gbr_5','$txtperm6','$sn6','$qty6','$sat6','$gbr_6','$txtperm7','$sn7','$qty7','$sat7','$gbr_7','$txtperm8','$sn8','$qty8','$sat8','$gbr_8','$txtperm9','$sn9','$qty9','$sat9','$gbr_9','$txtperm10','$sn10','$qty10','$sat10','$gbr_10','DIAJUKAN', '".$setuju."')";

// insert in database 
$rs = mysqli_query($con, $sql);

if($rs)
{
	header('Location: ../mechanic/admin.php');
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