@extends('layouts.mantenimiento')
@section('title')
    Usuarios
@endsection
@section('content')

<div class="container">

    @if (Session::has('Mensaje'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('Mensaje') }}    
        </div>
    @endif

<a href="{{ url('usuarios/create')}}" class="btn btn-success">Añadir usuario</a>
<br/>
<br/>

<table class="table table-light table-hover">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Foto</th>
            <th>Nombre</th>
            <th>Password</th>
            <th>Correo</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($usuarios as $usuario)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>
                    <img src="{{ asset('storage').'/'.$usuario->Foto}}" alt="" class="img-thumbnail img-fluid" width="100">
                </td>
                <td>{{$usuario->name}}</td>
                <td>{{$usuario->password}}</td>
                <td>{{$usuario->email}}</td>
                <td>
                    
                    <a class="btn btn-warning" href={{url('/usuarios/'.$usuario->id.'/edit')}}>Editar</a>
                    

                    <form method="post" action="{{ url('/usuarios/'.$usuario->id)}}" style="display:inline">
                        {{csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Quiere borrar este usuario?');">Borrar</button>
                    </form>
                </td>
            </tr>            
        @endforeach
    </tbody>
</table>

{{ $usuarios->links() }}
<a  class="btn btn-primary" href="{{ url('send-mail/'.$usuario->email)}}">mail</a>
</div>

@endsection