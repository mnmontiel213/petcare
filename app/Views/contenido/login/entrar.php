<!-- Ingresar -->
<div class="container p-5">
    <div class="container w-50">
        <h2 class="text-center">Ingresar a tu cuenta PetCare</h2>

        <?php 
           if($validation){
                echo 'failed validation';
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

            echo form_label('Contraseña', 'password', ['class' => 'form-label']);
            echo form_password([
                'name' => 'password',
                'id' => 'password',
                'class' => 'form-control'
            ]);

            echo form_submit('ingresar', 'Ingresar', ['class' => 'btn btn-ingreso']);

            echo form_close();
        ?>
        
        <div class="p-3">
            <p>¿No tienes cuenta?</p>
            <a href="registrar">Crear una</a>
        </div>


    </div>
</div>