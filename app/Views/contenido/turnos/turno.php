<!-- Pedir turno -->
<div>
    <div class="container w-50 p-3">
        <h2 class="text-center">Tomar turno</h2>
        
        <?php
            helper('form');
            
            echo validation_list_errors();

            echo form_open('turno/agregar_turno', ['method' => 'post']);

            echo '<input type="radio" name="tipo-turno" id="baño">';
            echo form_label('baño', 'tipo', ['class' => 'form-label', 'style' => 'margin-left: 0.4rem;']);
            echo '<br>';
            echo '<input type="radio" name="tipo-turno" id="baño">';
            echo form_label('corte-uñas', 'tipo', ['class' => 'form-label', 'style' => 'margin-left: 0.4rem;']);
            echo '<br>';
            echo '<input type="radio" name="tipo-turno" id="baño">';
            echo form_label('corte-pelo', 'tipo', ['class' => 'form-label', 'style' => 'margin-left: 0.4rem;']);
            echo '<br>';

            echo form_submit('Ingresar', 'ingresar', ['class' => 'btn btn-primary']);

            echo form_close();
        ?>
    </div>
</div>