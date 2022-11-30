<?php require_once('header.php'); 
$sorgu_hak = $db->prepare('select * from hakkimizdaicerik order by id desc limit 1');
$sorgu_hak->execute();
$satir_hak = $sorgu_hak->fetch();
?>
<!-- Hakkımızda İçerik Section Start -->
<section id="hakkimdaIcerik" class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="py-3">Hakkımızda İçerik Alanı</h2>
            </div>
            <div class="col-md-12">
                <form method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label><small>Yan Görsel Ekle</small></label>
                        <input type="file" name="foto"  value="<?php echo $satir_hak['foto']; ?>">
                    </div>
                    <div class="form-group">
                        <label><small>Başlık Ekle</small></label>
                        <input type="text" name="altbaslik" class="form-control"  value="<?php echo $satir_hak['altbaslik']; ?>">
                    </div>
                    <div class="form-group">
                        <textarea  name="icerik" rows="7" class="form-control"><?php echo $satir_hak['icerik']; ?></textarea>
                        <script>
                            CKEDITOR.replace('icerik');
                        </script>
                    </div>
                    <div class="form-group">
                        <label><small>Görsel Alt Metni Ekle</small></label>
                        <input type="text" name="fotoalt" class="form-control"  value="<?php echo $satir_hak['fotoalt']; ?>">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success w-100">Kaydet</button>
                    </div>
                </form>
                <?php
                if ($_POST) {
                    $yuklenecekfoto = "../img/" . $_FILES['foto']['name'];
                    $altbaslik = $_POST['altbaslik'];
                    $icerik = $_POST['icerik'];
                    $fotoalt = $_POST['fotoalt'];

                    if (move_uploaded_file($_FILES['foto']['tmp_name'], $yuklenecekfoto)) {
                        $sorgu_hakkimizdaicerik = $db->prepare('insert into hakkimizdaicerik(foto,altbaslik,icerik,fotoalt) values(?,?,?,?)');
                        $sorgu_hakkimizdaicerik->execute(array($yuklenecekfoto,$altbaslik,$icerik,$fotoalt));

                        if ($sorgu_hakkimizdaicerik->rowCount()) {
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
<!-- Hakkımızda İçerik Section End -->

<?php require_once('footer.php'); ?>