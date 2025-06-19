    <footer class="container-fluid custom-footer">
        <div class="row text-center container-footer">

            <div class="col-12 col-sm-6 col-md-3 customs-footer-elements">
                <p class="customs-footer-title">Servicios</p>
                <ul class="p-0">
                    <li><a href="<?= base_url('servicios/salud') ?>">Vacunacion</a></li>
                    <li><a href="<?= base_url('servicios/salud') ?>">Castracion</a></li>
                    <li><a href="<?= base_url('servicios/salud') ?>">Radiologia y ultrasonidos</a></li>
                    <li><a href="<?= base_url('servicios/salud') ?>">Farmacia</a></li>
                    <li><a href="<?= base_url('servicios/salud') ?>">Consulta general</a></li>
                    <li><a href="<?= base_url('servicios/estetica') ?>">Baños y cortes</a></li>
                </ul>
            </div>

            <div class="col-12 col-sm-6 col-md-3 customs-footer-elements">
                <p class="customs-footer-title">Nosotros</p>
                <ul class="p-0">
                    <li><a href="<?= base_url('nosotros_header/quienes_somos'); ?>">¿Quiénes somos?</a></li>
                    <li><a href="<?= base_url('nosotros_header/equipo'); ?>">Equipo</a></li>
                    <li><a href="<?= base_url('nosotros_header/mision'); ?>">Misión y visión</a></li>
                    <li><a href="<?= base_url('nosotros_header/valores'); ?>">Valores</a></li>
                    <li><a href="<?php echo base_url('nosotros_header/contacto#ubicacion'); ?>">Mostrar Ubicación</a></li>
                </ul>
            </div>


            <div class="col-12 col-sm-6 col-md-3 customs-footer-elements">
                <div class="customs-footer-elements">
                    <p class="customs-footer-title">Productos</p>
                    <ul class="p-0">
                        <li><a href="<?= base_url('productos/alimentos') ?>">Alimentos</a></li>
                        <li><a href="<?= base_url('productos/accesorios') ?>">Accesorios</a></li>
                    </ul>
                </div>
                <div class="d-flex gap-3 social-icons justify-content-md-center justify-content-center">
                    <a href="https://www.instagram.com/tuusuario" target="_blank"><i class="bi bi-instagram fs-4"></i></a>
                    <a href="https://www.facebook.com/tuusuario" target="_blank"><i class="bi bi-facebook fs-4"></i></a>
                    <a href="https://www.linkedin.com/in/tuusuario" target="_blank"><i class="bi bi-linkedin fs-4"></i></a>
                    <a href="<?php echo base_url('nosotros_header/contacto#formulario'); ?>"><i class="bi bi-envelope-fill fs-4"></i></a>
                </div>
            </div>
        </div>

        <img class="custom-footer-img" src=" <?php echo base_url("assets/img/PetCareLogo.png") ?> " alt="">

    </footer>

    <script src="<?php echo base_url("assets/js/bootstrap.bundle.min.js"); ?>"></script>


    </body>

    </html>