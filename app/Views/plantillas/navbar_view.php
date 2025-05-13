

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
                            <a class="nav-link" href="<?php echo base_url('catalogo'); ?>">Productos</a>
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
                                <li><a class="dropdown-item" href="<?php echo base_url('consulta2'); ?>">Consulta 2</a></li>
                                <li><a class="dropdown-item" href="<?php echo base_url('consulta3'); ?>">Consulta 3</a></li>
                            </ul>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link-img" href="<?php echo base_url(''); ?>"><img class="nav-img" src="<?php echo base_url("assets/img/comprar.png"); ?>" alt="carritoCompras"></a>   
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link-img" href="<?php echo base_url('principal'); ?>"><img class="nav-img-user" src="<?php echo base_url("assets/img/user.svg"); ?>" alt="login"></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        
    </header>