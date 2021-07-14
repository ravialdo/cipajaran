<?php
session_start();
require 'config/CheckLogin.php';
include 'views/layouts/head.php';
?>

<!-- Section -->
<section class="min-vh-100 d-flex align-items-center section-image overlay-soft-dark" data-background="../../assets/img/pages/form-image.jpg">
     <div class="container">
          <div class="row justify-content-center">
               <div class="col-12 d-flex align-items-center justify-content-center">
                    <div class="signin-inner my-4 my-lg-0 bg-white shadow-soft border rounded border-gray-300 p-4 p-lg-5 w-100 fmxw-500">
                         <div class="text-center text-md-center mb-4 mt-md-0">
                              <h1 class="mb-0 h3">Silahkan Login!</h1>
                         </div>
                         <?php if ($_SESSION['status'] == 'success') : ?>
                         <div class="alert alert-success text-center">
                              <?= $_SESSION['message'] ?>
                         </div>
                         <?php elseif ($_SESSION['status'] == 'failed') : ?>
                         <div class="alert alert-danger text-center">
                              <?= $_SESSION['message'] ?>
                         </div>
                         <?php endif; ?>

                         <?php
                         unset($_SESSION['status']);
                         unset($_SESSION['message']);
                         ?>
                         <form class="mt-4" action="<?= URL::route('controllers/auth/login.php') ?>" method="POST">

                              <!-- Form -->
                              <div class="form-group mb-4">
                                   <label for="email">Username</label>
                                   <div class="input-group">
                                        <span class="input-group-text">
                                             <span class="fas fa-user"></span>
                                        </span>
                                        <input name="username" type="text" class="form-control" placeholder="Username" required>
                                   </div>
                              </div>
                              <!-- End of Form -->

                              <div class="form-group">
                                   <!-- Form -->
                                   <div class="form-group mb-4">
                                        <label for="password">Password</label>
                                        <div class="input-group">
                                             <span class="input-group-text">
                                                  <span class="fas fa-unlock-alt"></span>
                                             </span>
                                             <input name="password" type="password" placeholder="Password" class="form-control" required>
                                        </div>
                                   </div>
                                   <!-- End of Form -->

                                   <div class="d-flex justify-content-between align-items-center mb-4">
                                        <div class="form-check mb-0">
                                             <input class="form-check-input" type="checkbox" value="" id="remember">
                                             <label class="form-check-label mb-0" for="remember">
                                                  Ingat Saya
                                             </label>
                                        </div>
                                   </div>

                              </div>
                              <div class="d-grid">
                                   <button type="submit" name="submit" class="btn btn-primary">
                                        <span class="fa fa-spinner fa-spin sr-only"></span>
                                        Login
                                   </button>
                              </div>
                         </form>
                    </div>
               </div>
          </div>
     </div>
</section>
<!-- End Section -->

<?php include 'views/layouts/foot.php' ?>