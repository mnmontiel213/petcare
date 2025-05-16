<div>

    <?php foreach($productos as $producto): ?>

        <?php echo $producto->nombre ?>
        <?php echo $producto->precio ?>
        <?php echo $producto->peso?>

    <?php endforeach; ?>

</div>