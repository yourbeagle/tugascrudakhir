<?php
include_once("../connect.php");
session_start();
$kode_lapangan = $_GET['kode_lapangan'];


$delete = mysqli_query($mysqli, "delete from lapangan where kode_lapangan='$kode_lapangan'") or die(mysqli_error($mysqli));

if ($delete) {
    $_SESSION['pesan'] = '<div class="alert alert-success">Berhasil Delete Data</div>';
} else {
    $_SESSION['pesan'] = '<div class="alert alert-danger">Gagal Delete Data</div>';
}
header("Location: index.php");


?>