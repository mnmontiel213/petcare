

<!-- REGISTRARSE -->
<div>
    <div class="container w-50 p-3">
        <h2 class="text-center">Ingresar a tu cuenta PetCare</h2>
        
        <?php
            helper('form');
            
            echo validation_list_errors();

            echo form_open('login/crear_usuario', ['method' => 'post']);

            echo form_label('Nombre', 'nombre', ['class' => 'form-label']);
            echo form_input('nombre', '', ['class' => 'form-control', 'placeholder' => 'juan']);

            echo form_label('Apellido', 'apellido', ['class' => 'form-label']);
            echo form_input('apellido', '', ['class' => 'form-control', 'placeholder' => 'perez']);

            echo form_label('Correo', 'correo', ['class' => 'form-label']);
            echo form_input('correo', '', ['class' => 'form-control', 'placeholder' => 'juanperez@gmail.com']);

            echo form_label('Contraseña', 'contraseña', ['class' => 'form-label']);
            echo form_password('contraseña', '', ['class' => 'form-control']);

            echo form_label('Confirmar contraseña', 'confirmacion-contraseña', ['class' => 'form-label']);
            echo form_password('confirmacion-contraseña', '', ['class' => 'form-control']);

            echo form_submit('Crear cuenta', 'Crear cuenta', ['class' => 'btn btn-primary']);

            echo form_close();
        ?>

    </div>
</div>