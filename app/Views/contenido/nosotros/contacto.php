<section class="contacto-seccion">
    <div class="contenedor-contacto">

        <!-- Izquierda: Info de contacto -->
        <div class="info-contacto">
            <h2>Contactanos</h2>
            <p>Podés comunicarte con nosotros por los siguientes medios:</p>

            <div class="info-item">
                <i class="fas fa-map-marker-alt"></i>
                <div>
                    <strong>Dirección</strong><br>
                    Av. Maipú 1247, Ciudad, Corrientes
                </div>
            </div>

            <div class="info-item">
                <i class="fas fa-clock"></i>
                <div class="horarios">
                    <h3>Horarios de atención</h3>
                    <ul>
                        <li><strong>Lunes a Viernes:</strong> 8:00 a 21:00 h</li>
                        <li><strong>Sábados:</strong> 9:00 a 13:00 h</li>
                        <li><strong>Domingos y feriados:</strong> Cerrado</li>
                    </ul>
                </div>
            </div>


            <div class="info-item">
                <i class="fas fa-envelope"></i>
                <div>
                    <strong>Email</strong><br>
                    contacto@vetcare.com
                </div>
            </div>

            <div class="info-item">
                <i class="fas fa-phone"></i>
                <div>
                    <strong>Teléfono</strong><br>
                    +54 9 1234 567890
                </div>
            </div>

            <div class="d-flex gap-3 social-icons-contacto justify-content-center">
                <a href="https://www.instagram.com/tuusuario" target="_blank"><i class="bi bi-instagram fs-4"></i></a>
                <a href="https://www.facebook.com/tuusuario" target="_blank"><i class="bi bi-facebook fs-4"></i></a>
                <a href="https://www.linkedin.com/in/tuusuario" target="_blank"><i class="bi bi-linkedin fs-4"></i></a>
                <a href="<?php echo base_url('nosotros_header/contacto#formulario'); ?>"><i class="bi bi-envelope-fill fs-4"></i></a>
            </div>
        </div>

        <!-- Derecha: Formulario -->
        <div id="formulario" class="formulario-contacto">
            <h2>Escribinos tu consulta</h2>
            <!-- <form action="<?php echo base_url('enviar_consulta') ?>" method="POST"> -->
                
                <?php
                    helper('form');
                    $completar = count($validation) > 0;
                    $clase_nombre = isset($validation['nombre']) ? 'form-control is-invalid' : "";
                    $clase_motivo = isset($validation['motivo']) ? 'form-control is-invalid' : "";
                    $clase_correo = isset($validation['correo']) ? 'form-control is-invalid' : "";
                    $clase_contenido = isset($validation['contenido']) ? 'form-control is-invalid' : "";

                    echo form_open('enviar_consulta');

                    echo form_label('Nombre', 'nombre', ['class' => 'form-label']);
                    echo form_input([
                        'name' => 'nombre',
                        'id' => 'nombre',
                        'value' => $completar ? set_value('nombre') : '',
                        'class' => $clase_nombre,
                        'placeholder' => '',
                        'type' => 'text',
                        'autocomplete' => 'off',
                    ]);
                    if(isset($validation['titulo'])){
                        echo '<p class="invalid-feedback">', $validation['titulo'] ,'</p>';
                    }
                    
                    echo form_label('Motivo', 'motivo', ['class' => 'form-label']);
                    echo form_input([
                        'name' => 'motivo',
                        'id' => 'motivo',
                        'value' => $completar ? set_value('motivo') : '',
                        'class' => $clase_motivo,
                        'placeholder' => '',
                        'type' => 'text',
                        'autocomplete' => 'off',
                    ]);
                    if(isset($validation['titulo'])){
                        echo '<p class="invalid-feedback">', $validation['titulo'] ,'</p>';
                    }

                    echo form_label('Correo', 'correo', ['class' => 'form-label']);
                    echo form_input([
                        'name' => 'correo',
                        'id' => 'correo',
                        'value' => $completar ? set_value('correo') : '',
                        'class' => $clase_correo,
                        'placeholder' => '',
                        'type' => 'email',
                        'autocomplete' => 'off',
                    ]);
                    if(isset($validation['correo'])){
                        echo '<p class="invalid-feedback">', $validation['correo'] ,'</p>';
                    }

                    echo form_label('Contenido', 'contenido', ['class' => 'form-label']);
                    echo form_textarea([
                        'name' => 'contenido',
                        'id' => 'contenido',
                        'value' => $completar ? set_value('contenido') : '',
                        'class' => $clase_contenido,
                        'placeholder' => '',
                        'type' => 'text',
                        'autocomplete' => 'off',
                    ]);
                    if(isset($validation['contenido'])){
                        echo '<p class="invalid-feedback">', $validation['contenido'] ,'</p>';
                    }

                    echo form_submit([
                        'name' => 'Enviar',
                        'id' => 'Enviar',
                        'value' => 'Enviar',
                        'class' => 'btn btn-success w-25 my-4',
                    ]);

                    echo form_close();
                ?>
                
            <!-- </form> -->
        </div>

    </div>

    <!-- Ubicación con ancho completo -->
    <div id="ubicacion" class="ubicacion-fullwidth">
        <h3>Nos encontramos en</h3>
        <div class="mapa-responsive">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d625.6795422652755!2d-58.82161433483339!3d-27.488618092684547!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94456b78e56066c3%3A0xcc3e42b06de76eb6!2sAv.%20Maip%C3%BA%201247%2C%20W3402%20Corrientes!5e0!3m2!1ses!2sar!4v1750044361921!5m2!1ses!2sar" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</section>