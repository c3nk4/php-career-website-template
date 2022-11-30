<?php
require_once('header.php');

$id = $_GET['id'];
$sorgu_yazi = $db->prepare('select * from yazilar where id=?');
$sorgu_yazi->execute(array($id));
$satir_yazi = $sorgu_yazi->fetch();
$baslik = $satir_yazi['baslik'];
?>
<!-- İçerik Section Start -->
<section id="content" class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <img src="<?php echo substr($satir_yazi['foto'], 3); ?>" alt="<?php echo $satir_yazi['fotoalt']; ?>" class="w-100 mb-3">
                <h1><?php echo $satir_yazi['baslik']; ?></h1>
                <small>Yayınlanma Tarihi: <?php echo $satir_yazi['tarih']; ?> - Kategori: <a class="text-decoration-none" href="kategoripage.php?kategori=<?php echo $satir_yazi['kategori']; ?>"><?php echo $satir_yazi['kategori']; ?></a> </small> <br>
                <span class="text-justify"><?php echo $satir_yazi['icerik']; ?></span>
                <hr>
                <h5>YORUMLAR</h5>
                <?php
                $sorgu_yorum = $db->prepare('select * from yorumlar where durum = "onaylandı" order by id desc');
                $sorgu_yorum->execute();
                if ($sorgu_yorum->rowCount()) {
                    foreach ($sorgu_yorum as $satir_yorum) {
                        if ($satir_yorum['baslik'] == $satir_yazi['baslik']) {
                ?>
                            <strong><?php echo $satir_yorum['adiniz'] . ' ' . $satir_yorum['soyadiniz']; ?></strong> - <small><?php echo $satir_yorum['tarih']; ?></small><br>
                            <p><?php echo $satir_yorum['yorum']; ?></p>
                            <hr>
                <?php
                 }
                    }
                    }
               ?>
                <h5 class="mt-5">Yorum Yapın</h5>
                <h6 class="my-3 text-secondary">*E-Posta Adresiniz Yorumlarda Görünmeyecektir.</h6>
                <form method="post" class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="adiniz" placeholder="Adınız" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="soyadiniz" placeholder="Soyadınız" class="form-control">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <input type="email" name="email" placeholder="E-Posta Adresiniz" class="form-control">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <textarea name="yorum" placeholder="Yorumunuz" rows="5" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary w-25">Gönder</button>
                        </div>
                    </div>
                </form>
                       <?php
                if ($_POST) {
                    $adiniz = $_POST['adiniz'];
                    $soyadiniz= $_POST['soyadiniz'];
                    $email = $_POST['email'];
                    $yorum = $_POST['yorum'];
                    $durum = "onaylanmadı";
                    $tarih = date('d.m.Y');
                    $sorgu_yorumkaydet = $db->prepare('insert into yorumlar(adiniz,soyadiniz,email,yorum,baslik,durum,tarih) values(?,?,?,?,?,?,?)');
                    $sorgu_yorumkaydet->execute(array($adiniz, $soyadiniz, $email, $yorum, $baslik, $durum, $tarih));

                    if ($sorgu_yorumkaydet->rowCount()) {
                        echo '<div class="alert alert-success">Yorumunuz Yönetici Onayına Gönderildi</div>';
                    }  else {
                        echo '<div class="alert alert-danger">Hata Oluştu</div>';
                    }
                   }
                        ?>
            </div>
            <?php require_once('sidebar.php'); ?>
        </div>
    </div>
</section>
<!-- İçerik Section End -->

<?php require_once('footer.php'); ?>