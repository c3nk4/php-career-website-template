<?php require_once('header.php'); ?>

<!-- Sayilarla Biz Section Start -->
<section id="sayilarAdmin" class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="mb-5">Sayılarla Biz Ayarları</h1>
            </div>
            <div class="col-md-6">
                <form method="post">
                    <div class="form-group">
                        <input type="text" name="ulke" class="form-control" placeholder="Ülke İçeriği Girin">
                    </div>
                    <div class="form-group">
                        <input type="text" name="sehir" class="form-control" placeholder="Şehir İçeriği Girin">
                    </div>
                    <div class="form-group">
                        <input type="text" name="proje" class="form-control" placeholder="Proje İçeriği Girin">
                    </div>
                    <div class="form-group">
                        <input type="text" name="kadin" class="form-control" placeholder="Kadin Çalışan İçeriği Girin">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success w-100">Kaydet</button>
                    </div>
                </form>
                <?php
                if ($_POST) {
                    $ulke = $_POST['ulke'];
                    $sehir= $_POST['sehir'];
                    $proje = $_POST['proje'];
                    $kadin = $_POST['kadin'];

                    $sorgu = $db->prepare('insert into sayilarlabiz(ulke,sehir,proje,kadin) values(?,?,?,?)');
                    $sorgu->execute(array($ulke, $sehir, $proje,$kadin));

                    if ($sorgu->rowCount()) {
                        echo '<div class="alert alert-success">Kayıt Girildi</div>';
                    } else {
                        echo '<div class="alert alert-danger">Hata Oluştu</div>';
                    }
                }
                ?>
            </div>
            <div class="col-md-6">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Ülke</th>
                            <th>Şehir</th>
                            <th>Proje</th>
                            <th>Kadın Çalışanlar</th>
                            <th>Sil</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php

                        $sorgu_sayi = $db->prepare('select * from sayilarlabiz order by id desc');
                        $sorgu_sayi->execute();

                        if ($sorgu_sayi->rowCount()) {
                            foreach ($sorgu_sayi as $satir_sayi) {
                        ?>
                                <tr>
                                    <td><?php echo $satir_sayi['id']; ?></td>
                                    <td><?php echo $satir_sayi['ulke']; ?></td>
                                    <td><?php echo $satir_sayi['sehir']; ?></td>
                                    <td><?php echo $satir_sayi['proje']; ?></td>
                                    <td><?php echo $satir_sayi['kadin']; ?></td>
                                    <td><a href="sayilarlabizsil.php?id=<?php echo $satir_sayi['id']; ?>"><button class="btn btn-danger">Sil</button></a></td>
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
<!-- Sayilarla Biz Section End -->

<?php require_once('footer.php'); ?>