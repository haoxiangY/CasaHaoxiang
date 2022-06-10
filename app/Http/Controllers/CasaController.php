<?php


namespace App\Http\Controllers;

use App\Models\Casa;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;

use Illuminate\Support\Facades\Storage;


class CasaController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=Auth::user();
       if($user->name=='haoxiang'){
        $casas = Casa::with("user")->paginate(10);
        }else {
        $casas = $user->casa()->paginate(10);
     }
        return view("casas.index", compact("casas"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $casa = new Casa;
        $title = __("Crear casa");
        $textButton = __("Crear");
        $route = route("casas.store");
        
        return view("casas.create", compact("title", "textButton", "route", "casa"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     
       $this->validate($request, [
            "nombre" => "required|max:140|unique:casas",
            "description" => "nullable|string|min:10",
            "precio" => "nullable|min:1|numeric",
            "espacio" => "nullable|min:1|numeric",
            "imagen"=>"required|image|mimes:jpg,jpeg,png.gif.svg|max:2048"
        ]);
       $imagen=$request->file('imagen')->store('public/img');
       $url=Storage::url($imagen);
       Casa::create(
        array_merge(
            $request->only("nombre", "description","precio","espacio"),
            [
                "imagen" => $url,
                "user_id" => Auth::user()->id
            ]
        )
    );

    return redirect(route("casas.index"))
        ->with("success", __("Casa creado!"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Casa  $casa
     * @return \Illuminate\Http\Response
     */
    public function show(Casa $casa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Casa  $casa
     * @return \Illuminate\Http\Response
     */
    public function edit(Casa $casa)
    {
        $update = true;
        $title = __("Editar casa");
        $textButton = __("Actualizar");
        $route = route("casas.update", ["casa" => $casa]);
        return view("casas.edit", compact("update", "title", "textButton", "route", "casa"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Casa  $casa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Casa $casa)
    {
        $this->validate($request, [
            "nombre" => "required|unique:casas,nombre," . $casa->id,
            "description" => "nullable|string|min:10",
            "precio" => "nullable|min:1|numeric",
            "espacio" => "nullable|min:1|numeric",
            "imagen"=>"required|image|mimes:jpg,jpeg,png.gif.svg|max:2048"
        ]);
        $imagen=$request->file('imagen')->store('public/img');
        $url=Storage::url($imagen);
        $casa->fill(
            array_merge(
                $request->only("nombre", "description","precio","espacio"),
                [
                    "imagen" => $url,
                    "user_id" => Auth::user()->id
                ]
            )
        )->save();
    
        return redirect(route("casas.index"))
            ->with("success", __("Casa actualizada!"));
       
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Casa  $casa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Casa $casa)
    {
        $casa->delete();
        return back()->with("success", __("Casa eliminado!"));
    }
}
