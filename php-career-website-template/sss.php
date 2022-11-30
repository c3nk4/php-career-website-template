<?php require_once('header.php'); ?>

<!-- Başlık Section Start -->

<section id="basliksss" class="pt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2>Sıkça Sorulan Sorular
                    <hr class="cizgi">
                </h2>
            </div>
        </div>
    </div>
</section>


<!-- Başlık Section End -->

<!-- Accordion Section Start -->

<section id="accor" class="py-5">
    <div class="container">
        <div class="row">
            <?php
            $sorgu_accor = $db->prepare('select * from sss order by id desc');
            $sorgu_accor->execute();

            if ($sorgu_accor->rowCount()) {
                foreach ($sorgu_accor as $satir_accor) {
            ?>
                    <div class="col-md-9 mx-auto">
                        <button class="accordion font-weight-bold mb-2"><?php echo $satir_accor['soru']; ?></button>
                        <div class="panel">
                            <p class="mt-3 font-weight-bold"> <?php echo $satir_accor['cevap']; ?></p>
                        </div>
                    </div>
            <?php
                }
            }
            ?>
        </div>
    </div>
</section>

<!-- Accordion Section End -->


<?php require_once('footer.php'); ?>