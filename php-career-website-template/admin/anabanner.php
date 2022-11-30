<?php require_once('header.php'); ?>

<!-- Banner Section Start -->
<section id="anaBanner">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Ana Sayfa Banner Ekle</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form method="post" class="form-row" enctype="multipart/form-data">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="baslik"><small>Başlık Ekleyin</small></label>
                            <input type="text" name="baslik" id="baslik" class="form-control">
                        </div>
                        <div class="form-group">
                            <textarea name="aciklama" rows="7" class="form-control" placeholder="Kısa Açıklama Girin(Max. 300 Karakter)"></textarea>
                            <script>
                                CKEDITOR.replace('aciklama');
                            </script>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="foto"><small>Banner Görsel Ekle</small></label><br>
                            <input type="file" name="foto" id="foto">
                        </div>
                        <div class="form-group">
                            <label for="fotoalt"><small>Görsel Açıklama Ekleyin(Max. 150 Karakter)</small></label>
                            <input type="text" name="fotoalt" id="fotoalt" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-success w-100" value="Kaydet">
                        </div>
                    </div>
                </form>
                <?php
                if ($_POST) {

                    $dizin = "../img/";
                    $yuklenecekfoto = $dizin . $_FILES['foto']['name'];
                    $baslik = $_POST['baslik'];
                    $aciklama = $_POST['aciklama'];
                    $fotoalt = $_POST['fotoalt'];
                    if (move_uploaded_file($_FILES['foto']['tmp_name'], $yuklenecekfoto)) {
                        $sorgu_anabanner = $db->prepare('insert into anabanner(baslik,aciklama,foto,fotoalt) values(?,?,?,?)');
                        $sorgu_anabanner -> execute(array($baslik,$aciklama,$yuklenecekfoto,$fotoalt));

                        if($sorgu_anabanner -> rowCount()){
                            echo '<div class="alert alert-success">Kayıt Başarılı</div>';
                        } else {
                            echo '<div class="alert alert-danger">Hata Oluştu</div>';
                        }
                    }
                }
                ?>
            </div>
        </div>
    </div>
</section>
<!-- Banner Section End -->

<?php require_once('footer.php'); ?>
