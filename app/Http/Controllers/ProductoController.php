<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $productos = Producto::paginate(5);
        return view('productos/index', compact('productos'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('productos/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    

    public function store(Request $request)
    {
        $data = $request->except('imagen');

        if ($request->hasFile('imagen')) {
            $imagenPath = $request->file('imagen')->storeAs('imagenes_productos', uniqid() . '.' . $request->file('imagen')->extension(), 'public');
            $data['imagen'] = $imagenPath;
        }

        Producto::create($data);

        return redirect('/productos');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $producto)
    {
        $producto = Producto::find($producto);

        if ($producto) {
            $producto->delete();
            return redirect('/productos')->with('success', 'Producto eliminado exitosamente');
        } else {
            return redirect('/productos')->with('error', 'Producto no encontrado');
        }
    }
}
