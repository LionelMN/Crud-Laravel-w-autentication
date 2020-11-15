@extends('layouts.mantenimiento')
@section('title')
    Añadir producto
@endsection
@section('content')

<div class="container">

    <!--@if (count($errors)>0)
        
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>

    @endif-->

<form action="{{ url('/productos')}}" class="form-horizontal" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}

    @include('productos.form', ['Modo'=>'crear'])

</form>
</div>

@endsection