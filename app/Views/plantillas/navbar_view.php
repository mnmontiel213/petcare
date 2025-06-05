

    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid px-0">
            <a class="navbar-brand" href="<?= base_url('principal'); ?>">
                <img src="<?= base_url('assets/img/PetCareLogo.png') ?>" alt="Logo" style="width: 120px;">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse"  id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">
                    
                    <!-- Dropdown Servicios -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Servicios
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="<?= base_url('servicios') ?>">Baño</a></li>
                            <li><a class="dropdown-item" href="<?= base_url('servicios') ?>">Vacunación</a></li>
                            <li><a class="dropdown-item" href="<?= base_url('servicios') ?>">Peluquería</a></li>
                        </ul>
                    </li>

                    <!-- Dropdown Producto -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Productos
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="<?= base_url('productos') ?>">Alimentos</a></li>
                            <li><a class="dropdown-item" href="<?= base_url('productos') ?>">Accesorios</a></li>
                        </ul>
                    </li>

                    <!-- Otros ítems -->
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('quienes_somos'); ?>">Nosotros</a>
                    </li>

                    <!-- BLOQUE DE USUARIO, CARRITO Y CERRAR SESIÓN -->
                    <?php $session = session(); ?>
                    <?php if ($session->get('LOGGED')): ?>

                    <!-- Ícono de carrito -->
                    <li class="nav-item">
                        <a class="nav-link position-relative" href="<?= base_url('carrito') ?>">
                            <i class="bi bi-cart"></i>
                            <?php if ($session->get('carrito_cantidad') > 0): ?>
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    <?= $session->get('carrito_cantidad') ?>
                                </span>
                            <?php endif; ?>
                        </a>
                    </li>

                    <!-- Dropdown del usuario -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-drark" href="#" id="navbarDropdownUser"
                            role="button" data-bs-toggle="dropdown">
                            <?= $session->get('NOMBRE') ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownUser">
                            <li>
                                <a class="dropdown-item" href="<?= base_url('perfil') ?>">
                                    <i class="bi bi-person-circle me-2"></i> Mi perfil
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="<?= base_url('pedidos') ?>">
                                    <i class="bi bi-receipt me-2"></i> Mis pedidos
                                </a>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <a class="dropdown-item text-danger" href="<?= base_url('login/salir') ?>" method="POST">
                                    <i class="bi bi-box-arrow-right me-2"></i> Cerrar sesión
                                </a>
                            </li>
                        </ul>
                    </li>
                    <?php else: ?>
                        <!-- Iniciar sesión -->
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('login/entrar') ?>">
                                <i class="bi bi-person"></i> Iniciar sesión
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
</header>
<!--------------------- ANTIGUO --------------------->

<!--
        <nav class="navbar navbar-expand-lg custom-navbar">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                    aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav nav-list custom-nav-elements-container">
                        <li>
                            <a class="navbar-brand custom-navbar-entry" href="<?php echo base_url('principal'); ?>">
                                <img src=" <?php echo base_url("assets/img/PetCareLogo.png") ?> " alt="" style="width: 30%;">
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link custom-navbar-entry" aria-current="page" href="<?php echo base_url('servicios'); ?>">Servicios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link custom-navbar-entry" href="<?php echo base_url('productos'); ?>">Productos</a>
                        </li>
                        <li class="nav-item custom-navbar-entry">   
                            <a href="<?php echo base_url('login') ?>" class="nav-item custom-navbar-entry" >
                                <i class="bi bi-person"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        
    </header>
-->