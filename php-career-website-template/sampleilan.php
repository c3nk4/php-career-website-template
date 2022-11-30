<?php
require_once('header.php');

$id = $_GET['id'];
$sorgu_ilan = $db->prepare('select * from ilanlar where id=?');
$sorgu_ilan->execute(array($id));
$satir_ilan = $sorgu_ilan->fetch();

?>
<!-- İçerik Section Start -->
<section id="content" class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1><?php echo $satir_ilan['baslik']; ?></h1>
                <small>Yayınlanma Tarihi: <?php echo $satir_ilan['tarih']; ?></small>
                <span class="text-justify"><?php echo $satir_ilan['icerik']; ?></span>
                <h5 class="mt-5 mb-3">Başvuru Yapın</h5>
                <form method="post" class="form-row" enctype="multipart/form-data">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="adiniz" placeholder="Adınız" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="soyadiniz" placeholder="Soyadınız" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="email" name="email" placeholder="E-Posta Adresiniz" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="tel" name="tel" placeholder="Telefon Numaranız" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-12 py-4">
                         <div class="form-group">
                              <span class="font-weight-bold text-danger"> *CV Ekleyin -> </span><input type="file" name="cv" placeholder="CV Ekleyin">
                          </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <textarea name="aciklama" placeholder="Açıklama" rows="5" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary w-100">Başvur</button>
                        </div>
                    </div>
                </form>
                       <?php
                if ($_POST) {
                    
                    $adiniz = $_POST['adiniz'];
                    $soyadiniz= $_POST['soyadiniz'];
                    $email = $_POST['email'];
                    $tel = $_POST['tel'];
                    $dizin = 'cv/';
                    $gelencv = $dizin . $_FILES['cv']['name'];
                    $aciklama = $_POST['aciklama'];
                    

                    if (move_uploaded_file($_FILES['cv']['tmp_name'], $gelencv)) {
                        $sorgu_ilanlar = $db->prepare('insert into basvurular(adiniz,soyadiniz,email,tel,cv,aciklama) values(?,?,?,?,?,?)');
                        $sorgu_ilanlar->execute(array($adiniz, $soyadiniz, $email, $tel, $gelencv, $aciklama));
                        if ($sorgu_ilanlar->rowCount()) {
                            echo '<div class="alert alert-success">Başvurunuz Gönderildi</div>';
                        } else {
                            echo '<div class="alert alert-danger">Hata Oluştu</div>';
                        }
                    }
                  }
                ?>
            </div>
        </div>
    </div>
</section>
<!-- İçerik Section End -->

<?php require_once('footer.php'); ?>