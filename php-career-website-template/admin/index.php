<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Css Import -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">

    <title>Admin Paneli</title>
</head>

<body>

    <!-- Admin Giriş Section Start -->
    <section id="admin">
        <div class="container">
            <div class="row" style="height: 70vh;">
                <div class="col-4 mx-auto my-auto text-center">
                    <img  class="w-25" src="../img/cenk-logo-234x240px.png">
                    <form method="post" class="mt-3">
                        <div class="form-group">
                            <input type="text" name="kadi" class="form-control" placeholder="Kullanıcı Adı">
                        </div>
                        <div class="form-group">
                            <input type="password" name="sifre" placeholder="Şifre" class="form-control">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success w-100">Giriş</button>
                        </div>
                    </form>

                    <?php
                    if ($_POST) {
                        $kadi = $_POST['kadi'];
                        $sifre = $_POST['sifre'];

                        if ($kadi == "Admin" && $sifre == "123") {
                            $_SESSION['kadi'] = $kadi;
                            echo '<div class="alert alert-success">Kullanıcı Adı ve Şifre Doğru</div>';
                            echo '<meta http-equiv="refresh" content="2; url=dashboard.php">';
                        } else {
                            echo '<div class="alert alert-danger">Hatalı Giriş</div>';
                        }
                    }
                    ?>

                </div>
            </div>
        </div>
    </section>
    <!-- Admin Giriş Section End -->





    <!-- Js Files Import -->
    <script src="../js/jquery.slim.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>

</html>