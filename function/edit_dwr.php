<?php
    include "../db/koneksi.php";
    session_start();
    if (isset($_SESSION['level'])){
    if($_SESSION['level'] == "mekanik") {
        $id_dwr = $_POST['id_dwr'];
        $unit = $_POST['unit'];
        $tipe = $_POST['tipe'];
        $merk = $_POST['merk'];
        $serial_number = $_POST['serial_number'];
        $txtpekerjaan_1 = $_POST['txtpekerjaan_1'];
        $txtpekerjaan_2 = $_POST['txtpekerjaan_2'];
        $txtpekerjaan_3 = $_POST['txtpekerjaan_3'];
        $txtpekerjaan_4 = $_POST['txtpekerjaan_4'];
        $txtpekerjaan_5 = $_POST['txtpekerjaan_5'];
        $gambarlama = $_POST['gambarlama'];
        
        $gambar = $gambarlama;

        if(isset($_FILES['gambar_baru'])) {
            if( $_FILES['gambar_baru']['size'] > 0 && 
                          $_FILES['gambar_baru']['size'] < 2000000
                      ){
            $target_dir = "gambar_dwr/gambar_1/";
            $name = '';
            $name = substr(str_shuffle(MD5(microtime())), 0, 12).'-'.$_FILES['gambar_baru']['name'];
            $target_file = '../'.$target_dir . basename($name);
          
            //memilih tipe file
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
          
            // tipe file yang di perbolehkan
          
            $extensions_arr = array("jpg","jpeg","png","pdf","gif");
          
            // upload file
            if( in_array($imageFileType,$extensions_arr)){
            move_uploaded_file($_FILES['gambar_baru']['tmp_name'],'../'.$target_dir.$name);
            }
          
          
          $gambar = $target_dir.$name;
          
            }
          }

          $gambarlama2 = $_POST['gambarlama2'];
        $gambar2 = $gambarlama2;

        if(isset($_FILES['gambar_baru_2'])) {
            if( $_FILES['gambar_baru_2']['size'] > 0 && 
                          $_FILES['gambar_baru_2']['size'] < 2000000
                      ){
            $target_dir = "gambar_dwr/gambar_2/";
            $name = '';
            $name = substr(str_shuffle(MD5(microtime())), 0, 12).'-'.$_FILES['gambar_baru_2']['name'];
            $target_file = '../'.$target_dir . basename($name);
          
            //memilih tipe file
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
          
            // tipe file yang di perbolehkan
          
            $extensions_arr = array("jpg","jpeg","png","pdf","gif");
          
            // upload file
            if( in_array($imageFileType,$extensions_arr)){
            move_uploaded_file($_FILES['gambar_baru_2']['tmp_name'],'../'.$target_dir.$name);
            }
          
          
          $gambar2 = $target_dir.$name;
          
            }
          }

          $gambarlama3 = $_POST['gambarlama3'];
        $gambar3 = $gambarlama3;

        if(isset($_FILES['gambar_baru_3'])) {
            if( $_FILES['gambar_baru_3']['size'] > 0 && 
                          $_FILES['gambar_baru_3']['size'] < 2000000
                      ){
            $target_dir = "gambar_dwr/gambar_3/";
            $name = '';
            $name = substr(str_shuffle(MD5(microtime())), 0, 12).'-'.$_FILES['gambar_baru_3']['name'];
            $target_file = '../'.$target_dir . basename($name);
          
            //memilih tipe file
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
          
            // tipe file yang di perbolehkan
          
            $extensions_arr = array("jpg","jpeg","png","pdf","gif");
          
            // upload file
            if( in_array($imageFileType,$extensions_arr)){
            move_uploaded_file($_FILES['gambar_baru_3']['tmp_name'],'../'.$target_dir.$name);
            }
          
          
          $gambar3 = $target_dir.$name;
          
            }
          }



          $gambarlama4 = $_POST['gambarlama4'];
        $gambar4 = $gambarlama4;

        if(isset($_FILES['gambar_baru_4'])) {
            if( $_FILES['gambar_baru_4']['size'] > 0 && 
                          $_FILES['gambar_baru_4']['size'] < 2000000
                      ){
            $target_dir = "gambar_dwr/gambar_4/";
            $name = '';
            $name = substr(str_shuffle(MD5(microtime())), 0, 12).'-'.$_FILES['gambar_baru_4']['name'];
            $target_file = '../'.$target_dir . basename($name);
          
            //memilih tipe file
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
          
            // tipe file yang di perbolehkan
          
            $extensions_arr = array("jpg","jpeg","png","pdf","gif");
          
            // upload file
            if( in_array($imageFileType,$extensions_arr)){
            move_uploaded_file($_FILES['gambar_baru_4']['tmp_name'],'../'.$target_dir.$name);
            }
          
          
          $gambar4 = $target_dir.$name;
          
            }
          }

          $gambarlama5 = $_POST['gambarlama5'];
        $gambar5 = $gambarlama5;

        if(isset($_FILES['gambar_baru_5'])) {
            if( $_FILES['gambar_baru_5']['size'] > 0 && 
                          $_FILES['gambar_baru_5']['size'] < 2000000
                      ){
            $target_dir = "gambar_dwr/gambar_5/";
            $name = '';
            $name = substr(str_shuffle(MD5(microtime())), 0, 12).'-'.$_FILES['gambar_baru_5']['name'];
            $target_file = '../'.$target_dir . basename($name);
          
            //memilih tipe file
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
          
            // tipe file yang di perbolehkan
          
            $extensions_arr = array("jpg","jpeg","png","pdf","gif");
          
            // upload file
            if( in_array($imageFileType,$extensions_arr)){
            move_uploaded_file($_FILES['gambar_baru_5']['tmp_name'],'../'.$target_dir.$name);
            }
          
          
          $gambar5 = $target_dir.$name;
          
            }
          }



          $sql = "UPDATE `dwr_form` SET `unit` = '$unit', `tipe` = '$tipe', `merk` = '$merk', `serial_number` = '$serial_number', `laporan_kerja_1` = '$txtpekerjaan_1', `laporan_kerja_2` = '$txtpekerjaan_2', `laporan_kerja_3` = '$txtpekerjaan_3', `laporan_kerja_4` = '$txtpekerjaan_4', `laporan_kerja_5` = '$txtpekerjaan_5', `gambar` = '$gambar', `gambar_2` = '$gambar2', `gambar_3` = '$gambar3', `gambar_4` = '$gambar4', `gambar_5` = '$gambar5' WHERE `id_dwr` = '$id_dwr'";


          mysqli_query($conn, $sql);
          mysqli_close($conn);

          header('Location: ../mechanic/dwr.php');
    
        }
    };

?>