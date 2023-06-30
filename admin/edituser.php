<?php
  include '../db/koneksi.php';
  session_start();
  if (isset($_SESSION['level'])){
    if($_SESSION['level'] == "admin") {
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Exxa Admin System</title>
  </head>
  <body>
      <?php

        $sql = "SELECT login.nama, login.id_login, login.email, login.password, login.level FROM login WHERE login.id_login = '".$_GET['id_login']."'";
       
        
        $result =$conn-> query($sql);
        if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
      ?>
    <div class="container">
        <div class="row mt-2 bg-danger justify-content-center">
          <h3 style="color:white;">EDIT USER</h3>
        </div>
        
        <form method="post" action="../function/ubahpassword_admin.php" class="mt-2 bg-light">

        <div class="form-group row">
              <label for="" class="col-sm-2 col-form-label ml-1">Nama :</label>
              <div class="col-sm-2">
              <input type="text" class="form-control"
              value="<?php echo $row['nama'];?>" name="Nama" readonly/>
              </div>
        </div>
       
        <div class="form-group row" hidden>
              <label for="" class="col-sm-2 col-form-label ml-1">ID lOGIN :</label>
              <div class="col-sm-2">
              <input type="text" class="form-control"
              value="<?php echo $row['id_login'];?>" name="id_login" readonly/>
              </div>
        </div>

        <div class="form-group row">
              <label for="" class="col-sm-2 col-form-label  ml-1">Email :</label>
              <div class="col-sm-4">
              <input type="text" class="form-control"
              value="<?php echo $row['email'];?>" name="email" readonly/>
              </div>
        </div>
        
        <div class="form-group row" hidden>
              <label for="" class="col-sm-2 col-form-label  ml-1">Password lama :</label>
              <div class="col-sm-4">
              <input type="text" class="form-control"
              value="<?php echo $row['password'];?>" name="password_lama" readonly/>
              </div>
        </div>
        
        <div class="form-group row">
              <label for="" class="col-sm-2 col-form-label  ml-1">Password baru:</label>
              <div class="col-sm-4">
              <input type="password" class="form-control"
              value="" name="password_baru"/>
              </div>
        </div>

        <div class="form-group row">
              <label for="" class="col-sm-2 col-form-label  ml-1">Konfirmasi Password:</label>
              <div class="col-sm-4">
              <input type="password" class="form-control"
              value="" name="konf_password"/>
              </div>
        </div>
        

        <?php
        }
    };
        ?>

        
        <button class="btn btn-primary mt-2" type="submit">Submit</button>
        <button class="btn btn-warning mt-2" type="reset">Reset</button>
        <a href="admin.php" class="btn btn-danger mt-2">Cancel</a>
       </form>
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
  }else{
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