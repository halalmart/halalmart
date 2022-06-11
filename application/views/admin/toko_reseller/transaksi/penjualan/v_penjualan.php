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
                                            <?php echo anchor(site_url('admin/toko_reseller/transaksi/penjualan/add/'), ' Tambah Data', 'class="btn btn-primary"', 'class="fa fa-plus"'); ?>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <table id="example1" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>kode Pemesanan</th>
                                                        <th>nama konsumen</th>
                                                        <th>Status Konsumen</th>
                                                        <th>Kurir</th>
                                                        <th>Nama Produk</th>
                                                        <th>jumlah</th>
                                                        <th>harga</th>
                                                        <th>total harga + Ongkir</th>
                                                        <th>status</th>
                                                        <th>Total poin</th>
                                                        <th>Tanggal Pemesanan</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 1;
                                                    foreach ($penjualan as $u) :
                                                    ?>
                                                        <tr>
                                                            <?php echo form_hidden('order_id ', $u->order_id); ?>
                                                            <td><?= $no++ ?></td>
                                                            <td><?= $u->nama_pembeli ?></td>
                                                            <td><?= $u->status_pembeli ?></td>
                                                            <td><?= $u->kurir ?></td>
                                                            <td><?= $u->nama_produk ?></td>
                                                            <td><?= $u->jumlah ?></td>
                                                            <td><?= $u->harga ?></td>
                                                            <td><?= $u->total_harga ?></td>
                                                            <td><?= $u->status ?></td>
                                                            <td><?= $u->total_poin ?></td>
                                                            <td><?= $u->created_at ?></td>
                                                            <td>
                                                                <?php
                                                                echo anchor(site_url('admin/toko_reseller/master/penjualan/edit/' . $u->order_id), '<button type="button" class="btn btn-warning btn-xs">Update</button>');
                                                                echo '&nbsp';
                                                                echo anchor(site_url('admin/toko_reseller/master/penjualan/delete/' . $u->order_id), '<button type="button" class="btn btn-danger btn-xs">Delete</button>', 'onclick="javasciprt: return confirm(\'Yakin Ingin Menghapus Data?\')"');
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