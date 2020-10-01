@extends('layouts.app', ['pageSlug' => 'roles'])

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-chart">
            <div class="card-header ">
                <div class="row">
                    <div class="col-sm-6 text-left">
                        <h5 class="card-category">Opciones de administrador</h5>
                        <h2 class="card-title">Editar rol</h2>
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
        <form action="{{ route('roles.update', $role->id) }}" method="POST"> 
            @csrf @method('PUT')


            
                <div class="form-row" >
                  

                <div  class="col-md-6">
                  <div class="form-group col-md-12">
                    <label for="inputName">Nombre</label>
                    <input 
                          type="text" 
                          class="form-control" 
                          id="nombre" 
                          placeholder="Nombre del rol..." 
                          name="nombre"
                          value="{{old('nombre', $role->nombre)}}"
                          readonly>
                  </div>
                
                

                
                  <div class="form-group col-md-12">
                    <label for="inputName">Descripción</label>
                    <input 
                          type="text" 
                          class="form-control" 
                          id="descripcion" 
                          placeholder="Descripción del rol..." 
                          name="descripcion"
                          value="{{old('descripcion', $role->descripcion)}}"
                          readonly>
                  </div>
                
                  

                
                  <div class="form-group col-md-12">
                    <label for="inputPassword4">Slug</label>
                    <input 
                    type="text" 
                    class="form-control" 
                    id="slug" 
                    placeholder="Slug..." 
                    name="slug"
                    value="{{old('slug', $role->slug)}}"
                    readonly>
                  </div>

                  <div class="form-group col-md-4" id="radios">
                    <label for="fullaccess">Accesso completo</label>
                      <div class="custom-control custom-radio custom-control-inline">
                        <input disabled type="radio" id="fullaccessyes" name="full-access" class="custom-control-input" value="yes"
                        @if ($role['full-access']=='yes')
                            checked
                        @elseif (old('full-access')=='yes')
                            checked
                        @endif>
                        <label class="custom-control-label" for="fullaccessyes">Si</label>
                      </div>
                      <div class="custom-control custom-radio custom-control-inline">
                        <input disabled type="radio" id="fullaccessno" name="full-access" class="custom-control-input" value="no"
                        @if ($role['full-access']=='no')
                        checked
                        @elseif (old('full-access')=='no')
                        checked
                        @endif>
                        <label class="custom-control-label" for="fullaccessno" checked>No</label>
                      </div>     
                    </div>  


                </div>

                <div class="form-group col-md-6 ml-auto">
                  <label for="inputPassword4">Seleccione los permisos</label>
                @foreach ($permissions as $permission)
                  <div class="custom-control custom-checkbox">
                  <input  disabled
                          type="checkbox" 
                          class="custom-control-input" 
                          id="permission_{{$permission->id}}" 
                          value="{{$permission->id}}" 
                          name="permission[]"

                            @if (is_array(old('permission')) && in_array("$permission->id", old('permission')))
                              checked

                            @elseif (is_array($permission_role) && in_array("$permission->id", $permission_role))
                              checked
                            @endif>

                  <label class="custom-control-label" for="permission_{{$permission->id}}">
                  {{$permission->id}} 
                  - 
                  {{$permission->nombre}}
                  <em>( {{$permission->descripcion}} )</em>
                  </label>
                  </div> 
                @endforeach
                <br>
                
              </div>
              </div>

                  
                      

                    
                    
               
                
                
              </form>
        </div>
      </div>
</div>
@endsection