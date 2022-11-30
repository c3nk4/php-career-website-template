<?php
require_once('header.php');

$id = $_GET['id'];
$sorgu_durum = $db->prepare('select * from yorumlar where id=?');
$sorgu_durum->execute(array($id));
$satir_durum = $sorgu_durum->fetch();
?>



<!-- Yorum Section Start -->
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
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $satir_durum['adiniz'] . ' ' . $satir_durum['soyadiniz']; ?></td>
                            <td><?php echo $satir_durum['email']; ?></td>
                            <td><?php echo $satir_durum['yorum']; ?></td>
                            <td><?php echo $satir_durum['baslik']; ?></td>
                            <td>
                                <form method="post" class="form-row">
                                    <div class="col-7">
                                        <div class="form-group">
                                            <select name="durum" class="form-control">
                                                <option value="onaylanmadı">Onaylanmadı</option>
                                                <option value="onaylandı">Onaylandı</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-5">
                                        <button type="submit" class="btn btn-primary w-100">Onay</button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <?php

                if ($_POST) {
                    $g_durum = $db->prepare('update yorumlar set durum=? where id=?');
                    $g_durum->execute(array($_POST['durum'], $id));

                    if ($g_durum->rowCount()) {
                        echo '<div class="alert alert-success">Yorum Onaylandı</div><meta http-equiv="refresh" content="2; url=yorumlar.php">';
                    } else {
                        echo '<div class="alert alert-danger">Hata Oluştu</div>';
                    }
                }

                ?>


            </div>
        </div>
    </div>
</section>
<!-- Yorum Section End -->

<?php require_once('footer.php'); ?>

