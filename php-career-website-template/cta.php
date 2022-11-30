<?php
$sorgu_cta = $db->prepare('select * from maincta order by id desc limit 1');
$sorgu_cta->execute();
$satir_cta = $sorgu_cta->fetch();
?>

<section id="cta" class="py-5" style="background-image: url('<?php echo substr($satir_cta['foto'],3); ?>');">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <span class="display-4 text-white">
                    <?php echo $satir_cta['baslik']; ?>
                </span>
            </div>
            <div class="col-md-6 text-center my-auto">
                <a href="tel:+9<?php echo $satir_cta['kisayazi']; ?>">
                    <button class="btn btn-lg btn-warning text-white">Hemen Arayın</button>
                </a>
            </div>
        </div>
    </div>
</section>