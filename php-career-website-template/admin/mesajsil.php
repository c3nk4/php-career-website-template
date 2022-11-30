<?php
require_once('header.php');

$id = $_GET['id'];
$sorgu_sil = $db->prepare('delete from mesajlar where id=?');
$sorgu_sil->execute(array($id));
if ($sorgu_sil->rowCount()) {
    echo '<div class="alert alert-success mt-5">Mesaj Silindi</div> <meta http-equiv="refresh" content="2; url=mesajlar.php">';
} else {
    echo '<div class="alert alert-danger mt-5">Hata Oluştu</div> <meta http-equiv="refresh" content="2; url=mesajlar.php">';
  }

require_once('footer.php');
?>