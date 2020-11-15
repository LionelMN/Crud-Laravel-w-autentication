<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['usuarios']=User::paginate(2);

        return view('usuarios.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('usuarios.create');
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
            'name' => 'required|string|max:100',
            'password' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'Foto' => 'required|max:10000|mimes:jpeg,png,jpg',

        ];
        $Mensaje=["required"=>'El :attribute es requerido'];

        $this->validate($request,$campos,$Mensaje);
        $datosUsuario=request()->except('_token');

        if($request->hasFile('Foto')){

            $datosUsuario['Foto']=$request->file('Foto')->store('uploads', 'public');
        }

        $datosUsuario['password']=Hash::make(request('password'));

        User::insert($datosUsuario);
        return redirect('usuarios')->with('Mensaje', 'Usuario añadido');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $users
     * @return \Illuminate\Http\Response
     */
    public function show(User $users)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $users
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $usuarios= User::findOrFail($id);

        return view('usuarios.edit', compact('usuarios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $users
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $campos=[
            'name' => 'required|string|max:100',
            'password' => 'required|string|max:100',
            'email' => 'required|email|max:100',

        ];

        if($request->hasFile('Foto')){
            $campos+=['Foto' => 'required|max:10000|mimes:jpeg,png,jpg'];
        }

        $Mensaje=["required"=>'El :attribute es requerido'];

        $this->validate($request,$campos,$Mensaje);

        $datosUsuario=request()->except(['_token','_method']);
        if($request->hasFile('Foto')){
            $usuarios= User::findOrFail($id);

            Storage::delete('public/'.$usuarios->Foto);

            $datosUsuario['Foto']=$request->file('Foto')->store('uploads', 'public');
        }
        $datosUsuario['password']=Hash::make(request('password'));

        User::where('id','=',$id)->update($datosUsuario);

        $usuarios= User::findOrFail($id);
        return redirect('usuarios')->with('Mensaje', 'Usuario editado');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $usuarios= User::findOrFail($id);

        if(Storage::delete('public/'.$usuarios->Foto)){
            User::destroy($id);
        }
        return redirect('usuarios')->with('Mensaje', 'Usuario borrado');;
    }
}
