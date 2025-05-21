<?php 

namespace App\Models;

use CodeIgniter\Model;

class ConsultaModel extends Model{
    protected $DBgroup          = 'veterinaria';
    protected $table            = 'consultas';
    protected $primaryKey       = 'CONSULTA_ID';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $allowedFields    = ['CONSULTA_ID', 'TITULO', 'CORREO', 'CONTENIDO'];
}

?>