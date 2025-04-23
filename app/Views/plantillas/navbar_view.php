
<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <a class="navbar-brand logo" href="<?php echo base_url('principal'); ?>">
            <img src="<?php echo base_url('assets/img/marca.svg') ?>" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto justify-content-end">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="<?php echo base_url('comercializacion'); ?>">Comercialización</a>
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
                        <li><a class="dropdown-item" href="<?php echo base_url('terminos'); ?>">Términos y Uso</a></li>
                        <li><a class="dropdown-item" href="<?php echo base_url('consulta2'); ?>">Consulta 2</a></li>
                        <li><a class="dropdown-item" href="<?php echo base_url('consulta3'); ?>">Consulta 3</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url(''); ?>"><img src="<?php echo base_url("assets/img/carritoCompras.svg"); ?>" alt=""></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url(''); ?>"><img src="<?php echo base_url("assets/img/login.svg"); ?>" alt=""></a>
                </li>
            </ul>
        </div>
    </div>
</nav>

        
    </header>