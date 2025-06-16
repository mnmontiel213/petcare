<?php 

namespace App\Models;

use CodeIgniter\Model;

class ServicioModel extends Model{
    protected $DBgroup          = 'veterinaria';
    protected $table            = 'servicios';
    protected $primaryKey       = 'SERVICIO_ID';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = ['SERVICIO_ID', 'NOMBRE', 'CATEGORIA_SERVICIO', 'DESCRIPCION'];
}
?>
