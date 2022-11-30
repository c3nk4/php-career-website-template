<section id="slider" class="pb-5">
    <div class="container">
        <h2 class="text-center my-5 display-4 lead">Başarı Hikayeleri<hr class="cizgi"></h2>
        <div class="row">
            <div class="col-md-12">
                <div class="slideshow-container">
                    <?php
                    $sorgu_slayt = $db->prepare('select * from slider order by id desc limit 9');
                    $sorgu_slayt->execute();

                    if ($sorgu_slayt->rowCount()) {
                        foreach ($sorgu_slayt as $satir_slayt) {
                    ?>
                            <!-- Full-width slides/quotes -->
                            <div class="mySlides" style="background-color: <?php echo $satir_slayt['bg']; ?> ;">
                                <q style="font-size:<?php echo $satir_slayt['font1']; ?>px;"><?php echo $satir_slayt['icerik']; ?></q>
                                <p style="font-size:<?php echo $satir_slayt['font2']; ?>px;" class="author">- <?php echo $satir_slayt['isim']; ?></p>
                            </div>
                    <?php
                        }
                    }
                    ?>
                    <!-- Next/prev buttons -->
                    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                    <a class="next" onclick="plusSlides(1)">&#10095;</a>
                </div>


            </div>
        </div>
    </div>
</section>