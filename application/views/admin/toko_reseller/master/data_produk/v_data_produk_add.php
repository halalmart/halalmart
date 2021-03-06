<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Quick Example</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <?php echo form_open_multipart('admin/toko_reseller/master/data_produk/add_action/'); ?>
    <form method="post">
        <div class="card-body">
            <div class="form-group">
                <label for="foto">Foto</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="foto" name="foto">
                        <label class="custom-file-label" for="foto"></label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Nama Produk" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="desc">Deskripsi</label>
                <input type="text" class="form-control" id="desc" name="desc" placeholder="Deeskripsi" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="sku">SKU</label>
                <input type="text" class="form-control" id="sku" name="sku" placeholder="sku" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="category_id">Kategori</label>
                <select class="form-control" name="category_id">
                    <option value="">--Pilih--</option>
                    <?php foreach ($kategori as $d) { ?>
                        <option value="<?= $d->category_id ?>"><?= $d->nama_kategori ?> </option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="inventory_id">Inventory</label>
                <input type="text" class="form-control" id="inventory_id" name="inventory_id" placeholder="Infentory" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="price">Harga</label>
                <input type="text" class="form-control" id="price" name="price" placeholder="harga" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="patner_price">Harga Mitra</label>
                <input type="text" class="form-control" id="patner_price" name="patner_price" placeholder="Harga Mitra" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="point">Poin</label>
                <input type="text" class="form-control" id="point" name="point" placeholder="point" autocomplete="off">
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