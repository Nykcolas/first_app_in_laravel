<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MotivoContato;

class principalController extends Controller {
    public function Principal() {
        $arrOptions = MotivoContato::all();
        return view('site/principal', ["arrOptions"=>$arrOptions]);
    }
}
