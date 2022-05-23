<div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-success">
        <div class="card-header text-center">
            <a href="../../index2.html" class="h1"><b><?= $title; ?></b></a>
        </div>
        <div class="card-body">
            <?= $this->session->flashdata('message'); ?>

            <form action="<?= base_url('pembeli/auth'); ?>" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Email" id="email" name="email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Password" id="password" name="password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                <div class="row">
                    <!-- /.col -->
                    <div class="col-12">
                        <button type="submit" class="btn btn-success btn-block">Login</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <p class="mb-1">
                <a href="forgot-password.html">Lupa Password</a>
            </p>
            <p class="mb-1">
                <a href="<?= base_url('pembeli/auth/'); ?>reg_pembeli" class="text-center">Daftar Sebagai User</a>
            </p>
            <p class="mb-1">
                <a href="<?= base_url('penjual/auth/'); ?>reg_penjual" class="text-center">Daftar Sebagai Penjual</a>
            </p>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- /.login-box -->