<div style="height: 50%;">
    <p>aca podriamos poner un carrousel o algo asi</p>
</div>

<div class="row">
    <div class="col-3">
        <form action=<?php echo base_url("productos")?> >
            <div>
                <h4>Mascotas</h4>
                <ul class="list-group">
                    <li class="list-group-item">
                        <input class="form-check-input me-1" type="radio" name="eleccion-mascota" value="perro" id="radio-perro">
                        <label class="form-check-label" for="firstRadio">Perro</label>
                    </li>
                    <li class="list-group-item">
                        <input class="form-check-input me-1" type="radio" name="eleccion-mascota" value="gato" id="radio-gato">
                        <label class="form-check-label" for="secondRadio">gato</label>
                    </li>
                </ul>
            </div>
            
            <div>
                <h4>Productos</h4>
                <ul class="list-group">
                    <li class="list-group-item">
                        <input class="form-check-input me-1" type="radio" name="eleccion-producto" value="alimento" id="radio-alimento">
                        <label class="form-check-label" for="firstRadio">Alimento</label>
                    </li>
                    <li class="list-group-item">
                        <input class="form-check-input me-1" type="radio" name="eleccion-producto" value="accesorio" id="radio-producto">
                        <label class="form-check-label" for="secondRadio">Accesorio</label>
                    </li>
                </ul>
            </div>
            
            <input type="submit" value="Filtrar" class="btn btn-primary">
        </form>
    </div>

    <div class="col">
        <?php foreach($productos as $producto): ?>
            <div class="card w-25" >
                <?php if($producto->IMAGEN == null): ?>
                   <img src="<?php echo base_url('assets/img/productos/prod1.png') ?> " class="card-img-center m-auto" alt="...">
                <?php else: ?>
                  <img src="<?php echo base_url('assets/uploads/'); echo $producto->IMAGEN ?>" class="card-img-center m-auto" alt="...">
                <?php endif; ?>
     
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
</div>
