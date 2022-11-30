<?php
require_once('header.php');

$sorgu_ban = $db->prepare('select * from hakkimizdabanner order by id desc limit 1');
$sorgu_ban->execute();
$satir_ban = $sorgu_ban->fetch();

$sorgu_icerik = $db->prepare('select * from hakkimizdaicerik order by id desc limit 1');
$sorgu_icerik->execute();
$satir_icerik = $sorgu_icerik->fetch();

$sorgu_sayilar = $db->prepare('select * from sayilarlabiz order by id desc');
$sorgu_sayilar->execute();
$satir_sayilar = $sorgu_sayilar->fetch();
?>

<!-- Hakkımızda Banner Section Start -->
<section id="hakkimizdaBanner" style="background-image:url('<?php echo substr($satir_ban['foto'], 3); ?>'); <?php echo $satir_ban['size']; ?> <?php echo $satir_ban['tekrar'];  ?> <?php echo $satir_ban['konum']; ?>" class="py-12">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center text-white">
                <h1 class="display-4"><?php echo $satir_ban['baslik']; ?></h1>
            </div>
        </div>
    </div>
</section>
<!-- Hakkımızda Banner Section End -->

<!-- İçerik Section Start -->
<section id="icerik" class="py-4">
    <div class="container">
        <div class="row">
            <div class="col-md-6 my-auto">
                <img src="<?php echo substr($satir_icerik['foto'], 3); ?>" class="img-fluid" alt="<?php echo $satir_icerik['fotoalt']; ?>">
            </div>
            <div class="col-md-6 mt-2">
                <div class="row">
                    <div class="col-md-12 text-justify">
                        <h2><?php echo $satir_icerik['altbaslik']; ?></h2>
                        <?php echo $satir_icerik['icerik']; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- İçerik Section End -->

<!-- Sayılarla Biz Section Start -->
<section id="sayilarBaslik">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center py-4 mt-5">Sayılarla Biz<hr class="cizgi"></h2>
            </div>
        </div>
    </div>
</section>
<section id="sayilarlaBiz" class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-3 text-center border-right">
               <i class="bi bi-globe2 icons"></i>
               <p class="font-weight-bold lead"><?php echo $satir_sayilar['ulke']; ?></p>
            </div>
            <div class="col-md-3 text-center border-right">
               <i class="bi bi-geo-alt-fill"></i>
               <p class="font-weight-bold lead"><?php echo $satir_sayilar['sehir']; ?></p>
            </div>
            <div class="col-md-3 text-center border-right">
                <i class="bi bi-fingerprint"></i>
                <p class="font-weight-bold lead"><?php echo $satir_sayilar['proje']; ?></p>
            </div>
            <div class="col-md-3 text-center">
                <i class="bi bi-gender-female"></i>
                <p class="font-weight-bold lead"><?php echo $satir_sayilar['kadin']; ?></p>
            </div>
        </div>
    </div>
</section>




<!-- Sayılarla Biz Section End -->




<?php require_once('footer.php'); ?>