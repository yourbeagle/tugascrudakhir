<?php
include_once("../connect.php");
session_start();

$kode_petugas = $_GET['kode_petugas'];
$result = mysqli_query($mysqli, "select * from petugas where kode_petugas='$kode_petugas'") or die("Querry error : " . mysqli_error($mysqli));

while ($data = mysqli_fetch_array($result)) {
    $nama_petugas = $data['nama_petugas'];
    $nohp_petugas = $data['no_hp_petugas'];
    $alamat_petugas = $data['alamat_petugas'];
}

if (isset($_POST['update'])) {
    $kode_petugas = $_POST['kode_petugas'];
    $nama_petugas = $_POST['nama_petugas'];
    $nohp_petugas = $_POST['no_hp_petugas'];
    $alamat_petugas = $_POST['alamat_petugas'];

    $update = mysqli_query($mysqli, "update petugas set nama_petugas='$nama_petugas', no_hp_petugas='$nohp_petugas', alamat_petugas='$alamat_petugas' where kode_petugas='$kode_petugas'");

    if ($update) {
        $_SESSION['pesan'] = '<div class="alert alert-success">Berhasil ubah Data</div>';
    } else {
        $_SESSION['pesan'] = '<div class="alert alert-danger">Gagal Ubah Data</div>';
    }
    header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <form action="edit.php" method="post" style="margin-top: 10px;">
            <div class="form-group">
                <label for="">Kode Petugas</label>
                <input type="text" class="form-control" name="kode_petugas" value="<?php echo $kode_petugas ?>" readonly>
            </div>
            <div class="form-group">
                <label for="">Nama Petugas</label>
                <input type="text" class="form-control" name="nama_petugas" value="<?php echo $nama_petugas ?>">
            </div>
            <div class="form-group">
                <label for="">Notelp Petugas</label>
                <input type="text" class="form-control" name="no_hp_petugas" value="<?php echo $nohp_petugas ?>">
            </div>
            <div class="form-group">
                <label for="">Alamat Petugas</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="alamat_petugas" ><?php echo $alamat_petugas ?></textarea>
            </div>
            <input type="submit" name="update" value="Update" class="btn btn-primary">
        </form>
    </div>
</body>

</html>