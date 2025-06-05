

<div class="body-completo">
    <!-- CAROUSEL -->
    <div  class="container-fluid px-10 banner" style="height: 50vh;">
        <div id="carouselExampleIndicators" class="carousel slide">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img src="<?= base_url('/assets/img/banners/banner-tuMascotaTambienEsNuestra-modif.jpg') ?>" class="d-block w-100 img-fluid" style="height: 60vh;" alt="banner1">
                </div>
                <div class="carousel-item">
                <img src="<?= base_url('assets/img/banners/banner-alimentos.jpg') ?>" class="d-block w-100 img-fluid" style="height: 60vh;" alt="banner2">
                </div>
                <div class="carousel-item">
                    <img src="<?= base_url('assets/img/banners/banner-RoyalCanin.jpg') ?>" class="d-block w-100 img-fluid" style="height: 60vh;" alt="banner3">
                </div>
                
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    
    

    <div class="container container-avisos">
        <h2 class="text-center">Oferta Bomba!!!</h2>
        <div class="row g-4">

            <!-- Promoción 1 -->
            <div class="col-12 col-md-4">
                <div class="card h-100 shadow-sm">
                    <img src="<?= base_url('assets/img/servicio/campaña-vacunacion.png') ?>" class="card-img-top" alt="Campaña de Vacunación">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Campaña de Vacunación</h5>
                        <p class="card-text">Traé a tu mascota y accedé a vacunas con descuento durante todo el mes.</p>
                        <a href="<?= base_url('servicios') ?>" class="btn btn-oferta mt-auto">Ver más</a>
                    </div>
                </div>
            </div>

            <!-- Promoción 2 -->
            <div class="col-12 col-md-4">
                <div class="card h-100 shadow-sm">
                    <img src="<?= base_url('assets/img/productos/promocion-alimento.jpg') ?>" class="card-img-top" alt="Campaña de Vacunación">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">15% OFF en Alimentos</h5>
                        <p class="card-text">Aprovechá nuestra promoción especial en alimentos seleccionados para perros y gatos. Por la compra de uno, ¡llevate gratis un contenedor de Pro Plan o un perfume Japanese para tu mascota!</p>
                        <a href="<?= base_url('productos') ?>" class="btn btn-oferta mt-auto">Comprar</a>
                    </div>
                </div>
            </div>

            <!-- Promoción 3 -->
            <div class="col-12 col-md-4">
                <div class="card h-100 shadow-sm">
                    <img src="<?= base_url('assets/img/servicio/nueva-promo-baño.jpg') ?>" class="card-img-top" alt="Peluquería Canina">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Promo 2x1 en Peluquería</h5>
                        <p class="card-text">¡No te pierdas esta increíble promoción! Traé dos mascotas a nuestra peluquería y solo pagás por una. ¡Cuidamos a todos como se merecen!</p>
                        <a href="<?= base_url('servicios') ?>" class="btn btn-oferta mt-auto">Reservar</a>
                    </div>
                </div>
            </div>

        </div>
    </div>

    





    <div class="content-categorias">
        <h2 class="text-center mb-4">Servicios y Productos</h2>
        <p class="text-center fs-5 p-2">Todo lo que necesitás para cuidar a tu mascota, en un solo lugar.</p>
        <div class="row g-4">
            <!-- Atención médica -->
            <div class="col-12 col-sm-6 col-lg-3 card-categoria">
                <a href="<?= base_url('#') ?>" class="text-decoration-none">
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
                <a href="<?= base_url('#') ?>" class="text-decoration-none">
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
                <a href="<?= base_url('#') ?>" class="text-decoration-none">
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
                <a href="<?= base_url('#') ?>" class="text-decoration-none">
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

    <div class="container my-5" id="sobre-nosotros">   
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
                <div class="text-center btn-link-nosotros"><a href="<?= base_url('quienes_somos'); ?>">Saber más...</a></div>
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


<!--

<div>
    ///CAROUSEL
    <div>
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="<?php echo base_url("assets/img/banner-example.png") ?>" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="<?php echo base_url("assets/img/banner-example.png") ?>" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="<?php echo base_url("assets/img/banner-example.png") ?>" class="d-block w-100" alt="...">
                </div>
            </div>
        </div>

    </div>
    
    //ULTIMOS PRODUCTOS AGREGADOS
    //Aca deberiamos recibir productos desde la base de datos 
    //almenos 6 podrian entrar   
    <div id="custom-productos" class="container">
        <h2>Ultimos productos</h2>

        <ul id="ultimos-productos-lista"> 
            <li class="ultimo-producto-item">
                <a href="#"><img src=" <?php echo base_url("/assets/img/producto.png") ?> "></a>
            </li>
            <li class="ultimo-producto-item">
                <a href="#"><img src=" <?php echo base_url("/assets/img/producto.png") ?>"></a>
            </li>
            <li class="ultimo-producto-item">
                <a href="#"><img src=" <?php echo base_url("/assets/img/producto.png") ?>"></a>
            </li>
            <li class="ultimo-producto-item">
                <a href="#"> <img src=" <?php echo base_url("/assets/img/producto.png") ?>"></a>
            </li>
        </ul>

        <a href="productos">Ver mas</a>

    </div>

    ///SERVICIOS SALUD
     <div id="custom-seccion-salud" class="container">
        <h2>Cuidados para tu mascota</h2>
        <p>Le otorgamos los mejores cuidados a tu mascota</p>
        
        <ul>
            ------------------------------NOTA-------------------------------
            /// Podriamos dividir los cuidados de las mascotas en 3 tipos --
            /// Salud seria cosas como vacunacion castracion etc --
            /// Estetica baños, cortar el pelo y uñas --
            ///Otros podrian ser consultas, emergencias, o cosas mas especificas #
             tipo turno radiografia etc --

            /// Estas tarjetas dan un poco de informacion, clickearlas te llevan a la pagina #
             de servicios y seccion especifica expandiendo los servicios de cada seccion --
            /// Pedir turno nos llevaria a otra pagina donde llenariamos todos los datos en un
             formulario
            
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Estetica</h5>
                    <p class="card-text">Nos encargamos de darle el mejor look a tu mascota.</p>
                </div>
            </div>

            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Salud</h5>
                    <p class="card-text">Atendemos a tu mascota para darle la atencion que requiera.</p>
                </div>
            </div>

            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Otros</h5>
                    <p class="card-text"> Ofrecemos otros servicios que tu mascota pueda requerrir.</p>
                </div>
            </div>
        </ul>

        <a href="servicios" class="btn btn-primary">Saber mas</a>

    </div>

    
    /// ELEGUIR FILTRO MASCOTA --
    <div id="custom-seccion-filtro" class="container p-3">
    /// NOTA --
    /// Aca elegiriamos perros o gatos e iriamos a la pagina de productos pero filtrando en base a la eleccion --
        <h2>Productos para tu mascota</h2>
        <div class="d-flex justify-content-center">
            <div class="">
                <h3>Perros</h3>
                <a href=""><img class="w-50 rounded-3" src=" <?php echo base_url('assets/img/carta-perro.png') ?>  " alt=""></a>
            </div>

            <div class="">
                <h3>Gatos</h3>
                <a href=""><img class="w-50 rounded-3" src=" <?php echo base_url('assets/img/carta-gato.png') ?>" alt=""></a>
            </div>
        </div>

    </div>

</div>

-->