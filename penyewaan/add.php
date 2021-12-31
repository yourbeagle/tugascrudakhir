<?php
session_start();

if(isset($_POST['submit']))
{
    $kdsewa = $_POST['kode_sewa'];
    $kdlapangan = $_POST['kode_lapangan'];
    $kdpetugas = $_POST['kode_petugas'];
    $kdpemesan = $_POST['kode_pemesan'];
    $tglPesan = $_POST['tgl_pesan'];
    $tglSewa = $_POST['tgl_sewa'];
    $jamMasuk = $_POST['jam_masuk'];
    $jamSelesai = $_POST['jam_selesai'];
    $deposit = $_POST['deposit'];

    include_once("../connect.php");

    $insert = mysqli_query($mysqli, "insert into penyewaan(kode_sewa,kode_lapangan,kode_petugas,kode_pemesan,tgl_pesan,tgl_sewa,jam_masuk,jam_selesai,deposit) 
                                    values('$kdsewa','$kdlapangan','$kdpetugas','$kdpemesan','$tglPesan','$tglSewa','$jamMasuk','$jamSelesai','$deposit')") or die(mysqli_error($mysqli)); 

    
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