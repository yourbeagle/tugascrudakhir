<?php
include_once("../connect.php");
session_start();

$kode_pemesan = $_GET['kode_pemesan'];
$result = mysqli_query($mysqli, "select * from pemesan where kode_pemesan='$kode_pemesan'") or die("Querry error : " . mysqli_error($mysqli));

while ($data = mysqli_fetch_array($result)) {
    $nama_pemesan = $data['nama_pemesan'];
    $nohp_pemesan = $data['no_hp_pemesan'];
    $alamat_pemesan = $data['alamat_pemesan'];
}

if (isset($_POST['update'])) {
    $kode_pemesan = $_POST['kode_pemesan'];
    $nama_pemesan = $_POST['nama_pemesan'];
    $nohp_pemesan = $_POST['no_hp_pemesan'];
    $alamat_pemesan = $_POST['alamat_pemesan'];

    $update = mysqli_query($mysqli, "update pemesan set nama_pemesan='$nama_pemesan', no_hp_pemesan='$nohp_pemesan', alamat_pemesan='$alamat_pemesan' where kode_pemesan='$kode_pemesan'");

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
                <label for="">Kode Pemesan</label>
                <input type="text" class="form-control" name="kode_pemesan" value="<?php echo $kode_pemesan ?>" readonly>
            </div>
            <div class="form-group">
                <label for="">Nama Pemesan</label>
                <input type="text" class="form-control" name="nama_pemesan" value="<?php echo $nama_pemesan ?>">
            </div>
            <div class="form-group">
                <label for="">Notelp Pemesan</label>
                <input type="text" class="form-control" name="no_hp_pemesan" value="<?php echo $nohp_pemesan ?>">
            </div>
            <div class="form-group">
                <label for="">Alamat Pemesan</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="alamat_pemesan" ><?php echo $alamat_pemesan ?></textarea>
            </div>
            <input type="submit" name="update" value="Update" class="btn btn-primary">
        </form>
    </div>
</body>

</html>