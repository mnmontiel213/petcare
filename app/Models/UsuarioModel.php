<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model{
    protected $DBgroup          = 'veterinaria';
    protected $table            = 'usuarios';
    protected $primaryKey       = 'USUARIO_ID';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = ['USUARIO_ID', 'CBU', 'NOMBRE', 'APELLIDO', 'CORREO', 'CONTRASEÑA', 'DIRECCION', 'ES_MAYORISTA'];
}

?>