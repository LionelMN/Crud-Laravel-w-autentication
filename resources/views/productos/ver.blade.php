@extends('layouts.app')

@section('content')

<div class="container">

<table class="table table-light table-hover">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Foto</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Ver más</th>
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
                <td>{{$producto->precio}}</td>
                <td>
                    
                    <a class="btn btn-info" href='#'>Añadir al carrito</a>
                    
                </td>
            </tr>            
        @endforeach
    </tbody>
</table>

{{ $productos->links() }}
</div>

@endsection