<style>
    h5{
        text-align : center;
        font-family : arial;
        text-transform : uppercase;
        font-weight : bold;
        margin-top : 40px;
    }
    .tg  {border-collapse:collapse;border-spacing:0;}
    .tg td{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
    overflow:hidden;padding:10px 5px;word-break:normal;}
    .tg th{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
    font-weight:normal;overflow:hidden;padding:10px 5px;word-break:normal;}
    .tg .tg-1wig{font-weight:bold;text-align:center;vertical-align:top}
    .tg .tg-0lax{text-align:left;vertical-align:top;font-weight:bold}
</style>

<?php
        $sql ="SELECT * FROM pjb_form INNER JOIN login ON pjb_form.id_login = login.id_login WHERE pjb_form.id_pjb = '".$_GET['id_pjb']."'";
        $result =$conn-> query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
    ?>

    <table class="tg" style="undefined;table-layout: fixed; width: 933px">
    <colgroup>
    <col style="width: 25px">
    <col style="width: 110px">
    <col style="width: 30px">
    <col style="width: 840px">
    </colgroup>
    <thead>
    <tr>
        <td class="tg-1wig">1</td>
        <td class="tg-1wig">No.Perjanjian</td>
        <td class="tg-1wig">:</td>
        <td class="tg-0lax"><?php echo $row['no_pjb'];?></td>
    </tr>
    </thead>
    </table>


    
    <?php
        }
    };
    ?>