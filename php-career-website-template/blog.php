<?php require_once('header.php'); ?>

<?php
$sorgu_banner = $db->prepare('select * from ayarlar order by id desc limit 1');
$sorgu_banner->execute();
$satir_banner = $sorgu_banner->fetch();
?>

<!-- Blog Banner Section Start -->
<section id="blogBanner" class="py-12" style="background-image: url('<?php echo substr($satir_banner['blogbanner'], 3); ?>') ;">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="display-4 text-white">Blog</h1>
            </div>
        </div>
    </div>
</section>
<!-- Blog Banner Section End -->


<!-- Blog Section Start -->
<section id="blog" class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="row">
                    <?php
            $sorgu_blog = $db->prepare('select * from yazilar where durum="Yayınlandı" order by id desc');
            $sorgu_blog->execute();

            if ($sorgu_blog->rowCount()) {
                foreach ($sorgu_blog as $satir_blog) {
            ?>
                    <div class="col-md-4 mt-4">
                        <div class="card shadow">
                            <a href="sample.php?id=<?php echo $satir_blog['id']; ?> ">
                                <img src="<?php echo substr($satir_blog['foto'], 3); ?>" alt="<?php echo $satir_blog['fotoalt']; ?>" class="card-img-top">
                            </a>
                            <div class="card-body">
                                <a href="sample.php?id=<?php echo $satir_blog['id']; ?>" class="text-dark text-decoration-none">
                                    <h2 style="font-size:1.2rem;"><?php echo $satir_blog['baslik']; ?></h2>
                                </a>
                                <small>Yayınlanma Tarihi: <?php echo $satir_blog['tarih']; ?> </small>
                            </div>
                        </div>
                    </div>
            <?php
                }
            }
            ?>
                </div>
            </div>
            <?php require_once('sidebar.php'); ?>
        </div>
    </div>
</section>
<!-- Blog Section End -->


<?php require_once('footer.php'); ?>