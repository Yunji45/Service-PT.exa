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
            <h3 style="color:white;">LAPORAN SERVICE UNIT</h3>
        </div>

        <form action="../function/input_srv.php" method="POST" enctype='multipart/form-data' class="bg-light">

            <div class="form-group row mt-2">
                <label for="" class="col-sm-3 col-form-label">Nama :</label>
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
                    $sql = "SELECT max(id_service) as kodeTerbesar FROM service_form";
                    $result =$conn-> query($sql);
                    if($result->num_rows > 0){
                        
                      while($row = $result->fetch_assoc()){
                        $kodeSrv = $row['kodeTerbesar'];
                        $urutan = (int) substr($kodeSrv, 5, 5);
                        $urutan++;
                    
                ?>
                <label for="" class="col-sm-3 col-form-label">No. Service :</label>
                <div class="col-sm-2">
                    <input type="text" readonly class="form-control-plaintext" value="<?php $huruf = "SRV";
                    $kodeSrv = $huruf . sprintf("%05s", $urutan);
                    echo $kodeSrv;}}?>" name="nosrv">
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">Tanggal :</label>
                <div class="col-sm-2">
                <input type="date" class="form-control form-control-sm"
                name="tgl_srv"/>
                </div>
            </div>
             <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">Jenis Unit :</label>
                <div class="col-sm-2">
                <input type="text" class="form-control form-control-sm" name="txtunit">
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">Merk :</label>
                <div class="col-sm-2">
                <input type="text" class="form-control form-control-sm" name="txtmerk">
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">Model :</label>
                <div class="col-sm-2">
                <input type="text" class="form-control form-control-sm" name="txtmodel">
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">Serial Number :</label>
                <div class="col-sm-2">
                <input type="text" class="form-control form-control-sm" name="txtserialnumber">
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">Hour Meter Terakhir :</label>
                <div class="col-sm-6">
                <input type="text" class="form-control form-control-sm" placeholder="isikan angka saja..."name="txt_hour">
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">Pengisian Oli Mesin :</label>
                <div class="col-sm-6">
                <input type="text" placeholder="isikan angka saja..." class="form-control form-control-sm" name="txt_oli">
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">Pengisian Oli Hydraulic :</label>
                <div class="col-sm-6">
                <input type="text" placeholder="isikan angka saja..." class="form-control form-control-sm" name="txt_hyd">
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">Pengisian Oli Transmisi :</label>
                <div class="col-sm-6">
                <input type="text" placeholder="isikan angka saja..." class="form-control form-control-sm" name="txt_trans">
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">Pengisian Oli Differential :</label>
                <div class="col-sm-6">
                <input type="text" placeholder="isikan angka saja..." class="form-control form-control-sm" name="txt_dif">
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">Pengisian bahan bakar :</label>
                <div class="col-sm-6">
                <input type="text" placeholder="isikan angka saja..." class="form-control form-control-sm" name="txt_solar">
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Penggantian filter oli :</label>
                <div class="form-check">
                    <input class="form-check-input" style="margin-left : 90px;" type="radio" name="filteroli" id="filteroli1" value="sudah" checked>
                    <label class="form-check-label" style="margin-left : 110px;"for="filteroli1">
                        Sudah
                    </label>
                    <input class="form-check-input" style="margin-left : 20px;"type="radio" name="filteroli" id="filteroli2" value="belum">
                    <label class="form-check-label" style="margin-left : 40px;"for="filteroli2">
                        Belum
                    </label>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Penggantian filter Udara :</label>
                <div class="form-check">
                    <input class="form-check-input" style="margin-left : 90px;" type="radio" name="filterudara" id="filterudara1" value="sudah" checked>
                    <label class="form-check-label" style="margin-left : 110px;"for="filterudara1">
                        Sudah
                    </label>
                    <input class="form-check-input" style="margin-left : 20px;"type="radio" name="filterudara" id="filterudara2" value="belum">
                    <label class="form-check-label" style="margin-left : 40px;"for="filterudara2">
                        Belum
                    </label>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Penggantian filter solar :</label>
                <div class="form-check">
                    <input class="form-check-input" style="margin-left : 90px;" type="radio" name="filtersolar" id="filtersolar1" value="sudah" checked>
                    <label class="form-check-label" style="margin-left : 110px;"for="filtersolar1">
                        Sudah
                    </label>
                    <input class="form-check-input" style="margin-left : 20px;"type="radio" name="filtersolar" id="filtersolar2" value="belum">
                    <label class="form-check-label" style="margin-left : 40px;"for="filtersolar2">
                        Belum
                    </label>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">Notes :</label>
                <div class="col-sm-6">
                <input type="text" placeholder="" class="form-control form-control-sm" name="txt_notes">
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label ">Upload Kartu Service:</label>
                <div class="form-control-sm">
                <input type="file" class="form-control-file " id="gambar1" name="gambar">
                </div>
            </div>
            
            
            <div class="form-check">
            <input type="checkbox" value="DONE" name="setuju" required>
                <label class="form-check-label" for="defaultCheck1">
                  Laporan Service unit ini telah selesai dikerjakan dan saya bertanggung jawab akan laporan ini.
                </label>
            </div>
                <button class="btn btn-primary mt-2" type="submit">Submit</button>
                <button class="btn btn-warning mt-2" type="reset">Reset</button>
                <a href="service.php" class="btn btn-danger mt-2">Cancel</a>

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