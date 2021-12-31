<?php
session_start();


if(isset($_POST['submit']))
{
    $kdBayar = $_POST['kode_bayar'];
    $kode_petugas = $_POST['kode_petugas'];
    $kode_sewa = $_POST['kode_sewa'];
    $tglBayar = $_POST['tgl_bayar'];
    $totalBayar = $_POST['harga'];
    $kembalian = $_POST['sisa_bayar'];

    include_once("../connect.php");

    $insert = mysqli_query($mysqli, "insert into pembayaran(kode_bayar,kode_petugas,kode_sewa,tgl_bayar,harga,sisa_bayar) 
                                    values('$kdBayar','$kode_petugas','$kode_sewa','$tglBayar','$totalBayar','$kembalian')") or die(mysqli_error($mysqli)); 

    
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