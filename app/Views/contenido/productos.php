<div>

    <?php foreach($productos as $producto): ?>

        <div class="card w-25" >
            <img src=" <?php echo base_url('assets/img/productos/prod1.png') ?> " class="card-img-center m-auto" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?php echo $producto->NOMBRE ?></h5>
                <div class="card-text">
                    <p class="card-subtitle mb-2 text-muted>">$<?php echo $producto->PRECIO ?></p>
                    <p class="card-subtitle mb-2 text-muted">Peso: <?php echo $producto->PESO ?>kg</p>
                </div>
                <a href="#" class="btn btn-primary">Agregar al carrito</a>
            </div>
        </div>


    <?php endforeach; ?>

</div>