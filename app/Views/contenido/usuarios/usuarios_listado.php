
<?php helper('form'); ?>

<div class="container">
    
    <table class="table">
        <thead>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Correo</th>
            <th>Mayorista</th>
        </thead>
        <tbody class="table-group-divider">
            <?php foreach($usuarios as $s):?>
                <?php echo form_open('usuarios/actualizar') ?>
                <tr>
                    <td><?= $s['USUARIO_ID']?></td>
                    <td><?= $s['NOMBRE']?></td>
                    <td><?= $s['APELLIDO']?></td>
                    <td><?= $s['CORREO']?></td>
                    <td>
                        <?php if($s['ES_MAYORISTA']): ?>
                            <?php echo form_checkbox('mayorista', 'a', true) ?>
                        <?php else: ?>
                            <?php echo form_checkbox('mayorista', 'b', false) ?>
                        <?php endif; ?>
                        <?php echo form_hidden('id', $s['USUARIO_ID']) ?>
                        <?php echo form_submit('Guardar', 'guardar', 'class="btn btn-primary"') ?>
                    </td>
                </tr>
                <?php echo form_close()?>
            <?php endforeach;?>
        </tbody>
    </table>
   
</div>