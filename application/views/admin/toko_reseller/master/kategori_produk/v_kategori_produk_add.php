<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Quick Example</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <?php echo form_open_multipart('admin/toko_reseller/master/kategori_produk/add_action/'); ?>
    <form method="post">
        <div class="card-body">
            <div class="form-group">
                <label for="nama_kategori">Nama Kategori</label>
                <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" placeholder="Nama Kategori" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="foto">Foto</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="foto" name="foto">
                        <label class="custom-file-label" for="foto"></label>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a class="btn btn-secondary" href="javascript:history.back()">Kembali</a>
        </div>
    </form>
    <?php echo form_close(); ?>

</div>
<!-- /.card -->