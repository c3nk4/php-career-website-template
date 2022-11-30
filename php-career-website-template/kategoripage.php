<?php
require_once('header.php');
$kategori = $_GET['kategori'];
$kat = $db->prepare('select * from yazilar where kategori = ? order by id desc');
$kat->execute(array($kategori));
?>

<!-- Kategori Banner Section Start -->
<section id="katBanner" class="py-5">
    <div class="container">
        <div class="row border-bottom">
            <div class="col-12 text-center text-dark">
               <h1 class="display-4 mt-3 mb-5">Kategori: <?php echo $kategori; ?><hr class="cizgi"></h1>
            </div>
        </div>
    </div>
</section>
<!-- Kategori Banner Section End -->

<!-- Kategori Blog Yazıları Start -->
<section id="katBlogyazi" class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <?php
                if ($kat->rowCount()) {
                    foreach ($kat as $satir_kat) {
                ?>
                        <div class="row mt-3">
                            <div class="col-md-4">
                                <img src="<?php echo substr($satir_kat['foto'],3); ?>" alt="<?php echo $satir_kat['fotoalt']; ?>" class="img-fluid">
                            </div>
                            <div class="col-md-8">
                                <h2 style="font-size:22px;"><?php echo $satir_kat['baslik']; ?></h2>
                                <?php echo substr($satir_kat['icerik'],0,250); ?>... <br>
                                <a href="sample.php?id=<?php echo $satir_kat['id']; ?>" class="text-decoration-none">Devamını Oku</a>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
            <?php require_once('sidebar.php'); ?>
        </div>
    </div>
</section>
<!-- Kategori Blog Yazıları End -->

<?php require_once('footer.php'); ?>