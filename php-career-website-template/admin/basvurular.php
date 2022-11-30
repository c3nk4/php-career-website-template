<?php require_once('header.php'); ?>

<!-- Başvurular Section Start -->
<section id="basvuru" class="py-4">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="pb-5">Başvurular</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Adı</th>
                            <th>Soyadı</th>
                            <th>E-Posta</th>
                            <th>Telefon</th>
                            <th>CV</th>
                            <th>Açıklama</th>
                            <th>Sil</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sorgu_basvuru = $db->prepare('select * from basvurular order by id desc');
                        $sorgu_basvuru->execute();
                        if ($sorgu_basvuru->rowCount()) {
                        foreach ($sorgu_basvuru as $satir_basvuru) {
                         ?>
                                <tr>
                                    <td><?php echo $satir_basvuru['id']; ?></td>
                                    <td><?php echo $satir_basvuru['adiniz']; ?></td>
                                    <td><?php echo $satir_basvuru['soyadiniz']; ?></td>
                                    <td><?php echo $satir_basvuru['email']; ?></td>
                                    <td><?php echo $satir_basvuru['tel']; ?></td>
                                    <td><?php echo $satir_basvuru['cv']; ?></td>
                                    <td><?php echo $satir_basvuru['aciklama']; ?></td>
                                    <td><a href="basvurusil.php?id=<?php echo $satir_basvuru['id']; ?>"><button class="btn btn-danger">Sil</button></a></td>
                                </tr>
                                <?php
                            }
                        } else {
                            echo 'Başvuru Yok.';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<!-- Başvurular Section End -->

<?php require_once('footer.php'); ?>