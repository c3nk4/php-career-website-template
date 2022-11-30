<?php require_once('header.php'); ?>

<?php
$id = $_GET['id'];
$sorgu_sayfa = $db->prepare("select * from sayfalar where id=$id");
$sorgu_sayfa->execute();
$satir_sayfa = $sorgu_sayfa->fetch();
?>

<!-- Sayfa Düzenle Section Start -->
<section id="sayfaDuzenle" class="py-4">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Sayfa Düzenle</h2>
            </div>
        </div>
        <form method="post" class="form-row" enctype="multipart/form-data">
            <div class="col-md-9">
                <div class="form-group">
                    <input type="text" name="baslik" class="form-control" value="<?php echo $satir_sayfa['baslik']; ?>">
                </div>
                <div class="form-group">
                    <textarea name="icerik" rows="10" class="form-control"><?php echo $satir_sayfa['icerik']; ?></textarea>
                    <script>
                        CKEDITOR.replace('icerik');
                    </script>
                </div>
                <div class="form-group">
                    <label><small>Meta Açıklaması</small></label>
                    <textarea name="meta" rows="4" class="form-control"><?php echo $satir_sayfa['meta']; ?></textarea>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <img src="<?php echo $satir_sayfa['foto']; ?>" class="img-fluid mb-2">
                    <input type="file" name="foto">
                </div>
                <div class="form-group">
                    <label><small>Yayın Durumu - <?php echo $satir_sayfa['durum']; ?></small></label>
                    <select name="durum" class="form-control">
                        <option value="<?php echo $satir_sayfa['durum']; ?>"><?php echo $satir_sayfa['durum']; ?></option>
                        <option value="Taslak">Taslak</option>
                        <option value="Yayınlandı">Yayınlandı</option>
                    </select>
                </div>
                <div class="form-group">
                    <label><small>Görsel Alt Metni</small></label>
                    <input type="text" name="fotoalt" class="form-control" value="<?php echo $satir_sayfa['fotoalt']; ?>">
                </div>
                <div class="form-group">
                    <label><small>Sayfa Başlığı</small></label>
                    <input type="text" name="seotitle" class="form-control" value="<?php echo $satir_sayfa['seotitle']; ?>">
                </div>
                <div class="form-group">
                    <label><small>Yayınlanma Tarihi</small></label>
                    <input type="text" name="tarih" class="form-control" value="<?php echo $satir_sayfa['tarih']; ?>">
                </div>
                <div class="form-group">
                    <input type="submit" value="Güncelle" class="btn btn-success w-100">
                </div>

                <?php
                if ($_POST) {
                    $dizin = "../img/";
                    $yuklenecekfoto = $dizin . $_FILES['foto']['name'];
                    $baslik = $_POST['baslik'];
                    $icerik = $_POST['icerik'];
                    $meta = $_POST['meta'];
                    $durum = $_POST['durum'];
                    $fotoalt = $_POST['fotoalt'];
                    $seotitle = $_POST['seotitle'];
                    $tarih = date('d.m.Y');

                    if(move_uploaded_file($_FILES['foto']['tmp_name'],$yuklenecekfoto)){
                        $sorgu = $db -> prepare('update sayfalar set baslik=?, icerik=?, meta=?, foto=?, durum=?, fotoalt=?, seotitle=?, tarih=? where id=?');
                        $sorgu -> execute(array($baslik,$icerik,$meta,$yuklenecekfoto,$durum,$fotoalt,$seotitle,$tarih,$id));
                        
                        if($sorgu -> rowCount()){
                            echo '<div class="alert alert-success">Sayfa Güncellendi</div><meta http-equiv="refresh" content="2; url=sayfalar.php">';
                        } else {
                            echo '<div class="alert alert-danger">Hata Oluştu</div>';
                        }
                      }
                }
                ?>
            </div>
        </form>
    </div>
</section>
<!-- Sayfa Düzenle Section End -->




<?php require_once('footer.php'); ?>