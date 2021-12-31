<?php
include_once("../connect.php");
session_start();

$kode_bayar = $_GET['kode_bayar'];
$result = mysqli_query($mysqli, "select * from pembayaran inner join petugas on pembayaran.kode_petugas = petugas.kode_petugas
                                                          inner join penyewaan on pembayaran.kode_sewa = penyewaan.kode_sewa
                                                          where kode_bayar='$kode_bayar'") or die("Querry error : " . mysqli_error($mysqli));
$petugas = mysqli_query($mysqli, "select * from petugas");
$penyewaan = mysqli_query($mysqli, "select * from penyewaan");

while ($data = mysqli_fetch_array($result)) {
    $kode_petugas = $data['kode_petugas'];
    $nama_petugas = $data['nama_petugas'];
    $kode_sewa = $data['kode_sewa'];
    $tglBayar = $data['tgl_bayar'];
    $harga = $data['harga'];
    $sisaBayar = $data['sisa_bayar'];
}

if (isset($_POST['update'])) {
    $kode_bayar = $_POST['kode_bayar'];
    $kode_petugas = $_POST['kode_petugas'];
    $kode_sewa = $_POST['kode_sewa'];
    $tglBayar = $_POST['tgl_bayar'];
    $harga = $_POST['harga'];
    $sisaBayar = $_POST['sisa_bayar'];

    $update = mysqli_query($mysqli, "update pembayaran set kode_petugas='$kode_petugas', kode_sewa='$kode_sewa', tgl_bayar='$tglBayar', 
                                     harga='$harga', sisa_bayar='$sisaBayar' where kode_bayar='$kode_bayar'");

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
                <label for="">Kode Bayar</label>
                <input type="text" class="form-control" name="kode_bayar" required="true" value="<?php echo $kode_bayar ?>" readonly>
            </div>
            <div class="form-group">
                <label for="">Nama Petugas</label>
                <select name="kode_petugas" class="form-control" required="true">
                    <option value="<?php echo $kode_petugas?>"><?php echo $nama_petugas ?></option>
                    <?php
                    foreach ($petugas as $data) {
                        echo "<option value='" . $data['kode_petugas'] . "'>" . $data['nama_petugas'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="">Kode Sewa</label>
                <select name="kode_sewa" class="form-control" required="true">
                    <option value="<?php echo $kode_sewa ?>"><?php echo $kode_sewa ?></option>
                    <?php
                    foreach ($penyewaan as $data) {
                        echo "<option value='" . $data['kode_sewa'] . "'>" . $data['kode_sewa'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="">Tanggal Bayar</label>
                <input type="date" class="form-control" name="tgl_bayar" required="true" value="<?php echo $tglBayar ?>">
            </div>
            <div class="form-group">
                <label for="">Harga</label>
                <input type="text" class="form-control" name="harga" required="true" value="<?php echo $harga ?>">
            </div>
            <div class="form-group">
                <label for="">Kembalian</label>
                <input type="text" class="form-control" name="sisa_bayar" required="true" value="<?php echo $sisaBayar ?>">
            </div>
            <input type="submit" name="update" value="Update" class="btn btn-primary">
        </form>
    </div>
</body>

</html>