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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Exxa Admin System</title>
  </head>
  <body>
    <div class="container">
        <div class="judul col-md-3 bg-dark text-white mt-2">
          <h3>TAMBAH WO</h3>
        </div>
        
        <form method="post" action="../function/inputwo.php">

        <div class="form-group row mt-3">
            
            <?php
                    $sql = "SELECT max(id_wo) as kodeTerbesar FROM wo_form";
                    $result =$conn-> query($sql);
                    if($result->num_rows > 0){
                        
                      while($row = $result->fetch_assoc()){
                        $kodeWO = $row['kodeTerbesar'];
                        $urutan = (int) substr($kodeWO, 5, 5);
                        $urutan++;
                    
                ?>
                <label for="" class="col-sm-2 col-form-label">ID WO :</label>
                <div class="col-sm-2">
                    <input type="text" readonly class="form-control" value="<?php $huruf = "WO";
                    $kodeWO = $huruf . sprintf("%05s", $urutan);
                    echo $kodeWO;}}?>" name="nowo">
                </div>
        </div>

        <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Nama :</label>
                <div class="col-sm-2">
                  <select class="form-control" style="text-transform : uppercase" name="id_login">
                  <?php
                    $sql = "SELECT * FROM login where level = 'mekanik' ";
                    $result =$conn-> query($sql);
                      if($result->num_rows > 0){
                        while($row = $result->fetch_assoc()){
                          echo "<option value='".$row['id_login']."'>".$row['nama']."</option>";
                        }
                      }
                          
                 ?>
                
                </select>
                </div>
        </div>
        
        

        <div class="form-group row">
              <label for="" class="col-sm-2 col-form-label">Tanggal Penugasan :</label>
              <div class="col-sm-2">
              <input type="text" class="form-control"
              value="<?php echo date('y/m/d');?>" name="tanggal" readonly/>
              </div>
        </div>

        <div class="form-group row">
              <label for="" class="col-sm-2 col-form-label">Jam :</label>
              <div class="col-sm-2">
                <input type="text" class="form-control" value="<?php date_default_timezone_set('Asia/Jakarta'); echo date('H:i'); ?>" readonly name="jam_tugas"/>
              </div>
        </div>

        <div class="form-group row">
              <label for="" class="col-sm-2 col-form-label">Customer :</label>
              <div class="col-sm-2">
                      <input type="text" class="form-control" name="customer"/>
              </div>
        </div>

        <div class="form-group row">
              <label for="" class="col-sm-2 col-form-label">Merk :</label>
              <div class="col-sm-2">
                      <input type="tex" class="form-control" name="merk"/>
              </div>
        </div>

        <div class="form-group row">
              <label for="" class="col-sm-2 col-form-label">Tipe :</label>
              <div class="col-sm-2">
                      <input type="tex" class="form-control" name="tipe"/>
              </div>
        </div>

        <div class="form-group row">
              <label for="" class="col-sm-2 col-form-label">Unit :</label>
              <div class="col-sm-2">
                      <input type="tex" class="form-control" name="unit"/>
              </div>
        </div>

        <div class="form-group row">
              <label for="" class="col-sm-2 col-form-label">Serial Number :</label>
              <div class="col-sm-2">
                      <input type="tex" class="form-control" name="sn"/>
              </div>
        </div>

        <div class="form-group row">
              <label for="" class="col-sm-2 col-form-label">Tugas 1 :</label>
              <div class="col-sm-6">
                      <input type="tex" class="form-control" name="tugas_1"/>
              </div>
        </div>

        <div class="form-group row">
              <label for="" class="col-sm-2 col-form-label">Tugas 2 :</label>
              <div class="col-sm-6">
                      <input type="tex" class="form-control" name="tugas_2"/>
              </div>
        </div>

        <div class="form-group row">
              <label for="" class="col-sm-2 col-form-label">Tugas 3 :</label>
              <div class="col-sm-6">
                      <input type="tex" class="form-control" name="tugas_3"/>
              </div>
        </div>

        <div class="form-group row">
              <label for="" class="col-sm-2 col-form-label">Tugas 4 :</label>
              <div class="col-sm-6">
                      <input type="tex" class="form-control" name="tugas_4"/>
              </div>
        </div>

        <div class="form-group row">
              <label for="" class="col-sm-2 col-form-label">Tugas 5 :</label>
              <div class="col-sm-6">
                      <input type="tex" class="form-control" name="tugas_5"/>
              </div>
        </div>

        
        <button class="btn btn-primary mt-2" type="submit">Submit</button>
        <button class="btn btn-warning mt-2" type="reset">Reset</button>
        <a href="wo.php" class="btn btn-danger mt-2">Cancel</a>
       </form>
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