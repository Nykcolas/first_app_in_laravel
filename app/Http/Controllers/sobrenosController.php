<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class sobrenosController extends Controller {
    public function __construct()
    {
        $this->middleware('log.acesso');
    }

    public function SobreNos() 
    {
        return view('site/sobrenos');
    }
}
