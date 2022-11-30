<?php
require_once('header.php');
$sorgu_anabanner = $db->prepare('select * from anabanner order by id desc limit 1');
$sorgu_anabanner->execute();
$satir_anabanner = $sorgu_anabanner->fetch();
?>


<!-- İndex Banner Section Start -->

<section id="indexBanner" class="py-12">
    <div class="container">
        <div class="row">
            <div class="col-md-6 text-center">
                <h1 class="mt-n4"><?php echo $satir_anabanner['baslik']; ?></h1>
                <p class="mt-5"><?php echo $satir_anabanner['aciklama']; ?></p>
                <a href="ilanlar.php" class="btn btn-lg text-white mavi shadow-lg rounded-0 mt-5" role="button">Sana Uygun İşi Bul</a>
            </div>
            <div class="col-md-6">
            <img src="<?php echo substr($satir_anabanner['foto'], 3); ?>" class="img-fluid">
            </div>
        </div>
    </div>
</section>

<!-- İndex Banner Section End -->



<!-- İlanlar Section Start -->
<section id="ilanlar" class="py-5 border-bottom border-top">
    <div class="container">
        <h2 class="text-center mb-5">Açık Pozisyonlar
            <hr class="cizgi">
        </h2>
        <div class="row">
            <?php
            $sorgu_ilan = $db->prepare('select * from ilanlar where durum="Yayınlandı" order by id desc limit 6');
            $sorgu_ilan->execute();

            if ($sorgu_ilan->rowCount()) {
                foreach ($sorgu_ilan as $satir_ilan) {
            ?>
                    <a class="col-md-5 my-3 border py-2 text-decoration-none text-dark" href="sampleilan.php?id=<?php echo $satir_ilan['id']; ?> " id="kutu">
                        <div class="row">
                            <div class="col-md-9">
                                <h5 class="font-weight-bold lead mb-3" style="letter-spacing:1px ;"><?php echo $satir_ilan['baslik']; ?></h5>
                                <span class="lead" style="font-size: 12px;">Yayınlanma Tarihi: <?php echo $satir_ilan['tarih']; ?> </span>
                            </div>
                            <div class="col-md-3">
                                <i style="font-size: 35px;" class="bi bi-star-fill ml-3"></i>
                            </div>
                        </div>
                    </a>
            <?php
                }
            }
            ?>
        </div>
        <div class="row text-center">
            <div class="col-md-12 mt-4">
                <a href="ilanlar.php" class="btn btn-primary rounded-0 mt-3" role="button">Tüm İlanları Gör</a>
            </div>
        </div>
    </div>
</section>

<!-- İlanlar Section Start -->



<!-- Slider Section Start -->

<?php require_once('slider.php'); ?>

<!-- Slider Section End -->



<!-- Cta Section Start -->

<?php require_once('cta.php'); ?>

<!-- Cta Section End -->



<!-- Blog Section Start -->

<section id="blogİndex" class="py-5">
    <div class="container">
        <h2 class="text-center mb-5">Blog Yazıları
            <hr class="cizgi">
        </h2>
        <div class="row">
            <?php
            $sorgu_blog = $db->prepare('select * from yazilar order by id desc limit 3');
            $sorgu_blog->execute();
            if ($sorgu_blog->rowCount()) {
                foreach ($sorgu_blog as $satir_blog) {
            ?>
                    <div class="col-md-4">
                        <a href="sample.php?id=<?php echo $satir_blog['id']; ?>" class="py-5">
                            <div class="card border-0">
                                <figure class="hover-img">
                                    <img src="<?php echo substr($satir_blog['foto'], 3); ?>" class="img" alt="<?php echo $satir_blog['fotoalt']; ?>">
                                    <figcaption>
                                        <h3 class="lead"><small><?php echo $satir_blog['baslik']; ?></small></h3>
                                    </figcaption>
                                </figure>
                            </div>
                        </a>
                    </div>
            <?php
                }
            }
            ?>
        </div>
        <div class="row text-center">
            <div class="col-md-12 mt-5">
                <a href="blog.php" role="button" class="btn btn-primary rounded-0">Tüm Yazıları Oku</a>
            </div>
        </div>
    </div>
</section>

<!-- Blog Section End -->



<?php require_once('footer.php'); ?>