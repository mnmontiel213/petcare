<?php 

namespace App\Models;

use CodeIgniter\Model;

class VentainfoModel extends Model{
    protected $DBgroup          = 'veterinaria';
    protected $table            = 'venta_info';
    protected $primaryKey       = 'venta_producto_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = ['VENTA_PRODUCTO_ID', 'VENTA_ID', 'PRODUCTO_ID', 'CANTIDAD', 'PRECIO'];
}

?>
