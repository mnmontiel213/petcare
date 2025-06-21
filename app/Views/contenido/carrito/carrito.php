<?php helper('form'); ?>


<?php if($compra_finalizada): ?>
    <div class="p-5">
        <p class="text-success">La compra se realizo con exito!</p>
    </div>
<?php endif;?>

<div class='container p-3'>
    <div class='row'>
        <!-- COLUMNA DE PRODUCTOS -->
        <div class='col py-5'>
            <?php if(count($productos) > 0): ?>
                <div class="py-2">
                    <form method='post' action='carrito/update'>
                        <button type='submit' value='limpiar' name='carrito-accion' class='btn btn-primary'>Limpiar</button>
                    </form>            
                </div>
                
                <?php foreach($productos as $p): ?>
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                            <form method='post' action='carrito/update'>
                                <button type='submit' name='carrito-accion' value='quitar' style='display: contents;'><i class="bi bi-trash" style='font-size: 1.5rem;'></i></button>
                                <?php if(isset($p['imagen']) != null) : ?>
                                    <img src= '<?php echo base_url("assets/uploads/$p[imagen]"); ?>' class="img-fluid rounded-start">
                                <?php else: ?>
                                    <img src='<?php echo base_url("assets/img/productos/prod1.png") ?>' class="img-fluid rounded-start" alt="...">
                                <?php endif; ?>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $p['name']?></h5>
                                    <p class="card-text">Precio: $<?php echo $p['price']?></p>
                                    <p class="card-text">Cantidad: <?php echo $p['qty']?></p>

                                    <a href="<?php echo base_url('productos');?>" class="btn btn-primary">Seguir comprando</a>
                                </div>
                                <?php echo form_hidden('rowid', $p['rowid']) ?>
                                <?php echo form_hidden('name', $p['name']) ?>
                                <?php echo form_hidden('codigo', $p['codigo']) ?>
                                <?php echo form_hidden('price', (string)$p['price']) ?>
                                <?php echo form_hidden('qty', number_format($p['qty'], 0, '.', '.')) ?>
                                <?php if(isset($p['imagen'])) : ?>
                                <?php echo form_hidden('imagen', $p['imagen']); ?>
                                <?php endif; ?>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else :?>
                <div class="alert alert-info">
                    <p>No hay elementos en el carrito</p>
                </div>
            <?php endif; ?>
        </div>
        
        <!-- COLUMNA DE PAGO -->
        <div class="col py-5">
            <?php if(count($productos) > 0): ?>
                <form action="carrito/pagar" method="post">
                    <div class="py-5">
                        <h2>Total: $<?= $total ?></h2>
                        <div class="py-3">
                            <?php echo form_hidden('precio', (string)$total) ?>
                            <input type="submit" class="btn btn-primary" value="Fianlizar compra">
                        </div>
                    </div>
                </form>
            <?php endif; ?>
        </div>
    </div>
</div>
