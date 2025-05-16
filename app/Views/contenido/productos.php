<div>

    <?php foreach($productos as $producto): ?>

        <?php echo $producto->NOMBRE ?>
        <?php echo $producto->PRECIO ?>
        <?php echo $producto->PESO ?>

    <?php endforeach; ?>

</div>