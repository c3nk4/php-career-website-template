<?php require_once('header.php'); ?>
<!-- İlanlar Section Start -->

<section id="ilanlarAdmin" class="py-4">
    <div class="container">
        <div class="row">
            <div class="col-2">
                <h2 class="display-4 lead">İlanlar</h2>
            </div>
            <div class="col-3 my-auto">
                <a href="ilanekle.php"><button class="btn btn-success w-100">İlan Ekle +</button></a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Başlık</th>
                            <th>İçerik</th>
                            <th>Tarih</th>
                            <th>Durum</th>
                            <th>Düzenle</th>
                            <th>Sil</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php
                        $sorgu_ilan = $db->prepare('select * from ilanlar order by id desc');
                        $sorgu_ilan->execute();
                        if ($sorgu_ilan->rowCount()) {
                            foreach ($sorgu_ilan as $satir_ilan) {
                   ?>
                                 <tr>
                                    <td><?php echo $satir_ilan['baslik']; ?></td>
                                    <td><?php echo substr($satir_ilan['icerik'], 0, 60); ?> ...</td>
                                    <td><?php echo $satir_ilan['tarih']; ?></td>
                                    <td><?php echo $satir_ilan['durum']; ?></td>
                                    <td><a href="ilanduzenle.php?id=<?php echo $satir_ilan['id']; ?>"><button class="btn btn-warning">Düzenle</button></a></td>
                                    <td><a href="ilansil.php?id=<?php echo $satir_ilan['id']; ?>"><button class="btn btn-danger">Sil</button></a></td>
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

<!-- İlanlar Section End -->


<?php require_once('footer.php'); ?>