<?php
session_start();

if(isset($_POST['submit']))
{
    $kdLapangan = $_POST['kode_lapangan'];
    $nmLapangan = $_POST['nama_lapangan'];

    include_once("../connect.php");

    $insert = mysqli_query($mysqli, "insert into lapangan(kode_lapangan,nama_lapangan) values('$kdLapangan','$nmLapangan')") or die(mysqli_error($mysqli)); 

    if($insert)
    {
        $_SESSION['pesan'] = '<div class="alert alert-success">Berhasil Tambah Data</div>';
    }
    else
    {
        $_SESSION['pesan'] = '<div class="alert alert-danger">Gagal Tambah Data</div>';
    }
    header("Location: index.php");
    

}



?>