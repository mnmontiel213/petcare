
<div class="m-auto w-25">
<?php
     helper('form');
    if($success){
        echo '<div>';
        echo 'Producto agregado';
        echo '</div>';
    }
    
if($validation){
    
    foreach($validation as $val_error){
        echo '<div class="alert alert-danger" role="alert">';
        echo $val_error;
        echo '</div>';
    }
}
?>
</div>

<div class="m-auto p-5 rounded-3 border border-dark-subtle" style="background-color: var(--color-secundario)">
    <?php echo form_open_multipart("productos/registrar_producto")?>
        <h2>Ingresar datos del producto</h2>

        <label class="form-check-label">Nombre</label>
        <input class="form-control w-50" type="text" name="nombre"></input>

        <label class="form-check-label">Codigo</label>
        <input class="form-control w-50" type="text" name="codigo"></input>
        
        <h3>Marca</h3>
        <?php foreach($categorias['marcas'] as $m){
            echo form_radio('marca', $m['CATEGORIA_ID'], false, 'class="form-check-input"');
            echo form_label($m['VALOR'], '', ['class="form-check-label"']);
            echo '<br>';
        }    
        ?>

        <label class="form-check-label" for="">Peso</label>
        <input class="form-control w-50" type="number" name="peso" step="0.1">
        
        <label class="form-check-label" for="">Precio</label>
        <input class="form-control w-50" type="number" name="precio" step="0.1">

        <label class="form-check-label" for="">Stock</label>
        <input class="form-control w-50" type="number" name="stock">

        <h3>Categoria</h3>
        <?php foreach($categorias['productos'] as $m){
            echo form_radio('categoria', $m['CATEGORIA_ID'], false, 'class="form-check-input"');
            echo form_label($m['VALOR']);        
            echo '<br>';
        }    
        ?>
        
        <h3>Mascota</h3>
        <?php foreach($categorias['mascotas'] as $m){
            echo form_radio('mascota', $m['CATEGORIA_ID'], false, 'class="form-check-input"');
            echo form_label($m['VALOR']);
            echo '<br>';
        }    
        ?>

        <label class="form-check-label" for="">imagen</label> <br>
        <input type="file" name="imagen" size="20">  <br>
        <input class="btn btn-primary" type="submit" value="registrar">
    <?php form_close(); ?>
</div>