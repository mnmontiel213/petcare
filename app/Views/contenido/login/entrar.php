<!-- Ingresar -->
<div class="container-fluid container-login">
    <img src="<?php echo base_url('assets/img/animales/fondo-login.jpg') ?>" class="fondo-login" alt="fondo gato">
    <div class="row justify-content-center align-items-center min-vh-100 seccion-login">
        <div class="col-11 col-sm-8 col-md-6 col-lg-4 p-4 container-form">
            <h2 class="text-center mb-4">Iniciar Sesión</h2>


            <?php
                helper('form');

                $completar = count($validation) > 0;
                $clase_correo = isset($validation['correo']) ? 'form-control is-invalid' : "form-control";
                $clase_contraseña = isset($validation['contraseña']) ? 'form-control is-invalid' : "form-control";

                echo form_open('login/ingresar_usuario');

                echo form_label('Correo', 'correo', ['class' => 'form-label']);
                echo form_input([
                    'name' => 'correo',
                    'id' => 'correo',
                    'value' => $completar ? set_value('correo') : '',
                    'class' => $clase_correo,
                    'placeholder' => 'example@gmail.com',
                    'type' => 'email',
                    'autocomplete' => 'off',
                ]);
                if(isset($validation['correo'])){
                    echo '<p class="invalid-feedback">', $validation['correo'] ,'</p>';
                }

                echo form_label('Contraseña', 'contraseña', ['class' => 'form-label']);
                echo form_password([
                    'name' => 'contraseña',
                    'id' => 'contraseña',
                    'value' => $completar ? set_value('contraseña') : '',
                    'class' => $clase_contraseña,
                    'autocomplete' => 'off',
                ]);
                if(isset($validation['contraseña'])){
                    echo '<p class="invalid-feedback">', $validation['contraseña'] ,'</p>';
                }
                
                if($error != null){
                    echo '<small class="text-danger">', $error ,'</small>';
                }

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