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
                    <li class="nav-item active">
                        <a class="nav-link" href="#"><span style="font-weight: bold;">Home</span></a>
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
                    <li class="nav-item">
                        <a class="nav-link" href="../penyewaan/index.php">Penyewaan</a>
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
    <div class="container">
        <div style="margin-top: 20px;">
            <?php
                session_start();
                if ($_SESSION['status'] != "login") {
                    header("Location: login.php?pesan=belum_login");
                }
            ?>
            <h2>Selamat Datang <?php echo $_SESSION['username']; ?></h2>
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

</body>

</html>