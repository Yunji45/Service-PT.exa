<?php
  include '../db/koneksi.php';
  session_start();
  if (isset($_SESSION['level'])){
    if($_SESSION['level'] == "manager") {
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

    @media (min-width: 350px){
      .tabel{
        overflow-x:auto;
        box-shadow: rgba(0, 0, 0, 0.3) 0px 19px 38px, rgba(0, 0, 0, 0.22) 0px 15px 12px;
        margin-bottom : 30px;
      }
      .btn-primary {
        margin-bottom : 10px;
      }

      .btn-danger {
        margin-bottom : 10px;
      }
    }

    @media (min-width: 1100px){
      .tabel{
      box-shadow: rgba(0, 0, 0, 0.3) 0px 19px 38px, rgba(0, 0, 0, 0.22) 0px 15px 12px;
    }
      .col-md-2{
        height : 70rem !important;
        
      }
    .navbar-brand{
      text-transform : uppercase;
    }

    th{
      text-transform : uppercase;
    }

    td{
      text-transform : uppercase;
    }

    .report{
      margin-left : 36px;
    }
    .fa-sign-out-alt:hover{
      color : white;
      transition : 0.3s;
    }

    .btn-primary {
        margin-bottom : 0px;
      }

      .btn-danger {
        margin-bottom : 0px;
      }

      .form-control {
        position : absolute;
        width : 300px;
        left : 42rem;
        top : 50px;
    }
    .btn-success {
        position : absolute;
        left : 62rem;
        top : 50px;
    }
  }
  </style>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-warning fixed-top">
      <?php if (isset($_SESSION['nama'])){?>
        <a class="navbar-brand" href="#">ADMINISTRASI EXXA | WELCOME <?php echo $_SESSION['nama']?></a>
        <?php 
      }else{
      ?>
        <a class="navbar-brand" href="#">ADMINISTRASI EXXA
      <?php
      }?>
        
        <a  href="../logout.php" style="color : black; font-size : 20px; margin-left: auto;"><i class="fas fa-sign-out-alt"></i></a>
        
        
      </nav>

   
    <div class="row no-gutters mt-5">
        
        <div class="col-md-2 bg-dark mt-2 pr-3 pt-4">
            <ul class="nav flex-column ml-3 mb-5">
                
                <li class="nav-item">
                    <a class="nav-link text-white" href="admin.php"><i class="fas fa-file-alt" style="padding-right : 20px;"></i>RQS</a><hr class="bg-white">
                  </li>
                <li class="nav-item">
                  <a class="nav-link text-white" href="dwr.php"><i class="fas fa-wrench" style="padding-right : 20px;"></i>Daily Work <span class="report">Report</span></a><hr class="bg-white">
                </li>
                <li class="nav-item">
                  <a class="nav-link text-white" href="wo.php"><i class="fas fa-paste" style="padding-right : 20px;"></i>Work Order</a><hr class="bg-white">
                </li>
                <li class="nav-item">
                  <a class="nav-link text-white" href="ubahpassword.php"><i class="fas fa-key" style="padding-right : 20px;"></i>Ubah Password</a><hr class="bg-white">
                </li>
                <!-- <li class="nav-item">
                  <a class="nav-link text-white" href="wo.php">Work Order</a><hr class="bg-white">
                </li> -->
              </ul>
        </div>

        <div class="col-md-10 p-5 pt-2">
            <h3><i class="fas fa-file-alt" style="padding-right : 20px;"></i>RQS</h3>
            <form action="admin.php" method="get">
                <input type="text" name="cari" class="form-control" placeholder="search..">
                <input type="submit" value="Cari" class="btn btn-success">
            </form>
            <hr>
            <!-- <a href="../rqs.php" class="btn btn-primary mb-2">TAMBAH RQS</a> -->
            <div class="tabel">
            <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">RQS_ID</th>
                    <th scope="col">NAMA</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Merk</th>
                    <th scope="col">Unit</th>
                    <th scope="col">SN</th>
                    <th scope="col">Status</th>
                    <th scope="col">Tinjau</th>
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

                  $data = mysqli_query($conn,"select * from rqs_form");
				          $jumlah_data = mysqli_num_rows($data);
				          $total_halaman = ceil($jumlah_data / $batas);

                  if(isset($_GET['cari'])){
                    $cari = $_GET['cari'];
                    $sql = "SELECT * from rqs_form where id_rqs like '%".$cari."%'";				
                }else{
                   $sql = "SELECT rqs_form.id_rqs, login.id_login, rqs_form.id_login, rqs_form.nama, rqs_form.tanggal, rqs_form.merk, rqs_form.tipe, rqs_form.unit, rqs_form.serial_number, rqs_form.status FROM rqs_form INNER JOIN login WHERE rqs_form.id_login = login.id_login ORDER BY id_rqs DESC limit $halaman_awal, $batas ";
                }
                   $result =$conn-> query($sql);
                      if($result->num_rows > 0){
                        while($row = $result->fetch_assoc()){
                          echo '<tr>';
                          echo '<td>'.$row['id_rqs'].'</td>';
                          echo '<td>'.$row['nama'].'</td>';
                          echo '<td>'.$row['tanggal'].'</td>';
                          echo '<td>'.$row['merk'].'</td>';
                          echo '<td>'.$row['unit'].'</td>';
                          echo '<td>'.$row['serial_number'].'</td>';
                          echo '<td><b>'.$row['status'].'</b></td>';
                          ?>
                          <td>
                            <a href="detailrqs.php?id_rqs=<?php echo $row['id_rqs']?>">Detail</a>
                          </td>
                          <td>
                            <?php
                            if ($row['status'] == "PENDING") {
                            ?>
                           <a href="../function/acc.php?id_rqs=<?php echo $row['id_rqs']?>"><button class="btn btn-primary" onclick="return confirm('Apakah anda yakin untuk acc rqs ini?')">ACC</button></a>
                           <a href="../function/reject.php?id_rqs=<?php echo $row['id_rqs'];?>"><button class="btn btn-danger" onclick="return confirm('Apakah anda yakin untuk menolak rqs ini?')">REJECT</button></a>
                           <a href="tambahnotes.php?id_rqs=<?php echo $row['id_rqs'];?>"><button class="btn btn-secondary">NOTES</button></a>
                           <?php
                            }elseif ($row['status'] == "REJECT"){
                           ?>
                           <a href="tambahreject.php?id_rqs=<?php echo $row['id_rqs'];?>"><button class="btn btn-dark">NOTES</button></a>
                           <?php
                            }elseif($row['status'] == "ACC"){
                          
                           echo '<i class="fas fa-check-circle " style="color : green;"></i>';
                           
                            }else{
                           ?>
                           <a href="../function/acc.php?id_rqs=<?php echo $row['id_rqs']?>"><button class="btn btn-primary" onclick="return confirm('Apakah anda yakin untuk acc rqs ini?')">ACC</button></a>
                           <a href="../function/pending.php?id_rqs=<?php echo $row['id_rqs']?>"><button class="btn btn-warning" onclick="return confirm('Apakah anda yakin untuk pending rqs ini?')">PENDING</button></a>
                           <a href="../function/reject.php?id_rqs=<?php echo $row['id_rqs']?>"><button class="btn btn-danger" onclick="return confirm('Apakah anda yakin untuk menolak rqs ini?')">REJECT</button></a>
                          </td>
                          <?php
                          };
                          ?>
                          <?php
                          echo '<tr>';
                        }
                      }
                          ?>
                 
                </tbody>
              </table>
              </div>
              <nav>
                <ul class="pagination justify-content-center">
                  <li class="page-item">
                    <a class="page-link" <?php if($halaman > 1){ echo "href='?halaman=$previous'"; } ?>>Previous</a>
                  </li>
                  <?php 
                  for($x=1;$x<=$total_halaman;$x++){
                    if (($x>=$halaman-1) && ($x<=$halaman+1) || ($x==1) || ($x==$total_halaman)) {
                      # code...
                    ?> 
                    <li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
                    <?php
                    }
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
  } else{
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

