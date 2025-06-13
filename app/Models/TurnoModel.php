<?php 

namespace App\Models;

use CodeIgniter\Model;

class TurnoModel extends Model{
    protected $DBgroup          = 'veterinaria';
    protected $table            = 'turnos';
    protected $primaryKey       = 'TURNO_ID';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = ['TURNO_ID', 'USUARIO_ID', 'FECHA', 'HORARIO', 'CATEGORIA_TURNO'];
}

?>