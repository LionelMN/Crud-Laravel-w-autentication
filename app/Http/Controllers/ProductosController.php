<?php

namespace App\Http\Controllers;

use App\Productos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['productos']=Productos::paginate(2);

        return view('productos.index',$datos);
    }

    public function ver()
    {
        //
        $datos['productos']=Productos::paginate(2);

        return view('productos.ver',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('productos.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $campos=[
            'nombre' => 'required|string|max:100',
            'descripcion' => 'required|string|max:255',
            'precio' => 'required|numeric',
        ];
        $Mensaje=["required"=>'El :attribute es requerido'];

        $this->validate($request,$campos,$Mensaje);
        $datosProducto=request()->except('_token');

        if($request->hasFile('Foto')){

            $datosProducto['Foto']=$request->file('Foto')->store('uploads', 'public');
        }

        Productos::insert($datosProducto);
        return redirect('productos')->with('Mensaje', 'Producto añadido');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function show(Productos $productos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $productos= Productos::findOrFail($id);

        return view('productos.edit', compact('productos'));
    }

    public function producto($id)
    {
        //
        $productos= Productos::findOrFail($id);

        return view('productos.producto', compact('productos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $campos=[
            'nombre' => 'required|string|max:100',
            'descripcion' => 'required|string|max:255',
            'precio' => 'required|numeric',
        ];

        if($request->hasFile('Foto')){
            $campos+=['Foto' => 'required|max:10000|mimes:jpeg,png,jpg'];
        }

        $Mensaje=["required"=>'El :attribute es requerido'];

        $this->validate($request,$campos,$Mensaje);

        $datosProductos=request()->except(['_token','_method']);
        if($request->hasFile('Foto')){
            $productos= Productos::findOrFail($id);

            Storage::delete('public/'.$productos->Foto);

            $datosProductos['Foto']=$request->file('Foto')->store('uploads', 'public');
        }

        Productos::where('id','=',$id)->update($datosProductos);

        $productos= Productos::findOrFail($id);
        return redirect('productos')->with('Mensaje', 'Producto editado');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $productos= Productos::findOrFail($id);

        if(Storage::delete('public/'.$productos->Foto)){
            Productos::destroy($id);
        }
        return redirect('productos')->with('Mensaje', 'Producto borrado');;
    }
}
