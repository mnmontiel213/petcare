<?php helper('form'); ?>

<div class='container p-3'>

<div class='row'>
    <div class='col'>
        <?php if(count($productos) > 0): ?>
        <div class='container py-5'>
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
                               <p class="card-text">Precio final: $<?php echo $p['price']?></p>
                               <p class="card-text">Cantidad: <?php echo $p['qty']?></p>
                               <button type='submit' value='agregar' name='carrito-accion' style='display: contents;'><i class="bi bi-plus-circle" style='font-size: 1.5rem;'></i></button>
                               <button type='submit' value='remover' name='carrito-accion' style='display: contents;'><i class="bi bi-dash-circle" style='font-size: 1.5rem;'></i></button>
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
    </div>
<?php else :?>
        <p>No hay elementos en el carrito</p>
<?php endif; ?>
</div>

</div>
