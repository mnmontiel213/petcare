<?php
$imagen = base_url('assets/img/animales/card-gato.jpg');
?>

<div class="container">
    <div class="row">
        <div class="col">

            <?php
            // SI EL USUARIO NO TIENE UNA IMAGEN ASOCIADA, ASIGNAR UNA POR DEFECTO
            if ($usuario['imagen'] == null) {
                $usuario['imagen'] = 'petcare.png';
            }
            ?>

            <div class="d-flex flex-column justify-content-center align-items-center p-5 perfil-usuario">
                <img src="<?php echo base_url('assets/uploads/');
                            echo $usuario['imagen'] ?>" alt="" class="rounded-circle">
                <p class="mt-3 info-perfil"><?= $usuario['nombre'] ?> <?= $usuario['apellido'] ?> </p>
            </div>

            <div class="p-5">
                <h2>Turnos</h2>
                <p>Proximos turnos</p>
                <div class="list-group w-75">
                    <?php
                    foreach ($turnos as $turno): ?>
                        <?php $s = $turno['servicio']; ?>

                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1"><?= $s['descripcion'] ?></h5>
                                <small> <?= $turno['fecha'] ?> </small>
                            </div>
                            <p class="mb-1"> Turno de <?= $s['descripcion'] ?> para <?= $turno['mascota'] ?> </p>
                            <small> <?= $turno['horario'] ?></small>
                        </a>
                    <?php endforeach ?>
                </div>
            </div>
        </div>

        <div class="col p-5 seccion-mascotas">
            <div class="coleccion-card">
                <div class="agregar-mascotas">
                    <h2>Mascotas</h2>
                    <a class="btn btn-agregar-mascotas" href="registrar/mascota">+</a>
                </div>

                <div class="card-mascota py-2">
                    <?php
                    foreach ($mascotas as $mascota): ?>
                        <div class="card m-3">
                            <img src="<?= $imagen ?>" class="card-img-top perfil-mascota" alt="mascotas">
                            <div class="card-body">
                                <h5 class="card-title"> <?= $mascota['nombre'] ?></h5>
                                <small> <?= strtolower($mascota['tipo']) ?> </small>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>

        </div>
    </div>
</div>