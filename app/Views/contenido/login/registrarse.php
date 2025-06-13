<!-- REGISTRARSE -->
<div class="container-fluid container-registro">
    <img src="<?php echo base_url('assets/img/animales/fondo-registro.jpg') ?>" class="fondo-registro" alt="fondo gato">

    <div class="row justify-content-center align-items-center min-vh-100 seccion-registro">
        <div class="col-11 col-sm-8 col-md-6 col-lg-4 container-form">

            <h2 class="text-center mb-4">Registrarse</h2>

            <?php
            helper('form');

            if($validation){
                foreach($validation as $val_error){
                    echo '<div class="alert alert-danger" role="alert">';
                    echo $val_error;
                    echo '</div>';
                }
            }
           ?>

               <?php echo form_open_multipart("login/crear_usuario")?>
                <label name="" class="form-label">Nombre</label>
                <input type="text" name="nombre" class="form-control">

                <label name="" class="form-label">Apellido</label>
                <input type="text" name="apellido" class="form-control">

                <label name="" class="form-label">Correo</label>
                <input type="text" name="correo" class="form-control">

                <label name="" class="form-label">Contraseña</label>
                <input type="password" name="contraseña" class="form-control">

                <label name="" class="form-label">Confirmacion Contraseña</label>
                <input type="password" name="confirmacion-contraseña" class="form-control">

                <input type="file" name="imagen" size="20">
                <br>
                
                <input type="submit" value="Crear cuenta" class="btn">
                
             <?php echo form_close() ?>
        </div>
    </div>
</div>
