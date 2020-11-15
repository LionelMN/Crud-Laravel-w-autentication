@extends('layouts.mantenimiento')
@section('title')
    Editar usuarios
@endsection

@section('content')

<div class="container">

<form action="{{ url('/usuarios/'.$usuarios->id)}}" method="post" enctype="multipart/form-data">
{{csrf_field()}}
{{method_field('PATCH')}}

    @include('usuarios.form', ['Modo'=>'editar'])
   
</form>
</div>

@endsection