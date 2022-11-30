<?php
require_once('header.php');
$id = $_GET['id'];
$sorgu_durum = $db->prepare('select * from mesajlar where id=?');
$sorgu_durum->execute(array($id));
$satir_durum = $sorgu_durum->fetch();
?>
<!-- Mesaj Düzenle Section Start -->
<section id="mesajduzenle" class="py-3">
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
                            <th>Mevcut Durum</th>
                            <th>Tarih</th>
                            <th>Durum Değiştir</th>
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
                                    <td><?php echo $satir_gelen['durum']; ?></td>
                                    <td><?php echo $satir_gelen['tarih']; ?></td>
                                    <td>
                                        <form method="post">
                                            <div class="form-group">
                                                <select class="w-100 mb-3" name="durum" class="form-control">
                                                    <option value="<?php echo $satir_durum['durum']; ?>"><?php echo $satir_durum['durum']; ?></option>
                                                    <option value="Okundu">Okundu</option>
                                                    <option value="Okunmadı">Okunmadı</option>
                                                </select>
                                                <button class="btn btn-primary">Kaydet</button>
                                            </div>
                                        </form>
                                    </td>
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
<!-- Mesaj Düzenle Section End -->

 <?php

if ($_POST) {
    $sorgu_yenidurum = $db->prepare('update mesajlar set durum =? where id=?');
    $sorgu_yenidurum->execute(array($_POST['durum'], $id));
    if ($sorgu_yenidurum->rowCount()) {
        echo '<meta http-equiv="refresh" content="0; url=mesajlar.php">';
    }
}
?>

<?php require_once('footer.php'); ?>