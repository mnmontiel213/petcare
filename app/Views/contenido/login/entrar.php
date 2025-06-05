<!-- Ingresar -->
<div class="container-fluid container-login">
    <img src="<?php echo base_url('assets/img/animales/fondo-login.jpg') ?>" class="fondo-login" alt="fondo gato">
    <div class="row justify-content-center align-items-center min-vh-100 seccion-login">
        <div class="col-11 col-sm-8 col-md-6 col-lg-4 p-4 container-form">
            <h2 class="text-center mb-4">Iniciar Sección</h2>


            <?php
            if ($validation) {
                //esto podria mejorarse...
                if (array_key_exists('failed', $validation)) {
                    echo '<div class="alert alert-danger" role="alert">';
                    foreach ($validation['failed'] as $value) {
                        echo $value, '<br>';
                    }
                    echo '</div>';
                } else {
                    echo '<div class="alert alert-danger" role="alert">';
                    foreach ($validation as $value) {
                        echo $value;
                    }
                    echo '</div>';
                }
            }
            ?>

            <?php
            helper('form');

            echo validation_list_errors();

            echo form_open('login/ingresar_usuario', ['method' => 'post']);

            echo form_label('Correo', 'correo', ['class' => 'form-label']);
            echo form_input([
                'name' => 'correo',
                'id' => 'correo',
                'value' => set_value('correo'),
                'class' => 'form-control',
                'placeholder' => 'example@gmail.com',
                'type' => 'email'
            ]);

            echo form_label('Contraseña', 'password', ['class' => 'form-label']);
            echo form_password([
                'name' => 'password',
                'id' => 'password',
                'class' => 'form-control'
            ]);

            echo form_submit('ingresar', 'Ingresar', ['class' => 'btn btn-ingreso']);

            echo form_close();
            ?>

            <div class="text-center mt-3">
                <p class="text-center">¿No tienes cuenta?</p>
                <a class="link-registro" href="registro">Crear una</a>
            </div>
        </div>


    </div>
</div>