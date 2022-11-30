<?php require_once('header.php'); ?>

<!-- Cta Section Start -->

<section id="mainCta" class="py-4">
    <div class="container">
        <div class="row">
            <h2 class="py-4">Ana Sayfa Cta Ayarları</h2>
        </div>
        <form method="post" class="form-row" enctype="multipart/form-data">
            <div class="col-md-6">
                <div class="form-group">
                    <input type="text" name="baslik" placeholder="Slogan Giriniz" class="form-control">
                </div>
                <div class="form-group">
                    <input type="text" name="kisayazi" placeholder="Telefon Numarası Giriniz" class="form-control">
                </div>
                    <div class="col-md-12">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6 mt-3">
                           + Arkaplan Rengi Seçiniz <input type="color" name="background">
                            </div>
                            <div class="col-md-6 mt-3">
                             Veya Background Görsel Ekleyin<input type="file" name="foto">
                          </div>
                        </div>
                    </div>
                    </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="row">
                        <div class="col-3"><input type="number" name="font" class="form-control"></div>
                        <div class="col-9 my-auto"><small>Slogan Yazı Boyutu Girin</small></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-3"><input type="number" name="font2" class="form-control"></div>
                        <div class="col-9 my-auto"><small></small></div>
                    </div>
                </div>
                <div class="form-group">
                    <input type="submit" value="Kaydet" class="mt-4 ml-4 btn btn-success w-75">
                </div>
            </div>
        </form>
    </div>
</section>
<!-- Cta Section End -->

<?php

if ($_POST) {
    $baslik = $_POST['baslik'];
    $kisayazi = $_POST['kisayazi'];
    $background = $_POST['background'];
    $font = $_POST['font'];
    $font2 = $_POST['font2'];
    $dizin = "../img/";
    $yuklenecekfoto = $dizin.$_FILES['foto']['name'];
   
    if (move_uploaded_file($_FILES['foto']['tmp_name'], $yuklenecekfoto)) {
        $sorgu_maincta = $db->prepare('insert into maincta(baslik,kisayazi,background,font,font2,foto) values(?,?,?,?,?,?)');
        $sorgu_maincta->execute(array($baslik, $kisayazi, $background, $font, $font2,$yuklenecekfoto));

        if ($sorgu_maincta->rowCount()) {
            echo '<div class="alert alert-success">Kayıt Başarılı</div>';
        } else {
            echo '<div class="alert alert-danger">Hata Oluştu</div>';
        }
    }
}
?>


<!-- Cta List Start -->
<section id="ctaList">
    <div class="container">
        <h2 class="py-2">Cta Düzenle/Sil</h2>
        <div class="row">
            <div class="col-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Slogan</th>
                            <th>Tel No</th>
                            <th>Background Renk</th>
                            <th>Slogan Font</th>
                            <th></th>
                            <th>Görsel</th>
                            <th>Düzenle</th>
                            <th>Sil</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $sorgu_ctalist = $db->prepare('select * from maincta order by id desc');
                        $sorgu_ctalist->execute();

                        if ($sorgu_ctalist->rowCount()) {
                            foreach ($sorgu_ctalist as $satir_ctalist) {
                                ?>
                                <tr>
                                <td><?php echo $satir_ctalist['id']; ?></td>
                                <td><?php echo $satir_ctalist['baslik']; ?></td>
                                <td><?php echo $satir_ctalist['kisayazi']; ?></td>
                                <td class="text-success" style="background-color: <?php echo $satir_ctalist['background']; ?> ;"><?php echo $satir_ctalist['background']; ?></td>
                                <td><?php echo $satir_ctalist['font']; ?></td>
                                <td><?php echo $satir_ctalist['font2']; ?></td>
                                <td><?php echo $satir_ctalist['foto']; ?></td>
                                <td><a href="ctaduzenle.php?id=<?php echo $satir_ctalist['id']; ?>"><button class="btn btn-primary">Değiştir</button></a></td>
                                <td><a href="ctasil.php?id=<?php echo $satir_ctalist['id']; ?>"><button class="btn btn-danger">Sil</button></a></td>
                            </tr>
                            <?php
                            }
                        }

                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<!-- Cta List End -->
<?php require_once('footer.php'); ?>