<div id="miniCarruselVetcare" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <!-- Imagen 1 -->
        <div class="carousel-item active">
            <img src="<?php echo base_url('assets/img/banners/banner-royalCanin.png'); ?>" class="d-block w-100 carrusel-img" alt="Promo 1">
        </div>
        <!-- Imagen 2 -->
        <div class="carousel-item">
            <img src="<?php echo base_url('assets/img/banners/banner-whiskas.webp'); ?>" class="d-block w-100 carrusel-img" alt="Promo 2">
        </div>
        <!-- Imagen 3 -->
        <div class="carousel-item">
            <img src="<?php echo base_url('assets/img/banners/banner-vitalCan.webp'); ?>" class="d-block w-100 carrusel-img" alt="Promo 3">
        </div>
    </div>
    <!-- Controles -->
    <button class="carousel-control-prev" type="button" data-bs-target="#miniCarruselVetcare" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#miniCarruselVetcare" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
    </button>
    <div class="text-center bg-pp">
        <p class="fw-bold">Dirigete a ver los productos que tenemos para tu mascota!!<a href="<?= base_url('productos/productos'); ?>">Ver</a></p>
    </div>
</div>
<div class="estetica-section py-5">

    <div class="container">
        <div class="row align-items-center">
            <!-- Imagen con fondo curvo -->
            <div class="col-lg-5 text-center position-relative">
                <div class="curved-background"></div>
                <img src="<?php echo base_url('assets/img/animales/mascotas.png'); ?>" alt="Mascota saludable" class="img-fluid dog-img position-relative">
            </div>
            <!-- Lista de servicios -->
            <div class="col-lg-7">
                <h2 class="mb-4 fw-bold titulo-nutricion">Nutricion para tu mascota</h2>
                <ul class="list-unstyled servicios-list">
                    <li><span class="numero-nutricion">01</span> Diseñar planes alimenticios según edad, peso y necesidades específicas</li>
                    <li><span class="numero-nutricion">02</span> Mejorar digestión, piel, pelaje y energía</li>
                    <li><span class="numero-nutricion">03</span> Guiarte en dietas especiales: alérgicas, BARF, renales, entre otras</li>
                    <li><span class="numero-nutricion">04</span> Elegir el alimento ideal entre tantas opciones</li>
                </ul>
                <p class="fw-bold">Ideal para mascotas con sobrepeso, enfermedades crónicas o simplemente para prevenir futuros problemas.</p>
            </div>
        </div>

        <div class="row align-items-center flex-lg-row-reverse" style="background-image: url('<?php echo base_url('assets/img/varios/background-trigo1.png'); ?>'); background-size: contain; background-position: center; background-repeat: no-repeat">
            <!-- Imagen con fondo curvo -->
            <div class="col-lg-5 text-center position-relative">
                <div class="curved-background"></div>
                <img src="<?php echo base_url('assets/img/equipo/vet_1.png'); ?>" alt="Estética Gatos" class="img-fluid dog-img position-relative">
            </div>
            <!-- Llamado a la acción -->
            <div class="col-lg-7">
                <div class="text-center my-5 info-reserva">
                    <p class="lead fw-semibold">¿Ya reservaste tu lugar?</p>
                    <p>No te quedes sin turno. Asegurá la atención que tu mascota merece haciendo click abajo.</p>
                    <a href=" <?php echo base_url('turno'); ?>" class="btn btn-turnos px-4 py-2 mt-5">Reservá tu turno</a>
                </div>
            </div>
            <div class="text-center mt-5">
                <p class="fw-bold">🐾 ¿Tenés dudas? <a href="<?php echo base_url('nosotros_header/contacto'); ?>" class="text-decoration-none">Contactanos</a>. ¡Estamos para ayudarte!</p>
            </div>
        </div>
    </div>
</div>