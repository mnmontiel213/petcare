<?php 

namespace App\Models;

use CodeIgniter\Model;

class ServiciosModel extends Model{
    protected $DBgroup          = 'veterinaria';
    protected $table            = 'servicios';
    protected $primaryKey       = 'SERVICIO_ID';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = ['REGISTRO_ID', 'TIPO'];
}

?>