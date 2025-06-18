
<?php helper('form') ?>

<div>
    <?php 
        foreach($validation as $e){
            echo $e;
            echo '<br>';
        }
    ?>

    <h2>¡Registrar nueva mascota!</h2>
    <div class="container w-25">
        
        <form action="mascota" method="post">

            <?php if(isset($validation['mascota'])): ?>
                <label for="">Nombre pls</label>
                <br>
                <input type="text" name="nombre">
            <?php else: ?>
                <label for="">Nombre</label>
                <br>
                <input type="text" name="nombre">
            <?php endif ?>
            <br>
            <br>
            <label for="">Mascota</label>
            <br>
            
            <?php 
                foreach($razas as $r){
                    echo form_radio('mascota', $r['CATEGORIA_ID']);
                    echo form_label($r['VALOR']);
                    echo '<br>';
                }    
            ?>
            
            <label for="">Imagen</label>
            <input type="file" id="imagen" name="imagen">

            <input type="submit" value="Registrar">
        </form>

    </div>
</div>