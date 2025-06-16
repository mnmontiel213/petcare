<!-- Ingresar -->
<div class="container-fluid container-login">
    <img src="<?php echo base_url('assets/img/animales/fondo-login.jpg') ?>" class="fondo-login" alt="fondo gato">
    <div class="row justify-content-center align-items-center min-vh-100 seccion-login">
        <div class="col-11 col-sm-8 col-md-6 col-lg-4 p-4 container-form">
            <h2 class="text-center mb-4">Iniciar Sección</h2>

            <?php
            if ($validation) {
                //esto podria mejorarse...
                foreach ($validation as $val_error) {
                    echo '<div class="alert alert-danger" role="alert">';
                    echo $val_error;
                    echo '</div>';
                }
            }

            if ($error) {
                echo '<div class="alert alert-danger" role="alert">';
                echo $error;
                echo '</div>';
            }
            ?>

            <?php
            helper('form');

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

            echo form_label('Contraseña', 'contraseña', ['class' => 'form-label']);
            echo form_password([
                'name' => 'contraseña',
                'id' => 'contraseña',
                'class' => 'form-control'
            ]);

            echo form_submit('ingresar', 'Ingresar', ['class' => 'btn btn-ingreso']);

            echo form_close();
            ?>

            <div class="text-center mt-3">
                <p class="text-center">¿No tienes cuenta?</p>
                <a class="link-registro" href="registrar">Crear una</a>
            </div>
        </div>


    </div>
</div>