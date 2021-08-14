<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class VipFilter implements FilterInterface{

    public function before(RequestInterface $request, $arguments = null)
    {
        helper('auth');

        if(!in_groups('vip')){
            return redirect()->to('notfound');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        
    }
}