<?php
     include '../db/koneksi.php';
     session_start();
     if (isset($_SESSION['level'])){
       if($_SESSION['level'] == "mekanik") {
    
    $no_srv = $_POST['nosrv'];
    $nama = $_POST['nama'];
    $id_login = $_POST['id_login'];
    $tgl_srv = $_POST['tgl_srv'];
    $txtunit = $_POST['txtunit'];
    $txtmerk = $_POST['txtmerk'];
    $txtmodel = $_POST['txtmodel'];
    $txtserialnumber = $_POST['txtserialnumber'];
    $txt_hour = $_POST['txt_hour'];
    $txt_oli = $_POST['txt_oli'];
    $txt_hyd = $_POST['txt_hyd'];
    $txt_trans = $_POST['txt_trans'];
    $txt_dif = $_POST['txt_dif'];
    $txt_solar = $_POST['txt_solar'];
    $txt_flt_oli = $_POST['filteroli'];
    $txt_flt_udara = $_POST['filterudara'];
    $txt_flt_solar = $_POST['filtersolar'];
    $validasi = $_POST['setuju'];
    $txt_notes = $_POST['txt_notes'];

    $gbr = '';
    // upload gambar 
    if(isset($_FILES['gambar'])) {
      if( $_FILES['gambar']['size'] > 0 && 
                    $_FILES['gambar']['size'] < 5000000
                ){
      $target_dir = "gambar_srv/";
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


    $sql = "INSERT INTO `service_form`(`id_service`, `id_login`, `nama`, `tgl_service`, `jenis_service`, `merk_service`, `model_service`, `sn_service`, `hour_meter`, `jml_oli_msn`, `jml_oli_hyd`,`jml_oli_trans` , `jml_oli_dif`, `jml_solar`, `flt_oli` , `flt_solar`, `flt_udara`, `notes`, `gambar`,`status_service`) VALUES ('$no_srv','$id_login','$nama','$tgl_srv', '$txtunit' ,'$txtmerk','$txtmodel','$txtserialnumber', '$txt_hour', '$txt_oli', '$txt_hyd', '$txt_trans', '$txt_dif','$txt_solar', '$txt_flt_oli', '$txt_flt_solar', '$txt_flt_udara', '$txt_notes', '$gbr', '$validasi')";
      
    $rs = mysqli_query($conn, $sql);
    
    if($rs)
    {
	header('Location: ../mechanic/service.php');
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