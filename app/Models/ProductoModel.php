<?php 

namespace App\Models;

use CodeIgniter\Model;

class ProductoModel extends Model{
    protected $DBgroup          = 'veterinaria';
    protected $table            = 'productos';
    protected $primaryKey       = 'CODIGO';
    protected $useAutoIncrement = false;
    protected $returnType       = 'array';
    protected $allowedFields    = ['CODIGO', 'NOMBRE', 'CATEGORIA_MARCA', 'CATEGORIA_PRODUCTO', 'CATEGORIA_MASCOTA', 'PRECIO', 'PESO', 'IMAGEN'];
}

?>
