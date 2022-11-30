<?php require_once('header.php'); 
$sorgu_iletisim = $db->prepare('select * from ayarlar order by id desc limit 1');
$sorgu_iletisim->execute();
$satir_iletisim = $sorgu_iletisim->fetch();
?>

<!-- İletişim Banner Section Start -->

<section id="iletisimBanner" class="py-12 text-white" style="background-image:url('<?php echo substr($satir_iletisim['iletisimbanner'], 3); ?>') ;">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="display-4">İletişim</h1>
            </div>
        </div>
    </div>
</section>

<!-- İletişim Banner Section End -->
 
<!-- Form Section Start -->
    
 <section id="form" style="font-family: Helvetica, sans-serif;" class="py-5">
      <div class="container">
        <div class="row">
          <div class="col-md-6 border shadow mb-4">
            <h3 class="mt-3 lead">İletişim Formu</h3>
        <p class="text-justify text-muted">Taleplerinizi, her türden soru, öneri ve şikayetlerinizi aşağıdaki formu kullanarak bize iletebilirsiniz.</p>
            <main>
              <form method="post" class="rounded mt-4"> 
                <div class="form-group">
                <label for="ad">Adınız Soyadınız</label>
                  <input type="text" name="ad" id="ad" class="form-control">
                </div>
                <div class="form-group">
                  <label for="tel">Telefon Numaranız</label>
                  <input type="tel" name="tel" id="tel" class="form-control">
                </div>
                <div class="form-group">
                  <label for="email">E-Posta Adresiniz</label>
                  <input type="email" name="email" id="email" class="form-control">
                </div>
                <div class="form-group">
                  <label for="konu">Konu</label>
                  <select name="konu" id="konu" class="form-control">
                    <option value="">Seçiniz</option>
                    <option value="Bilgi">Bilgi Talebi</option>
                    <option value="Şikayet">Şikayet</option>
                    <option value="Teknik">Teknik Destek</option>
                    <option value="Öneri">Öneri</option>
                  </select>
                </div>
                <div class="form-group">
                  <textarea name="mesaj" rows="10" class="form-control" placeholder="Mesajınız"></textarea>
                </div>
                <div class="form-group">
                  <input type="submit" value="Gönder" class="btn btn-success w-100">
                </div>
              </form>
              <?php
                if ($_POST) {
                    $ad = $_POST['ad'];
                    $email = $_POST['email'];
                    $konu = $_POST['konu'];
                    $mesaj = $_POST['mesaj'];
                    $tarih = date('d.m.Y');
                    $durum = "Okunmadı";
                    $sorgu_mesaj = $db->prepare('insert into mesajlar(ad,email,konu,mesaj,tarih,durum) values(?,?,?,?,?,?)');
                    $sorgu_mesaj->execute(array($ad, $email, $konu, $mesaj,$tarih,$durum));
                    
                    if($sorgu_mesaj -> rowCount()){
                        echo '<meta http-equiv="refresh" content="0; url=tesekkurler.php">';
                    } else {
                        echo '<div class="alert alert-danger">Hata Oluştu. Lütfen Tekrar Deneyin.</div>';
                    }
                }
                ?>
            </main>
          </div>
          <div class="col-md-6">
              <span class="h-5"><?php echo $satir_iletisim['harita']; ?></span>
          </div>
        </div>
      </div>
    </section>
    
  <!-- Form Section End -->
<?php require_once('footer.php'); ?>