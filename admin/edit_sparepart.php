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
    <?php
     $sql = "SELECT sparepart.id_barang, sparepart.nama_barang, sparepart.part_number, sparepart.brand_barang, sparepart.qty_barang, sparepart.no_rak FROM sparepart WHERE sparepart.id_barang = '".$_GET['id_barang']."'";

     $result =$conn-> query($sql);
     if($result->num_rows > 0){
     while($row = $result->fetch_assoc()){
    ?>
    <div class="container">
        <div class="row mt-2 bg-danger justify-content-center">
            <h3 style="color:white;">FORM EDIT SPAREPART</h3>
        </div>

        
        <form method="post" action="../function/edit_item.php" class="mt-2 bg-light">

        <div class="form-group row mt-2">
                <label for="" class="col-sm-3 col-form-label">Id Barang :</label>
                <div class="col-sm-3">
                <input type="text" class="form-control form-control-sm" name="id_barang" value="<?php echo $row['id_barang'];?>" readonly/> 
                </div>
            </div>

            <div class="form-group row mt-2">
                <label for="" class="col-sm-3 col-form-label">No Rak :</label>
                <div class="col-sm-3">
                <input type="text" class="form-control form-control-sm" name="no_rak" value="<?php echo $row['no_rak'];?>"/> 
                </div>
            </div>

            <div class="form-group row mt-2">
                <label for="" class="col-sm-3 col-form-label">Nama Barang :</label>
                <div class="col-sm-3">
                <input type="text" class="form-control form-control-sm" name="nama_barang" value="<?php echo $row['nama_barang'];?>"/> 
                </div>
            </div>
            

            <div class="form-group row mt-2">
                <label for="" class="col-sm-3 col-form-label">Part Number :</label>
                <div class="col-sm-3">
                <input type="text" class="form-control form-control-sm" name="part_number" value="<?php echo $row['part_number'];?>"/> 
                </div>
            </div>

            <div class="form-group row mt-2">
                <label for="" class="col-sm-3 col-form-label">Brand :</label>
                <div class="col-sm-8">
                <input type="text" class="form-control form-control-sm" name="brand_barang" value="<?php echo $row['brand_barang'];?>"/> 
                </div>
            </div>

            <div class="form-group row">
            <label for="" class="col-sm-3 col-form-label">Qty :</label>
                <div class="col-sm-3">
                <input type="text" class="form-control form-control-sm" name="qty_barang" value="<?php echo $row['qty_barang'];?>"/>
                </div>
            </div>
            
            <div class="">
                <button class="btn btn-primary mt-2" type="submit">Submit</button>
                <button class="btn btn-warning mt-2" type="reset">Reset</button>
                <a href="sparepart.php" class="btn btn-danger mt-2">Cancel</a>
            </div>
        </form>

    </div>

 
      

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    -->
      <?php
     }
    };
      ?>
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