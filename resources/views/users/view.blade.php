@extends('layouts.app', ['pageSlug' => 'users'])

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-chart">
            <div class="card-header ">
                <div class="row">
                    <div class="col-sm-6 text-left">
                        <h5 class="card-category">Opciones de administrador</h5>
                        <h2 class="card-title">Ver Usuarios</h2>
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
        <form action="#" method="POST"> 
            @csrf @method('PUT')


            
                <div class="form-row" >
                  

                <div class="col-md-6">
                  <div class="form-group col-md-12">
                    <label for="inputName">Nombre</label>
                    <input 
                          type="text" 
                          class="form-control" 
                          id="nombre" 
                          disabled
                          name="nombre"
                          value="{{old('name', $user->name)}}">
                  </div>
                
                

                
                  <div class="form-group col-md-12">
                    <label for="inputName">Email</label>
                    <input 
                          type="text" 
                          class="form-control" 
                          id="email" 
                          placeholder="Correo Electronico.." 
                          name="email"
                          disabled
                          value="{{old('email', $user->email)}}">
                  </div>
                
                  

                
                  <div class="form-group col-md-12">
                    <label for="inputName">Roles</label>
                    <select disabled name="roles" id="roles"  class="form-control form-control-lg">
                      

                      @foreach ($roles as $role)
                        <option value="{{ $role->id }}"
                          
                          @isset($user->roles[0]->nombre)
                              @if ($role->nombre == $user->roles[0]->nombre)
                                  selected
                              @endif
                          @endisset

                        >{{ $role->nombre }}</option>
                  
                        
                      @endforeach
                      
                    </select>
                    
                  </div>

                  
                <br>
               
              </div>
              </div>

              </form>
        </div>
      </div>
</div>
@endsection