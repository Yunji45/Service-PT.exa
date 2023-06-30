<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
  overflow:hidden;padding:10px 5px;word-break:normal;}
.tg th{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
  font-weight:normal;overflow:hidden;padding:10px 5px;word-break:normal;}
.tg .tg-1wig{font-weight:bold;text-align:left;vertical-align:top}
.tg .tg-0lax{text-align:left;vertical-align:top}
</style>

<?php
        $sql ="SELECT * FROM pjb_form INNER JOIN login ON pjb_form.id_login = login.id_login WHERE pjb_form.id_pjb = '".$_GET['id_pjb']."'";
        $result =$conn-> query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
    ?>
<table class="tg" style="undefined;table-layout: fixed; width: 877px">
<colgroup>
<col style="width: 25.333333px">
<col style="width: 170px">
<col style="width: 40px">
<col style="width: 775px">
</colgroup>
<thead>
  <tr>
    <td class="tg-1wig">9</td>
    <td class="tg-1wig">No. Rekening</td>
    <td class="tg-1wig">:</td>
    <td class="tg-0lax">1085040300 BCA (A/N PT. GLOBAL SARANAMESIN MANDIRI) <br>
                        044501001073307 BRI (A/N PT. GLOBAL SARANAMESIN MANDIRI)
    </td>
  </tr>
</thead>
</table>

<?php
            }
        };
?>