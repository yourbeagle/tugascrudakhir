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

    <section class="" style="margin-top: 10%; ">
        <div class="container">
            <div class="row align-items-sm-center align-items-lg-stretch">
                <div class="col-md-3 col-lg-3">
                    <div class="">
                    </div>
                </div>
                <div class="col-md-5 col-lg-5" style="margin-top: 10%;">
                    <h1>Login</h1>
                    <form class="form-contact comment_form" action="./login_aksi.php" method="post">
                        <div class="form-group">
                            <input class="form-control" name="username" type="text" placeholder="Username" required="true">
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="password" type="password" placeholder="Password" required="true">
                        </div>
                        <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                    </form>
                    <div style="margin-top: 20px;">
                        <?php
                        if (isset($_GET['pesan'])) {
                            if ($_GET['pesan'] == "gagal") {
                                echo '<div class="alert alert-danger">Login gagal! username dan password salah!</div>';   
                            } else if ($_GET['pesan'] == "logout") {
                                echo '<div class="alert alert-success">Anda telah berhasil logout</div>';
                            } else if ($_GET['pesan'] == "belum_login") {
                                echo '<div class="alert alert-danger">Anda harus login untuk mengakses halaman admin</div>';
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</body>

</html>