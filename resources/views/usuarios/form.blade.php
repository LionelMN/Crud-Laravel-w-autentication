<!----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
<div class="form-group">

<label for="name" class="control-label">{{'Nombre'}}</label>

<input type="text" class="form-control {{$errors->has('name')?'is-invalid':''}}" name="name"
 id="name" value="{{ isset($usuarios->name)?$usuarios->name:old('name') }}" />

{!! $errors->first('name', '<div class="invalid-feedback"> :message </div>') !!}
</div>

<!----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
<div class="form-group">

<label for="password" class="control-label">{{'Password'}}</label>

<input type="password" class="form-control {{$errors->has('password')?'is-invalid':''}}" name="password"
 id="password" value="" />

{!! $errors->first('password', '<div class="invalid-feedback"> :message </div>') !!}
</div>

<!----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
<div class="form-group">

<label for="email" class="control-label">{{'Correo'}}</label>

<input type="email" class="form-control {{$errors->has('email')?'is-invalid':''}}" name="email"
 id="email" value="{{ isset($usuarios->email)?$usuarios->email:old('email')}}" />

{!! $errors->first('email', '<div class="invalid-feedback"> :message </div>') !!}
</div>

<!----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
<div class="form-group">

<label for="Foto" class="control-label">{{'Foto'}}</label>

@if(isset($usuarios->Foto))
<br/>
<img src="{{ asset('storage').'/'.$usuarios->Foto}}" alt="" class="img-thumbnail img-fluid" width="100">
<br/>
@endif
<input type="file" class="form-control {{$errors->has('Foto')?'is-invalid':''}}" name="Foto"
 id="Foto" value="{{ isset($usuarios->Foto)?$usuarios->Foto:""}}" />

 {!! $errors->first('Foto', '<div class="invalid-feedback"> :message </div>') !!}
</div>

<!----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
<input type="submit" class="{{$Modo == 'crear' ? 'btn btn-success':'btn btn-warning'}}" value="{{$Modo == 'crear' ? 'Crear':'Editar'}}">

<a  class="btn btn-primary" href="{{ url('usuarios')}}">Volver</a>