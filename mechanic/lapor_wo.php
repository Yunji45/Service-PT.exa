<?php
  include '../db/koneksi.php';
  session_start();
  if (isset($_SESSION['level'])){
    if($_SESSION['level'] == "mekanik") {
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
                  

                  $sql = "SELECT wo_form.id_wo, login.id_login, login.nama, wo_form.id_login, wo_form.tanggal_penugasan, wo_form.tanggal_selesai, wo_form.jam_penugasan, wo_form.jam_selesai, wo_form.customer, wo_form.merk, wo_form.tipe, wo_form.unit, wo_form.serial_number, wo_form.tugas_1, wo_form.tugas_2, wo_form.tugas_3, wo_form.tugas_4, wo_form.tugas_5, wo_form.notes_1, wo_form.notes_2, wo_form.notes_3, wo_form.notes_4, wo_form.notes_5, wo_form.gambar, wo_form.status FROM wo_form INNER JOIN login ON wo_form.id_login = login.id_login WHERE wo_form.id_wo = '".$_GET['id_wo']."'";
                  
                  $result =$conn-> query($sql);
                     if($result->num_rows > 0){
                       while($row = $result->fetch_assoc()){
       ?>
    <div class="container">
        <div class="judul col-md-3 bg-dark text-white mt-2">
          <h3>LAPOR WO</h3>
        </div>
    </div>
        <br>
    <div class="container">
        <form method="post" action="../function/lapor_wo.php" enctype="multipart/form-data">
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">ID WO :</label>
                <div class="col-sm-2">
                <input type="text" class="form-control" value="<?php echo $row['id_wo']?>" name="id_wo" readonly/>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Tanggal Penugasan :</label>
                <div class="col-sm-2">
                <input type="text" class="form-control" value="<?php echo $row['tanggal_penugasan']?>" readonly/>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Tanggal Selesai:</label>
                <div class="col-sm-2">
                <input type="text" class="form-control" value="<?php echo date('Y-m-d');?>" name="tanggal_selesai" readonly/>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Jam Selesai:</label>
                <div class="col-sm-2">
                <input type="text" class="form-control" value="<?php date_default_timezone_set('Asia/Jakarta'); echo date('H:i'); ?>" readonly name="jam_selesai"/>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Tugas 1:</label>
                <div class="col-sm-6">
                <input type="text" class="form-control" value="<?php echo $row['tugas_1'];?>" readonly />
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Notes Tugas 1:</label>
                <div class="col-sm-6">
                <input type="text" class="form-control" name="notes_1" required/>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Tugas 2:</label>
                <div class="col-sm-6">
                <input type="text" class="form-control" value="<?php echo $row['tugas_2'];?>" readonly />
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Notes Tugas 2:</label>
                <div class="col-sm-6">
                <input type="text" class="form-control" name="notes_2" required/>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Tugas 3:</label>
                <div class="col-sm-6">
                <input type="text" class="form-control" value="<?php echo $row['tugas_3'];?>" readonly />
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Notes Tugas 3:</label>
                <div class="col-sm-6">
                <input type="text" class="form-control" name="notes_3" required />
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Tugas 4:</label>
                <div class="col-sm-6">
                <input type="text" class="form-control" value="<?php echo $row['tugas_4'];?>" readonly />
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Notes Tugas 4:</label>
                <div class="col-sm-6">
                <input type="text" class="form-control" name="notes_4" required/>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Tugas 5:</label>
                <div class="col-sm-6">
                <input type="text" class="form-control" value="<?php echo $row['tugas_5'];?>" readonly />
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Notes Tugas 5:</label>
                <div class="col-sm-6">
                <input type="text" class="form-control" name="notes_5" required/>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label ">Upload Gambar Pekerjaan 1:</label>
                <div class="form-control-sm">
                <input type="file" class="form-control-file " id="gambar" name="gambar_1">
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label ">Upload Gambar Pekerjaan 2:</label>
                <div class="form-control-sm">
                <input type="file" class="form-control-file " id="gambar_2" name="gambar_2">
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label ">Upload Gambar Pekerjaan 3:</label>
                <div class="form-control-sm">
                <input type="file" class="form-control-file " id="gambar_3" name="gambar_3">
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label ">Upload Gambar Pekerjaan 4:</label>
                <div class="form-control-sm">
                <input type="file" class="form-control-file " id="gambar_4" name="gambar_4">
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label ">Upload Gambar Pekerjaan 5:</label>
                <div class="form-control-sm">
                <input type="file" class="form-control-file " id="gambar_5" name="gambar_5">
                </div>
            </div>
            <div class="form-check">
            <input type="checkbox" value="DONE" name='setuju' required>
                <label class="form-check-label" for="defaultCheck1">
                  Semua Work Order telah saya kerjakan dengan baik.
                </label>
            </div>
            
            <button class="btn btn-primary mt-2" type="submit" onclick="return confirm('Apakah anda yakin ingin melaporkan Pekerjaan?')">Submit</button>
            <button class="btn btn-warning mt-2" type="reset">Reset</button>
            <a href="wo.php" class="btn btn-danger mt-2">Cancel</a>
        
       <?php
                       };
                    };
       ?>
       </form>
       </div>
 

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script>
       var gambar = document.getElementById("gambar");

        gambar.onchange = function() {
            if(this.files[0].size > 512000){
                alert("File Terlalu Besar!");
                this.value = "";
            };
        };

        var gambar_2 = document.getElementById("gambar_2");

        gambar_2.onchange = function() {
            if(this.files[0].size > 512000){
                alert("File Terlalu Besar!");
                this.value = "";
            };
        };

        var gambar_3 = document.getElementById("gambar_3");

        gambar_3.onchange = function() {
            if(this.files[0].size > 512000){
                alert("File Terlalu Besar!");
                this.value = "";
            };
        };

        var gambar_4 = document.getElementById("gambar_4");

        gambar_4.onchange = function() {
            if(this.files[0].size > 512000){
                alert("File Terlalu Besar!");
                this.value = "";
            };
        };

        var gambar_5 = document.getElementById("gambar_5");

        gambar_5.onchange = function() {
            if(this.files[0].size > 512000){
                alert("File Terlalu Besar!");
                this.value = "";
            };
        };
    </script>

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