<header class="header-global">
     <nav id="navbar-main" aria-label="Primary navigation" class="navbar navbar-main navbar-expand-lg navbar-theme-primary headroom navbar-dark navbar-theme-secondary">
          <div class="container position-relative">
               <a class="navbar-brand me-lg-5" href="<?= URL::route() ?>">
                    <img class="navbar-brand-dark" src="<?= URL::asset('img/brand/goat-light.svg') ?>" alt="Logo light">
                    <img class="navbar-brand-light" src="<?= URL::asset('img/brand/goat-dark.svg') ?>" alt="Logo dark">
               </a>
               <div class="navbar-collapse collapse me-auto" id="navbar_global">
                    <div class="navbar-collapse-header">
                         <div class="row">
                              <div class="col-6 collapse-brand">
                                   <a href="<?= URL::route() ?>">
                                        <img src="<?= URL::asset('img/brand/goat-dark.svg') ?>" alt="Themesberg logo">
                                   </a>
                              </div>
                              <div class="col-6 collapse-close">
                                   <a href="#navbar_global" class="fas fa-times" data-bs-toggle="collapse" data-bs-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" title="close" aria-label="Toggle navigation"></a>
                              </div>
                         </div>
                    </div>
                    <ul class="navbar-nav navbar-nav-hover align-items-lg-center">
                         <li class="nav-item dropdown">
                              <a href="#" class="nav-link dropdown-toggle" id="frontPagesDropdown" aria-expanded="false" data-bs-toggle="dropdown">
                                   Pages
                                   <span class="fas fa-angle-down nav-link-arrow ms-1"></span>
                              </a>
                              <div class="dropdown-menu dropdown-megamenu px-0 py-2 p-lg-4" aria-labelledby="frontPagesDropdown">
                                   <div class="row">
                                        <div class="col-6 col-lg-4">
                                             <h6 class="d-block mb-3 text-primary">Main pages</h6>
                                             <ul class="list-style-none mb-4">
                                                  <li class="mb-2 megamenu-item">
                                                       <a class="megamenu-link" href="<?= URL::route() ?>">Home</a>
                                                  </li>
                                                  <?php if(!isset($_SESSION['user']['username'])): ?>
                                                  <li class="mb-2 megamenu-item">
                                                       <a class="megamenu-link" href="<?= URL::route('login.php') ?>">Login</a>
                                                  </li>
                                                  <?php endif ?>
                                             </ul>
                                        </div>
                                   </div>
                              </li>
                              <?php if(isset($_SESSION['user']['username'])): ?>
                              <li class="nav-item dropdown">
                                   <a href="#" class="nav-link dropdown-toggle" id="frontPagesDropdown" aria-expanded="false" data-bs-toggle="dropdown">
                                        Dashboard
                                        <span class="fas fa-angle-down nav-link-arrow ms-1"></span>
                                   </a>
                                   <div class="dropdown-menu dropdown-megamenu px-0 py-2 p-lg-4" aria-labelledby="frontPagesDropdown">
                                        <div class="row">
                                             <div class="col-6 col-lg-4">
                                                  <h6 class="d-block mb-3 text-primary">Users Dashboard</h6>
                                                  <ul class="list-style-none mb-4">
                                                       <li class="mb-2 megamenu-item">
                                                            <a class="megamenu-link" href="<?= URL::route('dashboard.php') ?>">Dashboard</a>
                                                       </li>
                                                       <li class="mb-2 megamenu-item">
                                                            <a class="megamenu-link" href="<?= URL::route('controllers/auth/logout.php') ?>">Logout</a>
                                                       </li>
                                                  </ul>
                                             </div>
                                        </div>
                                   </li>
                                   <?php endif; ?>
                              </ul>
                         </div>
                         <div class="d-flex align-items-center">
                              <button class="navbar-toggler ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
                                   <span class="navbar-toggler-icon"></span>
                              </button>
                         </div>
                    </div>
               </nav>
          </header>