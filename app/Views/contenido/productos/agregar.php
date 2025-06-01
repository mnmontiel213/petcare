



<form action="registrar_producto" method="POST">
    
    <h2>Ingresar datos del producto</h2>

    <label>Nombre</label>
    <input type="text"></input>

    <br>

    <h3>Marca</h3>
    <label>Marca #1</label><input type="radio" name="marca" value="#"></input><br>
    <label>Marca #2</label><input type="radio" name="marca" value="#"></input><br>
    <label>Marca #3</label><input type="radio" name="marca" value="#"></input><br>

    <label for="">Peso</label>
    <input type="number" name="peso">

    <br>

    <label for="">Precio</label>
    <input type="number">

    <h3>Categoria</h3>
    <label for="">Accesorio</label>
    <input type="radio" name="categoria" value="">
    <label for="">alimento</label>
    <input type="radio" name="categoria" value="">
    <br>

    <label for="">imagen</label>
    <input type="file" id="img" name="img" accept="image/*">
    <input type="submit" value="registrar">
</form>