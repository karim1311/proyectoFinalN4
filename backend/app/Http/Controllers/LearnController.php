<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class LearnController extends Controller
{
    public function __invoke(Request $request)
    {
        auth()->loginUsingId(1);
        Usuario::create([
            ''
        ]);
    }
}
