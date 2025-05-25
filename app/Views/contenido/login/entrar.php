

<!-- Ingresar -->
<div class="container p-5">
    <div class="container w-50">
        <h2 class="text-center">Ingresar a tu cuenta PetCare</h2>


        <?php 
           if($validation){
                //esto podria mejorarse...
                if(array_key_exists('failed',$validation)){
                    echo '<div class="alert alert-danger" role="alert\">';
                    foreach($validation['failed'] as $value){
                        echo $value, '<br>';
                    }
                    echo '</div>';
                }else{
                    echo '<div class="alert alert-danger" role="alert\">';
                    foreach($validation as $value) { 
                        echo $value;
                    }
                    echo '</div>';
                }
           }
        ?>
        
        <?php
            helper('form');
            
            echo form_open('login/ingresar_usuario', ['method' => 'post']);

            echo form_label('Correo', 'correo', ['class' => 'form-label']);
            echo form_input('correo', '', ['class' => 'form-control', 'placeholder' => 'juanperez@gmail.com']);

            echo form_label('Contraseña', 'contraseña', ['class' => 'form-label']);
            echo form_password('contraseña', '', ['class' => 'form-control']);

            echo form_submit('Ingresar', 'ingresar', ['class' => 'btn btn-primary']);

            echo form_close();
        ?>
        
        <div class="p-3">
            <p>¿No tienes cuenta?</p>
            <a href="registro">Crear una</a>
        </div>
    </div>
</div>