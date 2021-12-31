<?php
include_once("../connect.php");
session_start();
$kode_petugas = $_GET['kode_petugas'];


$delete = mysqli_query($mysqli, "delete from petugas where kode_petugas='$kode_petugas'") or die(mysqli_error($mysqli));

if ($delete) {
    $_SESSION['pesan'] = '<div class="alert alert-success">Berhasil Delete Data</div>';
} else {
    $_SESSION['pesan'] = '<div class="alert alert-danger">Gagal Delete Data</div>';
}
header("Location: index.php");


?>