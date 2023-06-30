<?php
  include '../db/koneksi.php';
  session_start();
  if (isset($_SESSION['level'])){
    if($_SESSION['level'] == "logistik") {
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

    <title>Exxa Admin System</title>
  </head>

  <style>
      .col-md-2{
        height : 50rem !important;
        
      }

    .navbar-brand{
      text-transform : uppercase;
    }
    thead{
      text-transform : uppercase;
    }
    tbody{
      text-transform : uppercase;
    }
  </style>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light bg-danger fixed-top">
  <?php if (isset($_SESSION['nama'])){?>
        <a class="navbar-brand" href="#" style="color : white;"><b>ADMINISTRASI EXXA | WELCOME <?php echo $_SESSION['nama']?></b></a>
        <?php 
      }else{
      ?>
        <a class="navbar-brand" href="#">ADMINISTRASI EXXA
      <?php
      }?>
        <a class="btn btn-dark ml-2" href="../logout.php">Logout</a>
        <form class="form-inline my-2 my-lg-0 ml-auto">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
      </nav>

   
    <div class="row no-gutters mt-5">
        
        <div class="col-md-2 bg-dark mt-2 pr-3 pt-4">
            <ul class="nav flex-column ml-3 mb-5">
                
                <li class="nav-item">
                    <a class="nav-link text-white" href="admin.php">RQS</a><hr class="bg-white">
                  </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="wo.php">Work Order</a><hr class="bg-white">
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-white" href="hmap.php">HMAP</a><hr class="bg-white">
                  </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="ubahpassword.php">Ubah Password</a><hr class="bg-white">
                  </li>
              </ul>
        </div>

        <div class="col-md-10 p-5 pt-2">
            <h3>WORK ORDER</h3>
            <hr>
            <a href="woform.php" class="btn btn-primary mb-2">TAMBAH WO</a>
            <table class="table">
                <thead class="thead-dark">
                  <tr>
                  <th scope="col">No.</th>
                    <th scope="col">Id_WO</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Merk</th>
                    <th scope="col">Unit</th>
                    <th scope="col">SN</th>
                    <th scope="col">Status</th>
                    <th scope="col">Tinjau</th>
                  </tr>
                </thead>
                <tbody>
                  <?php

                      $batas = 5;
                      $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
                      $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;	

                      $previous = $halaman - 1;
                      $next = $halaman + 1;

                      $data = mysqli_query($conn,"select * from wo_form");
                      $jumlah_data = mysqli_num_rows($data);
                      $total_halaman = ceil($jumlah_data / $batas);

                      $sql = "SELECT * FROM wo_form INNER JOIN login ON wo_form.id_login = login.id_login limit $halaman_awal, $batas ";

                      $result =$conn-> query($sql);
                      if($result->num_rows > 0){
                        $nomor = $halaman_awal+1;
                        while($row = $result->fetch_assoc()){
                          echo '<tr>';
                          echo '<td>'.$nomor++.'</td>';
                          echo '<td>'.$row['id_wo'].'</td>';
                          echo '<td>'.$row['nama'].'</td>';
                          echo '<td>'.$row['tanggal_penugasan'].'</td>';
                          echo '<td>'.$row['merk'].'</td>';
                          echo '<td>'.$row['unit'].'</td>';
                          echo '<td>'.$row['serial_number'].'</td>';
                          echo '<td>'.$row['status'].'</td>';
                  ?>
                  <td>
                    <a href="detailwo.php?id_wo=<?php echo $row ['id_wo'] ;?>"><button class="btn btn-primary"> DETAIL</button></a>
                  </td>
                  <?php
                    echo '</tr>';
                        }
                      };
                  ?>

            </table>
            <nav>
                <ul class="pagination justify-content-center">
                  <li class="page-item">
                    <a class="page-link" <?php if($halaman > 1){ echo "href='?halaman=$previous'"; } ?>>Previous</a>
                  </li>
                  <?php 
                  for($x=1;$x<=$total_halaman;$x++){
                    ?> 
                    <li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
                    <?php
                  }
                  ?>				
                  <li class="page-item">
                    <a  class="page-link" <?php if($halaman < $total_halaman) { echo "href='?halaman=$next'"; } ?>>Next</a>
                  </li>
                </ul>
              </nav>
        </div>
        
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
  }
?>

