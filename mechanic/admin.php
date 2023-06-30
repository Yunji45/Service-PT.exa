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
    <link href="../fontawesome/css/all.css" rel="stylesheet"> <!--load all styles -->

    <title>Exxa Admin System</title>
  </head>
  <style>

    @media (min-width:350px){
      .tabel{
        overflow-x:auto;
        box-shadow: rgba(0, 0, 0, 0.3) 0px 19px 38px, rgba(0, 0, 0, 0.22) 0px 15px 12px;
      }
      

      .col-md-2{
        height : 22rem !important;
        margin-top : -10px !important;
      }

      .navbar-brand{
      text-transform : uppercase;
      font-size : 12px;
      
      }

      .btn-detail{
        margin-bottom : 5px;
      }

      .btn-edit{
        margin-bottom : 5px;
      }

      .btn-cancel {
        margin-bottom : 5px;
      }

      .form-control{
        width : 250px;
      }

      .btn-cari{
      position : absolute;
        left : 20rem;
        top : 5.5rem;
    }
      
    }

    @media (min-width:1100px){
      .col-md-2{
        height : 50rem !important;
        
      }
    tr{
      text-transform : uppercase;
    }  

    .navbar-brand{
      text-transform : uppercase;
      font-size : 20px;
      
      }

    .fa-sign-out-alt:hover{
      color : white;
      transition : 0.3s;
    }

    .tabel{
      box-shadow: rgba(0, 0, 0, 0.3) 0px 19px 38px, rgba(0, 0, 0, 0.22) 0px 15px 12px;
    }

    p{
      display : inline;
    }

    span{
      margin-left : 36px;
    }

    .btn-detail{
        margin-bottom : 0px;
      }

      .btn-edit{
        margin-bottom : 0px;
      }

      .btn-cancel {
        margin-bottom : 0px;
      }

      .form-control {
        position : absolute;
        width : 300px;
        left : 42rem;
        top : 50px;
    }

    .btn-cari{
      position : absolute;
        left : 62rem;
        top : 50px;
    }
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
        <a  href="../logout.php" style="color : black; font-size : 20px; margin-left: auto;"><i class="fas fa-sign-out-alt"></i></a>
        <!-- <a class="btn btn-dark ml-2 tombolout" href="../logout.php">Logout</a> -->
        
        
    </nav>

   
    <div class="row no-gutters mt-5">
        
        <div class="col-md-2 bg-dark mt-2 pr-3 pt-4" style="height : 50rem;">
            <ul class="nav flex-column ml-3 mb-5">
                
                <li class="nav-item">
                    <a class="nav-link text-white" href="admin.php"><i class="fas fa-file-alt" style="padding-right : 20px;"></i>RQS</a><hr class="bg-white">
                  </li>
                <li class="nav-item">
                  <a class="nav-link text-white" href="dwr.php"><i class="fas fa-wrench" style="padding-right : 20px;"></i>Daily Work <span>Report</span></a><hr class="bg-white">
                </li>
                <li class="nav-item">
                  <a class="nav-link text-white" href="wo.php"><i class="fas fa-paste" style="padding-right : 20px;"></i>Work Order</a><hr class="bg-white">
                </li>
                <li class="nav-item">
                  <a class="nav-link text-white" href="kendala.php"><i class="fas fa-exclamation-triangle" style="padding-right : 20px;"></i>Kendala</a><hr class="bg-white">
                </li>
                <li class="nav-item">
                  <a class="nav-link text-white" href="service.php"><i class="fas fa-cog" style="padding-right : 20px;"></i>Service</a><hr class="bg-white">
                </li>
                <li class="nav-item">
                  <a class="nav-link text-white" href="ubahpassword.php"><i class="fas fa-key" style="padding-right : 20px;"></i>Ubah Password</a><hr class="bg-white">
                </li>
              </ul>
        </div>

        <div class="col-md-10 p-5 pt-2">
            <h3><i class="fas fa-file-alt" style="padding-right : 20px;"></i>RQS</h3>
            <form action="admin.php" method="get">
                <input type="text" name="cari" class="form-control" placeholder="search..">
                <input type="submit" value="Cari" class="btn btn-primary btn-cari">
            </form>
            <hr>
            <a href="rqs.php" class="btn btn-primary mb-2">TAMBAH RQS</a> 
            <div class="tabel">
            <table class="table">
              <?php
                
              ?>
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">No.</th>
                    <th scope="col">RQS_ID</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Merk</th>
                    <th scope="col">Unit</th>
                    <th scope="col">Serial Number</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $batas = 10;
                  $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
                  $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;	
           
                  $previous = $halaman - 1;
                  $next = $halaman + 1;

                  
                  $data = mysqli_query($conn,"SELECT rqs_form.id_rqs, login.id_login, rqs_form.id_login, rqs_form.nama, rqs_form.tanggal, rqs_form.merk, rqs_form.tipe, rqs_form.unit, rqs_form.serial_number, rqs_form.status, login.level FROM rqs_form INNER JOIN login ON rqs_form.id_login = login.id_login WHERE login.id_login = '".$_SESSION['id_login']."'");

				          $jumlah_data = mysqli_num_rows($data);
				          $total_halaman = ceil($jumlah_data / $batas);

                  if(isset($_GET['cari'])){
                    $cari = $_GET['cari'];
                    $sql = "SELECT rqs_form.id_rqs, login.id_login, rqs_form.id_login, rqs_form.nama, rqs_form.tanggal, rqs_form.merk, rqs_form.tipe, rqs_form.unit, rqs_form.serial_number, rqs_form.status, login.level FROM rqs_form INNER JOIN login ON rqs_form.id_login = login.id_login WHERE login.id_login = '".$_SESSION['id_login']."' AND  rqs_form.id_rqs like '%".$cari."%'";
                    
                }else{ 
                   $sql = "SELECT rqs_form.id_rqs, login.id_login, rqs_form.id_login, rqs_form.nama, rqs_form.tanggal, rqs_form.merk, rqs_form.tipe, rqs_form.unit, rqs_form.serial_number, rqs_form.status, login.level FROM rqs_form INNER JOIN login ON rqs_form.id_login = login.id_login WHERE login.id_login = '".$_SESSION['id_login']."' ORDER BY id_rqs DESC limit $halaman_awal, $batas";
                }

                   $result =$conn-> query($sql);
                      if($result->num_rows > 0){
                        $nomor = $halaman_awal+1;
                        while($row = $result->fetch_assoc()){
                          echo '<tr>';
                          echo '<td>'.$nomor++.'</td>';
                          echo '<td>'.$row['id_rqs'].'</td>';
                          echo '<td>'.$row['tanggal'].'</td>';
                          echo '<td>'.$row['merk'].'</td>';
                          echo '<td>'.$row['unit'].'</td>';
                          echo '<td>'.$row['serial_number'].'</td>';
                          echo '<td>'.$row['status'].'</td>';
                          ?>
                          <?php
                            if($row['status'] == "DIAJUKAN") {
                          ?>
                          <td>
                            <a href="detailrqs.php?id_rqs=<?php echo $row ['id_rqs']?>"><button class="btn btn-primary btn-detail" > DETAIL</button></a>
                            <a href="editrqs.php?id_rqs=<?php echo $row ['id_rqs']?>"><button class="btn btn-warning btn-edit" onclick="return confirm('Apakah anda yakin ingin mengubahnya?')"> EDIT</button></a>
                            <a href="hapusrqs.php?id_rqs=<?php echo $row['id_rqs']?>"><button class="btn btn-danger btn-cancel" onclick="return confirm('Apakah anda yakin ingin menghapusnya?')"> HAPUS</button></a>
                          </td>
                          <?php
                            }elseif ($row['status'] == "PENDING"){
                          ?>
                          <td>
                          <a href="detailrqs.php?id_rqs=<?php echo $row ['id_rqs']?>"><button class="btn btn-primary btn-detail" > DETAIL</button></a>
                          <a href="editrqs.php?id_rqs=<?php echo $row ['id_rqs']?>"><button class="btn btn-warning" onclick="return confirm('Apakah anda yakin ingin mengubahnya?')"> EDIT</button></a>
                          </td>
                          <?php
                            }else{
                          ?>
                          <td>
                          <a href="detailrqs.php?id_rqs=<?php echo $row ['id_rqs']?>"><button class="btn btn-primary"> DETAIL</button></a>
                          </td>
                          <?php
                            }
                          ?>
                          
                          <?php
                          echo '</tr>';
                        }
                      };
                  ?>
                </tbody>
              </table>
              </div>
              <br>
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