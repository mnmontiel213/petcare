

        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand logo" href="<?php echo base_url('principal'); ?>">PetCare
                    <img class="huella1" src="<?php echo base_url('assets/img/patas.png') ?>" alt="huella1">
                    <img class="huella2" src="<?php echo base_url('assets/img/patas.png') ?>" alt="huella2">
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                    aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav nav-list">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="<?php echo base_url('comercializacion'); ?>">Servicios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('enDesarrollo'); ?>">Productos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('quienes_somos'); ?>">Nosotros</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Consultas
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="<?php echo base_url('terminos'); ?>">Términos y Condiciones</a></li>
                                <li><a class="dropdown-item" href="<?php echo base_url('enDesarrollo'); ?>">Consulta 2</a></li>
                                <li><a class="dropdown-item" href="<?php echo base_url('enDesarrollo'); ?>">Consulta 3</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">   
                           <a href="", style="width: 500px;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                                    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                                </svg>
                           </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link-img" href="<?php echo base_url('login'); ?>"><img class="nav-img-user" src="<?php echo base_url("assets/img/user.svg"); ?>" alt="login"></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        
    </header>