<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Quick Example</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <?php echo form_open_multipart('admin/toko_reseller/master/kategori_produk/edit_action/'); ?>
    <?php foreach ($kategori_produk as $u) : ?>
        <form method="post">
            <div class="card-body">
                <?php echo form_hidden('category_id', $u->category_id); ?>
                <div class="form-group">
                    <label for="nama_kategori">Nama Kategori</label>
                    <input type="text" class="form-control" id="nama_kategori" value="<?= $u->nama_kategori ?>" name="nama_kategori" placeholder="Nama Kategori" autocomplete="off">
                </div>
                <div class="form-group">
                    <label>foto</label>
                    <p>
                        <img src="<?= base_url('upload/icon/kategori/') . $u->foto ?>" width=" 100">
                    </p>
                    <input type="file" value="<?= $u->foto ?>" class="form-control" id="foto" name="foto" placeholder="upload foto">
                </div>

            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-secondary" href="javascript:history.back()">Kembali</a>
            </div>
        </form>
    <?php endforeach; ?>
    <?php echo form_close(); ?>

</div>
<!-- /.card -->