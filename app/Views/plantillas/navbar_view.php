

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