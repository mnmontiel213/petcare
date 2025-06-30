<!-- REGISTRARSE -->
<div class="container-fluid container-registro">
    <img src="<?php echo base_url('assets/img/animales/fondo-registro.jpg') ?>" class="fondo-registro" alt="fondo gato">

    <div class="row justify-content-center align-items-center min-vh-100 seccion-registro">
        <div class="col-11 col-sm-8 col-md-6 col-lg-4 container-form">

            <h2 class="text-center mb-4"><?=$titulo?></h2>
            <?php 
            helper('form');
            echo form_open('perfil/actualizar');

            //INPUT NOMBRE
            $clase_nombre = isset($validation['nombre']) ? 'form-control is-invalid' : "form-control";
            $clase_apellido = isset($validation['apellido']) ? 'form-control is-invalid' : "form-control";
            $clase_correo = isset($validation['correo']) ? 'form-control is-invalid' : "form-control";
            $clase_contraseña = isset($validation['contraseña']) ? 'form-control is-invalid' : "form-control";
            $clase_confirmacion_contraseña = isset($validation['confirmacion-contraseña']) ? 'form-control is-invalid' : "form-control";

            echo form_label('Nombre', 'nombre', ['class' => 'form-label']);
            echo form_input([
                'name' => 'nombre',
                'id' => 'nombre',
                'value' => $usuario['NOMBRE'],
                'class' => $clase_nombre,
                'placeholder' => 'Javier',
                'type' => 'text',
                'autocomplete' => 'off',
            ]);
            if(isset($validation['nombre'])){
                echo '<p class="invalid-feedback">', $validation['nombre'] ,'</p>';
            }

            //INPUT APELLIDO
            $clase_nombre = isset($validation['apellido']) ? 'form-control is-invalid' : "form-control";
            echo form_label('Apellido', 'apellido', ['class' => 'form-label']);
            echo form_input([
                'name' => 'apellido',
                'id' => 'apellido',
                'value' => $usuario['APELLIDO'],
                'class' => $clase_nombre,
                'placeholder' => 'Garcia',
                'type' => 'text',
                'autocomplete' => 'off',
            ]);
            if(isset($validation['apellido'])){
                echo '<p class="invalid-feedback">', $validation['apellido'] ,'</p>';
            }

            //INPUT CORREO
            $clase_nombre = isset($validation['correo']) ? 'form-control is-invalid' : "form-control";
            echo form_label('Correo', 'correo', ['class' => 'form-label']);
            echo form_input([
                'name' => 'correo',
                'id' => 'correo',
                'value' => $usuario['CORREO'],
                'class' => $clase_nombre,
                'placeholder' => 'Garcia',
                'type' => 'email',
                'autocomplete' => 'off',
            ]);
            if(isset($validation['correo'])){
                echo '<p class="invalid-feedback">', $validation['correo'] ,'</p>';
            }

            //INPUT CBU
            $clase_nombre = isset($validation['cbu']) ? 'form-control is-invalid' : "form-control";
            echo form_label('CBU', 'cbu', ['class' => 'form-label']);
            echo form_input([
                'name' => 'cbu',
                'id' => 'cbu',
                'value' => $usuario['CBU'],
                'class' => $clase_nombre,
                'placeholder' => 'CBU',
                'type' => 'text',
                'autocomplete' => 'off',
            ]);
            if(isset($validation['cbu'])){
                echo '<p class="invalid-feedback">', $validation['cbu'] ,'</p>';
            }

            //INPUT TELEFONO
            $clase_nombre = isset($validation['telefono']) ? 'form-control is-invalid' : "form-control";
            echo form_label('Telefono', 'telefono', ['class' => 'form-label']);
            echo form_input([
                'name' => 'telefono',
                'id' => 'telefono',
                'value' => $usuario['TELEFONO'],
                'class' => $clase_nombre,
                'placeholder' => '3794010101',
                'type' => 'text',
                'autocomplete' => 'off',
            ]);
            if(isset($validation['telefono'])){
                echo '<p class="invalid-feedback">', $validation['telefono'] ,'</p>';
            }

            //INPUT DIRECCION
            $clase_nombre = isset($validation['direccion']) ? 'form-control is-invalid' : "form-control";
            echo form_label('Direccion', 'direccion', ['class' => 'form-label']);
            echo form_input([
                'name' => 'direccion',
                'id' => 'direccion',
                'value' => $usuario['DIRECCION'],
                'class' => $clase_nombre,
                'placeholder' => '3794010101',
                'type' => 'text',
                'autocomplete' => 'off',
            ]);
            if(isset($validation['direccion'])){
                echo '<p class="invalid-feedback">', $validation['direccion'] ,'</p>';
            }
            
            echo form_submit('ingresar', 'Ingresar', ['class' => 'btn btn-ingreso']);

            echo form_close();

           
            ?>
        </div>
    </div>
</div>
