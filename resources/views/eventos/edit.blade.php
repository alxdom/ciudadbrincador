@extends('layouts.app', ['pageSlug' => 'evento'])

@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>

<div class="col-12">
  <div class="col-md-8 col-md-offset-2">
    @if (count($errors) > 0)
    <div class="alert alert-danger">
      <strong>Error!</strong> Revise los campos obligatorios.<br><br>
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif
    @if(Session::has('success'))
    <div class="alert alert-info">
      {{Session::get('success')}}
    </div>
    @endif
  </div>
    <div class="card">
      <div class="col-12">
        <div class="card card-chart">
            <div class="card-header ">
                <div class="row">
                    <div class="col-sm-6 text-left">
                        <h5 class="card-category">Edición de eventos</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <div class="card-body">
          <form method="POST" action="{{ route('evento.update', $evento->id) }}"  role="form">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PATCH">
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="inputName">Fecha de reservación</label><br>
                <input style="border-style: none; color: aliceblue; background-color: #27293d" 
                 type="datetime-local" name="fecha_reservacion" step="1" min="09:00" max="21:00" min="<?php echo date("Y-m-d");?>" value="{{$evento->fecha_reservacion}}">
              </div>
              <div class="form-group col-md-4">
                <label for="inputPassword4">Cantidad de personas</label>
                <select name="cantidad_personas" id="cantidad_personas" class="form-control">
                    <option selected>{{$evento->cantidad_personas}}</option>
                  @for ($i=1; $i<201; $i++)
                    <option style="background-color: black" value="{{$i}}">{{$i}}</option>
                  @endfor
                </select>
              </div>
              <div class="form-group col-md-4">
                <label for="inputPassword4">Tipo de evento</label>
                <select name="id_tipo_evento" id="id_tipo_evento" class="form-control">
                  <option selected>{{$evento->tipoEvento->nombre}}</option>
                  @foreach ($tipos as $t)
                <option style="background-color: black" value="{{$t->id}}">{{$t->nombre}}</option>
                  @endforeach
                </select>
                <input type="hidden" id="id_users" name="id_users" value="{{Auth::user()->id}}">
              </div>
              <br><br><br>
            <button type="submit" class="btn btn-success col-md-2">Actualizar evento</button>
          </form>
        </div>
      </div>
@endsection