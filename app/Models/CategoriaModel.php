<?php 

namespace App\Models;

use CodeIgniter\Model;

class CategoriaModel extends Model{
    protected $DBgroup          = 'veterinaria';
    protected $table            = 'categoria';
    protected $primaryKey       = 'CATEGORIA_ID';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = ['CATEGORIA_ID', 'VALOR', 'TIPO'];
}

?>
