<?php

namespace Fdci\Controllers;

use Fdci\Core\Controller;
use Fdci\Core\Request;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        $view_data = [];
        return $this->render('contact', $view_data);
    }
}