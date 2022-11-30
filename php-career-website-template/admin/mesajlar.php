<?php require_once('header.php'); ?>

<!-- Mesajlar Section Start -->
<section id="mesajlar" class="py-4">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Mesajlar</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Adı Soyadı</th>
                            <th>E-Posta</th>
                            <th>Konu</th>
                            <th>Mesaj</th>
                            <th>Tarih</th>
                            <th>Durum</th>
                            <th>Düzenle</th>
                            <th>Sil</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sorgu_gelen = $db->prepare('select * from mesajlar order by id desc');
                        $sorgu_gelen->execute();
                        if ($sorgu_gelen->rowCount()) {
                        foreach ($sorgu_gelen as $satir_gelen) {
                         ?>
                                <tr>
                                    <td><?php echo $satir_gelen['id']; ?></td>
                                    <td><?php echo $satir_gelen['ad']; ?></td>
                                    <td><?php echo $satir_gelen['email']; ?></td>
                                    <td><?php echo $satir_gelen['konu']; ?></td>
                                    <td><?php echo $satir_gelen['mesaj']; ?></td>
                                    <td><?php echo $satir_gelen['tarih']; ?></td>
                                    <td><?php echo $satir_gelen['durum']; ?></td>
                                    <td><a href="mesajduzenle.php?id=<?php echo $satir_gelen['id']; ?>"><button class="btn btn-primary">Değiştir</button></a></td>
                                    <td><a href="mesajsil.php?id=<?php echo $satir_gelen['id']; ?>"><button class="btn btn-danger">Sil</button></a></td>
                                </tr>
                                <?php
                            }
                        } else {
                            echo 'Mesajınız Yoktur.';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<!-- Mesajlar Section End -->

<?php require_once('footer.php'); ?>