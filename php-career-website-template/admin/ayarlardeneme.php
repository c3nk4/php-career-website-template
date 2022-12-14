<?php require_once('header.php'); ?>

<!-- Ayarlar Section Start -->
<?php
$sorgu_m= $db->prepare('select * from ayarlar order by id desc limit 1');
$sorgu_m->execute();
$satir_m = $sorgu_m->fetch();
?>

<section id="ayarlar">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Site Ayarları</h2>
            </div>
        </div>
        <form method="post" class="form-row" enctype="multipart/form-data">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="adres"><small>Adres</small></label>
                    <input type="text" name="adres" id="adres" class="form-control" value=" <?php echo $satir_m['adres']; ?>">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="telefon"><small>Telefon</small></label>
                    <input type="tel" name="telefon" id="telefon" class="form-control">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="email"><small>E-Posta</small></label>
                    <input type="email" name="email" id="email" class="form-control">
                </div>
            </div>
            <div class="col-md-9">
                <div class="form-group">
                    <label for="harita"><small>Harita (Google Maps)</small></label>
                    <textarea name="harita" id="harita" rows="5" class="form-control"></textarea>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="tanitim"><small>Kısa Tanıtım Yazısı</small></label>
                    <textarea name="tanitim" id="tanitim" rows="5" class="form-control"></textarea>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="logo"><small>Logo Ekle</small></label>
                    <input type="file" name="logo" id="logo">
                </div>
                <div class="form-group">
                    <input type="text" name="fotoalt1" class="form-control" placeholder="Foto Alt Metni Girin">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="blogbanner"><small>Blog Sayfası Banner</small></label>
                    <input type="file" name="blogbanner" id="blogbanner">
                </div>
                <div class="form-group">
                    <input type="text" name="fotoalt2" class="form-control" placeholder="Foto Alt Metni Girin">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="iletisimbanner"><small>İletişim Sayfası Banner</small></label>
                    <input type="file" name="iletisimbanner" id="iletisimbanner">
                </div>
                <div class="form-group">
                    <input type="text" name="fotoalt3" class="form-control" placeholder="Foto Alt Metni Girin">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="facebook"><small>Facebook Profili</small></label>
                    <input type="text" name="facebook" id="facebook" class="form-control">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="instagram"><small>Instagram Profili</small></label>
                    <input type="text" name="instagram" id="instagram" class="form-control">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="twitter"><small>Twitter Profili</small></label>
                    <input type="text" name="twitter" id="twitter" class="form-control">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="whatsapp"><small>Whatsapp Profili</small></label>
                    <input type="text" name="whatsapp" id="whatsapp" class="form-control">
                </div>
            </div>
            <div class="col-9">
                <div class="form-group">
                    <input type="text" name="copy" id="copy" class="form-control" placeholder="Her Hakkı Saklıdır">
                </div>
            </div>
            <div class="col-3 my-auto">
                <div class="form-group">
                    <input type="submit" value="Kaydet" class="btn btn-success w-100" name="kaydet">
                </div>
            </div>
            <div class="col-12">
                <?php
                if (isset($_POST['kaydet'])) {
                    $adres = $_POST['adres'];
                    $telefon = $_POST['telefon'];
                    $email = $_POST['email'];
                    $harita = $_POST['harita'];
                    $tanitim = $_POST['tanitim'];
                    $dizin = "../img/";
                    $logo = $dizin . $_FILES['logo']['name'];
                    $fotoalt1 = $_POST['fotoalt1'];
                    $blogbanner = $dizin . $_FILES['blogbanner']['name'];
                    $fotoalt2 = $_POST['fotoalt2'];
                    $iletisimbanner = $dizin . $_FILES['iletisimbanner']['name'];
                    $fotoalt3 = $_POST['fotoalt3'];
                    $facebook = $_POST['facebook'];
                    $instagram = $_POST['instagram'];
                    $twitter = $_POST['twitter'];
                    $whatsapp = $_POST['whatsapp'];
                    $copy = $_POST['copy'];

                    $foto1 = move_uploaded_file($_FILES['logo']['tmp_name'], $logo);
                    $foto2 = move_uploaded_file($_FILES['blogbanner']['tmp_name'], $blogbanner);
                    $foto3 = move_uploaded_file($_FILES['iletisimbanner']['tmp_name'], $iletisimbanner);

                    if(isset($foto1) && isset($foto2) && isset($foto3)){
                        $sorgu = $db -> prepare('insert into ayarlar(adres,telefon,email,harita,tanitim,logo,fotoalt1,blogbanner,fotoalt2,iletisimbanner,fotoalt3,facebook,instagram,twitter,whatsapp,copy) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)');
                        $sorgu -> execute(array($adres,$telefon,$email,$harita,$tanitim,$logo,$fotoalt1,$blogbanner,$fotoalt2,$iletisimbanner,$fotoalt3,$facebook,$instagram,$twitter,$whatsapp,$copy));

                        if($sorgu -> rowCount()){
                            echo '<div class="alert alert-success">Ayarlar Kaydedildi</div>';
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
<!-- Ayarlar Section End -->

<?php require_once('footer.php'); ?>