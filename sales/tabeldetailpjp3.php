<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
  overflow:hidden;padding:10px 5px;word-break:normal;}
.tg th{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
  font-weight:normal;overflow:hidden;padding:10px 5px;word-break:normal;}
.tg .tg-fymr{border-color:inherit;font-weight:bold;text-align:left;vertical-align:top}
.tg .tg-0pky{border-color:inherit;text-align:left;vertical-align:top}
</style>

<?php
        $sql ="SELECT * FROM pjb_form INNER JOIN login ON pjb_form.id_login = login.id_login WHERE pjb_form.id_pjb = '".$_GET['id_pjb']."'";
        $result =$conn-> query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
    ?>
<table class="tg" style="undefined;table-layout: fixed; width: 960px">
<colgroup>
<col style="width: 28.333333px">
<col style="width: 122.333333px">
<col style="width: 43.333333px">
<col style="width: 44.333333px">
<col style="width: 197.333333px">
<col style="width: 22.333333px">
<col style="width: 550px">
</colgroup>
<thead>
  <tr>
    <td class="tg-fymr" rowspan="6">3</td>
    <td class="tg-fymr" colspan="2" rowspan="6">Para Pihak &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</td>
    <td class="tg-0pky" rowspan="3">a</td>
    <td class="tg-fymr" colspan="3">Penjual</td>
  </tr>
  <tr>
    <td class="tg-0pky">Nama</td>
    <td class="tg-0pky">:</td>
    <td class="tg-fymr">PT Global Saranamesin Mandiri</td>
  </tr>
  <tr>
    <td class="tg-0pky">Alamat</td>
    <td class="tg-0pky">:</td>
    <td class="tg-0pky">J<span style="color:black">l. Marsekal Suryadharman Blok O No. 1-5, Pergudangan Bandara Mas, Kel.   Kedaung Wetan, Kec. Neglasari, Tangerang</span>   </td>
  </tr>
  <tr>
    <td class="tg-0pky" rowspan="3">b.</td>
    <td class="tg-0pky" colspan="3">Pembeli</td>
  </tr>
  <tr>
    <td class="tg-0pky">Nama</td>
    <td class="tg-0pky">:</td>
    <td class="tg-0pky"><?php echo $row['nm_pbl_pjb'];?></td>
  </tr>
  <tr>
    <td class="tg-0pky">Alamat</td>
    <td class="tg-0pky">:</td>
    <td class="tg-0pky"><?php echo $row['alamat_pbl_pjb'];?></td>
  </tr>
</thead>
</table>

<?php
            }
        };
?>