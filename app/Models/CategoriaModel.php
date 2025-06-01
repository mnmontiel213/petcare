<?php 

namespace App\Models;

use CodeIgniter\Model;

class CategoriaModel extends Model{
    protected $DBgroup          = 'veterinaria';
    protected $table            = 'categoria';
    protected $primaryKey       = 'REGISTRO_ID';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = ['REGISTRO_ID', 'VALOR', 'TIPO'];
}

?>