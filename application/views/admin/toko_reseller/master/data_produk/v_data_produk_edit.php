<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Quick Example</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <?php echo form_open_multipart('admin/toko_reseller/master/data_produk/edit_action/'); ?>
    <form method="post">
        <div class="card-body">
            <?php foreach ($data_produk as $u) : ?>
                <?php echo form_hidden('id_product', $u->id_product); ?>
                <div class="form-upload">
                    <label>foto</label>
                    <p>
                        <img src="<?php echo base_url('upload/product/') . $u->foto; ?>" width="150" height="150" class="file-preview-image">
                    </p>
                    <input type="file" class="form-control" value="<?= $u->foto ?>" id="foto" name="foto" placeholder="upload foto">
                </div>
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" class="form-control" value="<?= $u->name ?>" id="name" name="name" placeholder="Nama Produk" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="desc">Deskripsi</label>
                    <input type="text" class="form-control" value="<?= $u->desc ?>" id="desc" name="desc" placeholder="Deeskripsi" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="sku">SKU</label>
                    <input type="text" class="form-control" value="<?= $u->sku ?>" id="sku" name="sku" placeholder="sku" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="category_id">Kategori</label>
                    <select class="form-control" name="category_id">
                        <option value="<?= $u->category_id ?>"><?= $u->category_id ?></option>
                        <?php foreach ($kategori as $d) { ?>
                            <option value="<?= $d->category_id ?>"><?= $d->nama_kategori ?> </option>
                        <?php } ?>
                    </select>
                    <div class="form-group">
                        <label for="inventory_id">Inventory</label>
                        <input type="text" class="form-control" value="<?= $u->inventory_id ?>" id="inventory_id" name="inventory_id" placeholder="Poin" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="price">Harga</label>
                        <input type="text" class="form-control" value="<?= $u->price ?>" id="price" name="price" placeholder="harga" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="patner_price">Harga Mitra</label>
                        <input type="text" class="form-control" value="<?= $u->patner_price ?>" id="patner_price" name="patner_price" placeholder="Harga Mitra" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="point">Poin</label>
                        <input type="text" class="form-control" value="<?= $u->point ?>" id="point" name="point" placeholder="Poin" autocomplete="off">
                    </div>
                <?php endforeach; ?>
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