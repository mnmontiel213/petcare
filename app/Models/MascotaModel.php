<?php 

namespace App\Models;

use CodeIgniter\Model;

class MascotaModel extends Model{
    protected $DBgroup          = 'veterinaria';
    protected $table            = 'consultas';
    protected $primaryKey       = 'MASCOTA_ID';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = ['MASCOTA_ID', 'NOMBRE', 'TIPO_MASCOTA', 'USUARIO_ID'];
}

?>
