@extends('layouts.app', ['pageSlug' => 'evento'])

@section('content')
@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
<div class="row">
    <table class="table">
        <thead>
            <tr>
                <th class="text-center">Folio</th>
                <th>Día del evento</th>
                <th>Descripción</th>
                <th>Cantidad de personas</th>
                <th>Precio estimado</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($eventosUsuario as $evento)
            <tr>
                <td class="text-center">000{{$evento->id}}</td>
                <td>{{$evento->fecha_reservacion}}</td>
                <td>{{$evento->tipoEvento->nombre}}</td>
                <td>{{$evento->cantidad_personas}}</td>
                <td>&dollar; 2500</td>
                <td class="td-actions text-right">
                    </button>
                    <a href="{{action('EventoController@edit', $evento->id)}}" rel="tooltip" class="btn btn-success btn-link btn-icon btn-sm" 
                        onclick="return confirm('Estás seguro que quieres editar este evento?')">
                        <i class="tim-icons icon-settings"></i>
                    </a>
                </td>
                <td>
                    <form action="{{action('EventoController@destroy', $evento->id)}}" method="POST">
                        {{ csrf_field() }}
                        <input name="_method" type="hidden" value="DELETE">
                        <button class="btn btn-danger btn-link btn-icon btn-sm"
                        onclick="return confirm('Estás seguro que quieres eliminar este evento?')">
                            <i class="tim-icons icon-simple-remove"></i>
                        </button>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

    <div class="row">
        <a class="btn btn-primary btn-simple" href="{{ route('evento.create') }}">Agendar evento</a>
    </div>
@endsection