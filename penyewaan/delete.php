<?php
include_once("../connect.php");
session_start();
$kode_sewa = $_GET['kode_sewa'];


$delete = mysqli_query($mysqli, "delete from penyewaan where kode_sewa='$kode_sewa'") or die(mysqli_error($mysqli));

if ($delete) {
    $_SESSION['pesan'] = '<div class="alert alert-success">Berhasil Delete Data</div>';
} else {
    $_SESSION['pesan'] = '<div class="alert alert-danger">Gagal Delete Data</div>';
}
header("Location: index.php");


?>