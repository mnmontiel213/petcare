<?php 

namespace App\Models;

use CodeIgniter\Model;

class VentaModel extends Model{
    protected $DBgroup          = 'veterinaria';
    protected $table            = 'ventas';
    protected $primaryKey       = 'venta_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = ['VENTA_ID', 'USUARIO_ID', 'FECHA', 'TOTAL'];
}

?>
