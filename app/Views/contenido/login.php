

<!-- Ingresar -->
<div class="">
    <div class="container w-50 p-3">
        <h2 class="text-center">Ingresar a tu cuenta PetCare</h2>
        <?php
            helper('form');
            
            echo validation_list_errors();

            echo form_open('login/ingresar_usuario', ['method' => 'post']);

            echo form_label('Correo', 'correo', ['class' => 'form-label']);
            echo form_input('correo', '', ['class' => 'form-control', 'placeholder' => 'juanperez@gmail.com']);

            echo form_label('Contraseña', 'contraseña', ['class' => 'form-label']);
            echo form_password('contraseña', '', ['class' => 'form-control']);

            echo form_submit('Ingresar', 'ingresar', ['class' => 'btn btn-primary']);

            echo form_close();
        ?>
        
        <div class="p-3">
            <p>¿No tienes cuenta? <a href="">Crear una</a></p>
        </div>
    </div>
</div>