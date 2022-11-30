<?php
session_start();

if (!isset($_SESSION['kadi'])) {
    die('Giriş Yetkiniz Yoktur.');
}

require_once('baglan.php');

$sorgu_yorum = $db->prepare('select count(*) from yorumlar where durum = "onaylanmadı" ');
$sorgu_yorum->execute();
$satir_yorum = $sorgu_yorum->fetchColumn();

$sorgu_mesaj = $db->prepare('select count(*) from mesajlar where durum = "Okunmadı"');
$sorgu_mesaj->execute();
$satir_mesaj = $sorgu_mesaj->fetchColumn();

$sorgu_cv = $db->prepare('select count(*) from basvurular');
$sorgu_cv->execute();
$satir_cv = $sorgu_cv->fetchColumn();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Style CSS -->
    <link rel="stylesheet" href="../css/style.css">

    <title>Başlık</title>

    <script src="//cdn.ckeditor.com/4.18.0/full/ckeditor.js"></script>

</head>

<body>


    <section id="adminMenu">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2 bg-dark text-white">
                    <h2 class="mt-2">C Kariyer</h2>
                    <ul class="p-0">
                        <li><a href="dashboard.php">Başlangıç</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle p-0" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                                Ana Sayfa
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item text-dark" href="anabanner.php">Banner Ayarları</a>
                                <a class="dropdown-item text-dark" href="slider.php">Slider Ayarları</a>
                                <a class="dropdown-item text-dark" href="cta.php">Cta Ayarları</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle p-0" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                                Hakkımızda
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item text-dark" href="hakkimizdabanner.php">Banner Ayarları</a>
                                <a class="dropdown-item text-dark" href="hakkimizdaicerik.php">İçerik Ayarları</a>
                                <a class="dropdown-item text-dark" href="sayilarlabiz.php">Sayılarla-Biz Ayarları</a>
                            </div>
                        </li>
                        <li><a href="sayfalar.php">Sayfalar</a></li>
                        <li><a href="ilanlar.php">İlanlar</a></li>
                        <li><a href="basvurular.php">Başvurular-CV</a> <span class="badge badge-success"><?php echo $satir_cv; ?></span> </li>
                        <li><a href="yazilar.php">Yazılar</a></li>
                        <li><a href="yorumlar.php">Yorumlar</a> <span class="badge badge-warning"><?php echo $satir_yorum; ?></span> </li>
                        <li><a href="kategoriler.php">Kategoriler</a></li>
                        <li><a href="mesajlar.php">Mesajlar</a> <span class="badge badge-primary"><?php echo $satir_mesaj; ?></span> </li>
                        <li><a href="sss.php">SSS</a></li>
                        <li><a href="ayarlar.php">Ayarlar</a></li>
                        <li><a href="logout.php">Çıkış</a></li>
                    </ul>
                </div>
                <div class="col-md-10">