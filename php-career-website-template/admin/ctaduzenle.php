<?php require_once('header.php'); ?>
<?php
$id = $_GET['id'];
$sorgu_cta = $db->prepare('select * from maincta where id=?');
$sorgu_cta->execute(array($id));
$satir_cta = $sorgu_cta->fetch();
?>

<!-- Cta Section Start -->

<section id="mainCta" class="py-3">
    <div class="container">
        <div class="row">
            <h2>Ana Sayfa Cta Ayarları</h2>
        </div>
        <form method="post" class="form-row">
            <div class="col-md-6">
                <div class="form-group">
                    <input type="text" name="baslik" value="<?php echo $satir_cta['baslik']; ?>" class="form-control">
                </div>
                <div class="form-group">
                    <input type="text" name="kisayazi" value="<?php echo $satir_cta['kisayazi']; ?>" class="form-control">
                </div>
                <div class="form-group">
                Arkaplan Rengi Seçiniz ->  <input type="color" name="background" value="<?php echo $satir_cta['background']; ?>">
                </div>
                <div class="form-group">
                Görsel Seçiniz ->  <input type="file" name="foto" value="<?php echo $satir_cta['foto']; ?>">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="row">
                        <div class="col-3"><input type="number" name="font" class="form-control" value="<?php echo $satir_cta['font']; ?>"></div>
                        <div class="col-9 my-auto"><small>Slogan Yazı Boyutu Girin</small></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-3"><input type="number" name="font2" class="form-control" value="<?php echo $satir_cta['font2']; ?>"></div>
                        <div class="col-9 my-auto"><small>Kısa Açıklama Yazı Boyutu Girin</small></div>
                    </div>
                </div>
                <div class="form-group">
                    <input type="submit" value="Kaydet" class="btn btn-success w-75 mt-5">
                </div>
            </div>
        </form>
    </div>
</section>
<!--Cta Section End -->

<!-- Cta Değiştir Section Start -->
<section id="duzenle">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
                if ($_POST) {
                    $baslik = $_POST['baslik'];
                    $kisayazi = $_POST['kisayazi'];
                    $background = $_POST['background'];
                    $font = $_POST['font'];
                    $font2 = $_POST['font2'];

                    $sorgu_duzenle = $db->prepare('update maincta set baslik=?, kisayazi=?, background=?, font=?, font2=? where id=?');
                    $sorgu_duzenle->execute(array($baslik, $kisayazi, $background, $font, $font2, $id));

                    if($sorgu_duzenle -> rowCount()){
                        echo '<div class="alert alert-success">Güncellendi</div><meta http-equiv="refresh" content="2; url=cta.php">';
                    } else{
                        echo '<div class="alert alert-danger">Hata Oluştu</div><meta http-equiv="refresh" content="2; url=cta.php">';
                    }
                }
                ?>
            </div>
        </div>
    </div>
</section>
<!-- Cta Değiştir Section End -->
<?php require_once('footer.php'); ?>