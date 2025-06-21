
<?php helper('form') ?>

<div class="container m-auto p-5 rounded-3 border border-dark-subtle" style="font-family: 'Montserrat'; background-color: var(--color-primario);">
    <div class="container w-50">
    <h2>¡Registrar nueva mascota!</h2>  
        
        <form action="mascota" method="post">
            <label class="form-label" for="">Nombre</label>
            <input class="form-control" type="text" name="nombre">
            <?php if(isset($validation['nombre'])): ?>
                <div class="alert alert-danger w-50 my-3">
                    <?= $validation['nombre'] ?>
                </div>
            <?php endif; ?>

            <label class="form-label w-25" for="">Mascota</label>
            <div class="d-flex justify-content-evenly">
                <?php
                    foreach($razas as $r){
                        echo '<div>';
                        echo form_radio('mascota', $r['CATEGORIA_ID']);
                        echo form_label($r['VALOR'], '', ["class='form-label'"]);
                        echo '</div>';
                    }    
                ?>
            </div>
            <?php if(isset($validation['mascota'])): ?>
                <div class="alert alert-danger w-50 my-3">
                    <?= $validation['mascota'] ?>
                </div>
            <?php endif; ?>


            <input type="submit" value="Registrar" class="btn btn-primary">
        </form>
    </div>
</div>