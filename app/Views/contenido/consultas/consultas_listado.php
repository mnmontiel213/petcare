<?php helper('form') ?>

<div class="container">
    <h1 class="text-center py-5">Consultas de usuarios</h1>
    <div class="d-flex">
        <?php if(count($consultas) == 0): ?>
            <div class="alert alert-info">
                <h4>No hay consultas actualmente</h4>
            </div>
        <?php endif;?>

        <?php foreach($consultas as $c): ?>        
                <div class="card m-2" style="width: 18rem;">
                    <?php if($c['VISTO']): ?>
                        <div class="card-body border border-secondary-subtle">
                            <?php if($c['VISTO'] == TRUE):  ?>
                                <button type="submit" class="btn btn-lg">
                                    <i class="bi bi-eye"></i>
                                </button>
                            <?php else: ?>
                                <form action="marcar_visto" method="POST">
                                    <input name="id" value="<?=$c['CONSULTA_ID']?>" hidden="true">
                                    <button type="submit" class="btn btn-lg">
                                        <i class="bi bi-eye-fill"></i>
                                    </button>
                                </form>
                            <?php endif; ?>
                            <h5 class="card-title"><?= $c['MOTIVO'] ?></h5>
                            <h5 class="card-subtitle mb-2 text-body-secondary"><?= $c['NOMBRE'] ?></h5>
                            <h6 class="card-subtitle mb-2 text-body-secondary"><?= $c['CORREO'] ?></h6>
                            <p class="card-text"><?= $c['CONTENIDO'] ?></p>
                        </div>
                    <?php else: ?>
                        <div class="card-body border border-primary">
                            <?php if($c['VISTO'] == TRUE):  ?>
                                <button type="submit" class="btn btn-lg">
                                    <i class="bi bi-eye"></i>
                                </button>
                            <?php else: ?>
                                <form action="marcar_visto" method="POST">
                                    <input name="id" value="<?=$c['CONSULTA_ID']?>" hidden="true">
                                    <button type="submit" class="btn btn-lg">
                                        <i class="bi bi-eye-fill"></i>
                                    </button>
                                </form>
                            <?php endif; ?>
                            <h5 class="card-title"><?= $c['MOTIVO'] ?></h5>
                            <h5 class="card-subtitle mb-2 text-body-secondary"><?= $c['NOMBRE'] ?></h5>
                            <h6 class="card-subtitle mb-2 text-body-secondary"><?= $c['CORREO'] ?></h6>
                            <p class="card-text"><?= $c['CONTENIDO'] ?></p>
                        </div>
                    <?php endif; ?>

                    
                </div>
        <?php endforeach; ?>
   </div>
</div>