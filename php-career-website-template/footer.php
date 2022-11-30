  <!-- footer Section start -->
  <footer id="footer">
      <section id="topFooter" class="py-4">
          <div class="container text-white">
              <div class="row">
                  <div class="col-md-4 border-right">
                      <h4>İletişim</h4>
                      <p class="text-justify"> <?php echo $satir_menu['tanitim']; ?></p>
                      <i class="bi bi-geo-alt-fill"></i>  <?php echo $satir_menu['adres']; ?><br>
                      <a href="tel:+9<?php echo $satir_menu['telefon']; ?>"><i class="bi bi-telephone-fill"></i> <?php echo $satir_menu['telefon']; ?></a>  <br> <a href="mailto:<?php echo $satir_menu['email']; ?>"><i class="bi bi-envelope-fill"></i> <?php echo $satir_menu['email']; ?></a><br>
                  </div>
                  <div class="col-md-4 border-right" id="ebulten">
                      <h4>E-Bülten Üyelik</h4>
                      <form>
                          <div class="form-group">
                              <input type="email" class="form-control" placeholder="Lütfen e-mail adresinizi yazınız.">
                          </div>
                         
                      </form>
                      <p>Güncel Duyurular Hakkında Bilgi Almak için E-Bültene Üye Olun.</p>
                      <a href="#">Gizlilik Sözleşmesi</a><br>
                      <a href="#">K.V.K.K. Politikamız</a><br>
                      <a href="#">Üyelik Sözleşmesi</a>
                  </div>
                  <div class="col-md-4">
                      <h4>Hızlı Erişim</h4>
                     <a href="iletisim.php" target="_blank">İletişim</a><br>
                     <a href="sss.php" target="_blank">S.S.S.</a><br>
                     <a href="ilanlar.php" target="_blank">İlanlar</a><br>
                     <a href="blog.php" target="_blank">Blog</a>
                  </div>
              </div>
          </div>
          <section id="footerIcons" class="mt-5">
              <div class="container">
                  <div class="row text-center text-white">
                      <div class="col-12">
                          <a href="<?php echo $satir_menu['facebook']; ?>" target="_blank"><i class="bi bi-facebook bis"></i></a>&nbsp;
                          <a href="<?php echo $satir_menu['instagram']; ?>" target="_blank"><i class="bi bi-instagram bis"></i></a>&nbsp;
                          <a href="<?php echo $satir_menu['twitter']; ?>" target="_blank"><i class="bi bi-twitter bis"></i></a>&nbsp;
                          <a href="<?php echo $satir_menu['whatsapp']; ?>" target="_blank"><i class="bi bi-whatsapp bis" target="_blank"></i></a>&nbsp;
                          <p class="mt-5 font-weight-light"> <?php echo $satir_menu['copy'] . ' ' . date('Y');?></p>
                      </div>
                  </div>
              </div>
          </section>
      </section>
  </footer>
  <!-- footer Section end -->



  <script src="js/jquery.slim.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
  </body>

  </html>