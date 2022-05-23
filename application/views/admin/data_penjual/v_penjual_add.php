<section class="content pl-5">

    <!-- Default box -->
    <div class="card card-primary card-outline modal-fade">
        <div class="card-header model-dialog">
            <div class="box-body ">

                <form action="" method="POST">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="email">email</label>
                            <input type="text" class="form-control" name="email" id="email" placeholder="email">
                            <?php echo base_url('admin/penjual/add_action'); ?>
                        </div>
                        <div class="form-group">
                            <label for="password">password</label>
                            <input type="text" class="form-control" name="password" id="password" placeholder="password">
                        </div>
                        <div class="form-group">
                            <label for="name">nama lengkap</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="nama lengkap">
                        </div>
                        <div class="form-group">
                            <label for="jenis_kelamin">jenis kelamin</label>
                            <input type="text" class="form-control" name="jenis_kelamin" id="jenis_kelamin" placeholder="jenis kelamin">

                            <div class="form-group">
                                <label for="city">Kota</label>
                                <input type="text" class="form-control" name="city" id="city" placeholder="Kota">
                            </div>

                            <div class="form-group">
                                <label for="address">Alamat</label>
                                <textarea class="form-control" name="address" id="address" rows="3" placeholder="Alamat"></textarea>
                            </div>
                            <div class="form-group">
                                <label class="" for="image">Foto</label>
                                <div class="">
                                    <?php echo form_upload(array('name' => 'image', 'id' => 'image', 'class' => 'form-control')); ?>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="modal-footer">

                            <button type="button" class="btn btn-primary">Save</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.box -->
    </div>

</section>
<!-- /.content -->
<script type="text/javascript">
    $(document).ready(function() {
        $('.tutup').click(function(e) {
            $('#myModal').modal('hide');
        });
    });
</script>