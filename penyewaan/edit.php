<?php
include_once("../connect.php");
session_start();

$kode_sewa = $_GET['kode_sewa'];
$result = mysqli_query($mysqli, "select * from penyewaan inner join lapangan on penyewaan.kode_lapangan = lapangan.kode_lapangan
                                                         inner join petugas on penyewaan.kode_petugas = petugas.kode_petugas
                                                         inner join pemesan on penyewaan.kode_pemesan = pemesan.kode_pemesan
                                                         where kode_sewa='$kode_sewa'") or die("Querry error : " . mysqli_error($mysqli));
$lapangan = mysqli_query($mysqli, "select * from lapangan");
$petugas = mysqli_query($mysqli, "select * from petugas");
$pemesan = mysqli_query($mysqli, "select * from pemesan");

while ($data = mysqli_fetch_array($result)) {
    $kode_lapangan = $data['kode_lapangan'];
    $nama_lapangan = $data['nama_lapangan'];
    $kode_petugas = $data['kode_petugas'];
    $nama_petugas = $data['nama_petugas'];
    $kode_pemesan = $data['kode_pemesan'];
    $nama_pemesan = $data['nama_pemesan'];
    $tglPesan = $data['tgl_pesan'];
    $tglSewa = $data['tgl_sewa'];
    $jamMasuk = $data['jam_masuk'];
    $jamSelesai = $data['jam_selesai'];
    $deposit = $data['deposit'];
}

if (isset($_POST['update'])) {
    $kode_sewa = $_POST['kode_sewa'];
    $kode_lapangan = $_POST['kode_lapangan'];
    $kode_petugas = $_POST['kode_petugas'];
    $kode_pemesan = $_POST['kode_pemesan'];
    $tglPesan = $_POST['tgl_pesan'];
    $tglSewa = $_POST['tgl_sewa'];
    $jamMasuk = $_POST['jam_masuk'];
    $jamSelesai = $_POST['jam_selesai'];
    $deposit = $_POST['deposit'];

    $update = mysqli_query($mysqli, "update penyewaan set kode_lapangan='$kode_lapangan', kode_petugas='$kode_petugas', kode_pemesan='$kode_pemesan', 
                                     tgl_pesan='$tglPesan', tgl_sewa='$tglSewa', jam_masuk='$jamMasuk', jam_selesai='$jamSelesai', deposit='$deposit' where kode_sewa='$kode_sewa'");

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
                <label for="">Kode Sewa</label>
                <input type="text" class="form-control" name="kode_sewa" required="true" value="<?php echo $kode_sewa ?>" readonly>
            </div>
            <div class="form-group">
                <label for="">Nama Lapangan</label>
                <select name="kode_lapangan" class="form-control" required="true">
                    <option value="<?php echo $kode_lapangan?>"><?php echo $nama_lapangan?></option>
                    <?php
                    foreach ($lapangan as $data) {
                        echo "<option value='" . $data['kode_lapangan'] . "'>" . $data['nama_lapangan'] . "</option>";
                    }
                    ?>
                </select>
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
                <label for="">Nama Pemesan</label>
                <select name="kode_pemesan" class="form-control" required="true">
                    <option value="<?php echo $kode_pemesan ?>"><?php echo $nama_pemesan ?></option>
                    <?php
                    foreach ($pemesan as $data) {
                        echo "<option value='" . $data['kode_pemesan'] . "'>" . $data['nama_pemesan'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="">Tanggal Pesan</label>
                <input type="date" class="form-control" name="tgl_pesan" required="true" value="<?php echo $tglPesan ?>">
            </div>
            <div class="form-group">
                <label for="">Tanggal Sewa</label>
                <input type="date" class="form-control" name="tgl_sewa" required="true" value="<?php echo $tglSewa ?>">
            </div>
            <div class="form-group">
                <label for="">Jam Masuk</label>
                <input type="time" class="form-control" name="jam_masuk" required="true" value="<?php echo $jamMasuk ?>">
            </div>
            <div class="form-group">
                <label for="">Jam Selesai</label>
                <input type="time" class="form-control" name="jam_selesai" required="true" value="<?php echo $jamSelesai ?>">
            </div>
            <div class="form-group">
                <label for="">Deposit</label>
                <input type="text" class="form-control" name="deposit" required="true" value="<?php echo $deposit ?>">
            </div>
            <input type="submit" name="update" value="Update" class="btn btn-primary">
        </form>
    </div>
</body>

</html>