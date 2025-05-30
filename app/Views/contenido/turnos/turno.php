<!-- Pedir turno -->
<div>
    <div class="container w-50 p-3">
        <h2 class="text-center">Tomar turno</h2>
        
        <?php
            helper('form');
            
            echo '<div class="row">';

            echo '<div class="col">';

            echo '<h2>Estetica</h2>';

            echo form_open('turno/agregar_turno', ['method' => 'post']);

            echo '<input type="radio" name="tipo-turno" value="baño">';
            echo form_label('baño', 'tipo', ['class' => 'form-label', 'style' => 'margin-left: 0.4rem;']);
            echo '<br>';
            
            echo '<input type="radio" name="tipo-turno" value="corte-uñas" >';
            echo form_label('corte-uñas', 'tipo', ['class' => 'form-label', 'style' => 'margin-left: 0.4rem;']);
            echo '<br>';
            
            echo '<input type="radio" name="tipo-turno" value="corte-pelo">';
            echo form_label('corte-pelo', 'tipo', ['class' => 'form-label', 'style' => 'margin-left: 0.4rem;']);
            echo '<br>';

            echo '<h2>Salud</h2>';

            echo '<input type="radio" name="tipo-turno" value="castracion">';
            echo form_label('castracion', 'tipo', ['class' => 'form-label', 'style' => 'margin-left: 0.4rem;']);
            echo '<br>';

            echo '<input type="radio" name="tipo-turno" value="vacunacion">';
            echo form_label('vacunacion', 'tipo', ['class' => 'form-label', 'style' => 'margin-left: 0.4rem;']);
            echo '<br>';

            echo '<input type="radio" name="tipo-turno" value="dentista">';
            echo form_label('dentista', 'tipo', ['class' => 'form-label', 'style' => 'margin-left: 0.4rem;']);
            echo '<br>';

            echo '<h2>Otro</h2>';
            
            echo '<input type="radio" name="tipo-turno" value="radiografia">';
            echo form_label('radiografia', 'tipo', ['class' => 'form-label', 'style' => 'margin-left: 0.4rem;']);
            echo '<br>';

            echo '<input type="radio" name="tipo-turno" value="consulta">';
            echo form_label('consulta general', 'tipo', ['class' => 'form-label', 'style' => 'margin-left: 0.4rem;']);
            echo '<br>';
            
            echo '</div>';

            echo '<div class="col">';

            echo '<input type="date" name="date">';

            echo '</div>';

            echo form_submit('', 'sacar turno', ['class' => 'btn btn-primary']);

            echo form_close();
            echo '</div>'
        ?>
    </div>
</div>