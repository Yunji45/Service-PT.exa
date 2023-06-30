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
  <style>
      input{
          text-transform : uppercase;
      }

  </style>
  <body>
      <?php
        
        $sql = "SELECT dwr_form.id_dwr, login.id_login, dwr_form.nama, dwr_form.id_login, dwr_form.tanggal, dwr_form.jam_masuk, dwr_form.jam_pulang, dwr_form.unit, dwr_form.merk, dwr_form.tipe, dwr_form.serial_number, dwr_form.laporan_kerja_1, dwr_form.laporan_kerja_2, dwr_form.laporan_kerja_3, dwr_form.laporan_kerja_4, dwr_form.laporan_kerja_5, dwr_form.gambar, dwr_form.gambar_2, dwr_form.gambar_3, dwr_form.gambar_4, dwr_form.gambar_5, dwr_form.status FROM dwr_form INNER JOIN login ON dwr_form.id_login = login.id_login WHERE dwr_form.id_dwr = '".$_GET['id_dwr']."'";
        
                  
        $result =$conn-> query($sql);
           if($result->num_rows > 0){
             while($row = $result->fetch_assoc()){
      ?>
    <div class="container">
        <div class="judul col-md-3 bg-dark text-white mt-2">
          <h3>UBAH DWR</h3>
        </div>
        
        <form method="post" action="../function/edit_dwr.php" enctype="multipart/form-data">
        
        <div class="form-group row">
              <label for="" class="col-sm-2 col-form-label">ID DWR :</label>
              <div class="col-sm-2">
              <input type="text" class="form-control"
              value="<?php echo $row['id_dwr']?>"  name="id_dwr"readonly/>
              </div>
        </div>

        <div class="form-group row">
              <label for="" class="col-sm-2 col-form-label">Tanggal :</label>
              <div class="col-sm-2">
              <input type="text" class="form-control"
              value="<?php echo $row['tanggal']?>"  readonly/>
              </div>
        </div>
        
        <div class="form-group row">
              <label for="" class="col-sm-2 col-form-label">Jam Masuk :</label>
              <div class="col-sm-2">
              <input type="text" class="form-control"
              value="<?php echo date('H:i',strtotime($row['jam_masuk']));?>"  readonly/>
              </div>
        </div>

        <div class="form-group row">
              <label for="" class="col-sm-2 col-form-label">Jam Pulang :</label>
              <div class="col-sm-2">
              <input type="text" class="form-control"
              value="<?php echo date('H:i',strtotime($row['jam_pulang']));?>" readonly/>
              </div>
        </div>

        <div class="form-group row">
              <label for="" class="col-sm-2 col-form-label">Unit :</label>
              <div class="col-sm-2">
              <input type="text" class="form-control" value="<?php echo $row['unit']?>" name="unit"/>
              </div>
        </div>

        <div class="form-group row">
              <label for="" class="col-sm-2 col-form-label">Merk :</label>
              <div class="col-sm-2">
              <input type="text" class="form-control" value="<?php echo $row['merk']?>" name="merk"/>
              </div>
        </div>

        <div class="form-group row">
              <label for="" class="col-sm-2 col-form-label">Tipe :</label>
              <div class="col-sm-2">
              <input type="text" class="form-control" value="<?php echo $row['tipe']?>" name="tipe"/>
              </div>
        </div>

        <div class="form-group row">
              <label for="" class="col-sm-2 col-form-label">Serial Number :</label>
              <div class="col-sm-2">
              <input type="text" class="form-control" value="<?php echo $row['serial_number']?>" name="serial_number"/>
              </div>
        </div>

        <div class="form-group row">
              <label for="" class="col-sm-2 col-form-label">Deskripsi Pekerjaan 1:</label>
              <div class="col-sm-6">
              <input type="text" class="form-control" value="<?php echo $row['laporan_kerja_1']?>" name="txtpekerjaan_1"/>
              </div>
        </div>
        
        <div class="form-group row">
              <label for="" class="col-sm-2 col-form-label">Deskripsi Pekerjaan 2:</label>
              <div class="col-sm-6">
              <input type="text" class="form-control" value="<?php echo $row['laporan_kerja_2']?>" name="txtpekerjaan_2"/>
              </div>
        </div>

        <div class="form-group row">
              <label for="" class="col-sm-2 col-form-label">Deskripsi Pekerjaan 3:</label>
              <div class="col-sm-6">
              <input type="text" class="form-control" value="<?php echo $row['laporan_kerja_3']?>" name="txtpekerjaan_3"/>
              </div>
        </div>

        <div class="form-group row">
              <label for="" class="col-sm-2 col-form-label">Deskripsi Pekerjaan 4:</label>
              <div class="col-sm-6">
              <input type="text" class="form-control" value="<?php echo $row['laporan_kerja_4']?>" name="txtpekerjaan_4"/>
              </div>
        </div>

        <div class="form-group row">
              <label for="" class="col-sm-2 col-form-label">Deskripsi Pekerjaan 5:</label>
              <div class="col-sm-6">
              <input type="text" class="form-control" value="<?php echo $row['laporan_kerja_5']?>" name="txtpekerjaan_5"/>
              </div>
        </div>

        <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label ">Upload Gambar 1:</label>
                <input type="text" class="form-control col-sm-2" name="gambarlama" value="<?php echo $row['gambar'];?>" hidden>
                <img src="<?php echo "../".$row['gambar']?>" alt="" style="width : 40px;">
                <div class="form-control-sm">
                <input type="file" class="form-control-file" id="gambar_1" name="gambar_baru"/>
                </div>
            </div>

            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label ">Upload Gambar 2:</label>
                <input type="text" class="form-control col-sm-2" name="gambarlama2" value="<?php echo $row['gambar_2'];?>" hidden>
                <img src="<?php echo "../".$row['gambar_2']?>" alt="" style="width : 40px;">
                <div class="form-control-sm">
                <input type="file" class="form-control-file" id="gambar_2" name="gambar_baru_2"/>
                </div>
            </div>
            
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label ">Upload Gambar 3:</label>
                <input type="text" class="form-control col-sm-2" name="gambarlama3" value="<?php echo $row['gambar_3'];?>" hidden>
                <img src="<?php echo "../".$row['gambar_3']?>" alt="" style="width : 40px;">
                <div class="form-control-sm">
                <input type="file" class="form-control-file" id="gambar_3" name="gambar_baru_3"/>
                </div>
            </div>

            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label ">Upload Gambar 4:</label>
                <input type="text" class="form-control col-sm-2" name="gambarlama4" value="<?php echo $row['gambar_4'];?>" hidden>
                <img src="<?php echo "../".$row['gambar_4']?>" alt="" style="width : 40px;">
                <div class="form-control-sm">
                <input type="file" class="form-control-file" id="gambar_4" name="gambar_baru_4"/>
                </div>
            </div>

            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label ">Upload Gambar 5:</label>
                <input type="text" class="form-control col-sm-2" name="gambarlama5" value="<?php echo $row['gambar_5'];?>" hidden>
                <img src="<?php echo "../".$row['gambar_5']?>" alt="" style="width : 40px;">
                <div class="form-control-sm">
                <input type="file" class="form-control-file" id="gambar_5" name="gambar_baru_5"/>
                </div>
            </div>
        <div class="form-check">
            <input type="checkbox" value="MEKANIK SETUJU" name="setuju" required>
                <label class="form-check-label" for="defaultCheck1">
                  Laporan Pekerjaan ini saya buat dengan sebenar-benarnya, dan saya bertanggung jawab penuh akan laporan ini.
                </label>
        </div>
        <button class="btn btn-primary mt-2" onclick="return confirm('Apakah anda yakin ingin mengubahnya?')" type="submit">Submit</button>
        <button class="btn btn-warning mt-2" type="reset">Reset</button>
        <a href="dwr.php" class="btn btn-danger mt-2">Cancel</a>
        <?php
             }
            };
        ?>
       </form>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="../js/jquery-3.5.1.slim.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script>
        var gambar1 = document.getElementById("gambar_1");

        gambar1.onchange = function() {
            if(this.files[0].size > 2000000){
                alert("File Terlalu Besar!");
                this.value = "";
            };
        };

        var gambar2 = document.getElementById("gambar_2");

        gambar2.onchange = function() {
            if(this.files[0].size > 2000000){
                alert("File Terlalu Besar!");
                this.value = "";
            };
        };

        var gambar3 = document.getElementById("gambar_3");

        gambar3.onchange = function() {
            if(this.files[0].size > 2000000){
                alert("File Terlalu Besar!");
                this.value = "";
            };
        };

        var gambar4 = document.getElementById("gambar_4");

        gambar4.onchange = function() {
            if(this.files[0].size > 2000000){
                alert("File Terlalu Besar!");
                this.value = "";
            };
        };

        var gambar5 = document.getElementById("gambar_5");

        gambar5.onchange = function() {
            if(this.files[0].size > 2000000){
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