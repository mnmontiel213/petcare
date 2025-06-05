<!-- REGISTRARSE -->
<div class="container-fluid container-registro">
    <img src="<?php echo base_url('assets/img/animales/fondo-registro.jpg') ?>" class="fondo-registro" alt="fondo gato">

    <div class="row justify-content-center align-items-center min-vh-100 seccion-registro">
        <div class="col-11 col-sm-8 col-md-6 col-lg-4 container-form">

            <h2 class="text-center mb-4">Registrarse</h2>

            <?php
            helper('form');

            echo validation_list_errors();

            echo form_open('login/crear_usuario', ['method' => 'post']);

            echo form_label('Nombre', 'nombre', ['class' => 'form-label']);
            echo form_input('nombre', '', ['class' => 'form-control', 'placeholder' => 'juan']);

            echo form_label('Apellido', 'apellido', ['class' => 'form-label']);
            echo form_input('apellido', '', ['class' => 'form-control', 'placeholder' => 'perez']);

            echo form_label('Correo', 'correo', ['class' => 'form-label']);
            echo form_input('correo', '', ['class' => 'form-control', 'placeholder' => 'example@gmail.com']);

            echo form_label('Contraseña', 'contraseña', ['class' => 'form-label']);
            echo form_password('contraseña', '', ['class' => 'form-control']);

            echo form_label('Confirmar contraseña', 'confirmacion-contraseña', ['class' => 'form-label']);
            echo form_password('confirmacion-contraseña', '', ['class' => 'form-control']);

            echo form_submit('Crear cuenta', 'Crear cuenta', ['class' => 'btn btn-registro']);

            echo form_close();
            ?>
        </div>
    </div>
</div>