<aside class="sidenav navbar navbar-vertical navbar-expand-xs fixed-start" id="sidenav-main">
    <div class="sidenav-header">
        <a class="navbar-brand d-flex justify-content-center m-0">
            <img src="<?=base_url()?>assets/img/favicon.ico" class="navbar-brand-img h-100" alt="main_logo">
        </a>
    </div>
    <div class="collapse navbar-collapse w-auto text-center" id="sidenav-collapse-main">
        <div class="d-sm-inline d-md-inline d-lg-none d-xl-none">
            <p class="m-0 d-inline text-dark"><small><?= $this->session->userdata('nombre')?></small></p>
            <br><br>
            <p class="m-0 d-inline text-dark"><small>Venta semanal</small></p>
            <br><span class="text-white">$456,00.00</span><br>
            <p class="m-0 d-inline text-dark"><small>Venta diaria</small></p>
            <br><span class="text-white">$56,00.00</span><br><br>
        </div>
        <ul class="navbar-nav">
            <?php foreach($opcionesMenu as $menu){ ?>	
                <li class="nav-item">
                    <a class="nav-link text-white" data-bs-toggle="tooltip" data-bs-placement="right" title="<?php echo $menu->nombre ?>" href="<?=base_url() ?><?php echo $menu->pagina ?>">
                        <div class="text-deepGray text-center d-flex align-items-center justify-content-center">
                            <span class="material-symbols-outlined sideIcon me-2 me-sm-2 me-md-2 me-lg-2 me-xl-0"><?php echo $menu->icono ?> </span>
                            <span class="nav-link-text ms-1 d-xl-none"><?php echo $menu->nombre ?></span>
                        </div>
                    </a>
                </li>
            <?php } ?>
        </ul>
    </div>
</aside>
<body class="g-sidenav-show bg-gray-200">
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 pt-4 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
            <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">    
                <div class="container-fluid">
                    <!-- col-lg-8 -->
                    <div class="row"> 
                        <div class="col-12 col-sm-12 col-md-12 col-lg-8 d-none d-sm-none d-md-none d-lg-flex d-xl-flex">
                            <p class="nav-link text-dark p-0 pe-5 m-0">Venta semanal: <span><b>$560,600.00</b></span></p>
                            <p class="nav-link text-dark m-0 py-0">Venta diaria: <span><b>$75,000.00</b></span></p>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-4 px-0 px-xl-3">    
                            <ul class="navbar-nav justify-content-end">
                                <input class="form-check-input mt-1 ms-auto d-none" type="checkbox" id="dark-version" onclick="darkMode(this)">
                                <li class="nav-item px-3 d-flex align-items-center">
                                    <a href="" class="nav-link text-dark p-0 d-flex" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Modo oscuro">
                                        <span class="material-symbols-rounded">dark_mode</span>
                                    </a>
                                </li>
                                <li class="nav-item px-3 d-flex align-items-center">
                                    <a href="<?=base_url()?>Login/logout_ci" class="nav-link text-dark p-0 d-flex" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Cerrar sesión">
                                        <span class="material-symbols-rounded">logout</span>
                                    </a>
                                </li>
                                <li class="nav-item p-0 d-flex align-items-center">
                                    <span class="nav-link py-0 font-weight-bold p-0 d-none d-xl-inline text-dark"><?= $this->session->userdata('nombre')?></span>
                                </li>
                                <li class="nav-item d-xl-none px-3 d-flex align-items-center">
                                    <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                                        <div class="sidenav-toggler-inner">
                                        <i class="sidenav-toggler-line"></i>
                                        <i class="sidenav-toggler-line"></i>
                                        <i class="sidenav-toggler-line"></i>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->