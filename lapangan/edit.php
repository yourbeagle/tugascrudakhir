<?php
include_once("../connect.php");
session_start();

$kode_lapangan = $_GET['kode_lapangan'];
$result = mysqli_query($mysqli, "select * from lapangan where kode_lapangan='$kode_lapangan'") or die("Querry error : " . mysqli_error($mysqli));

while ($data = mysqli_fetch_array($result)) {
    $nama_lapangan = $data['nama_lapangan'];
}

if (isset($_POST['update'])) {
    $kode_lapangan = $_POST['kode_lapangan'];
    $nmLapangan = $_POST['nama_lapangan'];

    $update = mysqli_query($mysqli, "update lapangan set nama_lapangan='$nmLapangan' where kode_lapangan='$kode_lapangan'");

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
                <label for="">Kode Lapangan</label>
                <input type="text" class="form-control" name="kode_lapangan" value="<?php echo $kode_lapangan?>" readonly>
            </div>
            <div class="form-group">
                <label for="">Nama Lapangan</label>
                <input type="text" class="form-control" name="nama_lapangan" value="<?php echo $nama_lapangan?>">
            </div>
            <input type="submit" name="update" value="Update" class="btn btn-primary">
        </form>
    </div>
</body>

</html>