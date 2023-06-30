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
          height : 700px;
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
      <h3>Form Tambah PJB</h3>
      <form action="../function/input_pjb.php" name="formD" method="POST" enctype="multipart/form-data">

        <!-- awal baris 1 -->
        <div class="form-group row" style="margin-top : 40px;">
                <?php
                    $sql = "SELECT max(id_pjb) as kodeTerbesar FROM pjb_form";
                    $result =$conn-> query($sql);
                    if($result->num_rows > 0){
                        
                      while($row = $result->fetch_assoc()){
                        $kodeBarang = $row['kodeTerbesar'];
                        $urutan = (int) substr($kodeBarang, 5, 5);
                        $urutan++;
                    
                ?>
                <label for="" class="col-sm-2 col-form-label" style="margin-left : 40px;">ID PJB :</label>
                <div class="col-sm-2">
                    <input type="text" readonly class="form-control" value="<?php $huruf = "PJB";
                    $kodeBarang = $huruf . sprintf("%05s", $urutan);
                    echo $kodeBarang;}}?>" name="id_pjb">
                </div>
                <?php
                $sql = 'SELECT no_pjb FROM pjb_form ORDER BY id_pjb DESC LIMIT 1';
                $result = mysqli_query($conn, $sql);
                
                if (mysqli_num_rows($result) > 0) {
                  $row = mysqli_fetch_assoc($result);
                  $nomor_surat_terakhir = (int) substr($row['no_pjb'], 0, 3);
              } else {
                  $nomor_surat_terakhir = 0;
              }
              
              // Buat nomor surat baru
              $nomor_surat = str_pad($nomor_surat_terakhir + 1, 3, '0', STR_PAD_LEFT);
              $bulan_sekarang = date('F');
              $subjek_surat = 'PJB-GSM';
              $tahun = date('Y');
              
              $nomor_surat_lengkap = $nomor_surat.'/'.$bulan_sekarang.'/'.$subjek_surat.'/'.$tahun;
              
                ?>
                <label for="" style="margin-left: 200px;">No. Surat : </label>
                <input type="text" class="form-control" style="width: 200px; position: absolute; margin-top: 0px; margin-left: 715px;" value="<?php echo $nomor_surat_lengkap;?>" name="no_surat" readonly/><br><br>
        </div>
        <!-- akhir baris 1 -->

        <!-- awal baris 2 -->
            <label for="" style="margin-left : 40px;">Tanggal PJB : </label>
            <input type="text" class="form-control" style="width : 200px; position : absolute; margin-top : -30px; margin-left : 210px;" value="<?php echo date("Y-m-d");?>" name="tgl_pjb"readonly/>
            <input type="text" class="form-control" style="width : 200px; position : absolute; margin-top : -30px; margin-left : 210px;" value="<?php echo $_SESSION['id_login'];?>" name="id_login" hidden/>
            <label for="" style="margin-left : 400px;">Nama Pembeli : </label>
            <input type="text" class="form-control" style="width : 200px; position : absolute; margin-top : -30px; margin-left : 700px;" name="nama_pembeli"/><br><br>
        <!-- akhir baris 2 -->

        
        <!-- awal baris 3 -->
        <label for="" style="margin-left : 40px;">Nama unit : </label>
            <input type="text" class="form-control" style="width : 200px; position : absolute; margin-top : -30px; margin-left : 210px;" name="nm_unit"/>
            <label for="" style="margin-left : 430px;">Alamat Pembeli : </label>
            <textarea class="form-control" style="width : 200px; height : 90px;position : absolute; margin-top : -30px; margin-left : 700px;" name="alamat_pembeli"></textarea><br><br>
        <!-- akhir baris 3 -->

        <!-- awal baris 4 -->
        <label for="" style="margin-left : 40px;">Spesifikasi unit : </label>
            <input type="text" class="form-control" style="width : 200px; position : absolute; margin-top : -30px; margin-left : 210px;" name="spek_unit"/><br><br>
        <!-- akhir baris 4 -->  

        <!-- awal baris 5 -->
        <label for="" style="margin-left : 40px;">Jumlah Unit : </label>
            <input type="text" class="form-control" style="width : 200px; position : absolute; margin-top : -30px; margin-left : 210px;"  name="jml_unit"/>
            <label for="" style="margin-left : 360px;">Tanggal Penyerahan Unit : </label>
            <input type="date" class="form-control" style="width : 200px; position : absolute; margin-top : -30px; margin-left : 700px;" name="tgl_penyerahan"/><br><br>
        <!-- akhir baris 5 -->

        <!-- awal baris 6 -->
        <label for="" style="margin-left : 40px;">Tempat Penyerahan <br>Unit : </label>
            <input type="text" class="form-control" style="width : 200px; position : absolute; margin-top : -50px; margin-left : 210px;" name="tmp_penyerahan" /><br><br>
        <!-- akhir baris 6 -->
        
        <!-- awal baris 7 -->
        <label for="" style="margin-left : 40px;">Harga : </label>
        <input type="text" class="form-control" style="width : 200px; position : absolute; margin-top : -40px; margin-left : 210px;" name="harga" onkeyup="OnChange(this.value)" onKeyPress="return isNumberKey(event)"/>
        <label for="" style="margin-left : 510px;">PPN 11% : </label>
            <input type="text" class="form-control" style="width : 200px; position : absolute; margin-top : -30px; margin-left : 700px;" name="txtPPN" readonly/><br><br>
        <!-- akhir baris 7 -->

        <!-- awal baris 8 -->
        <label for="" style="margin-left : 40px;">Total Harga : </label>
        <input type="text" class="form-control" style="width : 200px; position : absolute; margin-top : -40px; margin-left : 210px;" name="txtDisplay" readonly/><br><br>
        <!-- akhir baris 8 -->

        <!-- awal baris 9 -->
        <label for="" style="margin-left : 40px;">Lain-lain </label>
        <input type="text" class="form-control" style="width : 200px; position : absolute; margin-top : -40px; margin-left : 210px;" name="lain"/><br><br>
        <!-- akhir baris 9 -->
        <input type="checkbox" value="SETUJU" name="validasi" style="margin-left : 40px;" required/>
                <label class="form-check-label" for="defaultCheck1">
                  Laporan yang saya buat sudah benar, dan saya bertanggung jawab akan laporan ini.
                </label><br>

        <button type="submit" class="btn btn-primary" style="margin-left : 40px; margin-top : 10px;" onclick="return confirm('apakah anda yakin ingin mengirimnya?')">Submit</button>
        <a href="pjb.php" class="btn btn-danger" style="margin-top : 10px;">Cancel</a>
      </form>
    </div>
        
<!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="../js/jquery-3.5.1.slim.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>

    <script>
    function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
    }

    function OnChange(value){
    var harga = parseFloat(value);
    if(isNaN(harga)){
        harga = 0;
    }
    var ppn = harga * 0.11;
    var total = harga + ppn;
    
    document.formD.txtPPN.value = ppn.toFixed(0);
    document.formD.txtDisplay.value = total.toFixed(0);
    }
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