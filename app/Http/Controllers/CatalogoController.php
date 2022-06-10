<?php

namespace App\Http\Controllers;

use App\Models\Casa;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;

use Illuminate\Support\Facades\Storage;

class CatalogoController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }

    public function index()
    {
        $user=Auth::user();
       if($user->name=='haoxiang'){
        $casas = Casa::with("user")->paginate(10);
        }else {
        $casas = $user->casa()->paginate(10);
     }
        return view("catalogo.index", compact("casas"));
    }
}
