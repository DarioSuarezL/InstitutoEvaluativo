<?php

namespace App\Http\Controllers;

use App\Models\Tipo;
use Illuminate\Http\Request;

class TipoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tipos = Tipo::all();
        return inertia('Tipos/Index', [
            'tipos' => $tipos
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Tipo::create([
            'nombre' => $request->nombre
        ]);
        return redirect()->route('tipos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Tipo::destroy($id);
        return redirect()->route('tipos.index');
    }
}
