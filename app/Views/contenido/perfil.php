<?php
    $imagen_gato = base_url('assets/img/animales/card-gato.jpg');
    $imagen_perro = base_url('assets/img/animales/card-perro.jpg');
?>

<div class="container">
    <div class="row">

        <?php if(session('ADMIN')):?>
            <div class="container m-auto p-auto">
                <h1 class="text-center">Administrador</h1>




                <!-- ************************************  VENTAS ************************************ -->

                <div class="container">
                <h2>Ventas</h2>
                    <?php $total= 0; ?>
                    <table class="table">
                        <thead>
                            <th>Venta ID</th>
                            <th>Usuario</th>
                            <th>Fecha compra</th>
                            <th>Total</th>
                            <th>Mas..</th>
                        </thead>
                        <tbody class="table-group-divider">
                            <?php foreach($historial_compra as $compras): ?>
                                <tr>
                                    <td><?= $compras['id'] ?></td>
                                    <td><?= $compras['usuario']['nombre'] . ' ' . $compras['usuario']['apellido']  ?></td>
                                    <td><?= $compras['fecha']?></td>
                                    <td>$<?= $compras['total'] ?></td>

                                    <?php $total += $compras['total']; ?>
                                    <td>
                                        <p class="d-inline-flex gap-1">
                                            <a class="btn btn-primary" data-bs-toggle="collapse" href="<?= '#collapse' . $compras['id'] ?>" role="button" aria-expanded="false" aria-controls="<?= 'collapse' . $compras['id'] ?>">
                                                Mostrar Productos...
                                            </a>
                                        </p>
                                        
                                        <div class="collapse" id="<?= 'collapse' . $compras['id'] ?>">
                                            <?php foreach($compras['productos'] as $p): ?>
                                                <div class="d-flex">
                                                    <div class="card card-body">
                                                        <!-- <img src="<?php echo base_url('assets/uploads/') . $p['imagen'] ?>" class="card-img-top w-25" alt="..."> -->
                                                        <h5 class="card-title"><?= $p['nombre'] ?></h5>
                                                        <ul class="list-group list-group-flush">
                                                            <li class="list-group-item">Precio: $<?= $p['precio'] ?></li>
                                                            <li class="list-group-item">Unidades: <?= $p['cantidad'] ?></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                    <h2>Total: $<?= $total ?></h2>
                </div>

                <hr>
                <!-- ************************************  TURNOS  ************************************ -->
                <div>
                    
                    <h2 class="py-4">Proximos turnos</h2>
                    <div class="list-group m-4">
                        <?php foreach($turnos as $turno): ?>
                            <?php  
                                $clase_alerta = "";
                                if($turno['cuanto_falta'] <= 3 && $turno['cuanto_falta'] > 0){
                                    $clase_alerta = "border border-warning";
                                }elseif($turno['cuanto_falta'] == 0){   
                                    $clase_alerta = "border border-danger";
                                }
                                ?>
                            <div class="<?php echo 'list-group-item list-group-item-action' . $clase_alerta ?> bg-dark-subtle">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1 text-dark"><?= $turno['servicio'] . ' para ' . $turno['mascota']['nombre'] ?></h5>
                                    <?php if($turno['cuanto_falta'] == 0): ?>
                                        <small class="text-danger fw-bold">Hoy</small>
                                    <?php else: ?>
                                        <small class="text-dark">Faltan <?= $turno['cuanto_falta'] ?> dias</small>
                                    <?php endif; ?>
                                </div>
                                <p class="mb-1 text-dark">Turno a pedido de <?= $turno['usuario']['nombre'] . ' ' . $turno['usuario']['apellido'] ?></p>
                                <small class="text-dark">Hora: <?= $turno['horario'] ?>am</small>
                                <br>
                                <small class="text-dark">Fecha: <?= $turno['fecha'] ?></small>
                            </div>
                        <?php endforeach; ?>
                   </div>
                </div>

                
            </div>

        <?php else: ?>
            <div class="col">
                <?php
                    // SI EL USUARIO NO TIENE UNA IMAGEN ASOCIADA, ASIGNAR UNA POR DEFECTO
                    if ($usuario['imagen'] == null) {
                        $usuario['imagen'] = 'petcare.png';
                    }
                ?>

                <div class="">
                    <form class="d-flex flex-column justify-content-center align-items-center p-5 perfil-usuario" action="<?php echo base_url('perfil/actualizar/'); ?>" method="GET">                    
                        <img src="<?php echo base_url('assets/uploads/'); echo $usuario['imagen'] ?>" alt="" class="rounded-circle">
                        <p class="mt-3 info-perfil"><?= $usuario['nombre'] ?> <?= $usuario['apellido'] ?> </p>
                        <button type="submit" class="btn btn-sm">
                            <i class="bi bi-pencil-square font h2"></i>
                        </button>
                    </form>
                </div>

                <div class="p-5">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseTwo">
                                    Turnos
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
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
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Historial de compras
                            </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <?php foreach($historial_compra as $c): ?>
                                        <div class="card mb-3" style="max-width: 540px;">
                                            <div class="row g-0">
                                                <div class="col-md-8">
                                                    <div class="card-body">
                                                        <h5 class="card-title"><?= $c['fecha']?></h5>
                                                        <small>Fecha de compra: <?= $c['fecha'] ?></small>
                                                        <small>Total: <?= $c['total'] ?></small>
                                                    </div>
                                                    <div class="d-flex">
                                                        <?php foreach($c['productos'] as $p): ?>
                                                            <div class="col-md-4">
                                                                <img src="<?php echo base_url('assets/uploads/') . $p['imagen']?>" class="img-fluid rounded-start" alt="...">
                                                                <small><?= $p['nombre'] ?></small>
                                                            </div>
                                                        <?php endforeach; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
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
                                <?php if(strcmp($mascota['tipo'], 'GATO')): ?>
                                    <img src="<?= $imagen_perro ?>" class="card-img-top perfil-mascota" alt="mascotas">
                                <?php else: ?>
                                    <img src="<?= $imagen_gato ?>" class="card-img-top perfil-mascota" alt="mascotas">
                                <?php endif; ?>

                                <div class="card-body">
                                    <h5 class="card-title"> <?= $mascota['nombre'] ?></h5>
                                    <small> <?= strtolower($mascota['tipo']) ?> </small>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        
    </div>


</div>