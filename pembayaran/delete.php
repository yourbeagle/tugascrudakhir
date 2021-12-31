<?php
include_once("../connect.php");
session_start();
$kode_bayar = $_GET['kode_bayar'];


$delete = mysqli_query($mysqli, "delete from pembayaran where kode_bayar='$kode_bayar'") or die(mysqli_error($mysqli));

if ($delete) {
    $_SESSION['pesan'] = '<div class="alert alert-success">Berhasil Delete Data</div>';
} else {
    $_SESSION['pesan'] = '<div class="alert alert-danger">Gagal Delete Data</div>';
}
header("Location: index.php");


?>