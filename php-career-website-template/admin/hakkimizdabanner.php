<?php require_once('header.php'); ?>


<!-- Hakkımızda Banner Section Start -->
<section id="hakkimizdaBanner" class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Hakkımızda Banner Ayarları</h2>
            </div>
        </div>
        <form enctype="multipart/form-data" method="post" class="form-row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="gorsel"><small>Banner Görsel Ekle</small></label><br>
                    <input type="file" name="foto" id="gorsel">
                </div>
                <div class="form-group">
                    <label for="baslik"><small>Başlık Ekle</small></label>
                    <input type="text" name="baslik" id="baslik" class="form-control">
                </div>
                <div class="form-group">
                    <label><small>Background Konum</small></label>
                    <select name="konum" class="form-control">
                        <option value="">Seçiniz</option>
                        <option value="background-position:center center;">Merkez</option>
                        <option value="background-position:top center;">Üst</option>
                        <option value="background-position:bottom center;">Alt</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label><small>Background Tekrar</small></label>
                    <select name="tekrar" class="form-control">
                        <option value="">Seçiniz</option>
                        <option value="background-repeat:no-repeat;">Tekrar Etme(No-repeat)</option>
                        <option value="background-repeat:repeat;">Tekrarla(Repeat)</option>
                    </select>
                </div>
                <div class="form-group">
                    <label><small>Background Görsel Ölçüsü</small></label>
                    <select name="size" class="form-control">
                        <option value="">Seçiniz</option>
                        <option value="background-size:cover;">Kapla(Cover)</option>
                        <option value="background-size:contain;">Sıkıştır(Contain)</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="submit" value="Kaydet" class="btn btn-success w-100">
                </div>
            </div>
        </form>
        <?php
        if ($_POST) {
            $yuklenecekfoto = "../img/". $_FILES['foto']['name'];
            $baslik=$_POST['baslik'];
            $konum=$_POST['konum'];
            $tekrar=$_POST['tekrar'];
            $size=$_POST['size'];

            if (move_uploaded_file($_FILES['foto']['tmp_name'], $yuklenecekfoto)) {
                $hakkimdabanner = $db->prepare('insert into hakkimizdabanner(foto,baslik,konum,tekrar,size) values(?,?,?,?,?)');
                $hakkimdabanner->execute(array( $yuklenecekfoto,$baslik, $konum, $tekrar, $size));

                if ($hakkimdabanner->rowCount()) {
                    echo '<div class="alert alert-success">Kayıt Başarılı</div><meta http-equiv="refresh" content="1; url=hakkimizdabanner.php">';
                } else {
                    echo '<div class="alert alert-danger">Hata Oluştu</div>';
                }
              }  
              }
        ?>
    </div>
</section>
<!-- Hakkımızda Banner Section End -->

  <!-- Mevcut Banner Section start -->
<section id="mevcutBanner">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Görsel</th>
                            <th>Başlık</th>
                            <th>Banner Konumu</th>
                            <th>Banner Tekrarı</th>
                            <th>Banner Ölçüsü</th>
                            <th>Düzenle</th>
                            <th>Sil</th>
                        </tr>
                        </thead>
                       <tbody>
                        <?php
                        $sorgu_hakbanner = $db->prepare('select * from hakkimizdabanner order by id desc limit 1');
                        $sorgu_hakbanner->execute();
                        if ($sorgu_hakbanner->rowCount()) {
                            foreach ($sorgu_hakbanner as $satir_hakbanner) {
                            ?>
                                <tr>
                                    <td><?php echo $satir_hakbanner['id']; ?></td>
                                    <td><img src="<?php echo $satir_hakbanner['foto']; ?>" class="w-75"></td>
                                    <td><?php echo $satir_hakbanner['baslik']; ?></td>
                                    <td>
                                        <?php
                                        $konum = $satir_hakbanner['konum'];
                                        switch ($konum) {
                                            case 'background-position:center center;':
                                                echo 'Merkez';
                                                break;
                                            case 'background-position:top center;':
                                                echo 'Üst';
                                                break;
                                            case 'background-position:bottom center;':
                                                echo 'Alt';
                                                break;
                                          }
                                           ?>
                                    </td>
                                    <td>
                                        <?php 
                                        $tekrar = $satir_hakbanner['tekrar'];
                                        switch($tekrar){
                                            case 'background-repeat:no-repeat;':
                                                echo 'Tekrar Etme';
                                                break;
                                            case 'background-repeat:repeat;':
                                                echo 'Tekrarla';
                                                break;
                                           }
                                        ?>
                                         </td>
                                         <td>
                                        <?php 
                                        $size = $satir_hakbanner['size'];
                                        switch($size){
                                            case 'background-size:cover;':
                                                echo 'Kapla';
                                                break;
                                            case 'background-size:contain;':
                                                echo 'Sıkıştır';
                                                break;
                                           }
                                          ?>
                                    </td>
                                    <td><a href="hakkimizdabannerduzenle.php?id=<?php echo $satir_hakbanner['id']; ?>" class="btn btn-warning">Düzenle</a></td>
                                    <td><a href="hakkimizdabannersil.php?id=<?php echo $satir_hakbanner['id']; ?>" class="btn btn-danger">Sil</a></td>
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
<!-- Mevcut Banner Section end -->

<?php require_once('footer.php'); ?>