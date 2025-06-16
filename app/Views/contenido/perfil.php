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
            <h2>Mascotas</h2>
     
            <!--  ESTO ES TEMPORAL HASTA AGREGAR ANIMALES A LA BASE DE DATOS -->
            <?php
            $mascotas= [ 
                [
                    'nombre' => 'fitto', 
                    'tipo' => 'perro', 
                    'id' => 1
                ],
                [
                    'nombre' => 'dakota', 
                    'tipo' => 'perro', 
                    'id' => 2,
                ],
                [
                    'nombre' => 'kaido', 
                    'tipo' => 'gato', 
                    'id' => 3,
                ],
            ];
            ?>

            <?php
                foreach($mascotas as $mascota): ?>
                <div class="card h-100">
                    <img src="..." class="card-img-top" alt="">
                    <div class="card-body">
                        <h5 class="card-title"> <?= $mascota['nombre'] ?></h5>
                        <small> <?= $mascota['tipo'] ?> </small>
                    </div>
                </div>  
            <?php endforeach ?>
        </div>
    </div>

    <div class="col p-5">
        <h2>Turnos</h2>
        <p>Proximos turnos</p>
        <div class="list-group w-75">
            <?php 
                foreach($turnos as $turno): ?>
                    <a href="#" class="list-group-item list-group-item-action">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1"><?= $servicios[$turno['SERVICIO_ID']] ?></h5>
                            <small> <?= $turno['FECHA']?> </small>
                        </div>
                        <p class="mb-1"> Turno de <?= $servicios[$turno['SERVICIO_ID']]?> para "nombre mascota" </p>
                        <small> <?= $turno['HORARIO'] ?></small>
                    </a>
            <?php endforeach?>
        </div>

        <h2>Productos comprados</h2>
        <div class= "w-75">
            <ul class="list-group">
                <li class="list-group-item">An item</li>
            </ul>
        </div>
    </div>
</div>
