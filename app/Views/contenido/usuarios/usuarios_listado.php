
<?php helper('form'); ?>

<div class="container">
    
    <table class="table">
        <thead>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Correo</th>
        </thead>
        <tbody class="table-group-divider">
            <?php foreach($usuarios as $s):?>
                <?php echo form_open('usuarios/actualizar') ?>
                <tr>
                    <td><?= $s['USUARIO_ID']?></td>
                    <td><?= $s['NOMBRE']?></td>
                    <td><?= $s['APELLIDO']?></td>
                    <td><?= $s['CORREO']?></td>
                </tr>
                <?php echo form_close()?>
            <?php endforeach;?>
        </tbody>
    </table>
   
</div>