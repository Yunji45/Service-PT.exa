<?php
    session_start();
    include '../db/koneksi.php';
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

      .formrqs{
          background-color :rgb(255,255,255) ;
          box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;
      }

      body{
        
       background : #eaeaea;
        

      }
  </style>
  <body>
      <div class="container">
        <div class="judul col-md-3 bg-dark text-white mt-2">
          <h3>TAMBAH RQS</h3>
        </div>
        </div>
        <div class="container formrqs">
        <form method="post" action="../function/inputrqs.php" enctype='multipart/form-data'>
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
                    $sql = "SELECT max(id_rqs) as kodeTerbesar FROM rqs_form";
                    $result =$conn-> query($sql);
                    if($result->num_rows > 0){
                        
                      while($row = $result->fetch_assoc()){
                        $kodeBarang = $row['kodeTerbesar'];
                        $urutan = (int) substr($kodeBarang, 5, 5);
                        $urutan++;
                    
                ?>
                <label for="" class="col-sm-2 col-form-label">No. RQS :</label>
                <div class="col-sm-2">
                    <input type="text" readonly class="form-control-plaintext" value="<?php $huruf = "RQS";
                    $kodeBarang = $huruf . sprintf("%05s", $urutan);
                    echo $kodeBarang;}}?>" name="norqs">
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
                <label for="" class="col-sm-2 col-form-label">Model :</label>
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
                <label for="" class="col-sm-2 col-form-label">Permintaan 1 :</label>
                <div class="col-sm-2">
                <input type="text" class="form-control form-control-sm" name="txtperm1" value="-" placeholder="-">
                </div>
                <label for="" class="col-sm-1 col-form-label">Qty :</label>
                <div class="col-sm-1">
                <input type="text" class="form-control form-control-sm" name="qty1" value="-">
                </div>
                <label for="" class="col-sm-1 col-form-label">Satuan :</label>
                <div class="col-sm-1">
                <select id="inputState" class="form-control" name="sat1">
                    <option selected>-</option>
                    <option>PCS</option>
                    <option>KG</option>
                    <option>LTR</option>
                    <option>DRUM</option>
                    <option>DRIGEN</option>
                    <option>SET</option>
                    <option>METER</option>
                    <option>CM</option>
                </select>
                </div>
                <label for="" class="col-sm-2 col-form-label">Part Number :</label>
                <div class="col-sm-2">
                <input type="text" class="form-control form-control-sm" name="sn1" value="-">
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label ">Upload Gambar 1 :</label>
                <div class="form-control-sm">
                <input type="file" class="form-control-file" id="gambar_1" name="gambar_1"/>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Permintaan 2 :</label>
                <div class="col-sm-2">
                <input type="text" class="form-control form-control-sm" name="txtperm2" value="-">
                </div>
                <label for="" class="col-sm-1 col-form-label">Qty :</label>
                <div class="col-sm-1">
                <input type="text" class="form-control form-control-sm" name="qty2" value="-">
                </div>
                <label for="" class="col-sm-1 col-form-label">Satuan :</label>
                <div class="col-sm-1">
                <select id="inputState" class="form-control" name="sat2">
                    <option selected>-</option>
                    <option>PCS</option>
                    <option>KG</option>
                    <option>LTR</option>
                    <option>DRUM</option>
                    <option>DRIGEN</option>
                    <option>SET</option>
                    <option>METER</option>
                    <option>CM</option>
                </select>
                </div>
                <label for="" class="col-sm-2 col-form-label">Part Number :</label>
                <div class="col-sm-2">
                <input type="text" class="form-control form-control-sm" name="sn2" value="-">
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label ">Upload Gambar 2 :</label>
                <div class="form-control-sm">
                <input type="file" class="form-control-file " id="gambar_2" name="gambar_2">
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Permintaan 3 :</label>
                <div class="col-sm-2">
                <input type="text" class="form-control form-control-sm" name="txtperm3" value="-">
                </div>
                <label for="" class="col-sm-1 col-form-label">Qty :</label>
                <div class="col-sm-1">
                <input type="text" class="form-control form-control-sm" name="qty3" value="-">
                </div>
                <label for="" class="col-sm-1 col-form-label">Satuan :</label>
                <div class="col-sm-1">
                <select id="inputState" class="form-control" name="sat3">
                    <option selected>-</option>
                    <option>PCS</option>
                    <option>KG</option>
                    <option>LTR</option>
                    <option>DRUM</option>
                    <option>DRIGEN</option>
                    <option>SET</option>
                    <option>METER</option>
                    <option>CM</option>
                </select>
                </div>
                <label for="" class="col-sm-2 col-form-label">Part Number :</label>
                <div class="col-sm-2">
                <input type="text" class="form-control form-control-sm" name="sn3" value="-">
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label ">Upload Gambar 3 :</label>
                <div class="form-control-sm">
                <input type="file" class="form-control-file " id="gambar_3" name="gambar_3">
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Permintaan 4 :</label>
                <div class="col-sm-2">
                <input type="text" class="form-control form-control-sm" name="txtperm4" value="-">
                </div>
                <label for="" class="col-sm-1 col-form-label">Qty :</label>
                <div class="col-sm-1">
                <input type="text" class="form-control form-control-sm" name="qty4" value="-">
                </div>
                <label for="" class="col-sm-1 col-form-label">Satuan :</label>
                <div class="col-sm-1">
                <select id="inputState" class="form-control" name="sat4">
                    <option selected>-</option>
                    <option>PCS</option>
                    <option>KG</option>
                    <option>LTR</option>
                    <option>DRUM</option>
                    <option>DRIGEN</option>
                    <option>SET</option>
                    <option>METER</option>
                    <option>CM</option>
                </select>
                </div>
                <label for="" class="col-sm-2 col-form-label">Part Number :</label>
                <div class="col-sm-2">
                <input type="text" class="form-control form-control-sm" name="sn4" value="-">
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label ">Upload Gambar 4 :</label>
                <div class="form-control-sm">
                <input type="file" class="form-control-file " id="gambar_4" name="gambar_4">
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Permintaan 5 :</label>
                <div class="col-sm-2">
                <input type="text" class="form-control form-control-sm" name="txtperm5" value="-">
                </div>
                <label for="" class="col-sm-1 col-form-label">Qty :</label>
                <div class="col-sm-1">
                <input type="text" class="form-control form-control-sm" name="qty5" value="-">
                </div>
                <label for="" class="col-sm-1 col-form-label">Satuan :</label>
                <div class="col-sm-1">
                <select id="inputState" class="form-control" name="sat5">
                    <option selected>-</option>
                    <option>PCS</option>
                    <option>KG</option>
                    <option>LTR</option>
                    <option>DRUM</option>
                    <option>DRIGEN</option>
                    <option>SET</option>
                    <option>METER</option>
                    <option>CM</option>
                </select>
                </div>
                <label for="" class="col-sm-2 col-form-label">Part Number :</label>
                <div class="col-sm-2">
                <input type="text" class="form-control form-control-sm" name="sn5" value="-">
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label ">Upload Gambar 5 :</label>
                <div class="form-control-sm">
                <input type="file" class="form-control-file " id="gambar_5" name="gambar_5">
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Permintaan 6 :</label>
                <div class="col-sm-2">
                <input type="text" class="form-control form-control-sm" name="txtperm6" value="-">
                </div>
                <label for="" class="col-sm-1 col-form-label">Qty :</label>
                <div class="col-sm-1">
                <input type="text" class="form-control form-control-sm" name="qty6" value="-">
                </div>
                <label for="" class="col-sm-1 col-form-label">Satuan :</label>
                <div class="col-sm-1">
                <select id="inputState" class="form-control" name="sat6">
                    <option selected>-</option>
                    <option>PCS</option>
                    <option>KG</option>
                    <option>LTR</option>
                    <option>DRUM</option>
                    <option>DRIGEN</option>
                    <option>SET</option>
                    <option>METER</option>
                    <option>CM</option>
                </select>
                </div>
                <label for="" class="col-sm-2 col-form-label">Part Number :</label>
                <div class="col-sm-2">
                <input type="text" class="form-control form-control-sm" name="sn6" value="-">
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label ">Upload Gambar 6 :</label>
                <div class="form-control-sm">
                <input type="file" class="form-control-file " id="gambar_6" name="gambar_6">
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Permintaan 7 :</label>
                <div class="col-sm-2">
                <input type="text" class="form-control form-control-sm" name="txtperm7" value="-">
                </div>
                <label for="" class="col-sm-1 col-form-label">Qty :</label>
                <div class="col-sm-1">
                <input type="text" class="form-control form-control-sm" name="qty7" value="-">
                </div>
                <label for="" class="col-sm-1 col-form-label">Satuan :</label>
                <div class="col-sm-1">
                <select id="inputState" class="form-control" name="sat7">
                    <option selected>-</option>
                    <option>PCS</option>
                    <option>KG</option>
                    <option>LTR</option>
                    <option>DRUM</option>
                    <option>DRIGEN</option>
                    <option>SET</option>
                    <option>METER</option>
                    <option>CM</option>
                </select>
                </div>
                <label for="" class="col-sm-2 col-form-label">Part Number :</label>
                <div class="col-sm-2">
                <input type="text" class="form-control form-control-sm" name="sn7" value="-">
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label ">Upload Gambar 7 :</label>
                <div class="form-control-sm">
                <input type="file" class="form-control-file " id="gambar_7" name="gambar_7">
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Permintaan 8 :</label>
                <div class="col-sm-2">
                <input type="text" class="form-control form-control-sm" name="txtperm8" value="-">
                </div>
                <label for="" class="col-sm-1 col-form-label">Qty :</label>
                <div class="col-sm-1">
                <input type="text" class="form-control form-control-sm" name="qty8" value="-">
                </div>
                <label for="" class="col-sm-1 col-form-label">Satuan :</label>
                <div class="col-sm-1">
                <select id="inputState" class="form-control" name="sat8">
                    <option selected>-</option>
                    <option>PCS</option>
                    <option>KG</option>
                    <option>LTR</option>
                    <option>DRUM</option>
                    <option>DRIGEN</option>
                    <option>SET</option>
                    <option>METER</option>
                    <option>CM</option>
                </select>
                </div>
                <label for="" class="col-sm-2 col-form-label">Part Number :</label>
                <div class="col-sm-2">
                <input type="text" class="form-control form-control-sm" name="sn8" value="-">
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label ">Upload Gambar 8 :</label>
                <div class="form-control-sm">
                <input type="file" class="form-control-file " id="gambar_8" name="gambar_8">
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Permintaan 9 :</label>
                <div class="col-sm-2">
                <input type="text" class="form-control form-control-sm" name="txtperm9" value="-">
                </div>
                <label for="" class="col-sm-1 col-form-label">Qty :</label>
                <div class="col-sm-1">
                <input type="text" class="form-control form-control-sm" name="qty9" value="-">
                </div>
                <label for="" class="col-sm-1 col-form-label">Satuan :</label>
                <div class="col-sm-1">
                <select id="inputState" class="form-control" name="sat9">
                    <option selected>-</option>
                    <option>PCS</option>
                    <option>KG</option>
                    <option>LTR</option>
                    <option>DRUM</option>
                    <option>DRIGEN</option>
                    <option>SET</option>
                    <option>METER</option>
                    <option>CM</option>
                </select>
                </div>
                <label for="" class="col-sm-2 col-form-label">Part Number :</label>
                <div class="col-sm-2">
                <input type="text" class="form-control form-control-sm" name="sn9" value="-">
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label ">Upload Gambar 9 :</label>
                <div class="form-control-sm">
                <input type="file" class="form-control-file " id="gambar_9" name="gambar_9">
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Permintaan 10 :</label>
                <div class="col-sm-2">
                <input type="text" class="form-control form-control-sm" name="txtperm10" value="-">
                </div>
                <label for="" class="col-sm-1 col-form-label">Qty :</label>
                <div class="col-sm-1">
                <input type="text" class="form-control form-control-sm" name="qty10" value="-">
                </div>
                <label for="" class="col-sm-1 col-form-label">Satuan :</label>
                <div class="col-sm-1">
                <select id="inputState" class="form-control" name="sat10">
                    <option selected>-</option>
                    <option>PCS</option>
                    <option>KG</option>
                    <option>LTR</option>
                    <option>DRUM</option>
                    <option>DRIGEN</option>
                    <option>SET</option>
                    <option>METER</option>
                    <option>CM</option>
                </select>
                </div>
                <label for="" class="col-sm-2 col-form-label">Part Number :</label>
                <div class="col-sm-2">
                <input type="text" class="form-control form-control-sm" name="sn10" value="-">
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label ">Upload Gambar 10 :</label>
                <div class="form-control-sm">
                <input type="file" class="form-control-file " id="gambar_10" name="gambar_10">
                </div>
            </div>
            <div class="form-check">
            <input type="checkbox" value="SETUJU" name='setuju' required>
                <label class="form-check-label" for="defaultCheck1">
                  Permintaan yang saya buat sudah benar, dan saya bertanggung jawab akan RQS ini.
                </label>
            </div>
            
            <button class="btn btn-primary mt-2" type="submit" onclick="return confirm('Apakah anda yakin ingin mengajukannya?')">Submit</button>
            <button class="btn btn-warning mt-2" type="reset">Reset</button>
            <a href="admin.php" class="btn btn-danger mt-2">Cancel</a>
            
        </form><br>
    </div>

    <div class="container">
    <br>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="../js/jquery-3.5.1.slim.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script>
        var gambar1 = document.getElementById("gambar_1");

        gambar1.onchange = function() {
            if(this.files[0].size > 512000){
                alert("File Terlalu Besar!");
                this.value = "";
            };
        };

        var gambar2 = document.getElementById("gambar_2");

        gambar2.onchange = function() {
            if(this.files[0].size > 512000){
                alert("File Terlalu Besar!");
                this.value = "";
            };
        };

        var gambar3 = document.getElementById("gambar_3");

        gambar3.onchange = function() {
            if(this.files[0].size > 512000){
                alert("File Terlalu Besar!");
                this.value = "";
            };
        };

        var gambar4 = document.getElementById("gambar_4");

        gambar4.onchange = function() {
            if(this.files[0].size > 512000){
                alert("File Terlalu Besar!");
                this.value = "";
            };
        };

        var gambar5 = document.getElementById("gambar_5");

        gambar5.onchange = function() {
            if(this.files[0].size > 512000){
                alert("File Terlalu Besar!");
                this.value = "";
            };
        };

        var gambar6 = document.getElementById("gambar_6");

        gambar6.onchange = function() {
            if(this.files[0].size > 512000){
                alert("File Terlalu Besar!");
                this.value = "";
            };
        };

        var gambar7 = document.getElementById("gambar_7");

        gambar7.onchange = function() {
            if(this.files[0].size > 512000){
                alert("File Terlalu Besar!");
                this.value = "";
            };
        };

        var gambar8 = document.getElementById("gambar_8");

        gambar8.onchange = function() {
            if(this.files[0].size > 512000){
                alert("File Terlalu Besar!");
                this.value = "";
            };
        };

        var gambar9 = document.getElementById("gambar_9");

        gambar9.onchange = function() {
            if(this.files[0].size > 512000){
                alert("File Terlalu Besar!");
                this.value = "";
            };
        };

        var gambar10 = document.getElementById("gambar_10");

        gambar10.onchange = function() {
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

    <link rel="stylesheet" href="style.css">

    <title>orang batu</title>
  </head>
  <body>
    <div class="kotaknotif">
        <h3 class="txtnotif">NO ACCESS FOR YOU</h3>
        <a href="index.php"><button class="btn btn-warning tblback" >Back</button></a>
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
    };
?>
