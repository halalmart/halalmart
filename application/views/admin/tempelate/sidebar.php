        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="<?= base_url('assets/') ?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Halalmart</span>
            </a>
            <!--sidebar sementara manual. belum tahu cata terintegerasi ke database-->
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?= base_url('assets/') ?>dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">Alexander Tugimin</a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->

                <!-- QUERT JOIN-->
                <!--konsep menu dinamis-->
                <?php foreach ($menu as $m) : ?>
                    <nav class="mt-2">




                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                            <li class="nav-item menu-open">
                                <a href="<?= base_url('admin/dashboard'); ?>" class="nav-link active">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>
                                        Dashboard
                                    </p>
                                </a>
                            </li>
                            <!--cek srs. ini versi minimal-->
                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    <i class="nav-icon fas fa-database"></i>
                                    <p>
                                        Toko Reseller
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>
                                                Master
                                                <i class="right fas fa-angle-left"></i>
                                            </p>
                                        </a>
                                        <ul class="nav nav-treeview">
                                            <!--konsep menu dinamis-->
                                            <!--<li class="nav-item">
                                                <a href="<?= base_url($m->url); ?>" class="nav-link">
                                                    <i class="<?= $m->icon ?>"></i>
                                                    <p><?= $m->menu ?></p>
                                                </a>
                                            </li>-->

                                            <li class="nav-item">
                                                <a href="<?= base_url('admin/toko_reseller/master/Kategori_produk'); ?>" class="nav-link">
                                                    <i class="far fa-dot-circle nav-icon"></i>
                                                    <p>Kategori Produk</p>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="<?= base_url('admin/toko_reseller/master/data_produk'); ?>" class="nav-link">
                                                    <i class="far fa-dot-circle nav-icon"></i>
                                                    <p>Data Produk</p>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>
                                                Transaksi
                                                <i class="right fas fa-angle-left"></i>
                                            </p>
                                        </a>
                                        <ul class="nav nav-treeview">
                                            <!--sementara menggunakan penjual dan pembeli-->
                                            <li class="nav-item">
                                                <a href="<?= base_url('admin/transaksi/pennjualan'); ?>" class="nav-link">
                                                    <i class="far fa-dot-circle nav-icon"></i>
                                                    <p>Penjualan</p>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="<?= base_url('admin/transaksi/pembelian'); ?>" class="nav-link">
                                                    <i class="far fa-dot-circle nav-icon"></i>
                                                    <p>Pembelian</p>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    <i class="nav-icon fas fa-users"></i>
                                    <p>
                                        Edit Profil
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('admin/auth/logout'); ?>" class="nav-link">
                                    <i class="nav-icon fas fa-power-off"></i>
                                    <p>
                                        Logout
                                    </p>
                                </a>
                            </li>
                        </ul>

                    </nav>
                    <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        <?php endforeach; ?>
        <!--KOnsep menu dinamis-->
        </aside>