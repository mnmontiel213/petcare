
<div class="w-25">
<?php
     helper('form');
    if($success){
        echo 'Producto agregado';
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

<?php echo form_open_multipart("productos/registrar_producto")?>
    <h2>Ingresar datos del producto</h2>

    <label>Nombre</label>
    <input type="text" name="nombre"></input>
    <br>

    <label>Codigo</label>
    <input type="text" name="codigo"></input>
    <br>
     
    <h3>Marca</h3>

    <?php foreach($categorias['marcas'] as $m){
        echo form_radio('marca', $m['CATEGORIA_ID']);
        echo form_label($m['VALOR']);
        echo '<br>';
    }    
    ?>

    <label for="">Peso</label>
    <input type="number" name="peso">
    <br>
     
    <label for="">Precio</label>
    <input type="number" name="precio">

    <h3>Categoria</h3>
    <?php foreach($categorias['productos'] as $m){
        echo form_radio('categoria', $m['CATEGORIA_ID']);
        echo form_label($m['VALOR']);        
        echo '<br>';
    }    
    ?>
    
    <h3>Mascota</h3>
    <?php foreach($categorias['mascotas'] as $m){
        echo form_radio('mascota', $m['CATEGORIA_ID']);
        echo form_label($m['VALOR']);
        echo '<br>';
    }    
    ?>

    <br>
    <label for="">imagen</label>
    <br>
    <input type="file" name="imagen" size="20">
    <br>
    <br>    
    <input type="submit" value="registrar">
<?php form_close(); ?>
