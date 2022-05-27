<div class="register-box">
    <div class="card card-outline card-success">
        <div class="card-header text-center">
            <a href="../../index2.html" class="h1"><b>Halalmart</b></a>
        </div>
        <div class="card-body">
            <p class="login-box-msg">Daftar Menjadi Pmbeli</p>

            <form action="<?= base_url('pembeli/auth/reg_pembeli'); ?>" method="post">

                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Full name" id="name" name="name" value="<?= set_value('name'); ?>">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                <div class="input-group mb-3">
                    <select class="form-control" name="jenis_kelamin">
                        <option value="">Jenis Kelamin</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="city" id="city" name="city" value="<?= set_value('city'); ?>">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <?= form_error('city', '<small class="text-danger pl-3">', '</small>'); ?>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="address" id="address" name="address" value="<?= set_value('address'); ?>">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <?= form_error('address', '<small class="text-danger pl-3">', '</small>'); ?>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Email" id="email" name="email" value="<?= set_value('email'); ?>">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Password" id="password1" name="password1">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <?= form_error('password1', '<small class="text-danger">', '</small>'); ?>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Retype password" id="password2" name="password2">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- /.col -->
                    <div class="col-6">
                        <a href="<?= base_url(); ?>auth" class="text-center">Saya Punya Akun</a>
                    </div>
                    <div class="col-6">
                        <button type="submit" class="btn btn-success btn-block">Daftar</button>
                    </div>
                    <!-- /.col -->
                </div>
                <div class="row">

                </div>
            </form>
        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
</div>
<!-- /.register-box -->