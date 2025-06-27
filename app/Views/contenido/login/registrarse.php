<!-- REGISTRARSE -->
<div class="container-fluid container-registro">
    <img src="<?php echo base_url('assets/img/animales/fondo-registro.jpg') ?>" class="fondo-registro" alt="fondo gato">

    <div class="row justify-content-center align-items-center min-vh-100 seccion-registro">
        <div class="col-11 col-sm-8 col-md-6 col-lg-4 container-form">

            <h2 class="text-center mb-4">Registrarse</h2>

            <?php
                helper('form');

                $completar = count($validation) > 0;
                $clase_nombre = isset($validation['nombre']) ? 'form-control is-invalid' : "form-control";
                $clase_apellido = isset($validation['apellido']) ? 'form-control is-invalid' : "form-control";
                $clase_correo = isset($validation['correo']) ? 'form-control is-invalid' : "form-control";
                $clase_contraseña = isset($validation['contraseña']) ? 'form-control is-invalid' : "form-control";
                $clase_confirmacion_contraseña = isset($validation['confirmacion-contraseña']) ? 'form-control is-invalid' : "form-control";

                echo form_open_multipart('login/crear_usuario');

                //INPUT NOMBRE
                echo form_label('Nombre', 'nombre', ['class' => 'form-label']);
                echo form_input([
                    'name' => 'nombre',
                    'id' => 'nombre',
                    'value' => $completar ? set_value('nombre') : '',
                    'class' => $clase_nombre,
                    'placeholder' => 'Javier',
                    'type' => 'text',
                    'autocomplete' => 'off',
                ]);
                if(isset($validation['nombre'])){
                    echo '<p class="invalid-feedback">', $validation['nombre'] ,'</p>';
                }

                //INPUT APELLIDO
                echo form_label('Apellido', 'apellido', ['class' => 'form-label']);
                echo form_input([
                    'name' => 'apellido',
                    'id' => 'apellido',
                    'value' => $completar ? set_value('apellido') : '',
                    'class' => $clase_apellido,
                    'placeholder' => 'Garcia',
                    'type' => 'text',
                    'autocomplete' => 'off',
                ]);
                if(isset($validation['apellido'])){
                    echo '<p class="invalid-feedback">', $validation['apellido'] ,'</p>';
                }

                //INPUT CORREO
                echo form_label('Correo', 'correo', ['class' => 'form-label']);
                echo form_input([
                    'name' => 'correo',
                    'id' => 'correo',
                    'value' => $completar ? set_value('correo') : '',
                    'class' => $clase_correo,
                    'placeholder' => 'javiergarcia@gmail.com',
                    'type' => 'email',
                    'autocomplete' => 'off',
                ]);
                if(isset($validation['correo'])){
                    echo '<p class="invalid-feedback">', $validation['correo'] ,'</p>';
                }

                //INPUT CONTRASEÑA
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

                //INPUT CONTRASEÑA
                echo form_label('Confirmacion contraseña', 'confirmacion-contraseña', ['class' => 'form-label']);
                echo form_password([
                    'name' => 'confirmacion-contraseña',
                    'id' => 'confirmacion-contraseña',
                    'value' => $completar ? set_value('confirmacion-contraseña') : '',
                    'class' => $clase_confirmacion_contraseña,
                    'autocomplete' => 'off',
                ]);
                if(isset($validation['confirmacion-contraseña'])){
                    echo '<p class="invalid-feedback">', $validation['confirmacion-contraseña'] ,'</p>';
                }
                
                echo form_label('Imagen de perfil', 'imagen-perfil', ['class' => 'form-label']);
                echo form_upload('', '', ['name' => 'imagen', 'size' => '20']);

                echo form_submit('ingresar', 'Ingresar', ['class' => 'btn btn-ingreso']);

                echo form_close();
            ?>
            
        </div>
    </div>
</div>