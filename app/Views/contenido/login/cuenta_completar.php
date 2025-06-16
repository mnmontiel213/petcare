<!-- REGISTRARSE -->
<div class="container-fluid container-registro">
    <img src="<?php echo base_url('assets/img/animales/fondo-registro.jpg') ?>" class="fondo-registro" alt="fondo gato">

    <div class="row justify-content-center align-items-center min-vh-100 seccion-registro">
        <div class="col-11 col-sm-8 col-md-6 col-lg-4 container-form">

            <h2 class="text-center mb-4">Completar cuenta</h2>

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

            <?php echo form_open("login/cuenta_actualizar")?>
                <label name="" class="form-label">Nombre</label>
                <input type="text" name="nombre" class="form-control" value="<?php echo session()->get('NOMBRE') ?>" disabled>

                <label name="" class="form-label">Apellido</label>
                <input type="text" name="apellido" class="form-control" value="<?php echo session()->get('APELLIDO') ?>" disabled>

                <label name="" class="form-label">Correo</label>
                <input type="text" name="correo" class="form-control" value="<?php echo session()->get('CORREO') ?>" disabled>

                <label name="" class="form-label">Contraseña</label>
                <input type="password" name="contraseña" class="form-control" disabled>

                <label name="" class="form-label">Confirmacion Contraseña</label>
                <input type="password" name="confirmacion-contraseña" class="form-control" disabled>

                <label name="" class="form-label">CBU</label>
                <input type="text" name="cbu" class="form-control is-invalid">
                <p class="invalid-feedback">Es necesario un CBU</p>
                
                <label name="" class="form-label">Direccion</label>
                <input type="text" name="direccion" class="form-control is-invalid">
                <p class="invalid-feedback">Es necesaria una direccion</p>
                
                <div class="py-5">
                    <input type="submit" value="Crear cuenta" class="btn btn-primary">
                </div>
                
             <?php echo form_close() ?>
        </div>
    </div>
</div>
