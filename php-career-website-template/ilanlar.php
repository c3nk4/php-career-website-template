<?php require_once('header.php'); ?>

<!-- İlanlar Banner Section Start -->
<section id="ilanBanner" class="pt-5" style="background-image: url() ;">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="display-4 lead text-dark">İlanlar</h1>
                <hr class="cizgi">
            </div>
        </div>
    </div>
</section>
<!-- İlanlar Banner Section End -->


<!-- İlanlar Section Start -->
<section id="ilanlar" class="py-5">
    <div class="container">
        <div class="row">
            <?php
            $sorgu_ilan = $db->prepare('select * from ilanlar where durum="Yayınlandı" order by id desc');
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
    </div>
</section>
<!-- İlanlar Section End -->





<?php require_once('footer.php'); ?>