<?php
session_start();

if(isset($_POST['submit']))
{
    $kdPetugas = $_POST['kode_petugas'];
    $nmPetugas = $_POST['nama_petugas'];
    $notelpPetugas = $_POST['no_hp_petugas'];
    $alamatPetugas = $_POST['alamat_petugas'];

    include_once("../connect.php");

    $insert = mysqli_query($mysqli, "insert into petugas(kode_petugas,nama_petugas,no_hp_petugas,alamat_petugas) 
                                    values('$kdPetugas','$nmPetugas','$notelpPetugas','$alamatPetugas')") or die(mysqli_error($mysqli)); 

    
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