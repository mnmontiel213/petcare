    <div class="container py-5">
        <h2 class="text-center mb-4 titulo-comercial">Nuestros servicios</h2>

        <div class="container" style="background-color: #009DD1; border-radius: 10px;">
            <div class="row">
                <!-- Opciones esteticas -->    
                <div class="col" style="background-color: #ecf0f5; border-radius: 10px;">

                    <!-- accordion -->
                    <div class="accordion py-5" id="accordionServicios">
                        <!-- ESTETICA -->
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Estetica
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionServicios">
                                <div class="accordion-body">
                                    <!-- CONTENIDO COLLAPSE 1 -->
                                    <strong>This is the first item’s accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It’s also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                </div>
                            </div>
                        </div>
                        <!-- SALUD -->
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Salud
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionServicios">
                                <div class="accordion-body">
                                    <!-- CONTENIDO COLLAPSE 2 -->
                                    <strong>This is the second item’s accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It’s also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                </div>
                            </div>
                        </div>
                        <!-- OTROS -->
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Otro
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionServicios">
                                <div class="accordion-body">
                                    <!-- CONTENIDO COLLAPSE 3 -->
                                    <strong>This is the third item’s accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It’s also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                </div>
                            </div>
                        </div>
                    </div>
                    

                    <!-- Boton turno-->
                    <a href="turno" class="btn btn-primary">Sacar turno</a>
                </div>

                <!-- Imagen perro -->
                <div class="col d-flex flex-row">
                    <img class ="m-auto w-100" src=" <?php echo base_url('assets/img/perro.png') ?>" alt="">
                </div>
            </div>
            
        </div>

        <div class="row">
            <p  class="text-center" style="padding-top: 5rem;">En VetCare nos esforzamos por facilitarte cada paso en la compra de productos y servicios para tus mascotas. Aquí te contamos cómo trabajamos:</p>
            <!-- Entregas -->
            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                    <h5 class="card-title"><i class="bi bi-truck"></i> Tipos de Entrega</h5>
                    <ul class="list-unstyled mt-3">
                        <li>  >   Retiro en sucursal (lun-sáb 9 a 19 hs)</li>
                        <li>  >   Entrega a domicilio en Corrientes Capital</li>
                        <li>  >   Envíos programados con horario a elección</li>
                    </ul>
                    </div>
                </div>
            </div>

            <!-- Envíos -->
            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                    <h5 class="card-title"><i class="bi bi-box-seam"></i> Formas de Envío</h5>
                        <ul class="list-unstyled mt-3">
                            <li>  >   Moto mensajería (urgencias)</li>
                            <li>  >  Correo Argentino (interior del país)</li>
                            <li>  >  Personal de VetCare para productos especiales</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Pagos -->
            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-credit-card"></i> Métodos de Pago</h5>
                        <ul class="list-unstyled mt-3">
                            <li>  >  Tarjetas de crédito/débito</li>
                            <li>  >  Efectivo (retiro o entrega)</li>
                            <li>  >  Transferencia bancaria</li>
                            <li>  >  MercadoPago o código QR</li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>

        <div class="text-center mt-5">
            <p class="fw-bold">🐾 ¿Tenés dudas? <a href="<?php echo base_url('consultas'); ?>" class="text-decoration-none">Contactanos</a>. ¡Estamos para ayudarte!</p>
        </div>

    </div>
