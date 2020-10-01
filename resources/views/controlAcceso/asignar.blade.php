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
                </div>
            </div>
        </div>
{{-- F O R M U L A R I O --}}
    <div class="col-12">
        <div class="card">
            <div class="card-body">
              <form>
                <div class="form-row">

                  <div class="form-group col-md-6">
                    <label for="inputName">Buscar usuario</label>
                    

                    <div class="input-group md-form form-sm form-1 pl-0">
                      <div class="input-group-prepend">
                        <span class="input-group-text purple lighten-3" id="basic-text1"><i class="fas fa-search text-white"
                            aria-hidden="true"></i></span>
                      </div>
                      <input class="form-control form-control-lg my-0 py-1" type="text" placeholder="Buscar por nombre.." aria-label="Search">
                    </div>

                  </div>

                  <div class="form-group col-md-6">
                    <label for="inputName">Tiempo solicitado</label>
                    <Select class="form-control form-control-lg">
                      <option value="">Seleccione el tiempo..</option>
                      <option style="background-color: black" value="1">1 hora</option>
                      <option style="background-color: black" value="2">2 hora</option>
                      <option style="background-color: black" value="3">3 hora</option>
                    </Select>
                    
                  </div>   
                </div>
                

                <div class="row">
                  <div class="form-group col-md-12">
                    <input type="text" name="result" class="form-control form-control-lg my-0 py-1 text-center" placeholder="Resultados de la busqueda..">
                  </div>
                </div>

                <br>
                <br>
                <div class="form-group col-12">
                  <label for="inputName">Seleccione una pulsera.</label>
                    
                  <ul class="ks-cboxtags">
                    @foreach ($cinco as $number)
                    <li>
                      <input  type="checkbox" 
                              class="custom-control-input" 
                              id="{{$number}}" 
                              value="{{$number}}" 
                              name="number[]">
    
                      <label for="{{$number}}"
                        data-toggle="tooltip" 
                        title="{{$number}}" 
                        >
                      {{$number}}
                      
                      </label>
                      
                    @endforeach
                  </li>
                </ul>

                 
                </div>
                <button type="submit" class="btn btn-primary">Enviar</button>
              </form>
            </div>
          </div>
    </div>
  <script src="{{asset('js/app.js')}}"></script>
@endsection