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
    /* tr{
      text-transform : uppercase;
    }   */

    .navbar-brand{
      text-transform : uppercase;
      
    }
  </style>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-danger fixed-top">
      <?php 
      if (isset($_SESSION['nama'])){?>
        <a class="navbar-brand" href="#" style="color : white;"><b>ADMINISTRASI EXXA | WELCOME <?php echo $_SESSION['nama']?></b></a>
        <?php 
      }else{
      ?>
        <a class="navbar-brand" href="#">ADMINISTRASI EXXA
      <?php
      }?>
        
        <a class="btn btn-dark ml-2 tombolout" href="../logout.php">Logout</a>
        
       

        <form class="form-inline my-2 my-lg-0 ml-auto cari" action="sparepart.php" method="get">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" type="text" name="cari">
            <button class="btn btn-outline-light my-2 my-sm-0" type="submit" value="Cari">Search</button>
        </form>

    </nav>

   
    <div class="row no-gutters mt-5">
        
        <div class="col-md-2 bg-dark mt-2 pr-3 pt-4">
            <ul class="nav flex-column ml-3 mb-5">
                
                <li class="nav-item">
                    <a class="nav-link text-white" href="admin.php">Data User</a><hr class="bg-white">
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="sparepart.php">Data Spare Part</a><hr class="bg-white">
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="sps.php">SPS</a><hr class="bg-white">
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="total_sparepart.php">Total Sparepart</a><hr class="bg-white">
                </li>
                <!-- <li class="nav-item">
                  <a class="nav-link text-white" href="wo.php">Work Order</a><hr class="bg-white">
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="ubahpassword.php">Ubah Password</a><hr class="bg-white">
                </li> -->
              </ul>
        </div>

        <div class="col-md-10 p-5 pt-2">
            <h3>TOTAL SPAREPART</h3>

            

            <hr>

           
          

            <table class="table">
            <thead class="thead-dark">
                  <tr>
                  <th scope="col">No.</th>
                    <th scope="col">No. Rak</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Part Number</th>
                    <th scope="col">Brand</th>
                    <th scope="col">Qty</th>
                  </tr>
                </thead>
                
                <tbody>
                 <?php  
                $sql = "SELECT sparepart.id_barang, sparepart.nama_barang, sparepart.part_number, sparepart.brand_barang, sparepart.no_rak, (sparepart.qty_barang - sps_form.qty_keluar) as total, sps_form.id_barang  FROM sparepart INNER JOIN sps_form ON sparepart.id_barang = sps_form.id_barang ";
                $result =$conn-> query($sql);
                if($result->num_rows > 0){
                  $nomor = 1;
                  
                  while($row = $result->fetch_assoc()){
                   
                    echo '<tr>';
                    echo '<td>'.$nomor++.'</td>';
                    echo '<td>'.$row['no_rak'].'</td>';
                    echo '<td>'.$row['nama_barang'].'</td>';
                    echo '<td>'.$row['part_number'].'</td>';
                    echo '<td>'.$row['brand_barang'].'</td>';
                    echo '<td>'.$row['total'].'</td>';
                    echo '</tr>';
                  }
                };
                                            
                
                ?>
                </tbody>
            </table>
           
        </div>
        
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

    <footer>
      &copy; Peryo - 2021
    </footer>
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
  };
?>