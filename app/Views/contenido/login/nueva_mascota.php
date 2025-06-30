
<?php helper('form') ?>

<div class="container m-auto p-5 rounded-3 border border-dark-subtle" style="font-family: 'Montserrat'; background-color: var(--color-primario);">
    <div class="container w-50">
    <h2>¡Registrar nueva mascota!</h2>  
        
        <?php 
            echo form_open('registrar/mascota');

            $clase_nombre  = isset($validation['nombre']) ? 'form-control is-invalid' : "form-control";
            $clase_mascota   = isset($validation['mascota']) ? 'form-check-input is-invalid' : "form-check-input";

            //INPUT NOMBRE
            echo form_label('Nombre', 'nombre', ['class' => 'form-label']);
            echo form_input([
                'name' => 'nombre',
                'id' => 'nombre',
                'value' => set_value('nombre'),
                'class' => $clase_nombre,
                'placeholder' => 'Firulais',
                'type' => 'text',
                'autocomplete' => 'off',
            ]);
            if(isset($validation['nombre'])){
                echo '<p class="invalid-feedback">', $validation['nombre'] ,'</p>';
            }
        
            //INPUT TIPO MASCOTA
            echo form_label('Mascota', 'mascota', ['class' => 'form-label']);

            $seleccion_mascota = -1;
            if(isset($_POST['mascota'])){
                $seleccion_mascota = $_POST['mascota'];
            }

            foreach($razas as $r){
                echo '<div>';
                echo form_radio([
                    'name' => 'mascota',
                    'id'   => 'mascota',
                    'value' => $r['CATEGORIA_ID'],
                    'class' => $clase_mascota,
                    'checked' => $seleccion_mascota == $r['CATEGORIA_ID'],
                ]);
                echo form_label($r['VALOR'], '', ["class='form-label'"]);
                echo '</div>';
            } 
            if(isset($validation['mascota'])){
                echo '<p class="invalid-feedback">', $validation['mascota'] ,'</p>';
            }
        
            echo form_submit('Registrar', 'Registrar', 'class="btn btn-primary my-3"');

            echo form_close();

        ?>
    </div>
</div>