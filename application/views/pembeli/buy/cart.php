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
                                <h3 class="card-title"></h3>
                            </div>
                            <div class="col-md-4">
                                <?php echo anchor(site_url('pembeli/'), ' Tambah Data', 'class="btn btn-primary"', 'class="fa fa-plus"'); ?>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" name="form" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>product</th>
                                            <th>nama</th>
                                            <th>jumlah</th>
                                            <th>harga</th>
                                            <th>sub-total</th>
                                            <th>Action</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($cart as $a) :
                                        ?>

                                            <tr>
                                                <?php echo form_hidden('id', $a->id); ?>
                                                <td><?= $no++ ?></td>
                                                <td name="foto"><img src="<?php echo base_url('upload/product/') . $a->foto ?>" width="150" height="150" class="file-preview-image"></td>
                                                <td name="name"><?= $a->name ?></td>
                                                <td name="quantitiy"><?= $a->quantity ?></td>
                                                <td name="patner_price" dbLink="123"><?= "Rp. " . number_format($a->patner_price, 0, ',', '.') ?></td>
                                                <td id="sub_price" name="sub_price" ok="123"><?= "Rp. " . number_format($a->patner_price * $a->quantity, 0, ',', '.') ?> </td>
                                                <td>
                                                    <input type="number" value="<?= $a->quantity ?>" class="form-control count" placeholder="-" aria-label="Quantity" aria-describedby="basic-addon1" id="quantity" name="quantity" min="1" max="<?= $a->quantity ?>" value="<?= $a->quantity ?>">

                                                    <?php
                                                    echo '&nbsp';
                                                    echo anchor(site_url('pembeli/pembelian/edit_product/' . $a->id_product), '<button type="button" class="btn btn-warning btn-xs">edit</button>');
                                                    echo anchor(site_url('pembeli/pembelian/delete_product/' . $a->id_product), '<button type="button" class="btn btn-danger btn-xs">Delete</button>', 'onclick="javasciprt: return confirm(\'Yakin Ingin Menghapus Produk?\')"');

                                                    ?>
                                                </td>
                                            </tr>

                                    </tbody>
                                <?php endforeach; ?>
                                <tfoot>
                                    <tr>
                                        <td colspan="5">harga total</td>
                                        <td id="total"></td>
                                        <td id="total"> <?php echo anchor(site_url('pembeli/pembelian/buy/' . 1), '<button type="button" class="btn btn-success btn-xs">Beli Sekarang</button>');
                                                        ?></td>

                                        </tbody>

                                    </tr>
                                </tfoot>

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
<script>
    var x = document.getElementsByName('sub_price').value;
    var result = 0;
    for (var i = 0; i < x.value; i++) {
        result += x[i];
    }
    document.getElementById("total").innerHTML = result;
</script>