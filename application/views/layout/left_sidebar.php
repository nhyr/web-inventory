<!--[ navigation menu ] start -->
    <nav class="pcoded-navbar">
        <div class="navbar-wrapper">
            <div class="navbar-brand header-logo">
                <a href="" class="b-brand">
                    <!-- <div class="b-bg">
                        <i class="feather icon-trending-up"></i>
                    </div> -->
                    <div width: 15px;height: 60px;border-radius: 8px;">
                        <img src="<?=base_url('assets/images/2.png')?>" style="width: 220px;height: auto;margin-left: -8.5px; auto;margin-top: -9px;">
                    </div>
                </a>
                <a class="mobile-menu" id="mobile-collapse" href="javascript:"><span></span></a>
            </div>
            <div class="navbar-content scroll-div">
                <?php
                    $uri = $this->uri->segment(1);
                ?>
                <ul class="nav pcoded-inner-navbar" style="list-style: none;">
                    <li class="nav-item pcoded-menu-caption">
                        <label>Navigation</label>
                    </li>
                    <li class="nav-item <?=$uri == ''?'active':''?>">
                        <a href="<?=base_url()?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
                    </li>
                    <li class="nav-item pcoded-menu-caption">
                        <label>Master </label>
                    </li>
                    <?php
                        if ($this->session->userdata('level')=='0'):
                    ?>
                    <li class="nav-item <?=$uri == 'supplier'?'active':''?>">
                        <a href="<?=base_url('supplier')?>" class="nav-link"><span class="pcoded-micon"><i class="feather icon-download"></i></span><span class="pcoded-mtext">Supplier</span></a>
                    </li>
                    <li class="nav-item <?=$uri == 'barang'?'active':''?> ">
                        <a href="<?=base_url('barang')?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-box"></i></span><span class="pcoded-mtext">Barang</span></a>
                    </li>
                    <?php endif ?>
                    <?php
                        if ($this->session->userdata('level')=='1'):
                    ?>
                    <li class="nav-item <?=$uri == 'barang_melting'?'active':''?>">
                        <a href="<?=base_url('barang_melting')?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-box"></i></span><span class="pcoded-mtext">Barang Melting</span></a>
                    </li>
                    <?php endif ?>
                    <li class="nav-item pcoded-menu-caption">
                        <label>Kelola Barang</label>
                    </li>
                    <?php
                        if ($this->session->userdata('level')=='0'):
                    ?>
                    <li class="nav-item <?=$uri == 'barang_stok'?'active':''?>">
                        <a href="<?=base_url('barang_stok')?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-grid"></i></span><span class="pcoded-mtext">Stok Barang</span></a>
                    </li>
                    <li class="nav-item  <?=$uri == 'barang_masuk'?'active':''?>">
                        <a href="<?=base_url('barang_masuk')?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-plus-circle"></i></span><span class="pcoded-mtext">Barang Masuk</span></a>
                    </li>
                    <li class="nav-item  <?=$uri == 'barang_keluar'?'active':''?>">
                        <a href="<?=base_url('barang_keluar')?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-minus-circle"></i></span><span class="pcoded-mtext">Barang Keluar</span></a>
                    </li>
                    <?php endif ?>
                    <?php
                        if ($this->session->userdata('level')=='1'):
                    ?>
                    <li class="nav-item <?=$uri == 'barang_stok_melting'?'active':''?>">
                        <a href="<?=base_url('barang_stok_melting')?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-grid"></i></span><span class="pcoded-mtext">Stok Barang Melting</span></a>
                    </li>
                    <li class="nav-item  <?=$uri == 'barang_melting_keluar'?'active':''?>">
                        <a href="<?=base_url('barang_melting_keluar')?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-minus-circle"></i></span><span class="pcoded-mtext">Barang Melting Keluar</span></a>
                    </li>
                    <li class="nav-item  <?=$uri == 'barang_melting_masuk'?'active':''?>">
                        <a href="<?=base_url('barang_melting_masuk')?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-plus-circle"></i></span><span class="pcoded-mtext">Barang Melting Masuk</span></a>
                    </li>
                    <?php endif ?>
                    <?php
                        if ($this->session->userdata('level')=='0'):
                    ?>
                    <li class="nav-item pcoded-menu-caption">
                        <label>Laporan</label>
                    </li>
                    <li class="nav-item  <?=$uri == 'laporan_barang_stok'?'active':''?>">
                        <a href="<?=base_url('laporan_barang_stok')?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-chevrons-right"></i></span><span class="pcoded-mtext">Laporan Stok Barang</span></a>
                    </li>
                    <li class="nav-item  <?=$uri == 'laporan_barang_stok'?'active':''?>">
                        <a href="<?=base_url('laporan_kartu_stok')?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-chevrons-right"></i></span><span class="pcoded-mtext">Laporan Kartu Stok</span></a>
                    </li>
                    <li class="nav-item  <?=$uri == 'laporan_barang_masuk'?'active':''?>">
                        <a href="<?=base_url('laporan_barang_masuk')?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-chevrons-right"></i></span><span class="pcoded-mtext">Laporan Barang Masuk</span></a>
                    </li>
                    <li class="nav-item  <?=$uri == 'laporan_barang_keluar'?'active':''?>">
                        <a href="<?=base_url('laporan_barang_keluar')?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-chevrons-right"></i></span><span class="pcoded-mtext">Laporan Barang Keluar</span></a>
                    </li>
                    <li class="nav-item pcoded-menu-caption">
                        <label>Users</label>
                    </li>
                    <li class="nav-item  <?=$uri == 'users'?'active':''?>">
                        <a href="<?=base_url('users')?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-user"></i></span><span class="pcoded-mtext">Kelola User</span></a>
                    </li>
                    <?php endif ?>
                    <!-- <li data-username="basic components Button Alert Badges breadcrumb Paggination progress Tooltip popovers Carousel Cards Collapse Tabs pills Modal Grid System Typography Extra Shadows Embeds" class="nav-item pcoded-hasmenu">
                        <a href="javascript:" class="nav-link "><span class="pcoded-micon"><i class="feather icon-box"></i></span><span class="pcoded-mtext">Master</span></a>
                        <ul class="pcoded-submenu">
                            <li class=""><a href="<?=base_url('supplier')?>" class="">Supplier</a></li>
                            <li class=""><a href="bc_badges.html" class="">Badges</a></li>
                            <li class=""><a href="bc_breadcrumb-pagination.html" class="">Breadcrumb & paggination</a></li>
                            <li class=""><a href="bc_collapse.html" class="">Collapse</a></li>
                            <li class=""><a href="bc_tabs.html" class="">Tabs & pills</a></li>
                            <li class=""><a href="bc_typography.html" class="">Typography</a></li>


                            <li class=""><a href="icon-feather.html" class="">Feather<span class="pcoded-badge label label-danger">NEW</span></a></li>
                        </ul>
                    </li> -->
                    <!-- <li class="nav-item pcoded-menu-caption">
                        <label>Forms & table</label>
                    </li>
                    <li data-username="form elements advance componant validation masking wizard picker select" class="nav-item">
                        <a href="form_elements.html" class="nav-link "><span class="pcoded-micon"><i class="feather icon-file-text"></i></span><span class="pcoded-mtext">Form elements</span></a>
                    </li>
                    <li data-username="Table bootstrap datatable footable" class="nav-item">
                        <a href="tbl_bootstrap.html" class="nav-link "><span class="pcoded-micon"><i class="feather icon-server"></i></span><span class="pcoded-mtext">Table</span></a>
                    </li>
                    <li class="nav-item pcoded-menu-caption">
                        <label>Chart & Maps</label>
                    </li>
                    <li data-username="Charts Morris" class="nav-item"><a href="chart-morris.html" class="nav-link "><span class="pcoded-micon"><i class="feather icon-pie-chart"></i></span><span class="pcoded-mtext">Chart</span></a></li>
                    <li data-username="Maps Google" class="nav-item"><a href="map-google.html" class="nav-link "><span class="pcoded-micon"><i class="feather icon-map"></i></span><span class="pcoded-mtext">Maps</span></a></li>
                    <li class="nav-item pcoded-menu-caption">
                        <label>Pages</label>
                    </li>
                    <li data-username="Authentication Sign up Sign in reset password Change password Personal information profile settings map form subscribe" class="nav-item pcoded-hasmenu">
                        <a href="javascript:" class="nav-link "><span class="pcoded-micon"><i class="feather icon-lock"></i></span><span class="pcoded-mtext">Authentication</span></a>
                        <ul class="pcoded-submenu">
                            <li class=""><a href="auth-signup.html" class="" target="_blank">Sign up</a></li>
                            <li class=""><a href="auth-signin.html" class="" target="_blank">Sign in</a></li>
                        </ul>
                    </li>
                    <li data-username="Sample Page" class="nav-item"><a href="sample-page.html" class="nav-link"><span class="pcoded-micon"><i class="feather icon-sidebar"></i></span><span class="pcoded-mtext">Sample page</span></a></li>
                    <li data-username="Disabled Menu" class="nav-item disabled"><a href="javascript:" class="nav-link"><span class="pcoded-micon"><i class="feather icon-power"></i></span><span class="pcoded-mtext">Disabled menu</span></a></li> -->
                </ul>
            </div>
        </div>
    </nav>
    <!-- [ navigation menu ] end