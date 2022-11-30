<div class="col-md-3 border-left" id="side">
            <aside>
              <div class="row mx-auto">
                <div class="col-12">
                  <div class="form-group d-flex flex-row shadow mt-4">
                    <input type="text" class="form-control rounded-0" placeholder="Site içi arama"><button class="border-0 rounded-0 btn btn-primary text-white"><i style="color: #fff;" class="bi bi-search"></i></button></input>
                  </div>
                </div>
              </div>
              <div class="row border shadow py-3 ml-2 mt-2 rounded">
                <div class="col-12">
                  <h3 class="mb-4 text-center">Kategoriler<hr class="cizgi mb-4"></h3>
                  <?php
                    $sorgu_kat = $db->prepare('select * from kategoriler order by kategori asc');
                    $sorgu_kat->execute();

                    if ($sorgu_kat->rowCount()) {
                        foreach ($sorgu_kat as $satir_kat) {
                    ?>
                            <a href="kategoripage.php?kategori=<?php echo $satir_kat['kategori']; ?>" class="text-dark border rounded bg-light text-decoration-none"> <?php echo $satir_kat['kategori']; ?></a>&nbsp;
                    <?php
                        }
                    }
                    ?>
                </div>
              </div>
              <div class="row border shadow py-3 ml-2 mt-5 rounded">
                <div class="col-12">
                  <h3 class="mb-4 text-center">Son Yazılar<hr class="cizgi mb-5"></h3>
                  <?php
                    $sorgu_yazi = $db->prepare('select * from yazilar order by id desc limit 5');
                    $sorgu_yazi->execute();
                    if ($sorgu_yazi->rowCount()) {
                        foreach ($sorgu_yazi as $satir_yazi) {
                    ?>
                            <div class="row mt-2">
                                <div class="col-md-6">
                                    <a class="text-decoration-none" href="sample.php?id=<?php echo $satir_yazi['id']; ?>">
                                        <img src="<?php echo substr($satir_yazi['foto'], 3); ?>" alt="<?php echo $satir_yazi['fotoalt']; ?>" class="img-fluid">
                                    </a>
                                </div>
                                <div class="col-md-6 my-auto">
                                    <small><?php echo substr($satir_yazi['icerik'], 0, 30); ?></small>
                                </div>
                            </div>
                            <hr>
                    <?php
                        }
                    }
                    ?>
                </div>
              </div>
            </aside>
          </div>
          