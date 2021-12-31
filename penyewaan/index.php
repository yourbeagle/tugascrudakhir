<?php
include_once("../connect.php");
$result = mysqli_query($mysqli, "select * from penyewaan inner join lapangan on penyewaan.kode_lapangan = lapangan.kode_lapangan
                                                         inner join petugas on penyewaan.kode_petugas = petugas.kode_petugas
                                                         inner join pemesan on penyewaan.kode_pemesan = pemesan.kode_pemesan order by kode_sewa");
$lapangan = mysqli_query($mysqli, "select * from lapangan");
$petugas = mysqli_query($mysqli, "select * from petugas");
$pemesan = mysqli_query($mysqli, "select * from pemesan");
session_start();
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
    <section id="header">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#"><span style="font-weight: bold;">LapanganKu</a>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="../login/dashboard.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../lapangan/index.php">Lapangan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../petugas/index.php">Petugas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../pemesan/index.php">Pemesan</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="../penyewaan/index.php"><span style="font-weight: bold;">Penyewaan</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../pembayaran/index.php">Pembayaran</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </nav>
    </section>
    <div class="col-12" style="margin-top: 50px;">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data Penyewaan
                    <a href="#tambah" data-toggle="modal" style="float:right" class="btn btn-primary">Tambah</a>
                </h4>
                <?php
                if (isset($_SESSION['pesan'])) {
                    if ($_SESSION['pesan'] != NULL) {
                        echo $_SESSION['pesan'];
                        unset($_SESSION['pesan']);
                    } else {
                        echo '';
                    }
                }

                ?>
            </div>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Kode Sewa</th>
                            <th scope="col">Nama Lapangan</th>
                            <th scope="col">Nama Petugas</th>
                            <th scope="col">Nama Pemesan</th>
                            <th scope="col">Tgl Pesan</th>
                            <th scope="col">Tgl Sewa</th>
                            <th scope="col">Jam Masuk</th>
                            <th scope="col">Jam Selesai</th>
                            <th scope="col">Deposit</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($result as $data) {
                            echo '
                            <tr>
                            <td>' . $data['kode_sewa'] . '</td>
                            <td>' . $data['nama_lapangan'] . '</td>
                            <td>' . $data['nama_petugas'] . '</td>
                            <td>' . $data['nama_pemesan'] . '</td>
                            <td>' . $data['tgl_pesan'] . '</td>
                            <td>' . $data['tgl_sewa'] . '</td>
                            <td>' . $data['jam_masuk'] . '</td>
                            <td>' . $data['jam_selesai'] . '</td>
                            <td>' . $data['deposit'] . '</td>
                            <td>
                            <a href="edit.php?kode_sewa=' . $data['kode_sewa'] . '" class="btn btn-warning">Update</a>
                            <a style="margin-left:10px" href="#" onclick="deleteData(' . "'$data[kode_sewa]'" . ')" class="btn btn-danger">Delete</td>
                            </tr>
                            ';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Penyewaan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="./add.php" method="post">

                        <div class="form-group">
                            <label for="">Kode Sewa</label>
                            <input type="text" class="form-control" name="kode_sewa" required="true">
                        </div>
                        <div class="form-group">
                            <label for="">Nama Lapangan</label>
                            <select name="kode_lapangan" class="form-control" required="true">
                                <option value="none">Pilih Nama Lapangan</option>
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
                                <option value="none">Pilih Nama Petugas</option>
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
                                <option value="none">Pilih Nama Pemesan</option>
                                <?php
                                foreach ($pemesan as $data) {
                                    echo "<option value='" . $data['kode_pemesan'] . "'>" . $data['nama_pemesan'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal Pesan</label>
                            <input type="date" class="form-control" name="tgl_pesan" required="true">
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal Sewa</label>
                            <input type="date" class="form-control" name="tgl_sewa" required="true">
                        </div>
                        <div class="form-group">
                            <label for="">Jam Masuk</label>
                            <input type="time" class="form-control" name="jam_masuk" required="true">
                        </div>
                        <div class="form-group">
                            <label for="">Jam Selesai</label>
                            <input type="time" class="form-control" name="jam_selesai" required="true">
                        </div>
                        <div class="form-group">
                            <label for="">Deposit</label>
                            <input type="text" class="form-control" name="deposit" required="true">
                        </div>
                        <div class=" modal-footer">
                            <input type="submit" name="submit" value="Submit" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>




        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
        <script language="JavaScript" type="text/javascript">
            function deleteData(id) {
                if (confirm("Are you sure you want to delete this data?")) {
                    window.location.href = 'delete.php?kode_sewa=' + id;
                }
            }
        </script>
</body>

</html>