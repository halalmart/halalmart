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
                                        <button type="button" class="btn btn-primary" data-toogle="modal" data-target="modal-add"><i class="fa fa-plus">Tambah</i></button>
                                        <div class="col-md-4">
                                            <?php echo anchor(site_url('admin/penjual/add/'), ' Tambah Data', 'class="btn btn-primary fa fa-plus"'); ?>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <table id="example1" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Foto</th>
                                                        <th>ID member</th>
                                                        <th>Nama</th>
                                                        <th>Jenis Kelamin</th>
                                                        <th>Alamat</th>
                                                        <th>Kota</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 1;
                                                    foreach ($penjual as $u) :
                                                    ?>
                                                        <tr>
                                                            <td><?= $no++ ?></td>
                                                            <td><?= $u->image ?></td>
                                                            <td><?= $u->id_penjual ?></td>
                                                            <td><?= $u->name ?></td>
                                                            <td><?= $u->jenis_kelamin ?></td>
                                                            <td><?= $u->address ?></td>
                                                            <td><?= $u->city ?></td>
                                                            <td>
                                                                <?php
                                                                echo anchor(site_url('admin/penjual/edit/' . $u->id), '<button type="button" class="btn btn-warning btn-xs">Update</button>');
                                                                echo '&nbsp';
                                                                echo anchor(site_url('penjual/R_penjual/delete/' . $u->id), '<button type="button" class="btn btn-danger btn-xs">Delete</button>', 'onclick="javasciprt: return confirm(\'Yakin Ingin Menghapus Data?\')"');
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