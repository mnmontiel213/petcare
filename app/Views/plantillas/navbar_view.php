

        <nav class="navbar navbar-expand-lg custom-shadow" id="custom-navbar">
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
                            <a class="nav-link custom-navbar-entry" aria-current="page" href="<?php echo base_url('comercializacion'); ?>">Servicios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link custom-navbar-entry" href="<?php echo base_url('catalogo'); ?>">Productos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link custom-navbar-entry" href="<?php echo base_url('quienes_somos'); ?>">Nosotros</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle custom-navbar-entry" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Consultas
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="<?php echo base_url('terminos'); ?>">Términos y Condiciones</a></li>
                                <li><a class="dropdown-item" href="<?php echo base_url('consulta2'); ?>">Consulta 2</a></li>
                                <li><a class="dropdown-item" href="<?php echo base_url('consulta3'); ?>">Consulta 3</a></li>
                            </ul>
                        </li>
                        <!-- <li>
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