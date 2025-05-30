<!-- Pedir turno -->
<?php helper('form')?>

<div>
    <div class="container w-50 p-3">
        <h2 class="text-center">Tomar turno</h2>
        <form action="turno/agregar_turno" method="post">
            <div class="row">
                <div class="col">
                    <h2>Estetica</h2>

                    <div class="list-group">
                        <label class="list-group-item">
                            <input class="form-check-input me-1" type="radio" name="tipo-turno" value="1">
                            Baño
                        </label>
                        <label class="list-group-item">
                            <input class="form-check-input me-1" type="radio" name="tipo-turno" value="2">
                            Corte de uñas
                        </label>
                        <label class="list-group-item">
                            <input class="form-check-input me-1" type="radio" name="tipo-turno" value="3">
                            Corte de pelo
                        </label>
                    </div>

                    <h2>Salud</h2>

                    <div class="list-group">
                        <label class="list-group-item">
                            <input class="form-check-input me-1" type="radio" name="tipo-turno" value="4">
                            Castracion
                        </label>
                        <label class="list-group-item">
                            <input class="form-check-input me-1" type="radio" name="tipo-turno" value="5">
                            Vacunacion
                        </label>
                        <label class="list-group-item">
                            <input class="form-check-input me-1" type="radio" name="tipo-turno" value="6">
                            Dentista
                        </label>
                    </div>
                    
                    <h2>Otro</h2>

                    <div class="list-group">
                        <label class="list-group-item">
                            <input class="form-check-input me-1" type="radio" name="tipo-turno" value="7">
                            Radiografia
                        </label>
                        <label class="list-group-item">
                            <input class="form-check-input me-1" type="radio" name="tipo-turno" value="8">
                            Consulta general
                        </label>
                    </div>
                </div>
                <div class="col">
                    <h2>Fecha</h2>
                    <input type="date" name="fecha" value="<?php echo date("Y-m-d")?>" 
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
            <input type="submit" value="Pedir turno">
        </form>
    </div>
</div>