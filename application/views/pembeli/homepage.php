 <!-- Begin Page Content -->
 <div class="container-fluid">
   <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
     <div class="carousel-inner">
       <div class="carousel-item active">
         <img class="d-block w-100" src="<?php echo base_url('upload/ads/') ?>1.jpg" alt="First slide">
       </div>
       <div class="carousel-item">
         <img class="d-block w-100" src="<?php echo base_url('upload/ads/') ?>2.jpg" alt="Second slide">
       </div>
       <div class="carousel-item">
         <img class="d-block w-100" src="<?php echo base_url('upload/ads/') ?>3.jpg" alt="Third slide">
       </div>
     </div>
     <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
       <span class="carousel-control-prev-icon" aria-hidden="true"></span>
       <span class="sr-only">Previous</span>
     </a>
     <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
       <span class="carousel-control-next-icon" aria-hidden="true"></span>
       <span class="sr-only">Next</span>
     </a>
   </div>

   <div class="row ">
     <h2 class="">KATEGORI PRODUK</h2>
   </div>

   <div class="row ">
     <?php foreach ($kategori as $k) : ?>
       <div class="card text-center" style=" width: 18rem; ">
         <img src="<?php echo base_url('upload/icon/kategori/') . $k->foto; ?>" class="card-img-top" alt="...">
         <div class="card-body">
           <h5 class="card-title"><?= $k->nama_kategori ?></h5>
           <a href="#" class="btn btn-primary te">Klik Disini</a>
         </div>
       </div>
     <?php endforeach; ?>
   </div>
   <div class="row ">
     <h2 class="">PRODUK HALALMART</h2>
   </div>
   <div class="row">
     <?php foreach ($produk as $u) : ?>
       <div class="card" style="width: 18rem;">
         <img src="<?php echo base_url('upload/product/') . $u->foto; ?>" height="250" class=" card-img-top" alt="...">
         <div class="card-body">
           <h5 class="card-title" value="<?= $u->name ?>" name><?= $u->name ?></h5>
           <p class="card-text"><?= $u->desc ?></p>
           <s class="card-text" style="color:red;"><?= "Rp. " . number_format($u->price, 0, ',', '.') ?></s>
           <h4 class="card-text"><?= "Rp. " . number_format($u->patner_price, 0, ',', '.') ?></h4>
           <a href="<?= site_url('pembeli/pembelian/product/' . $u->id_product) ?>" class="btn btn-success fa fa-plus align-self-center"> Tambah</a>

         </div>
       </div>
     <?php endforeach; ?>

   </div>


   <!-- Footer -->
   <footer class="sticky-footer bg-white">
     <div class="container my-auto">
       <div class="copyright text-center my-auto">
         <span>Copyright &copy; Your Website 2021</span>
       </div>
     </div>
   </footer>
   <!-- End of Footer -->

 </div>
 <!-- End of Content Wrapper -->

 <!-- End of Page Wrapper -->

 <!-- Scroll to Top Button-->
 <a class="scroll-to-top rounded" href="#page-top">
   <i class="fas fa-angle-up"></i>
 </a>

 <!-- Logout Modal-->
 <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
         <button class="close" type="button" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">×</span>
         </button>
       </div>
       <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
       <div class="modal-footer">
         <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
         <a class="btn btn-primary" href="login.html">Logout</a>
       </div>
     </div>
   </div>
 </div>
 <script type="text/javascript">
   $(document).ready(function() {
     $('.cart').selectpicker();

     //GET UPDATE
     $('.update-record').on('click', function() {
       var package_id = $(this).data('package_id');
       var package_name = $(this).data('package_name');
       $(".strings").val('');
       $('#UpdateModal').modal('show');
       $('[name="edit_id"]').val(package_id);
       $('[name="package_edit"]').val(package_name);
       //AJAX REQUEST TO GET SELECTED PRODUCT
       $.ajax({
         url: "<?php echo site_url('package/get_product_by_package'); ?>",
         method: "POST",
         data: {
           package_id: package_id
         },
         cache: false,
         success: function(data) {
           var item = data;
           var val1 = item.replace("[", "");
           var val2 = val1.replace("]", "");
           var values = val2;
           $.each(values.split(","), function(i, e) {
             $(".strings option[value='" + e + "']").prop("selected", true).trigger('change');
             $(".strings").selectpicker('refresh');

           });
         }

       });
       return false;
     });

     //GET CONFIRM DELETE
     $('.delete-record').on('click', function() {
       var package_id = $(this).data('package_id');
       $('#DeleteModal').modal('show');
       $('[name="delete_id"]').val(package_id);
     });

   });
 </script>