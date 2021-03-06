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
                <label for="nama_pembeli">Nama Pembeli</label>
                <select class="form-control" name="id">
                    <option value="">--Pilih--</option>
                    <?php foreach ($nama as $d) { ?>
                        <option value="<?= $d->name ?>"><?= $d->name ?> </option>
                    <?php } ?>
                </select>
            </div>
            <?php foreach ($nama as $d) { ?>
                <div class="form-group">
                    <label for="role_id">Status Pembeli</label>
                    <input type="text" class="form-control" id="desc" name="role_id" placeholder="<?= $d->role_id ?>" autocomplete="off" disabled="">
                </div>
            <?php } ?>
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