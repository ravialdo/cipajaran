<?php
session_start();
require 'config/DB.php';

include 'config/URL.php';
include 'views/layouts/head.php';
include 'views/layouts/navbar.php';
?>

<main>
     <div class="preloader bg-dark flex-column justify-content-center align-items-center">
          <svg id="loader-logo" class="text-white fa-rotate-180" width="70" height="70" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path></svg>
     </div>

     <section class="section-header bg-secondary text-white">
          <div class="container">
               <div class="row justify-content-between align-items-center">
                    <div class="col-12 col-md-7 col-lg-6 text-center text-md-left">
                         <h1 class="display-2 mb-4">Cipajaran <br class="d-none d-md-inline">Farm</h1>
                         <p class="lead mb-4 text-muted">
                              Cipajaran Farm adalah sebuah website jual beli domba yang berkualitas dan aman.
                         </p>
                         <a href="#jelajahi" class="btn btn-tertiary me-3 animate-up-2">Jelajahi <span class="ms-2"><span class="fas fa-arrow-right"></span></span></a>
                    </div>
                    <div class="col-12 col-md-5 d-none d-md-block text-center">
                         <img src="<?= URL::asset('img/illustrations/goat-light-full.svg') ?>" alt="goat-light.svg">
                    </div>
               </div>
          </div>
          <figure class="position-absolute bottom-0 left-0 w-100 d-none d-md-block mb-n2">
               <svg class="fill-white" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1920 43.4" style="enable-background:new 0 0 1920 43.4;" xml:space="preserve">
                    <path d="M0,23.3c0,0,405.1-43.5,697.6,0c316.5,1.5,108.9-2.6,480.4-14.1c0,0,139-12.2,458.7,14.3 c0,0,67.8,19.2,283.3-22.7v35.1H0V23.3z"></path>
               </svg>
          </figure>
     </section>

     <!-- content -->
     <section class="section-header" id="jelajahi">
          <div class="container-fluid" style="margin-top:-3em;">
               <div class="row justify-content-center">

                    <?php
                    $result = DB::db_connect()->query("SELECT * FROM domba ORDER BY id DESC");
                    while ($row = $result->fetch_assoc()) :
                    ?>

                    <div class="col-12 col-sm-4 mb-5 text-center">
                         <div class="card shadow">
                              <img src="<?= URL::asset('item/'. $row['gambar']) ?>" class="rounded-top" alt="Item">
                              <div class="card-footer border-top border-gray-300 p-4">
                                   <a href="#" class="h5"> <?= $row['jenis_domba'] ?></a>
                                   <h3 class="h6 fw-light text-gray mt-2" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"><?= $row['deskripsi'] ?></h3>
                                   <div class="d-flex justify-content-between align-items-center mt-3">
                                        <span class="h5 mb-0 text-gray"><?= $row['harga'] ?></span>
                                        <div class="ms-auto">
                                             <a href="https://api.whatsapp.com/send/?phone=<?= $row['nomor_wa'] ?>" class="btn btn-icon-only btn-success px-1" type="button" aria-label="chat via whatsapp" title="chat via whatsapp">
                                                  <span aria-hidden="true" class="fab fa-whatsapp text-white"></span>
                                             </a>
                                        </div>
                                   </div>
                                   <div class="d-grid mt-3">
                                        <!-- Modal -->
                                        <button type="button" class="btn btn-block btn-primary" data-bs-toggle="modal" data-bs-target="#modal-detail-<?= $row['id'] ?>">Detail</button>
                                        <div class="modal fade" id="modal-detail-<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modal-detail-<?= $row['id'] ?>" aria-hidden="true">
                                             <div class="modal-dialog modal-dialog-centered" role="document">
                                                  <div class="modal-content">
                                                       <div class="modal-header">
                                                            <h2 class="h6 modal-title">Detail</h2>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                       </div>
                                                       <div class="modal-body">

                                                            <div class="py-2 px-0">
                                                                 <a href="<?= URL::asset('item/'. $row['gambar']) ?>">
                                                                      <img src="<?= URL::asset('item/'. $row['gambar']) ?>" class="card-img-top rounded mb-3" alt="Not Found">
                                                                      <h3 class="h4"><?= $row['jenis_domba'] ?></h3>
                                                                 </a>
                                                                 <p class="card-text mb-2">
                                                                      <?= $row['deskripsi'] ?>
                                                                 </p>
													<div class="text-left">
														<span class="h5 mb-0 text-gray"><?= $row['harga'] ?></span>
													</div>
                                                            </div>

                                                       </div>
                                                       <div class="modal-footer">
                                                            <a href="https://api.whatsapp.com/send/?phone=<?= $row['nomor_wa'] ?>" class="btn btn-success text-white">
                                                                 <span class="fab fa-whatsapp me-2"></span>Hubungi Penjual
                                                            </a>
                                                            <button type="button" class="btn btn-link text-gray ms-auto" data-bs-dismiss="modal">Tutup</button>
                                                       </div>
                                                  </div>
                                             </div>
                                        </div>
                                        <!-- End Modal -->
                                   </div>
                              </div>
                         </div>
                    </div>
                    <?php endwhile; ?>

				<?php if($result->num_rows == 0) :?>
					<div class="alert alert-info text-center">
						Belum ada data!
					</div>
				<?php endif; ?>


               </section>
               <!-- End Content -->

          </main>

          <script>

          </script>

          <?php
          include 'views/layouts/footer-wm.php';
          include 'views/layouts/foot.php';
          ?>