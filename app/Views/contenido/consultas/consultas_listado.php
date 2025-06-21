<?php helper('form') ?>

<div class="m-auto p-auto">
    <h2>Consultas de usuarios</h2>
    <div>
        <?php if(count($consultas) == 0): ?>
            <div class="alert alert-info">
                <h4>No hay consultas actualmente</h4>
            </div>
        <?php endif;?>

        <?php foreach($consultas as $c): ?>        
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title"><?= $c['TITULO'] ?></h5>
                        <h6 class="card-subtitle mb-2 text-body-secondary"><?= $c['CORREO'] ?></h6>
                        <p class="card-text"><?= $c['CONTENIDO'] ?></p>
                        <?php
                            echo form_open('consulta/eliminar');
                            echo form_hidden('id', $c['CONSULTA_ID']);
                            echo form_submit('eliminar', 'Eliminar', 'class="btn btn-danger"');
                            echo form_close();
                        ?>
                    </div>
                </div>
        <?php endforeach; ?>
   </div>
</div>