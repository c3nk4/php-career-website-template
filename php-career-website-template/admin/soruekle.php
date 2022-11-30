<?php require_once('header.php'); ?>
<section id="soru" class="pt-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
            <form method="post" class="form-row">
            <div class="col-md-6">
            <div class="form-group">
                    <label for="adres"><small>Soru Giriniz:</small></label>
                    <input type="text" name="soru" id="soru" class="form-control">
                </div>
            </div>
            <div class="col-md-6">
            <div class="form-group">
                    <label for="adres"><small>Cevap Giriniz:</small></label>
                    <input type="text" name="cevap" id="cevap" class="form-control">
                </div>
            </div>
            <div class="col-md-4 mx-auto">
                <div class="form-group mt-4">
                    <input type="submit" value="Kaydet" class="btn btn-success w-100">
                </div>
            </div>
        </form>
        <?php
        if ($_POST) {
            $sorgu_sss = $db ->prepare('insert into sss(soru,cevap) values(?,?)');
            $sorgu_sss->execute(array($_POST['soru'],$_POST['cevap']));
            if ($sorgu_sss->rowCount()) {
                echo '<div class="alert alert-success">Kayıt Başarılı</div> <meta http-equiv="refresh" content="1; url=sss.php">';
            } else {
                echo '<div class="alert alert-danger">Hata Oluştu</div> <meta http-equiv="refresh" content="1; url=sss.php">';
        }
    }
        ?>
            </div>
        </div>
    </div>
</section>


<?php require_once('footer.php'); ?>