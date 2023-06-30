<?php
  include '../db/koneksiBrg.php';
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
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../style.css">

    <title>Exxa Admin System</title>
  </head>
  <style>
      
  </style>
  
  <body>
    
    <div class="container">
        <div class="row mt-2 bg-danger justify-content-center">
            <h3 style="color:white;">FORM TAMBAH SPAREPART</h3>
        </div>

        <form action="../function/tambah_spare_part.php" method="POST" enctype='multipart/form-data' class="bg-light">

        <div class="form-group row mt-2">
                <label for="" class="col-sm-3 col-form-label">ID Barang :</label>
                <div class="col-sm-3">
                <?php
                    $sql = "SELECT max(id_barang) as kodeTerbesar FROM sparepart";
                    $result =$conn-> query($sql);
                    if($result->num_rows > 0){
                        
                      while($row = $result->fetch_assoc()){
                        $kodeBarang = $row['kodeTerbesar'];
                        $urutan = (int) substr($kodeBarang, 5, 5);
                        $urutan++;
                    
                ?>
                <input type="text" readonly class="form-control" value="<?php $huruf = "BRG";
                    $kodeBarang = $huruf . sprintf("%05s", $urutan);
                    echo $kodeBarang;}}?>" name="nobrg">
                </div>
            </div>

            <div class="form-group row mt-2">
            <label for="" class="col-sm-3 col-form-label">No rak :</label>
            <div class="col-sm-3">
                <select class="form-control form-control-sm" id="exampleFormControlSelect1" name="no_rak">
                 <option>A001</opttion>  
                 <option>A002</opttion>     
                 <option>A003</opttion>  
                 <option>A004</opttion>  
                 <option>B001</opttion>  
                 <option>B002</opttion>  
                 <option>B003</opttion>  
                 <option>B004</opttion>
                 <option>C001</opttion>  
                 <option>C002</opttion>  
                 <option>C003</opttion>  
                 <option>C004</opttion>  
                 <option>D001</opttion>  
                 <option>D002</opttion>  
                 <option>D003</opttion>  
                 <option>D004</opttion>  

                </select>
             </div>
            </div>

            <div class="form-group row mt-2">
                <label for="" class="col-sm-3 col-form-label">Nama Barang :</label>
                <div class="col-sm-3">
                <input type="text" class="form-control form-control-sm" name="nama_barang"/> 
                </div>
            </div>
            

            <div class="form-group row mt-2">
                <label for="" class="col-sm-3 col-form-label">Part Number :</label>
                <div class="col-sm-3">
                <input type="text" class="form-control form-control-sm" name="part_number"/> 
                </div>
            </div>

            <div class="form-group row mt-2">
                <label for="" class="col-sm-3 col-form-label">Brand :</label>
                <div class="col-sm-3">
                <input type="text" class="form-control form-control-sm" name="brand_barang"/> 
                </div>
            </div>

            <div class="form-group row">
            <label for="" class="col-sm-3 col-form-label">Qty :</label>
                <div class="col-sm-3">
                <input type="text" class="form-control form-control-sm" name="qty_barang"/>
                </div>
            </div>
            
            <div class="">
                <button class="btn btn-primary mt-2" type="submit">Submit</button>
                <button class="btn btn-warning mt-2" type="reset">Reset</button>
                <a href="sparepart.php" class="btn btn-danger mt-2">Cancel</a>
            </div>
        </form>

    </div>

    
      

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="../js/jquery-3.5.1.slim.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script>
        var gambar1 = document.getElementById("gambar1");

        gambar1.onchange = function() {
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