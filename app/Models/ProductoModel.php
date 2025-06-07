<?php 

namespace App\Models;

use CodeIgniter\Model;

class ProductoModel extends Model{
    protected $DBgroup          = 'veterinaria';
    protected $table            = 'productos';
    protected $primaryKey       = 'CODIGO';
    protected $useAutoIncrement = false;
    protected $returnType       = 'object';
    protected $allowedFields    = ['CODIGO', 'NOMBRE', 'MARCA', 'PRECIO', 'PESO', 'IMAGEN'];
}

?>
