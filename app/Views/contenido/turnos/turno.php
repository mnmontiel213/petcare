<!-- Pedir turno -->
<?php helper('form')?>

<div>
    <div class="container w-50 p-3">
        <h2 class="text-center">Tomar turno</h2>
        <form action="turno/agregar_turno" method="post">
            <div class="row">
                <div class="col">
                    
                    <!--
                    $categorias: es un array que contiene las keys de los servicios
                    $servicios: array que contiene los servicios agrupados por categoria

                    $servicios = [
                        'SALUD' =>    ... ,
                        'ESTETICA' => ... ,
                    ]
                    -->
                    <?php $categorias = array_keys($servicios)?>
                    <?php foreach($categorias as $c): ?>
                        <h2><?= $c ?></h2>
                        <div class="list-group">
                            <?php foreach($servicios[$c] as $s): ?>
                                <label class="list-group-item">
                                    <input class="form-check-input me-1" type="radio" name="tipo-turno" value='<?= $s['SERVICIO_ID'] ?>'>
                                    <?= $s['DESCRIPCION'] ?>
                                </label>
                            <?php endforeach; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="col">
                    <h2>Fecha</h2>
                    <input class="form-control" type="date" name="fecha" value="<?php echo date("Y-m-d")?>" 
                                                   min="<?php echo date("Y-m-d")?>" 
                                                   max="<?php echo date("Y-m-d", strtotime("+1 Months"))?>">

                    <h2>Horario</h2>
                    <div class="list-group">
                        <label class="list-group-item">
                            <input class="form-check-input me-1" type="radio" name="horario" value="9:00">
                            09:00
                        </label>
                        <label class="list-group-item">
                            <input class="form-check-input me-1" type="radio" name="horario" value="10:00">
                            10:00
                        </label>
                        <label class="list-group-item">
                            <input class="form-check-input me-1" type="radio" name="horario" value="11:00">
                            11:00
                        </label>
                    </div>
                </div>
            </div>

            <div class="container p-2">
                <h2>Mascotas</h2>
                <small>Eligue para que mascota es el turno</small>
               <div class="d-flex">
                <?php foreach($mascotas as $m): ?>
                        <label class="list-group-item px-1">
                                <input class="form-check-input me-1" type="radio" name="mascota" value="<?= $m['id'] ?>">
                                <?= $m['nombre'] ?>    
                        </label>
                    <?php endforeach; ?>
               </div>
            </div>

            <input class="btn btn-success" type="submit" value="Pedir turno">
        </form>
    </div>
</div>