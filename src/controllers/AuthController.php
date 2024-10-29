<?php

namespace Fdci\Controllers;

use Fdci\Core\Controller;
use Fdci\Core\Request;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $this->render('register', data: ['name' => $request->get('name')]);
    }
}