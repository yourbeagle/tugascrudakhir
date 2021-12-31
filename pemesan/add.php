<?php
session_start();

if(isset($_POST['submit']))
{
    $kdPemesan = $_POST['kode_pemesan'];
    $nmPemesan = $_POST['nama_pemesan'];
    $notelpPemesan = $_POST['no_hp_pemesan'];
    $alamatPemesan = $_POST['alamat_pemesan'];

    include_once("../connect.php");

    $insert = mysqli_query($mysqli, "insert into pemesan(kode_pemesan,nama_pemesan,no_hp_pemesan,alamat_pemesan) 
                                    values('$kdPemesan','$nmPemesan','$notelpPemesan','$alamatPemesan')") or die(mysqli_error($mysqli)); 

    
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