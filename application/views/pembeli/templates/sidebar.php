<body id="page-top">



    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3 dropdown">
                    <i class="fa fa-bars"></i>
                </button>
                <img src="<?php echo base_url() ?>assets/img/HNI.png" width="56" height="42" href="#" role="button">
                <h1 class="h3 mb-0 text-gray-800" href="#" role="button">Halal Mart</h1>
                <div class="dropdown">

                    <h6 class="mb-0 text-gray-800 dropbtn" role="button">Kategori</h6>
                    <div class="dropdown-content">
                        <?php foreach ($kategori as $u) : ?>
                            <a href="#"><?= $u->nama_kategori ?></a>
                        <?php endforeach; ?>
                    </div>

                </div>
                <!-- Topbar Search -->
                <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Cari barang" aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                    <li class="nav-item dropdown no-arrow d-sm-none">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search fa-fw"></i>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                            <form class="form-inline mr-auto w-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>



                    <!-- keranjang -->
                    <?php foreach ($user as $u) { ?>
                        <li class="nav-item dropdown no-arrow mx-1">

                            <a class="nav-link dropdown-toggle" href="<?= base_url('pembeli/pembelian/show_cart/' . $u->id_pembeli) ?>" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                                    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                </svg>
                                <!-- Counter - Alerts -->


                                <span class="badge badge-danger badge-counter">
                                    <?php echo $this->M_cart->total_items($u->id_pembeli) ?>

                                </span>
                            </a>

                        </li>
                        <li class="nav-item dropdown no-arrow mx-1">

                            <a class="nav-link " href="<?= base_url('pembeli/pembelian/show_cart/' . $u->id_pembeli) ?>" aria-haspopup="true" aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                                    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                </svg>
                                <!-- Counter - Alerts -->


                                <span class="badge badge-danger badge-counter">
                                    <?php echo $this->M_cart->total_items($u->id_pembeli) ?>

                                </span>
                            </a>

                        </li>




                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Login -->
                        <?php if ($this->session->userdata('username')) { ?>
                            <li>
                                <div>
                                    Selamat datang <?php echo $this->session->userdata('username') ?>
                                </div>
                            </li>
                            <li class="nav-item d-sm-inline-block"><?php echo anchor('auth/logout'), 'Logout' ?></li>
                        <?php } else { ?>
                            <li class="nav-item form-inline mx-1">
                                <img src="<?php echo base_url('upload/pembeli/profil/') . $u->image ?>" width="40" height="40" class="img-circle">
                                <? echo '&nbsp'; ?>
                                <div class="text-decoration-none btn btn-danger "><?php echo anchor('pembeli/auth/logout', 'Keluar'); ?></div>
                            </li>
                        <?php } ?>

                    <?php } ?>

                </ul>
            </nav>

            <!-- End of Topbar -->