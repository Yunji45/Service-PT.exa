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
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../style.css">

    <title>Exxa Admin System</title>
  </head>
  <style>
      input{
          text-transform : uppercase;
      }
  </style>
  
  <body>
    
    <div class="container">
        <div class="row mt-2 bg-danger justify-content-center">
            <h3 style="color:white;">LAPORAN PEKERJAAN HARIAN</h3>
        </div>

        <form action="../function/input_dwr.php" method="POST" enctype='multipart/form-data' class="bg-light">

            <div class="form-group row mt-2">
                <label for="" class="col-sm-2 col-form-label">Nama :</label>
                <div class="col-sm-2">
                    <?php
                    if (isset($_SESSION['nama'])){
                        ?>
                <input type="text" readonly class="form-control-plaintext" id="staticEmail" name="nama" value="<?php
                    echo $_SESSION['nama'];?>">
                <?php
                    }else{
                ?>
                <label> asd</label>
                <?php
                    };
                ?>
                <?php
                    if (isset($_SESSION['id_login'])){
                ?>
                <input type="text" readonly class="form-control-plaintext"   value="<?php echo $_SESSION['id_login'];?>" name="id_login" hidden>
                <?php
                    }else{
                ?>
                <label> asd </label>
                <?php
                    };
                ?>
                </div>
            </div>

            <div class="form-group row">
                <?php
                    $sql = "SELECT max(id_dwr) as kodeTerbesar FROM dwr_form";
                    $result =$conn-> query($sql);
                    if($result->num_rows > 0){
                        
                      while($row = $result->fetch_assoc()){
                        $kodeDwr = $row['kodeTerbesar'];
                        $urutan = (int) substr($kodeDwr, 5, 5);
                        $urutan++;
                    
                ?>
                <label for="" class="col-sm-2 col-form-label">No. DWR :</label>
                <div class="col-sm-2">
                    <input type="text" readonly class="form-control-plaintext" value="<?php $huruf = "DWR";
                    $kodeDwr = $huruf . sprintf("%05s", $urutan);
                    echo $kodeDwr;}}?>" name="nodwr">
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Tanggal :</label>
                <div class="col-sm-2">
                <input type="text" class="form-control form-control-sm"
                value="<?php echo date('Y-m-d');?>" name="tanggal"readonly/>
                </div>
            </div>
            <div class="form-group row">
              <label for="" class="col-sm-2 col-form-label">Jam Masuk :</label>
              <div class="col-sm-2">
                <input type="text" class="form-control" value="<?php  $d=mktime(8, 30);
                echo date("H:i", $d);?>" readonly name="jam_masuk"/>
              </div>
             </div>
             <div class="form-group row">
              <label for="" class="col-sm-2 col-form-label">Jam Pulang:</label>
              <div class="col-sm-2">
                <input type="text" class="form-control" value="<?php  $d=mktime(17, 0);
                echo date("G:i", $d);?>" readonly name="jam_pulang"/>
              </div>
             </div>
             <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Unit :</label>
                <div class="col-sm-2">
                <input type="text" class="form-control form-control-sm" name="txtunit">
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Merk :</label>
                <div class="col-sm-2">
                <input type="text" class="form-control form-control-sm" name="txtmerk">
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Tipe :</label>
                <div class="col-sm-2">
                <input type="text" class="form-control form-control-sm" name="txttipe">
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Serial Number :</label>
                <div class="col-sm-2">
                <input type="text" class="form-control form-control-sm" name="txtserialnumber">
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Deskripsi Pekerjaan 1 :</label>
                <div class="col-sm-6">
                <input type="text" class="form-control form-control-sm" name="txtpekerjaan_1">
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Deskripsi Pekerjaan 2 :</label>
                <div class="col-sm-6">
                <input type="text" class="form-control form-control-sm" name="txtpekerjaan_2">
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Deskripsi Pekerjaan 3 :</label>
                <div class="col-sm-6">
                <input type="text" class="form-control form-control-sm" name="txtpekerjaan_3">
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Deskripsi Pekerjaan 4 :</label>
                <div class="col-sm-6">
                <input type="text" class="form-control form-control-sm" name="txtpekerjaan_4">
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Deskripsi Pekerjaan 5 :</label>
                <div class="col-sm-6">
                <input type="text" class="form-control form-control-sm" name="txtpekerjaan_5">
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label ">Upload Gambar Pekerjaan 1:</label>
                <div class="form-control-sm">
                <input type="file" class="form-control-file " id="gambar1" name="gambar">
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label ">Upload Gambar Pekerjaan 2:</label>
                <div class="form-control-sm">
                <input type="file" class="form-control-file " id="gambar2" name="gambar2">
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label ">Upload Gambar Pekerjaan 3:</label>
                <div class="form-control-sm">
                <input type="file" class="form-control-file " id="gambar3" name="gambar3">
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label ">Upload Gambar Pekerjaan 4:</label>
                <div class="form-control-sm">
                <input type="file" class="form-control-file " id="gambar4" name="gambar4">
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label ">Upload Gambar Pekerjaan 5:</label>
                <div class="form-control-sm">
                <input type="file" class="form-control-file " id="gambar5" name="gambar5">
                </div>
            </div>
            
            <div class="form-check">
            <input type="checkbox" value="SETUJU" name="setuju" required>
                <label class="form-check-label" for="defaultCheck1">
                  Laporan Pekerjaan ini saya buat dengan sebenar-benarnya, dan saya bertanggung jawab penuh akan laporan ini.
                </label>
            </div>
                <button class="btn btn-primary mt-2" type="submit">Submit</button>
                <button class="btn btn-warning mt-2" type="reset">Reset</button>
                <a href="dwr.php" class="btn btn-danger mt-2">Cancel</a>

        </form>

    </div>

    
      

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="../js/jquery-3.5.1.slim.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script>
        var gambar1 = document.getElementById("gambar1");

        gambar1.onchange = function() {
            if(this.files[0].size > 5000000){
                alert("File Terlalu Besar!");
                this.value = "";
            };
        };

        var gambar2 = document.getElementById("gambar2");

        gambar2.onchange = function() {
            if(this.files[0].size > 5000000){
                alert("File Terlalu Besar!");
                this.value = "";
            };
        };

        var gambar3 = document.getElementById("gambar3");

        gambar3.onchange = function() {
            if(this.files[0].size > 5000000){
                alert("File Terlalu Besar!");
                this.value = "";
            };
        };

        var gambar4 = document.getElementById("gambar4");

        gambar4.onchange = function() {
            if(this.files[0].size > 5000000){
                alert("File Terlalu Besar!");
                this.value = "";
            };
        };

        var gambar5 = document.getElementById("gambar5");

        gambar5.onchange = function() {
            if(this.files[0].size > 5000000){
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
    <script src="../js/jquery-3.5.1.slim.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    -->
  </body>
</html>

<?php
  };
?>