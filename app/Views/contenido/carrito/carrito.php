<?php helper('form'); ?>

<form method='post' action='carrito/update'>
     <button type='submit' value='limpiar' name='carrito-accion'>Limpiar</button>
</form>


<div class='container p-3'>

<div class='row'>
    <div class='col'>
        <?php if(count($productos) > 0): ?>
            <?php foreach($productos as $p): ?>
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                          <form method='post' action='carrito/update'>
                              <button type='submit' name='carrito-accion' value='quitar' style='display: contents;'><i class="bi bi-trash" style='font-size: 1.5rem;'></i></button>
                              <img src='<?php echo base_url("assets/img/productos/prod1.png") ?>' class="img-fluid rounded-start" alt="...">
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
                         </form>
                       </div>
                     </div>
                 </div>
<?php endforeach; ?>
    </div>
<?php endif; ?>
</div>

</div>
