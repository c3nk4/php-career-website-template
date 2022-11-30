<?php 
require_once('header.php');
$id = $_GET['id'];
$sorgu_hakbansil = $db -> prepare('delete from hakkimizdabanner where id=?');
$sorgu_hakbansil -> execute(array($id));

if($sorgu_hakbansil -> rowCount()){
    echo '<div class="alert alert-success mt-5">Kayıt Silindi</div><meta http-equiv="refresh" content="2; url=hakkimizdabanner.php">';
} else {
    echo '<div class="alert alert-danger mt-5">Hata Oluştu</div><meta http-equiv="refresh" content="2; url=hakkimizdabanner.php">';
}
require_once('footer.php');
?>

