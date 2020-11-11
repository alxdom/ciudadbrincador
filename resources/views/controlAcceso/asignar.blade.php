@extends('layouts.app', ['pageSlug' => 'asignar'])

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card card-chart">
                <div class="card-header ">
                    <div class="row">
                        <div class="col-sm-6 text-left">
                            <h5 class="card-category">Control de acceso</h5>
                            <h2 class="card-title">Selección de pulsera</h2>
                        </div>
                    </div>
                    @include('custom.message')
                </div>
            </div>
        </div>
{{-- F O R M U L A R I O --}}
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('accesos.asignarStore') }}" method="post">
                  @csrf @method('POST')
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="inputName">Usuario</label>
                    <Select class="form-control form-control-lg" name="usuario" id="usuario">
                      <option value="">Seleccione el usuario..</option>
                      @foreach ($usuarios as $usuario)
                        <option style="background-color: black" value="{{$usuario->id}}">{{ $usuario->nombre }}</option>
                      @endforeach
                    </Select>
                  </div>

                  <div class="form-group col-md-4">
                    <label for="inputName">Tiempo solicitado</label>
                    <Select class="form-control form-control-lg" name="tiempo" id="tiempo">
                      <option value="">Seleccione el tiempo..</option>
                      <option style="background-color: black" value="1">1 hora</option>
                      <option style="background-color: black" value="2">2 hora</option>
                      <option style="background-color: black" value="3">3 hora</option>
                    </Select>
                  </div>   

                  <div class="form-group col-4">
                    <label for="inputName">Seleccione una pulsera.</label>
                    <br>
                    <Select class="form-control form-control-lg" name="pulsera" id="pulsera">
                      <option value="">Seleccione la pulsera..</option>
                      @foreach ($pulseras as $pulsera)
                        <option style="background-color: black" value="{{$pulsera->id}}">{{ $pulsera->id}}</option>
                      @endforeach
                    </Select> 
                  </div>
                </div>
                <input type="submit" class="btn btn-success" value="Guardar">
              </form>
            </div>
          </div>
    </div>
  <script src="{{asset('js/app.js')}}"></script>
@endsection