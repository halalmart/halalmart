<div class="col-md-4">
    <?php foreach ($produk as $u) :  ?>
        <?php echo form_open_multipart('pembeli/pembelian/add_product/' . $u->id_product); ?>
        <form action="post">
            <div class="card input-group" style="width: 18rem;">
                <img src="<?php echo base_url('upload/product/') . $u->foto; ?>" height="500" width="100" class=" card-img-top" alt="...">
                <div class="card-body">
                    <?php echo form_hidden('id_product', $u->id_product); ?>
                    <?php echo form_hidden('name', $u->name); ?>
                    <?php echo form_hidden('foto', $u->foto); ?>
                    <?php echo form_hidden('patner_price ', $u->patner_price); ?>
                    <h5 class="card-title"><?= $u->name ?></h5>
                    <p class="card-text"><?= $u->desc ?></p>
                    <s class="card-text" style="color:red;" value="<?= $u->price ?>" name="price"><?= "Rp. " . number_format($u->price, 0, ',', '.') ?></s>
                    <h4 class="card-text" value="<?= $u->patner_price ?>"><?= $u->patner_price ?></h4>
                    <p class="card-text barang" value="<?= $u->inventory_id  ?>" id="inventory_id">Jumlah Produk : <?= $u->inventory_id ?></p>
                    <p class="card-text ket" id="barang"></p>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Quantity</span>
                        </div>
                        <input type="number" class="form-control" placeholder="-" aria-label="Quantity" aria-describedby="basic-addon1" id="quantity" name="quantity" min="1" max="<?= $u->inventory_id  ?>" value="1">
                    </div>
                    <?php echo anchor(site_url('pembeli/cart/add_product/'), ' <a class="btn btn-success">+keranjang</a>'); ?>
                    <button type="submit" class="btn btn-primary">cart</button>



                </div>
            <?php endforeach; ?>
            <?php foreach ($user as $u) :  ?>
                <?php echo form_hidden('id_pembeli', $u->id_pembeli); ?>
            <?php endforeach; ?>
        </form>
        <?php echo form_close(); ?>


</div>