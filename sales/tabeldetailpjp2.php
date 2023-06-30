<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
  overflow:hidden;padding:10px 5px;word-break:normal;}
.tg th{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
  font-weight:normal;overflow:hidden;padding:10px 5px;word-break:normal;}
.tg .tg-fymr{border-color:inherit;font-weight:bold;text-align:left;vertical-align:top}
.tg .tg-7btt{border-color:inherit;font-weight:bold;text-align:center;vertical-align:top}
.tg .tg-0pky{border-color:inherit;text-align:left;vertical-align:top;font-weight:bold}
</style>

<?php
        $sql ="SELECT * FROM pjb_form INNER JOIN login ON pjb_form.id_login = login.id_login WHERE pjb_form.id_pjb = '".$_GET['id_pjb']."'";
        $result =$conn-> query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
    ?>
<table class="tg" style="undefined;table-layout: fixed; width: 997px">
<colgroup>
<col style="width: 25px">
    <col style="width: 110px">
    <col style="width: 30px">
    <col style="width: 840px">
</colgroup>
<thead>
  <tr>
    <td class="tg-fymr">2</td>
    <td class="tg-fymr">Tanggal</td>
    <td class="tg-7btt">:</td>
    <td class="tg-0pky"><?php echo date('d-m-Y',strtotime($row['tgl_pjb']));?></td>
  </tr>
</thead>
</table>

<?php
            }
        };
?>