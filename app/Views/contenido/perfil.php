
<div class="row">
    <div class="col">

        <?php
            // SI EL USUARIO NO TIENE UNA IMAGEN ASOCIADA, ASIGNAR UNA POR DEFECTO
            if($usuario['imagen'] == null){
                $usuario['imagen'] = 'petcare.png';
            }
        ?>

        <div class="d-flex flex-column p-5">
            <img src="<?php echo base_url('assets/uploads/'); echo $usuario['imagen'] ?>" alt="" class="rounded-circle">
            <p><?= $usuario['nombre']?> <?= $usuario['apellido']?> </p>
        </div>
    
        <div class="p-5">
            <h2>Turnos</h2>
            <p>Proximos turnos</p>
            <div class="list-group w-75">
                <?php
                    foreach($turnos as $turno): ?>
                        <?php $s = $turno['servicio']; ?>
                        
                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1"><?= $s['descripcion'] ?></h5>
                                <small> <?= $turno['fecha']?> </small>
                            </div>
                            <p class="mb-1"> Turno de <?= $s['descripcion']?> para <?=$turno['mascota']?> </p>
                            <small> <?= $turno['horario'] ?></small>
                        </a>
                <?php endforeach?>
            </div>
        </div>
    </div>

    <div class="col p-5">
        <h2>Mascotas</h2>
        
        <div>
            <a class="btn btn-primary" href="registrar/mascota">Nueva mascota</a>
        </div>

        <div class="container-flex py-2 w-25">
            <?php
                foreach($mascotas as $mascota): ?>
                <div class="card h-100">
                    <img src="..." class="card-img-top" alt="">
                    <div class="card-body">
                        <h5 class="card-title"> <?= $mascota['nombre'] ?></h5>
                        <small> <?= strtolower($mascota['tipo']) ?> </small>
                    </div>
                </div>  
            <?php endforeach ?>               
        </div>
    </div>
</div>
