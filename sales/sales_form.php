<?php
  include '../db/koneksi.php';
  session_start();
  if (isset($_SESSION['level'])){
    if($_SESSION['level'] == "sales") {
?>
<!DOCTYPE html>
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
      body{
          background-color : #cfcfcf;
      }

      .kotak-sales{
          width : 1000px;
          height : 600px;
          background-color : white;
          margin : 0 auto;
          margin-top : 40px;
          box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
      }

      h3{
          text-align : center;
          text-transform : uppercase;
          padding-top : 10px;    
      }
  </style>
<body>
    
    <div class="kotak-sales">
      <h3>Form Progress Harian Sales</h3>
      <form action="../function/input_sales.php" method="POST">

        <!-- awal baris 1 -->
        <div class="form-group row" style="margin-top : 40px;">
                <?php
                    $sql = "SELECT max(id_customer) as kodeTerbesar FROM sales_form";
                    $result =$conn-> query($sql);
                    if($result->num_rows > 0){
                        
                      while($row = $result->fetch_assoc()){
                        $kodeBarang = $row['kodeTerbesar'];
                        $urutan = (int) substr($kodeBarang, 5, 5);
                        $urutan++;
                    
                ?>
                <label for="" class="col-sm-2 col-form-label" style="margin-left : 40px;">ID Customer :</label>
                <div class="col-sm-2">
                    <input type="text" readonly class="form-control" value="<?php $huruf = "CST";
                    $kodeBarang = $huruf . sprintf("%05s", $urutan);
                    echo $kodeBarang;}}?>" name="id_customer">
                </div>
        </div>
        <!-- akhir baris 1 -->

        <!-- awal baris 2 -->
            <label for="" style="margin-left : 40px;">Nama : </label>
            <input type="text" class="form-control" style="width : 200px; position : absolute; margin-top : -30px; margin-left : 210px;" name="nama_customer"/>
            <input type="text" class="form-control" style="width : 200px; position : absolute; margin-top : -30px; margin-left : 210px;" value="<?php echo $_SESSION['id_login'];?>" name="id_login" hidden/>
            <label for="" style="margin-left : 450px;">Nama Perusahaan : </label>
            <input type="text" class="form-control" style="width : 200px; position : absolute; margin-top : -30px; margin-left : 700px;" name="nama_perusahaan"/><br><br>
        <!-- akhir baris 2 -->

        
        <!-- awal baris 3 -->
        <label for="" style="margin-left : 40px;">No Telp : </label>
            <input type="text" class="form-control" style="width : 200px; position : absolute; margin-top : -30px; margin-left : 210px;" name="no_telp_customer"/>
            <label for="" style="margin-left : 430px;">Alamat Perusahaan : </label>
            <textarea class="form-control" style="width : 200px; height : 90px;position : absolute; margin-top : -30px; margin-left : 700px;" name="alamat_perusahaan"></textarea><br><br>
        <!-- akhir baris 3 -->

        <!-- awal baris 4 -->
        <label for="" style="margin-left : 40px;">Email : </label>
            <input type="text" class="form-control" style="width : 200px; position : absolute; margin-top : -30px; margin-left : 210px;" name="email_perusahaan"/><br><br>
        <!-- akhir baris 4 -->  

        <!-- awal baris 5 -->
        <label for="" style="margin-left : 40px;">Tanggal : </label>
            <input type="text" class="form-control" style="width : 200px; position : absolute; margin-top : -30px; margin-left : 210px;" value="<?php echo date("Y-m-d");?>" name="tanggal"readonly/>
            <label for="" style="margin-left : 430px;">Bidang Perusahaan : </label>
            <input type="text" class="form-control" style="width : 200px; position : absolute; margin-top : -30px; margin-left : 700px;" name="bidang_perusahaan"/><br><br>
        <!-- akhir baris 5 -->

        <!-- awal baris 6 -->
        <label for="" style="margin-left : 40px;">Kebutuhan Alat : </label>
            <input type="text" class="form-control" style="width : 200px; position : absolute; margin-top : -30px; margin-left : 210px;" name="kebutuhan" /><br><br>
        <!-- akhir baris 6 -->
        
        <!-- awal baris 7 -->
        <label for="" style="margin-left : 40px;">Perencanaan Alat : </label>
        <select class="form-control" id="exampleFormControlSelect1" style="width : 200px; position : absolute; margin-top : -30px; margin-left : 210px;" name="perencanaan">
            <option>rental</option>
            <option>beli</option>
        </select><br><br>
        <!-- akhir baris 7 -->
        <input type="checkbox" value="SETUJU" name="validasi" style="margin-left : 40px;" required/>
                <label class="form-check-label" for="defaultCheck1">
                  Laporan yang saya buat sudah benar, dan saya bertanggung jawab akan laporan ini.
                </label><br>

        <button type="submit" class="btn btn-primary" style="margin-left : 40px; margin-top : 10px;" onclick="return confirm('apakah anda yakin ingin mengirimnya?')">Submit</button>
        <a href="sales.php" class="btn btn-danger" style="margin-top : 10px;">Cancel</a>
      </form>
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