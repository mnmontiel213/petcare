<!-- SECCIÓN PROMOS -->
<div id="ofertas" class="promo-section pt-5">
    <div class="container">
        <h2 class="text-center mb-5 fw-bold">Ofertas destacadas para tu mascota 🐾</h2>
        <div class="row g-4">
            <!-- Promo 1 -->
            <div class="col-md-4">
                <div class="promo-card-clean text-center h-100 d-flex flex-column">
                    <img src="<?php echo base_url('assets/img/servicio/promo-peluqueria.jpg'); ?>" class="img-promo img-fluid" alt="Baño 2x1">
                    <div class="promo-info bg-pink text-white flex-grow-1 d-flex flex-column justify-content-between">
                        <p class="mb-1 fw-bold">¡Baño 2x1 para tu mejor amigo peludo!</p>
                        <button class="promo-btn mt-3" data-bs-toggle="modal" data-bs-target="#modalPromo1">Ver más</button>
                    </div>
                </div>
            </div>

            <!-- Promo 2 -->
            <div class="col-md-4">
                <div class="promo-card-clean text-center h-100 d-flex flex-column">
                    <img src="<?php echo base_url('assets/img/servicio/promo-vacunacion.jpg'); ?>" class="img-promo img-fluid" alt="Vacunación">
                    <div class="promo-info bg-blue text-white flex-grow-1 d-flex flex-column justify-content-between">
                        <p class="mb-1 fw-bold">Campaña de Vacunación VetCare</p>
                        <button class="promo-btn mt-3" data-bs-toggle="modal" data-bs-target="#modalPromo2">Ver más</button>
                    </div>
                </div>
            </div>

            <!-- Promo 3 -->
            <div class="col-md-4">
                <div class="promo-card-clean text-center h-100 d-flex flex-column">
                    <img src="<?php echo base_url('assets/img/servicio/promo-nutricion.jpg'); ?>" class="img-promo img-fluid" alt="Combo Cachorrito">
                    <div class="promo-info bg-yellow text-dark flex-grow-1 d-flex flex-column justify-content-between">
                        <p class="mb-1 fw-bold">Plan Nutricional Personalizado</p>
                        <button class="promo-btn mt-3" data-bs-toggle="modal" data-bs-target="#modalPromo3">Ver más</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- MODAL: Baño 2x1 -->
    <div class="modal fade" id="modalPromo1" tabindex="-1" aria-labelledby="modalPromo1Label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-pink text-white">
                    <h5 class="modal-title" id="modalPromo1Label">Baño 2x1</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    ¡Traé a tu mascota y regalale un mimo! <br> Con esta promo, ¡el segundo baño va por nuestra cuenta!
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL: Vacunación -->
    <div class="modal fade" id="modalPromo2" tabindex="-1" aria-labelledby="modalPromo2Label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-blue text-white">
                    <h5 class="modal-title" id="modalPromo2Label">Campaña de Vacunación VetCare</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    Participá de nuestra campaña y protegé a tu mascota con nuestras vacunas a precio especial. ¡Amarlos es cuidarlos!
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL: Plan Nutricional Personalizado -->
    <div class="modal fade" id="modalPromo3" tabindex="-1" aria-labelledby="modalPromo3Label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-yellow text-dark">
                    <h5 class="modal-title" id="modalPromo3Label">Plan Nutricional Personalizado</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    Recibí asesoramiento profesional para elegir el mejor alimento según la edad, tamaño y necesidades especiales de tu mascota. ¡Porque una buena alimentación es salud!
                </div>
            </div>
        </div>
    </div>

</div>