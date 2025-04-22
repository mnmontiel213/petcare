
<nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid my_conteiner">
                    <div class="logo">
                        <a class="navbar-brand" href="<?php echo base_url('principal'); ?> "><img src="<?php echo base_url('assets/img/marca.svg') ?>" alt=""></a>
                    </div>
                    
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                

                <div class="collapse navbar-collapse my_collapse_div3" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="<?php echo base_url('comercializacion'); ?> ">Comercializacion</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('catalogo'); ?> ">Productos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('quienes_somos'); ?> ">Nosotros</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="<?php echo base_url('consultas'); ?> " role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Consultas
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="<?php echo base_url('terminos'); ?> ">Terminos y Uso</a></li>
                                <li><a class="dropdown-item" href="<?php echo base_url(''); ?> ">Consulta 2</a></li>
                                <li><a class="dropdown-item" href="<?php echo base_url(''); ?> ">Consulta 3</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>

            </div>
        </nav>
        
    </header>