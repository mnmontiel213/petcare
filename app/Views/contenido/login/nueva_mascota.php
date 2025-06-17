

<div>
    <h2>¡Registrar nueva mascota!</h2>
    <div class="container w-25">
        <form action="">
            <label for="">Nombre</label>
            <br>
            <input type="text">
            
            <br>
            <br>
            <label for="">Mascota</label>
            <?php
                foreach($razas as $r){
                    echo '<br>';
                    echo '<label for="">', $r['VALOR'], '</label>';
                    echo '<input type="radio">';
                }
            ?>
            <br>
            <label for="">Imagen</label>
            <input type="file" id="img" name="img" accept="image/*">
        </form>

    </div>
</div>