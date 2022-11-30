<?php require_once('header.php'); ?>


<section id="sss">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="py-4 display-4">SSS</h2>
                <a href="soruekle.php"><button class="btn btn-success mb-3">Soru-Cevap Ekle +</button></a>
            </div>
        </div>
    <div class="row">
            <div class="col-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Soru</th>
                            <th>Cevap</th>
                            <th>Soru-Cevap Sil</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sorgu_ss = $db->prepare('select * from sss order by id desc');
                        $sorgu_ss->execute();

                        if ($sorgu_ss->rowCount()) {
                            foreach ($sorgu_ss as $satir_ss) {
                        ?>
                                <tr>
                                    <td class="w-25"><?php echo $satir_ss['soru']; ?> </td>
                                    <td class="w-25"><?php echo $satir_ss['cevap']; ?></td>
                                    
                                    <td><a href="sorusil.php?id=<?php echo $satir_ss['id']; ?>"><button class="btn btn-danger px-5">Sil</button></a></td>
                                    
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

<?php require_once('footer.php'); ?>
