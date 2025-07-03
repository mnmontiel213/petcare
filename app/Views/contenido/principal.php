<div class="body-completo">
    <div class="promo">
        <h1 class="promo-titulo">¿Estas listo para ver todo los productos que tenemos para tu mascota?</h1>
        <button class="promo-boton" type="button">Ver</button>
    </div>
    <video muted autoplay loop>
        <source src="<?= base_url('assets/video/banner.mp4') ?>" type="video/mp4">
    </video>
</div>
<!--  -->
<section id="ofertas" class="promo-section py-5">
    <div class="container">
        <h2 class="text-center mb-5 fw-bold">Ofertas destacadas para tu mascota 🐾</h2>

        <div class="row g-4">

            <!-- Oferta 1 -->
            <div class="col-md-6 col-lg-4">
                <div class="promo-card promo-bg-azul text-white p-4 rounded-4 h-100">
                    <h3 class="fw-bold">50% Off</h3>
                    <p class="mb-2">Comida & Accesorios</p>
                    <small>¡Todo lo que tu mascota necesita!</small>
                </div>
            </div>

            <!-- Oferta 2 -->
            <div class="col-md-6 col-lg-4">
                <div class="promo-card promo-bg-verde text-white p-4 rounded-4 h-100 text-center">
                    <h3 class="fw-bold mb-2">30% OFF</h3>
                    <p class="mb-3">Envío Gratis en productos seleccionados</p>
                    <a href="#" class="btn btn-light btn-sm fw-bold">Ver más</a>
                </div>
            </div>

            <!-- Oferta 3 -->
            <div class="col-md-6 col-lg-4">
                <div class="promo-card promo-bg-amarillo text-dark p-4 rounded-4 h-100 text-center">
                    <h4 class="fw-bold">Alimentos para aves</h4>
                    <p class="mb-1">¡Nutrición saludable!</p>
                </div>
            </div>

            <!-- Oferta 4 -->
            <div class="col-md-6 col-lg-4">
                <div class="promo-card promo-bg-naranja text-white p-4 rounded-4 h-100 text-center">
                    <h3 class="fw-bold">25% OFF</h3>
                    <p>Suplementos y snacks para perros</p>
                    <small>Llamanos: (0800) 123-456</small>
                </div>
            </div>

            <!-- Oferta 5 -->
            <div class="col-md-6 col-lg-4">
                <div class="promo-card promo-bg-violeta text-white p-4 rounded-4 h-100 text-center">
                    <h4 class="fw-bold">Comida Premium para Gatos</h4>
                    <p>Ahorra un 30%</p>
                </div>
            </div>

            <!-- Oferta 6 -->
            <div class="col-md-6 col-lg-4">
                <div class="promo-card promo-bg-celeste text-dark p-4 rounded-4 h-100 text-center">
                    <h4 class="fw-bold">Oferta Especial</h4>
                    <p>Juguetes interactivos para perros y gatos</p>
                </div>
            </div>

        </div>
    </div>
</section>


<!--  -->
<div class="container-fluid content-categorias">
    <h2 class="text-center mb-4">Servicios y Productos</h2>
    <p class="text-center fs-5 p-2">Todo lo que necesitás para cuidar a tu mascota, en un solo lugar.</p>
    <div class="row g-4">
        <!-- Atención médica -->
        <div class="col-12 col-sm-6 col-lg-3 card-categoria">
            <a href="<?= base_url('servicios/salud') ?>" class="text-decoration-none">
                <div class="position-relative overflow-hidden rounded shadow servicio-hover">
                    <img src="<?= base_url('assets/img/servicio/medicina.jpg') ?>" class="img-fluid w-100 card-categoria" alt="Atención médica">
                    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center bg-dark bg-opacity-50">
                        <h5 class="text-white text-center">Atención Médica</h5>
                    </div>
                    <div class="hover-overlay">
                        <i class="bi bi-eye fs-1 text-white"></i>
                    </div>
                </div>
            </a>
        </div>

        <!-- Peluquería -->
        <div class="col-12 col-sm-6 col-lg-3">
            <a href="<?= base_url('servicios/estetica') ?>" class="text-decoration-none">
                <div class="position-relative overflow-hidden rounded shadow servicio-hover">
                    <img src="<?= base_url('assets/img/servicio/peluqueria.jpg') ?>" class="img-fluid w-100 card-categoria" alt="Peluquería canina">
                    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center bg-dark bg-opacity-50">
                        <h5 class="text-white text-center">Peluquería Canina</h5>
                    </div>
                    <div class="hover-overlay">
                        <i class="bi bi-eye fs-1 text-white"></i>
                    </div>
                </div>
            </a>
        </div>

        <!-- Alimentos -->
        <div class="col-12 col-sm-6 col-lg-3">
            <a href="<?= base_url('productos') ?>" class="text-decoration-none">
                <div class="position-relative overflow-hidden rounded shadow servicio-hover">
                    <img src="<?= base_url('assets/img/productos/alimentos.jpg') ?>" class="img-fluid w-100 card-categoria" alt="Alimentos para mascotas">
                    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center bg-dark bg-opacity-50">
                        <h5 class="text-white text-center">Alimentos</h5>
                    </div>
                    <div class="hover-overlay">
                        <i class="bi bi-eye fs-1 text-white"></i>
                    </div>
                </div>
            </a>
        </div>

        <!-- Accesorios -->
        <div class="col-12 col-sm-6 col-lg-3">
            <a href="<?= base_url('productos') ?>" class="text-decoration-none">
                <div class="position-relative overflow-hidden rounded shadow servicio-hover">
                    <img src="<?= base_url('assets/img/productos/accesorio.avif') ?>" class="img-fluid w-100 card-categoria" alt="Accesorios para mascotas">
                    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center bg-dark bg-opacity-50">
                        <h5 class="text-white text-center">Accesorios</h5>
                    </div>
                    <div class="hover-overlay">
                        <i class="bi bi-eye fs-1 text-white"></i>
                    </div>
                </div>
            </a>
        </div>

    </div>
</div>



<div class="container container-fluid my-5" id="nosotros">
    <img src="<?= base_url('assets/img/PetCareLogo.png') ?>" alt="Logo" style="width: 250px;">
    <div class="row align-items-center">
        <!-- Texto de presentación -->
        <div class="col-md-6 mb-4 mb-md-0">
            <p class="fs-5">
                En <strong>PetCare</strong> nos dedicamos al cuidado integral de tus mascotas.
                Ofrecemos servicios de atención médica veterinaria, peluquería canina, y una
                amplia variedad de productos como alimentos y accesorios.
            </p>
            <p class="fs-5">
                Contamos con un equipo profesional comprometido con el bienestar animal,
                brindando atención personalizada y de calidad en cada visita.
            </p>
            <div class="text-center btn-link-nosotros"><a href="<?= base_url('nosotros_header/quienes_somos'); ?>">Saber más...</a></div>
        </div>

        <!-- Imagen representativa -->
        <div class="col-md-6 text-center">
            <img src="<?= base_url('assets/img/servicio/clinica.jpg') ?>"
                alt="Equipo de VetCare"
                class="img-fluid rounded shadow">
        </div>
    </div>

    <!-- Integrantes  -->
    <div class="row text-center mt-5">
        <div class="col-6 col-md-3">
            <img src="<?= base_url('assets/img/equipo/dra-Camila.jpg') ?>" class="img-fluid rounded-circle mb-2" alt="Dra. Camila">
            <h6 class="mb-0">Dra. Camila López</h6>
            <di class="text-muted">Atención al Cliente </di>
            <div class="text-muted">Especialista en Alimentación</div>

        </div>
        <div class="col-6 col-md-3">
            <img src="<?= base_url('assets/img/equipo/peluquera-Lupe.jpg') ?>" class="img-fluid rounded-circle mb-2" alt="Lupe">
            <h6 class="mb-0">Lupe Ramírez</h6>
            <div class="text-muted">Peluquera Canina</div>
        </div>
        <div class="col-6 col-md-3 mt-4 mt-md-0">
            <img src="<?= base_url('assets/img/equipo/dra-Sofia.avif') ?>" class="img-fluid rounded-circle mb-2" alt="Luis">
            <h6 class="mb-0">Sofia Torres</h6>
            <div class="text-muted">Veterinaria Clínica</div>
        </div>
        <div class="col-6 col-md-3">
            <img src="<?= base_url('assets/img/equipo/dr-Martin.jpg') ?>" class="img-fluid rounded-circle mb-2" alt="Dr. Martin">
            <h6 class="mb-0">Dr. Martin Herrera</h6>
            <div class="text-muted">Veterinario Clínico</div>
            <div class="text-muted">Cirujano</div>
        </div>
    </div>
</div>


<div class="container-fluid marcas">
    <div class="row justify-content-center align-items-center text-center g-4">
        <div class="col-6 col-sm-4 col-md-3 col-lg-2">
            <img src="<?= base_url('assets/img/marcas/cancat.png') ?>" class="img-fluid marcar-asociadas" alt="Cancat">
        </div>
        <div class="col-6 col-sm-4 col-md-3 col-lg-2">
            <img src="<?= base_url('assets/img/marcas/Eukanuba.png') ?>" class="img-fluid marcar-asociadas" alt="Eukanuba">
        </div>
        <div class="col-6 col-sm-4 col-md-3 col-lg-2">
            <img src="<?= base_url('assets/img/marcas/Excellent.png') ?>" class="img-fluid marcar-asociadas" alt="Excellent">
        </div>
        <div class="col-6 col-sm-4 col-md-3 col-lg-2">
            <img src="<?= base_url('assets/img/marcas/Monami.png') ?>" class="img-fluid marcar-asociadas" alt="Monami">
        </div>
        <div class="col-6 col-sm-4 col-md-3 col-lg-2">
            <img src="<?= base_url('assets/img/marcas/PurinaProplan.png') ?>" class="img-fluid marcar-asociadas" alt="Pro Plan">
        </div>
        <div class="col-6 col-sm-4 col-md-3 col-lg-2">
            <img src="<?= base_url('assets/img/marcas/RoyalCanin.png') ?>" class="img-fluid marcar-asociadas" alt="Royal Canin">
        </div>
    </div>
</div>