<div style="height: 50%;">
    <!-- <p>aca podriamos poner un carrousel o algo asi</p> -->
</div>

<?php
     helper('form');
     ?>
     
<div class="row">
    <div class="col-3">
        <form action=<?php echo base_url("productos")?> >
            <div>
                <h4>Mascotas</h4>
                <ul class="list-group">
                    <?php foreach($categorias['mascotas'] as $mascota){
                        echo'<li class="list-group-item">';
                        echo form_radio('eleccion-mascota', $mascota);
                        echo form_label(strtolower($mascota) , '');
                        echo '</li>';
                     }?>
                </ul>
            </div>
            
            <div>
                <h4>Productos</h4>
                <ul class="list-group">
                    <?php foreach($categorias['productos'] as $producto){
                        echo'<li class="list-group-item">';
                        echo form_radio('eleccion-producto', $producto);
                        echo form_label(strtolower($producto), '');
                        echo '</li>';
                     }?>
                </ul>
            </div>
            
            <input type="submit" value="Filtrar" class="btn btn-primary">
        </form>
    </div>

    <div class="col">
        <?php foreach($productos as $producto): ?>
            <div class="card w-25" >

                <!-- IMAGEN -->
                <?php if($producto->IMAGEN == null): ?>
                   <img src="<?php echo base_url('assets/img/productos/prod1.png') ?> " class="card-img-center m-auto" alt="...">
                <?php else: ?>
                  <img src="<?php echo base_url('assets/uploads/'); echo $producto->IMAGEN ?>" class="card-img-center m-auto" alt="...">
                <?php endif; ?>

                <!-- TARJETA -->
                <div class="card-body">
                    <h5 class="card-title"><?php echo $producto->NOMBRE ?></h5>
                    <div class="card-text">
                        <p class="card-subtitle mb-2 text-muted>">$<?php echo $producto->PRECIO ?></p>
                        <p class="card-subtitle mb-2 text-muted">Peso: <?php echo $producto->PESO ?>kg</p>
                    </div>
     
                     <?php
                         if(session('LOGGED')){
                             echo form_open('carrito/agregar');
                             echo form_hidden('codigo', $producto->CODIGO);
                             echo form_hidden('nombre', $producto->NOMBRE);
                             echo form_hidden('precio', $producto->PRECIO);
                             echo form_submit('Comprar', 'Agregar al carrito', 'class= "btn btn-primary"');
                             echo form_close();
                         }else{
                             echo '<a href="login/ingresar" class="btn btn-primary"> Ingresar </a>';
                         }
                     ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
