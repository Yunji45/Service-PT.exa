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
            <h3 style="color:white;">FORM POTONG SPAREPART</h3>
        </div>

        <form action="../function/potongsparepart.php" method="POST" enctype='multipart/form-data' class="bg-light">
            
            <div class="form-group row mt-2">
            <label for="" class="col-sm-3 col-form-label">ID Barang :</label>
            <div class="col-sm-3">
                <select class="form-control form-control-sm" id="exampleFormControlSelect1" name="id_barang">    
            <?php 
            $sql = "SELECT sparepart.id_barang, sparepart.nama_barang FROM sparepart";
            $result =$conn-> query($sql);
            if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
            ?>
            
                    <option value="<?php echo $row['id_barang'];?>"><?echo $row['id_barang']?></option> 
                <?php
                }
            };
                ?>
                </select>
            </div>
            </div>

            <div class="form-group row mt-2">
                <label for="" class="col-sm-3 col-form-label">ID SPS :</label>
                <div class="col-sm-3">
                <?php
                    $sql = "SELECT max(id_sps) as kodeTerbesar FROM sps_form";
                    $result =$conn-> query($sql);
                    if($result->num_rows > 0){
                        
                      while($row = $result->fetch_assoc()){
                        $kodeSPS = $row['kodeTerbesar'];
                        $urutan = (int) substr($kodeSPS, 5, 5);
                        $urutan++;
                    
                ?>
                <input type="text" readonly class="form-control" value="<?php $huruf = "SPS";
                    $kodeSPS = $huruf . sprintf("%05s", $urutan);
                    echo $kodeSPS;}}?>" name="id_sps">
                </div>
            </div>

            <div class="form-group row mt-2">
            <label for="" class="col-sm-3 col-form-label">Unit :</label>
            <div class="col-sm-3">
                <select class="form-control form-control-sm" id="exampleFormControlSelect1" name="unit">
                <option selected="selected">- Pilih -</option>
                <?php 
                $unit = Array('Excavator', 'Wheel Loader', 'Roller', 'Asphalt Finisher', 'Bulldozer', 'Crane', 'Manlift', 'Scissorlift', 'Genset', 'Truck', 'Welding Set', 'Forklift', 'Road Sweeeper', 'Long Arm');
                sort($unit);
                foreach($unit as $item){
                    echo "<option value='$item'>$item</option>";
                }
                ?>

                </select>
             </div>
            </div>

            <div class="form-group row mt-2">
            <label for="" class="col-sm-3 col-form-label">Merk :</label>
            <div class="col-sm-3">
                <select class="form-control form-control-sm" id="exampleFormControlSelect1" name="merk">
                <option selected="selected">- Pilih -</option>
                <?php 
                $unit = Array('Hitachi', 'Niigata', 'Komatsu', 'Caterpillar', 'Kobelco', 'JLG', 'Genie', 'Dynapac', 'Sakai', 'Mitsubishi', 'Skyjack', 'Scania', 'Bomag', 'Isuzu', 'Kawasaki', 'Cummins', 'Perkins', 'Pramac', 'Airman', 'Denyo', 'Nifty', 'Sumitomo', 'Atlas Copco', 'Hanta', 'Nissan', 'McWel', 'Yanmar', 'Ingersoll Rand', 'Promag', 'Himoinsa', 'Tadano', 'Kato', 'Subaru', 'HIAB', 'Green', 'Taikyoku', 'Snorkell', 'HPJ', 'Licoln');
                sort($unit);
                foreach($unit as $item){
                    echo "<option value='$item'>$item</option>";
                }
                ?>

                </select>
             </div>
            </div>

            <div class="form-group row mt-2">
                <label for="" class="col-sm-3 col-form-label">Model :</label>
                <div class="col-sm-3">
                <input type="text" class="form-control form-control-sm" name="model"/> 
                </div>
            </div> 
            <div class="form-group row mt-2">
                <label for="" class="col-sm-3 col-form-label">Serial Number :</label>
                <div class="col-sm-3">
                <input type="text" class="form-control form-control-sm" name="serial_number"/> 
                </div>
            </div>
            <div class="form-group row mt-2">
                <label for="" class="col-sm-3 col-form-label">Tanggal :</label>
                <div class="col-sm-3">
                <input type="text" class="form-control form-control-sm"
                value="<?php echo date('Y-m-d');?>" name="tanggal"readonly/>
                </div>
            </div>

            <div class="form-group row mt-2">
                <label for="" class="col-sm-3 col-form-label">Qty keluar:</label>
                <div class="col-sm-3">
                <input type="number" class="form-control form-control-sm" name="qty"/> 
                </div>
            </div>


            <div class="">
                <button class="btn btn-primary mt-2" type="submit">Submit</button>
                <button class="btn btn-warning mt-2" type="reset">Reset</button>
                <a href="sps.php" class="btn btn-danger mt-2">Cancel</a>
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