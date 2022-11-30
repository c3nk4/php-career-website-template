<?php require_once('header.php'); ?>
<!-- Slider Section Start -->

<section id="sliderAdmin" class="py-2">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="py-3">Slayt Ekle ve Sil</h3>
            </div>
        </div>
        <form method="post" class="form-row">
            <div class="col-md-10">
                <div class="form-group">
                    <label for="icerik">İçerik Girin: </label>
                    <input type="text" name="icerik" class="form-control" id="icerik" placeholder="İçerik Girin">
                </div>
                <div class="form-group">
                    <label for="isim">Alt Başlık Girin: </label>
                    <input type="text" name="isim" class="form-control" id="isim" placeholder="Ör: Ahmet Yılmaz">
                </div>
                <div class="form-group">
                    <input type="submit" value="Kaydet" class="mt-2 btn btn-success w-100">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <small>Arkaplan Rengi Seçin</small>
                    <input type="color" name="bg" class="form-control">
                </div>
                <div class="form-group">
                    <small>İçerik Yazı Boyutu Girin</small>
                    <input type="number" name="font1" class="form-control">
                </div>
                <div class="form-group">
                    <small>Alt Başlık Yazı Boyutu Girin</small>
                    <input type="number" name="font2" class="form-control">
                </div>
            </div>
        </form>
    </div>
</section>
<?php

if ($_POST) {

    $icerik = $_POST['icerik'];
    $isim = $_POST['isim'];
    $font1 = $_POST['font1'];
    $font2 = $_POST['font2'];
    $bg = $_POST['bg'];

    $sorgu_slider = $db->prepare('insert into slider(icerik,isim,font1,font2,bg) values(?,?,?,?,?)');
    $sorgu_slider->execute(array($icerik, $isim, $font1, $font2, $bg));
    if ($sorgu_slider->rowCount()) {
        echo '<div class="alert alert-success">Kayıt İşlemi Başarılı</div>';
    } else {
        echo '<div class="alert alert-danger">Hata Oluştu</div>';
    }
}

?>

<!-- Slider Section End -->


<!-- Slider List Section Start -->
<section id="sliderList">
    <div class="container">
        <h3 class="py-2">Slayt Sil</h2>
            <div class="row">
                <div class="col-md-10">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>İçerik</th>
                                <th>Alt Başlık</th>
                                <th>Background Renk</th>
                                <th>İçerik Font</th>
                                <th>Alt Başlık Font</th>
                                <th>Sil</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $sorgu_list = $db->prepare('select * from slider order by id desc');
                            $sorgu_list->execute();

                            if ($sorgu_list->rowCount()) {
                                foreach ($sorgu_list as $satir_list) {
                            ?>
                                    <tr>
                                        <td><?php echo $satir_list['id']; ?></td>
                                        <td><?php echo $satir_list['icerik']; ?></td>
                                        <td><?php echo $satir_list['isim']; ?></td>
                                        <td class="text-success" style="background-color: <?php echo $satir_list['bg']; ?> ;"><?php echo $satir_list['bg']; ?></td>
                                        <td><?php echo $satir_list['font1']; ?></td>
                                        <td><?php echo $satir_list['font2']; ?></td>
                                        <td><a href="slaytsil.php?id=<?php echo $satir_list['id']; ?>"><button class="btn btn-danger">Sil</button></a></td>
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
<!-- Slider List Section End -->


<?php require_once('footer.php'); ?>