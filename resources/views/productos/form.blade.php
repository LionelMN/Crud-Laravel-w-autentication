<!----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
<div class="form-group">

    <label for="nombre" class="control-label">{{'Nombre'}}</label>
    
    <input type="text" class="form-control {{$errors->has('nombre')?'is-invalid':''}}" name="nombre"
     id="nombre" value="{{ isset($productos->nombre)?$productos->nombre:old('nombre') }}" />
    
    {!! $errors->first('nombre', '<div class="invalid-feedback"> :message </div>') !!}
    </div>
    
    <!----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
    <div class="form-group">
    
    <label for="descripcion" class="control-label">{{'Descripcion'}}</label>
    
    <input type="text" class="form-control {{$errors->has('descripcion')?'is-invalid':''}}" name="descripcion"
     id="descripcion" value="{{ isset($productos->descripcion)?$productos->descripcion:old('descripcion') }}" />
    
    {!! $errors->first('descripcion', '<div class="invalid-feedback"> :message </div>') !!}
    </div>
    
    <!----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
    <div class="form-group">
    
        <label for="precio_anterior" class="control-label">{{'Precio Anterior'}}</label>
        
        <input type="text" class="form-control {{$errors->has('precio_anterior')?'is-invalid':''}}" name="precio_anterior"
         id="precio_anterior" value="{{ isset($productos->precio_anterior)?$productos->precio_anterior:old('precio_anterior') }}" />
        
        {!! $errors->first('precio', '<div class="invalid-feedback"> :message </div>') !!}
        </div>
        
    <!----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->

    <!----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
    <div class="form-group">
    
        <label for="category_id" class="control-label">{{'Categoría'}}</label>
        
        <input type="text" class="form-control {{$errors->has('category_id')?'is-invalid':''}}" name="category_id"
         id="category_id" value="{{ isset($productos->category_id)?$productos->category_id:old('category_id') }}" />
        
        {!! $errors->first('category_id', '<div class="invalid-feedback"> :message </div>') !!}
        </div>
        
    <!----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
    <div class="form-group">
    
    <label for="Foto" class="control-label">{{'Foto'}}</label>
    
    @if(isset($productos->Foto))
    <br/>
    <img src="{{ asset('storage').'/'.$productos->Foto}}" alt="" class="img-thumbnail img-fluid" width="100">
    <br/>
    @endif
    <input type="file" class="form-control {{$errors->has('Foto')?'is-invalid':''}}" name="Foto"
     id="Foto" value="{{ isset($productos->Foto)?$productos->Foto:""}}" />
    
     {!! $errors->first('Foto', '<div class="invalid-feedback"> :message </div>') !!}
    </div>
    
    <!----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
    <input type="submit" class="{{$Modo == 'crear' ? 'btn btn-success':'btn btn-warning'}}" value="{{$Modo == 'crear' ? 'Crear':'Editar'}}">
    
    <a  class="btn btn-primary" href="{{ url('productos')}}">Volver</a>