@extends('layouts.app', ['pageSlug' => 'roles'])

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-chart">
            <div class="card-header ">
                <div class="row">
                    <div class="col-sm-6 text-left">
                        <h5 class="card-category">Opciones de administrador</h5>
                        <h2 class="card-title">Nuevo rol</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{-- F O R M U L A R I O --}}
<div class="col-12">
    <div class="card">
        <div class="card-body">
          @include('custom.message')
        </div>
        
        <form action="{{ route('roles.store') }}" method="POST"> 
            @csrf


            
                <div class="form-row" >
                
                  
                <div class="col-md-6">
                  <div class="form-group col-md-12">
                    <label for="inputName">Nombre</label>
                    <input 
                          type="text" 
                          class="form-control" 
                          id="nombre" 
                          placeholder="Nombre del rol..." 
                          name="nombre"
                          value="{{old('nombre')}}">
                  </div>
                
                

                
                  <div class="form-group col-md-12">
                    <label for="inputName">Descripción</label>
                    <input 
                          type="text" 
                          class="form-control" 
                          id="descripcion" 
                          placeholder="Descripción del rol..." 
                          name="descripcion"
                          value="{{old('descripcion')}}">
                  </div>
                
                  

                
                  <div class="form-group col-md-12">
                    <label for="inputPassword4">Slug</label>
                    <input 
                    type="text" 
                    class="form-control" 
                    id="slug" 
                    placeholder="Slug..." 
                    name="slug"
                    value="{{old('slug')}}">
                  </div>

                  <div class="form-group col-md-4" id="radios">
                    <label for="fullaccess">Accesso completo</label>
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="fullaccessyes" name="full-access" class="custom-control-input" value="yes"
                        @if (old('full-access')=='yes')
                        checked
                        @endif>
                        <label class="custom-control-label" for="fullaccessyes">Si</label>
                      </div>
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="fullaccessno" name="full-access" class="custom-control-input" value="no"
                        @if (old('full-access')=='no')
                            checked
                        @endif
                        @if (old('full-access')==null)
                            checked
                        @endif>
                        <label class="custom-control-label" for="fullaccessno" checked>No</label>
                      </div>     
                    </div>  
                </div>



                <div class="che col-md-6 col-lg-6 col-sm-12">
                  
                <label for="">Selecciona los permisos</label>
                <small> (Pasa el cursor por encima para ver la descripción de los permisos)</small>
                
                  <ul class="ks-cboxtags">
                    @foreach ($permissions as $permission)
                  <li>
                  <input  type="checkbox" 
                          
                           
                          id="permission_{{$permission->id}}" 
                          value="{{$permission->id}}" 
                          name="permission[]"
                          @if (is_array(old('permission')) && in_array('$permission->id', old('permission')))
                              checked
                          @endif>

                  <label for="permission_{{$permission->id}}" 
                    data-toggle="tooltip" 
                    title="{{$permission->descripcion}}" 
                    >
                    
                  {{$permission->nombre}}
                  
                  </label>
                  @endforeach
                </li>
              </ul>
            
                 
                
                <br>
                <input type="submit" value="Guardar" class="btn btn-primary btn-block">
                <br>
              </form>
  
        </div>
      </div>

@endsection