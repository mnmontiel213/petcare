<!-- Pedir turno -->
<?php 
    foreach($validation as $v){
        print_r($v);
        echo '<br>';
    }
?>

<div>
    <div class="container w-50 p-3">
        <h2 class="text-center">Tomar turno</h2>
        <?php  
            helper('form'); 
            echo form_open('turno/agregar_turno'); 
        ?>
            <div class="row">
                <div class="col">
                    <!--
                     LISTA DE SERVICIOS DISPONIBLES
                    -->
                    <?php 
                       
                        $turno_clase = isset($validation['tipo-turno']) ? "form-check-input me-1 is-invalid" : "form-check-input me-1";
                        $categorias = array_keys($servicios);
                        $turno_seleccion = 0;
                        if(isset($_POST['tipo-turno'])){
                            $turno_seleccion = $_POST['tipo-turno'];
                        }

                        foreach($categorias as $c){
                            echo '<h2>', $c, '</h2>';
                            echo '<div class="list-group">';
                            foreach($servicios[$c] as $s){
                                echo '<label class="list-group-item my-1">';
                                echo form_radio([
                                    'name' => 'tipo-turno',
                                    'value' => $s['SERVICIO_ID'],
                                    'class' => $turno_clase,
                                    'checked' => $turno_seleccion == $s['SERVICIO_ID'] ? true : false,
                                ]);
                                echo $s['DESCRIPCION'];
                                echo '</label>';    
                            }
                            echo '</div>';
                        }

                        if(isset($validation['tipo-turno'])){
                            echo '<small class="text-danger">', $validation['tipo-turno'] ,'</small>';
                        }

                    ?>
                </div>
                <div class="col">
                    <!--
                     FECHAS
                    -->
                    <h2>Fecha</h2>
                    <?php
                        $fecha_seleccionada = date("Y-m-d");
                        $clase_fecha = isset($validation['fecha']) ? "form-control is-invalid" : "form-control";
                        
                        if(isset($_POST['fecha'])){
                            $fecha_seleccionada = $_POST['fecha'];
                        }

                        echo form_input([
                            'type' => 'date',
                            'name' => 'fecha',
                            'value' => $fecha_seleccionada,
                            'min' => date("Y-m-d"),
                            'max' => date("Y-m-d", strtotime("+1 Months")),
                            'class' => $clase_fecha,
                        ])
                    ?>

                    <h2>Horario</h2>
                    <!--
                     HORARIOS
                    -->
                    <?php 
                        $clase_horario = isset($validation['horario']) ? "form-check-input me-1 is-invalid" : "form-check-input me-1";
                        $horario_seleccionado = 0;
                        
                        if(isset($_POST['horario'])){
                            $horario_seleccionado = $_POST['horario'];
                            echo $horario_seleccionado;
                        }
                    ?>

                    <div class="list-group">
                        <label class="list-group-item">
                            <input class="<?= $clase_horario ?>" type="radio" name="horario" value="9:00" checked="<?php strcmp($horario_seleccionado, '09:00') == 0 ? true : false ?>">
                            09:00
                        </label>
                        <label class="list-group-item">
                            <input class="<?= $clase_horario ?>" type="radio" name="horario" value="10:00" checked="<?php strcmp($horario_seleccionado, '10:00') == 0 ? true : false ?>">
                            10:00
                        </label>
                        <label class="list-group-item">
                            <input class="<?= $clase_horario ?>" type="radio" name="horario" value="11:00" checked="<?php strcmp($horario_seleccionado, '11:00') == 0 ? true : false ?>">
                            11:00
                        </label>
                    </div>
                </div>
            </div>

            <div class="container p-2">
                <!--
                     MASCOTAS
                -->
                <?php  
                    $clase_mascota = isset($validation['mascota']) ? "form-check-input me-1 is-invalid" : "form-check-input me-1"; 
                    $mascota_seleccionada = 999;

                    if(isset($_POST['mascota'])){
                        $mascota_seleccionada = $_POST['mascota'];
                        echo $mascota_seleccionada;
                    }
                ?>
                <h2>Mascotas</h2>
                <small>Eligue para que mascota es el turno</small>
                <div class="d-flex">
                    <?php foreach($mascotas as $m): ?>
                        <label class="list-group-item px-2">
                                <input class=<?= $clase_mascota ?> type="radio" name="mascota" value="<?= $m['id'] ?>" checked=<?=$mascota_seleccionada === $m['id'] ? 'true' : '   ' ?>>
                                <?= $m['nombre'] ?>
                        </label>
                    <?php endforeach; ?>
                </div>
            </div>

            <input class="btn btn-success" type="submit" value="Pedir turno">
        
        <?php echo form_close(); ?>
    </div>
</div>