@extends('layouts.app', ['pageSlug' => 'controlAcceso'])

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-chart">
            <div class="card-header ">
                <div class="row">
                    <div class="col-sm-6 text-left">
                        <h5 class="card-category">Control de acceso</h5>
                        <h2 class="card-title">Area de registros gatos</h2>
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
        
        <form method="POST" action="{{ route('controlAcceso.store') }}"> 
            @csrf
                <div class="form-row" >
                
                  
                <div class="col-md-7">
                  <div class="form-group form-row col-md-12">
                    <div class="col-4">
                        <label for="inputName">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre del escuincle...">
                    </div>

                    <div class="col-4">
                        <label for="inputPassword4">Apellido Paterno</label>
                        <input type="text" class="form-control" id="apellidoP" name="apellidoP" placeholder="Paterno...">
                    </div>

                    <div class="col-4">
                        <label for="inputPassword4">Apellido Materno</label>
                        <input type="text" class="form-control" id="apellidoM" name="apellidoM" placeholder="Materno...">
                    </div>
                  </div>


                
                  <div class="form-group form-row col-md-12">
                    <div class="col-6">
                        <label for="inputAddress2">Teléfono</label>
                        <input type="text" class="form-control" id="tel" name="tel" placeholder="384 XXX XXXX">
                    </div>

                    <div class="col-6">
                        <label for="inputDireccion">Domicilio</label>
                        <input type="text" class="form-control" id="domicilio" name="domicilio" placeholder="Ejemplo: Juarez #23, Guadalajara, Jalisco">
                    </div>
                  </div>

                  <div class="col-6">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="terms" name="terms" checked>
                        <label class="custom-control-label" for="terms">Acepto terminos y condiciones.</label>
                    </div>
                </div>
                  <br>             

                  <div class="form-group col-md-3" id="radios" hidden>
                    <label for="fullaccess">Accesso completo</label>
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" value="yes"
                        @if (old('full-access')=='yes')
                        checked
                        @endif>
                        <label class="custom-control-label" for="fullaccessyes">Si</label>
                      </div>
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio"  class="custom-control-input" value="no"
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

                <div class="col-md-5">
                  
                    <label for="">Capturar foto</label>
                    <small> (Al tomar la foto usted concede permisos para usos del parque.)</small>
                    
                    <new-component></new-component>

                    <p>Cámara.exe</p>
            
                    <input type="submit" value="Guardar" class="btn btn-primary">
                </div>
              </form>
            </div>
        </div>
      </div>
  
@endsection