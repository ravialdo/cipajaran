<?php
session_start();
require 'config/CheckAdmin.php';
require 'config/DB.php';

include 'views/layouts/head.php';
include 'views/layouts/navbar.php';
?>

<main>
     <div class="preloader bg-dark flex-column justify-content-center align-items-center">
          <svg id="loader-logo" class="text-white fa-rotate-180" width="70" height="70" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path></svg>
     </div>

     <section class="section-header bg-secondary text-white">
          <div class="container">
               <div class="row">
                    <div class="col-12 text-center">
                         <h1 class="display-2">Dashboard</h1>
                    </div>
               </div>
          </div>
     </section>

     <section class="section-header" style="margin-top:-2em;">
          <div class="container">

               <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-text-light breadcrumb-primary text-white">
                         <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
               </nav>

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

               <div class="card border-0 shadow mt-3">
                    <div class="card-body">
                         <h2 class="mb-3">Tambah Data</h2>

                         <form action="<?= URL::route('controllers/dashboard/create.php') ?>" method="POST" enctype="multipart/form-data">

                              <div class="mb-3">
                                   <label class="form-label">Gambar</label>
                                   <input class="form-control" name="gambar" type="file" required>
                              </div>

                              <div class="mb-3">
                                   <label>Jenis Domba</label>
                                   <input type="text" name="jenis_domba" class="form-control" placeholder="Jenis Domba" required>
                              </div>

                              <div class="mb-3">
                                   <label>Harga</label>
                                   <input type="text" name="harga" class="form-control" id="rupiah" placeholder="Harga" required>
                              </div>

                              <div class="mb-3">
                                   <label>Nomor WA</label>
                                   <input type="number" class="form-control" name="nomor_wa" placeholder="628xxxxxxxxxx" required>
                              </div>

                              <div class="mb-3">
                                   <label>Deskripsi</label>
                                   <textarea class="form-control" name="deskripsi" placeholder="Deskripsi" rows="4" required></textarea>
                              </div>

                              <button type="submit" name="submit" class="btn btn-primary my-2 px-5">
                                   <i class="fa fa-save me-2"></i>Simpan
                              </button>
                         </form>
                    </div>
               </div>

               <div class="card border-0 shadow mt-5">
                    <div class="card-body">
                         <h2 class="mb-3">Data Tabel</h2>

                         <div class="row justify-content-end">

                              <div class="table-responsive">
                                   <table id="datatable" class="table table-striped"  style="width:100%">
                                        <thead>
                                             <tr>
                                                  <th>NO</th>
                                                  <th>Jenis Domba</th>
                                                  <th>Harga</th>
                                                  <th>Nomor WA</th>
                                                  <th>Aksi</th>
                                             </tr>
                                        </thead>
                                        <tbody>

                                             <?php
                                             $i = 1;
                                             $result = DB::db_connect()->query("SELECT * FROM domba ORDER BY id DESC");
                                             while ($row = $result->fetch_assoc()) :
                                             ?>

                                             <tr>
                                                  <td> <?= $i++ ?> </td>
                                                  <td> <?= $row['jenis_domba'] ?> </td>
                                                  <td><?= $row['harga'] ?> </td>
                                                  <td><?= $row['nomor_wa'] ?></td>
                                                  <td>
                                                       <button class="btn btn-primary btn-xs mb-1 mb-sm-0" data-bs-toggle="modal" data-bs-target="#modal-edit-<?= $row['id'] ?>">
                                                            Edit
                                                       </button>

                                                       <!-- Modal -->
                                                       <div class="modal fade" id="modal-edit-<?= $row['id'] ?>" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modal-edit-<?= $row['id'] ?>" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                 <div class="modal-content">
                                                                      <div class="modal-header">
                                                                           <h2 class="h6 modal-title">Edit Data</h2>
                                                                           <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                      </div>
                                                                      <div class="modal-body">
                                                                           <form action="<?= URL::route('controllers/dashboard/edit.php?k='. base64_encode($row['id'])) ?>" method="POST" enctype="multipart/form-data">

                                                                                <div class="mb-3">
                                                                                     <label class="form-label">Gambar <sup class="text-info">Opsional</sup></label>
                                                                                     <input class="form-control" name="gambar" type="file">
                                                                                </div>

                                                                                <div class="mb-3">
                                                                                     <label>Jenis Domba</label>
                                                                                     <input type="text" name="jenis_domba" class="form-control" placeholder="Jenis Domba" value="<?= $row['jenis_domba'] ?>" required>
                                                                                </div>

                                                                                <div class="mb-3">
                                                                                     <label>Harga</label>
                                                                                     <input type="text" name="harga" class="form-control" id="editRupiah" placeholder="Harga" value="<?= $row['harga'] ?>" required>
                                                                                </div>

                                                                                <div class="mb-3">
                                                                                     <label>Nomor WA</label>
                                                                                     <input type="number" class="form-control" name="nomor_wa" placeholder="628xxxxxxxxxx" value="<?= $row['nomor_wa'] ?>" required>
                                                                                </div>

                                                                                <div class="mb-3">
                                                                                     <label>Deskripsi</label>
                                                                                     <textarea class="form-control" name="deskripsi" placeholder="Deskripsi" rows="4" required><?= $row['deskripsi'] ?></textarea>
                                                                                </div>

                                                                           </div>
                                                                           <div class="modal-footer">
                                                                                <button type="submit" class="btn btn-primary" name="submit">
                                                                                     <i class="fa fa-save me-2"></i>Simpan
                                                                                </button>
                                                                                <button type="button" class="btn btn-link text-gray ms-auto" data-bs-dismiss="modal">Close</button>
                                                                           </form>
                                                                      </div>
                                                                 </div>
                                                            </div>
                                                       </div>
                                                       <!-- End Modal -->

                                                       <button type="button" class="btn btn-danger btn-xs" data-bs-toggle="modal" data-bs-target="#modal-delete-<?= $row['id'] ?>">
                                                            Hapus
                                                       </button>

                                                       <!-- Modal -->

                                                       <div class="modal fade" id="modal-delete-<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modal-delete-<?= $row['id'] ?>" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                 <div class="modal-content bg-primary text-white">
                                                                      <div class="modal-header border-0">
                                                                           <button type="button" class="btn-close bg-gray-500" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                      </div>
                                                                      <div class="modal-body">
                                                                           <div class="py-3 text-center">
                                                                                <span class="modal-icon display-1-lg"><span class="fa fa-exclamation fa-3x"></span></span>
                                                                                <h2 class="h4 modal-title my-3">PESAN PERINGATAN!</h2>
                                                                                <p class="px-lg-5">
                                                                                     Yakin ingin menghapus data?
                                                                                </p>
                                                                           </div>
                                                                      </div>
                                                                      <div class="modal-footer border-secondary justify-content-between">
                                                                           <button type="button" class="btn btn-sm btn-white px-4" data-bs-dismiss="modal">Batal</button>
                                                                           <a href="<?= URL::route('controllers/dashboard/delete.php?k='. base64_encode($row['id'])) ?>" class="btn btn-sm btn-white px-4">Yakin</a>
                                                                      </div>
                                                                 </div>
                                                            </div>
                                                       </div>
                                                       <!-- End Modal -->
                                                  </td>
                                             </tr>

                                             <?php
                                             endwhile;
                                             ?>

                                        </tbody>
                                        <tfoot>
                                             <tr>
                                                  <th>NO</th>
                                                  <th>Jenis Domba</th>
                                                  <th>Harga</th>
                                                  <th>Nomor WA</th>
                                                  <th>Aksi</th>
                                             </tr>
                                        </tfoot>
                                   </table>
                              </div>

                         </div>
                    </div>

               </div>

          </div>
     </section>

</main>

<script type="text/javascript">
     var rupiah = document.getElementById('rupiah');
     rupiah.addEventListener('keyup', function(e) {
          rupiah.value = formatRupiah(this.value, 'Rp. ');
     });

     function formatRupiah(angka, prefix) {
          var number_string = angka.replace(/[^,\d]/g, '').toString(),
          split = number_string.split(','),
          sisa = split[0].length % 3,
          rupiah = split[0].substr(0, sisa),
          ribuan = split[0].substr(sisa).match(/\d{3}/gi);

          if (ribuan) {
               separator = sisa ? '.': '';
               rupiah += separator + ribuan.join('.');
          }

          rupiah = split[1] != undefined ? rupiah + ',' + split[1]: rupiah;
          return prefix == undefined ? rupiah: (rupiah ? 'Rp. ' + rupiah: '');
     }


     function Delete() {
          alert('hai');
     }
</script>

<?php
include 'views/layouts/footer-wm.php';
include 'views/layouts/foot.php';
?>