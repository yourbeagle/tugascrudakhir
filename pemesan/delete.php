<?php
include_once("../connect.php");
session_start();
$kode_pemesan = $_GET['kode_pemesan'];


$delete = mysqli_query($mysqli, "delete from pemesan where kode_pemesan='$kode_pemesan'") or die(mysqli_error($mysqli));

if ($delete) {
    $_SESSION['pesan'] = '<div class="alert alert-success">Berhasil Delete Data</div>';
} else {
    $_SESSION['pesan'] = '<div class="alert alert-danger">Gagal Delete Data</div>';
}
header("Location: index.php");


?>