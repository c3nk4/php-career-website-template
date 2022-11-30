<?php require_once('header.php'); ?>

<!-- Yorumlar Section Start -->
<section id="yorumlar">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Gelen Yorumlar</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>İsim</th>
                            <th>Email</th>
                            <th>Yorum</th>
                            <th>Başlık</th>
                            <th>Durum</th>
                            <th>Tarih</th>
                            <th>Onayla</th>
                            <th>Sil</th>
                        </tr>
                    </thead>
                    <tbody>
                <?php
                        $sorgu_yorum = $db->prepare('select * from yorumlar order by id desc');
                        $sorgu_yorum->execute();
                        if ($sorgu_yorum->rowCount()) {
                      foreach ($sorgu_yorum as $satir_yorum) {
                        ?>
                                <tr>
                                    <td><?php echo $satir_yorum['adiniz'].' '.$satir_yorum['soyadiniz']; ?></td>
                                    <td><?php echo $satir_yorum['email']; ?></td>
                                    <td><?php echo $satir_yorum['yorum']; ?></td>
                                    <td><?php echo $satir_yorum['baslik']; ?></td>
                                    <td><?php echo $satir_yorum['durum']; ?></td>
                                    <td><?php echo $satir_yorum['tarih']; ?></td>
                                    <td><a href="yorumonay.php?id=<?php echo $satir_yorum['id']; ?>"><button class="btn btn-primary">Onayla</button></a></td>
                                    <td><a href="yorumsil.php?id=<?php echo $satir_yorum['id']; ?>"><button class="btn btn-danger">Sil</button></a></td>
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
<!-- Yorumlar Section End -->

<?php require_once('footer.php'); ?>