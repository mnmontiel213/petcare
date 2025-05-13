<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_Usuario extends Model{
    protected $table            = 'usuarios';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = ['ID', 'NOMBRE', 'APELLIDO', 'CORREO', 'CONTRASEÑA', 'CBU', 'FECHA_NACIMIENTO', 'DNI', 'DIRECCION', 'ES_MAYORISTA'];
}

?>