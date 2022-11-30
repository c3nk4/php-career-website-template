<?php require_once('header.php'); ?>

<!-- Yazılar Section Start -->

<section id="yazilar" class="py-4">
    <div class="container">
        <div class="row">
            <div class="col-2">
                <h2 class="display-4 lead">Yazılar</h2>
            </div>
            <div class="col-3 my-auto">
                <a href="yaziekle.php"><button class="btn btn-success w-100">Yazı Ekle +</button></a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Foto</th>
                            <th>Başlık</th>
                            <th>Özet</th>
                            <th>Kategori</th>
                            <th>Tarih</th>
                            <th>Durum</th>
                            <th>Düzenle</th>
                            <th>Sil</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php
                        $sorgu_yazi = $db->prepare('select * from yazilar order by id desc');
                        $sorgu_yazi->execute();
                        if ($sorgu_yazi->rowCount()) {
                            foreach ($sorgu_yazi as $satir_yazi) {
                   ?>
                                 <tr>
                                    <td><img src="<?php echo $satir_yazi['foto']; ?>" class="img-fluid"></td>
                                    <td><?php echo $satir_yazi['baslik']; ?></td>
                                    <td><?php echo substr($satir_yazi['icerik'], 0, 68); ?> ...</td>
                                    <td><?php echo $satir_yazi['kategori']; ?></td>
                                    <td><?php echo $satir_yazi['tarih']; ?></td>
                                    <td><?php echo $satir_yazi['durum']; ?></td>
                                    <td><a href="yaziduzenle.php?id=<?php echo $satir_yazi['id']; ?>"><button class="btn btn-warning">Düzenle</button></a></td>
                                    <td><a href="yazisil.php?id=<?php echo $satir_yazi['id']; ?>"><button class="btn btn-danger">Sil</button></a></td>
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

<!-- Yazılar Section End -->

<?php require_once('footer.php'); ?>