<?php
include '../db/koneksi.php';
session_start();
if (isset($_SESSION['level']) && $_SESSION['level'] == "mekanik") {
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <title>Exxa Admin System</title>
</head>
<body>

<div class="container">
    <h1 class="d-flex justify-content-center">DETAIL REPAIR</h1>
</div>

<?php
$sql = "SELECT * FROM repair_form INNER JOIN login ON repair_form.id_login = login.id_login WHERE repair_form.id_repair ='" . $_GET['id_repair'] . "'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        ?>

        <div class="container">
            <table>
                <tr>
                    <th scope="col">Nama</th>
                    <th scope="col">:</th>
                    <th scope="col"><?php echo $row['nama']; ?></th>
                </tr>
                <tr>
                    <th scope="col">Tgl. repair</th>
                    <th scope="col">:</th>
                    <th scope="col"><?php echo $row['tgl_repair']; ?></th>
                </tr>
                <tr>
                    <th scope="col">Jenis unit</th>
                    <th scope="col">:</th>
                    <th scope="col"><?php echo $row['jenis_repair']; ?></th>
                </tr>
                <tr>
                    <th scope="col">Model Unit</th>
                    <th scope="col">:</th>
                    <th scope="col"><?php echo $row['model_repair']; ?></th>
                </tr>
                <tr>
                    <th scope="col">SN unit</th>
                    <th scope="col">:</th>
                    <th scope="col"><?php echo $row['sn_repair']; ?></th>
                </tr>
            </table>
        </div>

        <br>

        <div class="container">
            <h3 class="d-flex justify-content-start">GAMBAR PERBAIKAN YANG DILAKUKAN</h3>
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Gambar</th>
                    <th scope="col">Keterangan</th>
                </tr>
                </thead>
                <tbody>
                <?php
                for ($i = 1; $i <= 5; $i++) {
                    $gambar_name = 'gambar' . $i;
                    $keterangan_name = 'ket' . $i;
                    if (!empty($row[$gambar_name])) {
                        ?>
                        <tr>
                            <td><img src="../<?php echo $row[$gambar_name]; ?>" alt="Gambar <?php echo $i; ?>" width="200" height="100"></td>
                            <td><?php echo $row[$keterangan_name]; ?></td>
                        </tr>
                        <?php
                    }
                }
                ?>
                </tbody>
            </table>
        </div>

        <?php
    }
}
?>

<br>
<div class="container">
    <a href="formrepair.php"><button class="btn btn-primary">Kembali</button></a>
</div>
<br>

<!-- Bootstrap JS -->
<script src="../js/bootstrap.bundle.min.js"></script>

</body>
</html>

<?php
}
?>
