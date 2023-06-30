<?php
include '../db/koneksi.php';
session_start();

if (isset($_SESSION['level'])) {
    if ($_SESSION['level'] == "mekanik") {

        $no_rpr = $_POST['norpr'];
        $nama = $_POST['nama'];
        $id_login = $_POST['id_login'];
        $tgl_rpr = $_POST['tgl_rpr'];
        $txtunit = $_POST['txtunit'];
        $txtmerk = $_POST['txtmerk'];
        $txtmodel = $_POST['txtmodel'];
        $txtserialnumber = $_POST['txtserialnumber'];
        $validasi = $_POST['setuju'];
        $txt_notes = $_POST['txt_notes'];
        $txt_ket1 = $_POST['txt_ket1'];
        $txt_ket2 = $_POST['txt_ket2'];
        $txt_ket3 = $_POST['txt_ket3'];
        $txt_ket4 = $_POST['txt_ket4'];
        $txt_ket5 = $_POST['txt_ket5'];

        $gbr = array();

        // Looping untuk field gambar1 sampai gambar5
        for ($i = 1; $i <= 5; $i++) {
            $input_name = 'gambar' . $i;
            if (isset($_FILES[$input_name])) {
                if ($_FILES[$input_name]['size'] > 0 && $_FILES[$input_name]['size'] < 5000000) {
                    $target_dir = "gambar_repair/";
                    $name = substr(str_shuffle(MD5(microtime())), 0, 12) . '-' . $_FILES[$input_name]['name'];
                    $target_file = '../' . $target_dir . basename($name);

                    // Memilih tipe file
                    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                    // Tipe file yang diperbolehkan
                    $extensions_arr = array("jpg", "jpeg", "png", "pdf", "gif");

                    // Upload file
                    if (in_array($imageFileType, $extensions_arr)) {
                        move_uploaded_file($_FILES[$input_name]['tmp_name'], '../' . $target_dir . $name);
                        $gbr[] = $target_dir . $name;
                    }
                }
            }
        }

        $gbr1 = isset($gbr[0]) ? $gbr[0] : '';
        $gbr2 = isset($gbr[1]) ? $gbr[1] : '';
        $gbr3 = isset($gbr[2]) ? $gbr[2] : '';
        $gbr4 = isset($gbr[3]) ? $gbr[3] : '';
        $gbr5 = isset($gbr[4]) ? $gbr[4] : '';

        $sql = "INSERT INTO `repair_form`(`id_repair`, `id_login`, `nama`, `tgl_repair`, `jenis_repair`, `merk_repair`, `model_repair`, `sn_repair`, `notes`, `gambar1`, `gambar2`, `gambar3`, `gambar4`, `gambar5`, `status_repair`,`ket1`,`ket2`,`ket3`,`ket4`,`ket5`) VALUES ('$no_rpr', '$id_login', '$nama', '$tgl_rpr', '$txtunit', '$txtmerk', '$txtmodel', '$txtserialnumber', '$txt_notes', '$gbr1', '$gbr2', '$gbr3', '$gbr4', '$gbr5', '$validasi','$txt_ket1','$txt_ket2','$txt_ket3','$txt_ket4','$txt_ket5')";

        $rs = mysqli_query($conn, $sql);

        if ($rs) {
            echo "<script>alert('Data berhasil dimasukkan.'); window.location.href = '../mechanic/formrepair.php';</script>";
        } else {
            echo "Gagal memasukkan data: " . mysqli_error($conn);
        }
    }
}
?>

