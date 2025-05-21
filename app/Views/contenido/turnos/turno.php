<!-- Pedir turno -->
<div>
    <div class="container w-50 p-3">
        <h2 class="text-center">Ingresar a tu cuenta PetCare</h2>
        
        <?php
            helper('form');
          
            echo form_close();
        ?>

        <div>
            <h2>Estetica</h2>
            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                <input type="radio" class="btn-check" name="btnradio" id="corte-pelo" autocomplete="off">
                <label class="btn btn-outline-primary" for="corte-pelo">Corte de pelo</label>

                <input type="radio" class="btn-check" name="btnradio" id="corte-uñas" autocomplete="off">
                <label class="btn btn-outline-primary" for="corte-uñas">Corte de uñas</label>

                <input type="radio" class="btn-check" name="btnradio" id="baño" autocomplete="off">
                <label class="btn btn-outline-primary" for="baño">Baño</label>
            </div>
        </div>

        <div>
            <h2>Salud</h2>
            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                <input type="radio" class="btn-check" name="btnradio" id="castracion" autocomplete="off">
                <label class="btn btn-outline-primary" for="castracion">Castraciones</label>

                <input type="radio" class="btn-check" name="btnradio" id="revision" autocomplete="off">
                <label class="btn btn-outline-primary" for="revision">Revisiones</label>

                <input type="radio" class="btn-check" name="btnradio" id="emergencias" autocomplete="off">
                <label class="btn btn-outline-primary" for="emergencias">Emergencias</label>
            </div>
        </div>

        <div>
            <h2>Otro</h2>
            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                <input type="radio" class="btn-check" name="btnradio" id="radiografia" autocomplete="off">
                <label class="btn btn-outline-primary" for="radiografia">Radiografia</label>

                <input type="radio" class="btn-check" name="btnradio" id="dentista" autocomplete="off">
                <label class="btn btn-outline-primary" for="dentista">Dentista</label>

                <input type="radio" class="btn-check" name="btnradio" id="vacunacion" autocomplete="off">
                <label class="btn btn-outline-primary" for="vacunacion">Vacunacion</label>
                <input type="radio" class="btn-check" name="btnradio" id="desparaticaciones" autocomplete="off">
                <label class="btn btn-outline-primary" for="desparaticaciones">Desparacitacion</label>
            </div>
        </div>

        <!--
        Podriamos acceder a los horarios disponibles desde la base de datos, y mostrar los horarios dinamicamente
        -->
        <div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="radioDefault" id="radioDefault1">
                <label class="form-check-label" for="radioDefault1">
                    9:00
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="radioDefault" id="radioDefault2">
                <label class="form-check-label" for="radioDefault2">
                10:00
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="radioDisabled" id="radioDisabled" disabled>
                <label class="form-check-label" for="radioDisabled">
                    11:00
                </label>
            </div>
            <!-- Falta ingreso de fecha -->
        </div>
    </div>

    
</div>