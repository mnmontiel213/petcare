

<div class="m-auto p-3 rounded-3 border border-dark-subtle" style="background-color: var(--color-secundario)">
    <?php
        helper('form');

        $clase_nombre    = isset($validation['nombre']) ? 'form-control is-invalid' : "form-control";
        $clase_codigo    = isset($validation['codigo']) ? 'form-control is-invalid' : "form-control";
        $clase_marca     = isset($validation['marca']) ? 'form-check-input is-invalid' : "form-check-input";
        $clase_peso      = isset($validation['peso']) ? 'form-control is-invalid' : "form-control";
        $clase_precio    = isset($validation['precio']) ? 'form-control is-invalid' : "form-control";
        $clase_stock     = isset($validation['stock']) ? 'form-control is-invalid' : "form-control";
        $clase_categoria = isset($validation['categoria']) ? 'form-check-input is-invalid' : "form-check-input";
        $clase_mascota   = isset($validation['mascota']) ? 'form-check-input is-invalid' : "form-check-input";
        $clase_imagen    = isset($validation['imagen']) ? 'form-control is-invalid' : "form-control";

        echo form_open_multipart('productos/modificar');

        echo '<div class="row">';
        echo '<div class="col">';

        //NOMBRE
        echo form_label('Nombre', 'nombre', ['class' => 'form-label']);
        echo form_input([
            'name' => 'nombre',
            'id' => 'nombre',
            'value' => $producto['NOMBRE'],
            'class' => $clase_nombre,
            'placeholder' => '',
            'type' => 'text',
            'autocomplete' => 'off',
        ]);
        if(isset($validation['nombre'])){
            echo '<p class="invalid-feedback">', $validation['nombre'] ,'</p>';
        }

        //CODIGO
        echo form_label('Codigo', 'codigo', ['class' => 'form-label']);
        echo form_input([
            'name' => 'codigo',
            'id' => 'codigo',
            'value' => $producto['CODIGO'],
            'class' => $clase_codigo,
            'placeholder' => '',
            'type' => 'text',
            'autocomplete' => 'off',
        ]);
        if(isset($validation['codigo'])){
            echo '<p class="invalid-feedback">', $validation['codigo'] ,'</p>';
        }

        //MARCA
        echo '<h3>Marca</h3>';
        $marca_seleccion = $producto['CATEGORIA_MARCA'];

        foreach($categorias['marcas'] as $m){
            echo form_radio([
                'name' => 'marca',
                'id'   => 'marca',
                'value' => $m['CATEGORIA_ID'],
                'class' => $clase_marca,
                'checked' => $marca_seleccion == $m['CATEGORIA_ID'],
            ]);
            echo form_label($m['VALOR'], '');
            echo '<br>';
        }
        if(isset($validation['marca'])){
            echo '<p class="invalid-feedback">', $validation['marca'] ,'</p>';
        }

        echo '</div>';

        echo '<div class="col">';
        //PESO
        echo form_label('Peso', 'peso', ['class' => 'form-label']);
        echo form_input([
            'name' => 'peso',
            'id' => 'peso',
            'value' => $producto['PESO'],
            'class' => $clase_peso,
            'placeholder' => '',
            'type' => 'number',
            'step' => '0.1',
            'autocomplete' => 'off',
        ]);
        if(isset($validation['peso'])){
            echo '<p class="invalid-feedback">', $validation['peso'] ,'</p>';
        }

        //PRECIO
        echo form_label('Precio', 'precio', ['class' => 'form-label']);
        echo form_input([
            'name' => 'precio',
            'id' => 'precio',
            'value' => $producto['PRECIO'],
            'class' => $clase_precio,
            'placeholder' => '',
            'type' => 'number',
            'step' => '0.1',
            'autocomplete' => 'off',
        ]);
        if(isset($validation['precio'])){
            echo '<p class="invalid-feedback">', $validation['precio'] ,'</p>';
        }

        //STOCK
        echo form_label('Stock', 'stock', ['class' => 'form-label']);
        echo form_input([
            'name' => 'stock',
            'id' => 'stock',
            'value' => $producto['STOCK'],
            'class' => $clase_stock,
            'placeholder' => '',
            'type' => 'number',
            'step' => '1',
            'autocomplete' => 'off',
        ]);
        if(isset($validation['stock'])){
            echo '<p class="invalid-feedback">', $validation['stock'] ,'</p>';
        }

        //CATEGORIA
        echo '<h3>Categoria</h3>';
        $categoria_seleccion = $producto['CATEGORIA_PRODUCTO'];

        foreach($categorias['productos'] as $m){
            echo form_radio([
                'name' => 'categoria',
                'id'   => 'categoria',
                'value' => $m['CATEGORIA_ID'],
                'class' => $clase_categoria,
                'checked' => $categoria_seleccion == $m['CATEGORIA_ID'],
            ]);
            echo form_label($m['VALOR']);        
            echo '<br>';
        }
        if(isset($validation['categoria'])){
            echo '<p class="invalid-feedback">', $validation['categoria'] ,'</p>';
        }

        //MASCOTA
        echo '<h3>Mascota</h3>';
        $mascota_seleccion = $producto['CATEGORIA_MASCOTA'];

        foreach($categorias['mascotas'] as $m){
            echo form_radio([
                'name' => 'mascota',
                'id'   => 'mascota',
                'value' => $m['CATEGORIA_ID'],
                'class' => $clase_mascota,
                'checked' => $mascota_seleccion == $m['CATEGORIA_ID'],
            ]);
            echo form_label($m['VALOR']);        
            echo '<br>';
        }
        if(isset($validation['mascota'])){
            echo '<p class="invalid-feedback">', $validation['mascota'] ,'</p>';
        }

        //IMAGEN
        echo '<h3 class="">Imagen</h3>';
        echo '<input type="file" name="imagen" size="20">  <br>';
        echo '<br>';
        if(isset($validation['imagen'])){
            echo '<p class="invalid-feedback">', $validation['imagen'] ,'</p>';
        }
        echo '</div>';
        echo '</div>';
        echo form_submit('ingresar', 'Ingresar', ['class' => 'btn btn-ingreso']);

        echo '<br>';
        echo form_close();
    ?>
</div>