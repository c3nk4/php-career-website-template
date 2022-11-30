<?php
require_once('header.php');

$id = $_GET['id'];
$sorgu_yenisayfa = $db->prepare('select * from sayfalar where id=?');
$sorgu_yenisayfa->execute(array($id));
$satir_yenisayfa = $sorgu_yenisayfa->fetch();
?>

<!-- Yeni Sayfa Banner Section start-->
<section id="hizmetBanner" class="py-12" style="background-size: cover; background-repeat: no-repeat; background-image: url('<?php echo substr($satir_yenisayfa['foto'], 3); ?>');">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="display-4 text-white"><?php echo $satir_yenisayfa['baslik']; ?></h1>
            </div>
        </div>
    </div>
</section>
<!-- Yeni Sayfa Banner Section End-->

<!-- İçerik Section Start -->
<section id="hizmetContent" class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <main>
                    <div class="text-justify"><?php echo $satir_yenisayfa['icerik']; ?></div>
                </main>
            </div>
            <?php require_once('sidebar.php'); ?>
        </div>
    </div>
</section>
<!-- İçerik Section End -->

<?php require_once('footer.php'); ?>