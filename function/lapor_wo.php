<?php
     include "../db/koneksi.php";
     session_start();
     if (isset($_SESSION['level'])){
     if($_SESSION['level'] == "mekanik") {
         $id_wo = $_POST['id_wo'];
         $tanggal_selesai = $_POST['tanggal_selesai'];
         $jam_selesai = $_POST['jam_selesai'];
         $notes_1 = $_POST['notes_1'];
         $notes_2 = $_POST['notes_2'];
         $notes_3 = $_POST['notes_3'];
         $notes_4 = $_POST['notes_4'];
         $notes_5 = $_POST['notes_5'];
         $setuju = $_POST['setuju'];
         $status = "DONE";

        

        
         
         if(isset($_FILES['gambar_1'])) {
            
            if( $_FILES['gambar_1']['size'] > 0 && 
                $_FILES['gambar_1']['size'] < 500000
            ){

                $target_dir = "gambar_wo/gambar_1/";
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
            }
        }

        if(isset($_FILES['gambar_2'])) {
            
          if( $_FILES['gambar_2']['size'] > 0 && 
              $_FILES['gambar_2']['size'] < 500000
          ){

              $target_dir = "gambar_wo/gambar_2/";
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
          }
      }

      if(isset($_FILES['gambar_3'])) {
            
        if( $_FILES['gambar_3']['size'] > 0 && 
            $_FILES['gambar_3']['size'] < 500000
        ){

            $target_dir = "gambar_wo/gambar_3/";
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
        }
    }

        if(isset($_FILES['gambar_4'])) {
                
          if( $_FILES['gambar_4']['size'] > 0 && 
              $_FILES['gambar_4']['size'] < 500000
          ){

              $target_dir = "gambar_wo/gambar_4/";
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
          }
      }

      if(isset($_FILES['gambar_5'])) {
                
        if( $_FILES['gambar_5']['size'] > 0 && 
            $_FILES['gambar_5']['size'] < 500000
        ){

            $target_dir = "gambar_wo/gambar_5/";
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
        }
    }

         $sql = "UPDATE wo_form SET tanggal_selesai = '$tanggal_selesai',jam_selesai = '$jam_selesai', notes_1 = '$notes_1', notes_2 = '$notes_2', notes_3 = '$notes_3', notes_4 = '$notes_4', notes_5 = '$notes_5',checking = '$setuju', status = '$status' , gambar = '$gbr_1', gambar_2 = '$gbr_2', gambar_3 = '$gbr_3', gambar_4 = '$gbr_4', gambar_5 = '$gbr_5' WHERE id_wo = '$id_wo'";
        
         mysqli_query($conn, $sql);
        mysqli_close($conn);

    header('Location: ../mechanic/wo.php');
    }
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

    <title>orang batu</title>
  </head>
  <body>
    <div class="kotaknotif">
        <h3 class="txtnotif">NO ACCESS FOR YOU</h3>
        <a href="../index.php"><button class="btn btn-warning tblback" >Back</button></a>
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
?>