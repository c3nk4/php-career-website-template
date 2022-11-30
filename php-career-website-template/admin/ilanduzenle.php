<?php
require_once('header.php');
$id = $_GET['id'];
$sorgu_durum = $db->prepare('select * from ilanlar where id=?');
$sorgu_durum->execute(array($id));
$satir_durum = $sorgu_durum->fetch();
?>
<!-- İlan Düzenle Section Start -->
<section id="ilanDuzenle" class="py-3">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>İlanlar</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Başlık</th>
                            <th>İçerik</th>
                            <th>Tarih</th>
                            <th>Durum Değiştir</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sorgu_gelen = $db->prepare('select * from ilanlar order by id desc');
                        $sorgu_gelen->execute(array($id));
                        $satir_gelen = $sorgu_gelen->fetch();
                        ?>
                                <tr>
                                    <td><?php echo $satir_gelen['id']; ?></td>
                                    <td><?php echo $satir_gelen['baslik']; ?></td>
                                    <td><?php echo $satir_gelen['icerik']; ?></td>
                                    <td><?php echo $satir_gelen['tarih']; ?></td>
                                     <td>
                                        <form method="post">
                                            <div class="form-group">
                                                <select class="w-100 mb-3" name="durum" class="form-control">
                                                    <option value="<?php echo $satir_durum['durum']; ?>"><?php echo $satir_durum['durum']; ?></option>
                                                    <option value="Taslak">Taslak</option>
                                                    <option value="Yayınlandı">Yayınlandı</option>
                                                </select>
                                                <button class="btn btn-primary">Kaydet</button>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<!-- İlan Düzenle Section End -->

 <?php

if ($_POST) {
    $sorgu_duzenle = $db->prepare('update ilanlar set durum =? where id=?');
    $sorgu_duzenle->execute(array($_POST['durum'], $id));
    if ($sorgu_duzenle->rowCount()) {
        echo '<meta http-equiv="refresh" content="0; url=ilanlar.php">';
    }
}
?>

<?php require_once('footer.php'); ?>