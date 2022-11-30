<?php 

require_once('header.php'); 

$id = $_GET['id'];
$sorgu_sayisil = $db -> prepare('delete from sayilarlabiz where id = ?');
$sorgu_sayisil -> execute(array($id));

if($sorgu_sayisil -> rowCount()){
    echo '<div class="alert alert-success mt-5">İçerik Silindi</div> <meta http-equiv="refresh" content="1; url=sayilarlabiz.php">';
} else {
    echo '<div class="alert alert-danger mt-5">Hata Oluştu</div> <meta http-equiv="refresh" content="1; url=sayilarlabiz.php">';
}

require_once('footer.php'); 

?>