            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <section class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">DataTable with default features</h3>
                                        </div>
                                        <div class="col-md-4">
                                            <?php echo anchor(site_url('admin/toko_reseller/master/data_produk/add/'), ' Tambah Data', 'class="btn btn-primary"', 'class="fa fa-plus"'); ?>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <table id="example1" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Foto</th>
                                                        <th>Nama</th>
                                                        <th>Deskripsi</th>
                                                        <th>SKU</th>
                                                        <th>Kategori</th>
                                                        <th>inventori</th>
                                                        <th>Harga</th>
                                                        <th>Harga Mitra</th>
                                                        <th>Poin</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 1;
                                                    foreach ($data_produk as $u) :
                                                    ?>
                                                        <tr>
                                                            <?php echo form_hidden('id_product', $u->id_product); ?>
                                                            <td><?= $no++ ?></td>
                                                            <td><img src="<?php echo base_url('upload/product/') . $u->foto; ?>" width="150" height="150" class="file-preview-image"></td>
                                                            <td><?= $u->name ?></td>
                                                            <td><?= $u->desc ?></td>
                                                            <td><?= $u->sku ?></td>
                                                            <td><?= $u->category_id ?></td>
                                                            <td><?= $u->inventory_id ?></td>
                                                            <td><?= $u->price ?></td>
                                                            <td><?= $u->patner_price ?></td>
                                                            <td><?= $u->point ?></td>
                                                            <td>
                                                                <?php
                                                                echo anchor(site_url('admin/toko_reseller/master/data_produk/edit/' . $u->id_product), '<button type="button" class="btn btn-warning btn-xs">Update</button>');
                                                                echo '&nbsp';
                                                                echo anchor(site_url('admin/toko_reseller/master/data_produk/delete/' . $u->id_product), '<button type="button" class="btn btn-danger btn-xs">Delete</button>', 'onclick="javasciprt: return confirm(\'Yakin Ingin Menghapus ' . $u->name . '?\')"');
                                                                ?>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>

                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.container-fluid -->
                    </section>
                    <!-- /.row (main row) -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            <script>
                var myModal = document.getElementById('myModal')
                var myInput = document.getElementById('myInput')

                myModal.addEventListener('shown.bs.modal', function() {
                    myInput.focus()
                })
            </script>
            <script>
                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: 'btn btn-success',
                        cancelButton: 'btn btn-danger'
                    },
                    buttonsStyling: false
                })

                swalWithBootstrapButtons.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'No, cancel!',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        swalWithBootstrapButtons.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    } else if (
                        /* Read more about handling dismissals below */
                        result.dismiss === Swal.DismissReason.cancel
                    ) {
                        swalWithBootstrapButtons.fire(
                            'Cancelled',
                            'Your imaginary file is safe :)',
                            'error'
                        )
                    }
                })
            </script>