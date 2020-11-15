@extends('layouts.mantenimiento')
@section('title')
    Productos
@endsection
@section('content')

<div class="container">

    @if (Session::has('Mensaje'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('Mensaje') }}    
        </div>
    @endif

<a href="{{ url('productos/create')}}" class="btn btn-success">Añadir producto</a>
<br/>
<br/>

<table class="table table-light table-hover">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Foto</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Departamento</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($productos as $producto)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>
                    <img src="{{ asset('storage').'/'.$producto->Foto}}" alt="" class="img-thumbnail img-fluid" width="100">
                </td>
                <td>{{$producto->nombre}}</td>
                <td>{{$producto->descripcion}}</td>
                <td>{{$producto->precio_anterior}}€</td>
                <td>{{$producto->category_id}}</td>
                <td>
                    
                    <a class="btn btn-warning" href={{url('/productos/'.$producto->id.'/edit')}}>Editar</a>
                    

                    <form method="post" action="{{ url('/productos/'.$producto->id)}}" style="display:inline">
                        {{csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Quiere borrar este producto?');">Borrar</button>
                    </form>
                </td>
            </tr>            
        @endforeach
    </tbody>
</table>

{{ $productos->links() }}
</div>

@endsection