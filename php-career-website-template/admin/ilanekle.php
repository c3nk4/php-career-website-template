<?php require_once('header.php'); ?>


<!-- İlan Ekle Section Start -->

<section id="ilanEkle" class="py-4">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>İlan Ekle</h3>
            </div>
        </div>
        <form method="post" class="form-row">
            <div class="col-md-8">
                <div class="form-group">
                    <input type="text" name="baslik" class="form-control" placeholder="İlan Başlığını Girin">
                </div>
                <div class="form-group">
                    <textarea name="icerik" rows="7" class="form-control" placeholder="İlan İçeriğini Girin"></textarea>
                    <script>
                        CKEDITOR.replace('icerik');
                    </script>
                </div>
                <div class="form-group">
                   <label><small>İlan Tarihi Girin</small></label>
                    <input type="date" name="tarih" class="form-control" placeholder="İlan Tarihi Girin ">
                </div>
                
            </div>
               <div class="col-md-4">
               <div class="form-group">
                    <label><small>Yayın Durumu</small></label>
                    <select name="durum" class="form-control">
                        <option value="">Seçiniz</option>
                        <option value="Taslak">Taslak</option>
                        <option value="Yayınlandı">Yayınlandı</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="submit" value="Kaydet" class="mt-3 btn btn-success w-100">
                </div>
               </div>
            
                <?php

                if ($_POST) {
                    $baslik = $_POST['baslik'];
                    $icerik = $_POST['icerik'];
                    $tarih =  date('d.m.Y');
                    $durum = $_POST['durum'];
                    $sorgu_ilan = $db ->prepare('insert into ilanlar(baslik,icerik,tarih,durum) values(?,?,?,?)');
                    $sorgu_ilan->execute(array($baslik,$icerik,$tarih,$durum));
                        if ($sorgu_ilan->rowCount()) {
                            echo '<div class="alert alert-success">Kayıt İşlemi Başarılı</div> <meta http-equiv="refresh" content="2; url=ilanlar.php">';
                        } else {
                            echo '<div class="alert alert-danger">Hata Oluştu</div>';
                        }
                    }
                
                ?>
            </div>
        </form>
    </div>
</section>
<!-- İlan Ekle Section End -->

<?php require_once('footer.php'); ?>