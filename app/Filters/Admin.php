<?php
namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class Admin implements FilterInterface{

    public function before(RequestInterface $request, $arguments = null){
        if(!session()->get('LOGGED') || session()->get('USUARIO_ID') != 1){
            return redirect()->to('/login/ingresar');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null){

    }

}
