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
    <link href="../fontawesome/css/all.css" rel="stylesheet"> 
    
    <!--load all styles -->

    <title>Detail WO</title>
</head>
<style>
    @media (min-width:1100px){
        h2{
            text-align : center;
            text-transform : uppercase;
            margin-top : 20px;
        }
        
        .kartu-rqs{
            width : 800px;
            height : 650px;
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
            margin : 0 auto;
        }

        .id-wo{
            margin-left : 70px;
            margin-top : 20px;
        }

        label{
            margin-left : 70px;
        }

        .tabel{
        overflow-x:scroll;
        height : 200px;
        
        
      }

      .btn-primary{
          margin-left : 40px;
      }

      .span-1 {
          margin-left : 10.5rem;
      }
      .span-2 {
          margin-left : 11rem;
      }
      .span-3 {
          margin-left : 5rem;
      }
      .span-4 {
          margin-left : 7rem;
      }
      .span-5 {
          margin-left : 9.5rem;
      }
      .span-6 {
          margin-left : 7rem;
      }
      .span-7 {
          margin-left : 9rem;
      }
      .span-8 {
          margin-left : 7.3rem;
      } 
      .span-9 {
          margin-left : 9rem;
      }
      .span-10 {
          margin-left : 10rem;
          font-weight : bold;
          color : red;
      }
    }


</style>
<body>
    <h2>Detail WO</h2>

    <?php
         $sql = "SELECT wo_form.id_wo, login.id_login, login.nama, wo_form.id_login, wo_form.tanggal_penugasan,wo_form.tanggal_terima, wo_form.tanggal_selesai, wo_form.target_selesai, wo_form.jam_penugasan,wo_form.jam_terima, wo_form.jam_selesai, wo_form.customer, wo_form.merk, wo_form.tipe, wo_form.unit, wo_form.serial_number, wo_form.tugas_1, wo_form.tugas_2, wo_form.tugas_3, wo_form.tugas_4, wo_form.tugas_5, wo_form.notes_1, wo_form.notes_2, wo_form.notes_3, wo_form.notes_4, wo_form.notes_5,wo_form.gambar , wo_form.gambar_2, wo_form.gambar_3, wo_form.gambar_4, wo_form.gambar_5, wo_form.status, wo_form.alasan_tolak, wo_form.tanggal_tolak FROM wo_form INNER JOIN login ON wo_form.id_login = login.id_login WHERE wo_form.id_wo = '".$_GET['id_wo']."'";

                
         $result =$conn-> query($sql);
            if($result->num_rows > 0){
              while($row = $result->fetch_assoc()){

         
       
    ?>

    <div class="kartu-rqs">

            <label for="" class="id-wo">ID WO <span class="span-1"><?php echo $row['id_wo'];?></span></label><br>
            <label for="">Nama<span class="span-2"><?php echo $row['nama'];?></span></label><br>
            <label for="">Tanggal Penugasan <span class="span-3"><?php echo date('d-m-Y', strtotime($row['tanggal_penugasan']));?></span></label><br>
            <label for="">Jam Penugasan<span class="span-4"><?php echo date('H:i', strtotime($row['jam_penugasan']));?></span></label><br>
            <label for="">Customer<span class="span-5"><?php echo $row['customer'];?></span></label></label><br>

            <?php
            if ($row['status'] == "DITOLAK") {
            ?>
            <br>
            <?php
            }elseif($row['status'] == "DISERAHKAN"){
            ?>
            <label for="">Tanggal Terima <span class="span-6"><?php echo "Belum Diterima";?></span></label><br>
            <label for="">Jam Terima<span class="span-7"><?php echo "Belum Diterima";?></span></label><br>
            <label for="">Tanggal Selesai<span class="span-8"><?php echo "Belum Selesai";?></span></label><br>
            <label for="">Jam Selesai<span class="span-9"><?php echo "Belum Selesai";?></span></label><br>
            <label for="">Deadline<span class="span-10"><?php echo date('d-m-Y', strtotime($row['target_selesai']));?></span></label><br>
            <?php
            }elseif($row['status'] == "DITERIMA"){
            ?>
            <label for="">Tanggal Terima <span class="span-6"><?php echo date('d-m-Y', strtotime($row['tanggal_terima']));?></span></label><br>
            <label for="">Jam Terima<span class="span-7"><?php echo date('H:i', strtotime($row['jam_terima']));?></span></label><br>
            <label for="">Tanggal Selesai<span class="span-8"><?php echo "Belum Selesai";?></span></label><br>
            <label for="">Jam Selesai<span class="span-9"><?php echo "Belum Selesai";?></span></label><br>
            <label for="">Deadline<span class="span-10"><?php echo date('d-m-Y', strtotime($row['target_selesai']));?></span></label><br>
            <?php
            }else{
            ?>
            <label for="">Tanggal Terima <span class="span-6"><?php echo date('d-m-Y', strtotime($row['tanggal_terima']));?></span></label><br>
            <label for="">Jam Terima<span class="span-7"><?php echo date('H:i', strtotime($row['jam_terima']));?></span></label><br>
            <label for="">Tanggal Selesai<span class="span-8"><?php echo date('d-m-Y', strtotime($row['tanggal_selesai']));?></span></label><br>
            <label for="">Jam Selesai<span class="span-9"><?php echo date('H:i', strtotime($row['jam_selesai']));?></span></label><br>
            <label for="">Deadline<span class="span-10"><?php echo date('d-m-Y', strtotime($row['target_selesai']));?></span></label><br>

            <?php
            };
            ?>
        <!-- tabel -->
        <div class="tabel">
            <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                <th scope="col">Unit</th>
                <th scope="col">Tipe</th>
                <th scope="col">Merk</th>
                <th scope="col">Serial Number</th>
                <th scope="col">Penugasan</th>
                <?php
                    if($row['status'] == "DITOLAK"){
                ?>
                <th scope="col">Status</th>
                <th scope="col">Tanggal Tolak</th>
                <th scope="col">Alasan</th>
                <?php
                    }elseif($row['status'] == "DITERIMA"){
                ?>
                <th scope="col">Laporan Kerja</th>
                <th scope="col">Status</th>
                <?php
                    }else{
                ?>
                <th scope="col">Laporan Kerja</th>
                <th scope="col">Status</th>
                <th scope="col">Waktu Pengerjaan</th>
                <th scope="col">Kinerja</th>
                <?php
                    };

                    
                ?>
                </tr>
            </thead>
            <tbody>
                <tr>
                   <td>
                       <?php echo $row['unit'];?>
                   </td>
                   <td>
                       <?php echo $row['tipe'];?>
                   </td>
                   <td>
                       <?php echo $row['merk'];?>
                   </td>
                   <td>
                       <?php echo $row['serial_number'];?>
                   </td>
                   <td>
                       <?php echo '1.'.' '.$row['tugas_1'];?><br>
                       <?php echo '2.'.' '.$row['tugas_2'];?><br>
                       <?php echo '3.'.' '.$row['tugas_3'];?><br>
                       <?php echo '4.'.' '.$row['tugas_4'];?><br>
                       <?php echo '5.'.' '.$row['tugas_5'];?><br>
                   </td>
                   <?php
                   if ($row['status'] == "DITOLAK") {
                   ?>
                   <td>
                       <?php echo $row['status'];?>
                   </td>
                   <td>
                       <?php echo date('d-m-Y',strtotime($row['tanggal_tolak']));?>
                   </td>
                   <td>
                       <?php echo $row['alasan_tolak'];?>
                   </td>
                   <?php
                   }elseif($row['status'] == "DONE"){
                   ?>
                   <td>
                       <?php echo '1.'.' '.$row['notes_1'];?><br>
                       <?php echo '2.'.' '.$row['notes_2'];?><br>
                       <?php echo '3.'.' '.$row['notes_3'];?><br>
                       <?php echo '4.'.' '.$row['notes_4'];?><br>
                       <?php echo '5.'.' '.$row['notes_5'];?><br>
                   </td>

                   
                   <td>
                       <?php echo $row['status'];?>
                   </td>
                    <?php
                    $begin = new DateTime($row['tanggal_terima']);
                    $end = new DateTime($row['tanggal_selesai']);
                    
                    $daterange     = new DatePeriod($begin, new DateInterval('P1D'), $end);
                    //mendapatkan range antara dua tanggal dan di looping
                    $i=0;
                    $x     =    0;
                    $end     =    1;
                    
                    foreach($daterange as $date){
                        $daterange     = $date->format("Y-m-d");
                        $datetime     = DateTime::createFromFormat('Y-m-d', $daterange);
                    
                        //Convert tanggal untuk mendapatkan nama hari
                        $day         = $datetime->format('D');
                    
                        //Check untuk menghitung yang bukan hari sabtu dan minggu
                        if($day!="Sun" && $day!="Sat") {
                            //echo $i;
                            $x    +=    $end-$i;
                            
                        }
                        $end++;
                        $i++;
                    }
                                     
                    echo '<td>'.$x." HARI".'</td>';
                    $selesai = new DateTime($row['tanggal_selesai']);
                    $target = new DateTime($row['target_selesai']);
                    $t = "selesai lebih cepat";
                    $s = "tepat waktu";
                    $u = "tidak tepat waktu";

                    if($selesai < $target ){
                        echo '<td>'.$t.'</td>';
                    }elseif($selesai <= $target){
                        echo '<td>'.$s.'</td>';
                    }else{
                        echo '<td>'.$u.'</td>';
                    }
                   
                   };
                   ?>

                </tr>
            </tbody>
            </table>
        </div><br>
        <a href="wo.php" class="btn btn-primary">Kembali</a>
    </div>
                <br>
    <?php
           }
        };
    ?>

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
};
?>