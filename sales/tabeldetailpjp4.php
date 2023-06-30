<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
  overflow:hidden;padding:10px 5px;word-break:normal;}
.tg th{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
  font-weight:normal;overflow:hidden;padding:10px 5px;word-break:normal;}
.tg .tg-1wig{font-weight:bold;text-align:left;vertical-align:top}
.tg .tg-baqh{text-align:center;vertical-align:top}
.tg .tg-amwm{font-weight:bold;text-align:center;vertical-align:top}
.tg .tg-0lax{text-align:left;vertical-align:top}
</style>

<?php
        $sql ="SELECT * FROM pjb_form INNER JOIN login ON pjb_form.id_login = login.id_login WHERE pjb_form.id_pjb = '".$_GET['id_pjb']."'";
        $result =$conn-> query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
    ?>
<table class="tg" style="undefined;table-layout: fixed; width: 949px">
<colgroup>
<col style="width: 26.333333px">
<col style="width: 170px">
<col style="width: 40px">
<col style="width: 200px">
<col style="width: 26.333333px">
<col style="width: 548px">
</colgroup>
<thead>
  <tr>
    <td class="tg-1wig" rowspan="3">4</td>
    <td class="tg-1wig" rowspan="3">Produk</td>
    <td class="tg-1wig">a.</td>
    <td class="tg-1wig">Nama</td>
    <td class="tg-amwm">:</td>
    <td class="tg-0lax"><?php echo $row['nm_produk_pjb'];?></td>
  </tr>
  <tr>
    <td class="tg-1wig">b.</td>
    <td class="tg-1wig">Spesifikasi</td>
    <td class="tg-baqh">:</td>
    <td class="tg-0lax"><?php echo $row['spek_pjb'];?></td>
  </tr>
  <tr>
    <td class="tg-1wig">c.</td>
    <td class="tg-1wig">Jumlah (unit/set)*</td>
    <td class="tg-baqh">:</td>
    <td class="tg-0lax"><?php echo $row['jml_pjb'];?></td>
  </tr>
</thead>
</table>

<?php
            }
        };
?>