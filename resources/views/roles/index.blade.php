@extends('layouts.app', ['pageSlug' => 'roles'])

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-chart">
            <div class="card-header ">
                <div class="row">
                    <div class="col-sm-6 text-left">
                        <h5 class="card-category">Opciones de administrador</h5>
                        <h2 class="card-title">Gestionar Roles</h2>
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
        <a class="btn btn-primary btn-block" href="{{route('roles.create')}}">Nuevo</a>

            <div class="table-responsive table-hover">
                <table class="table tablesorter" id="">
                    <thead class=" text-primary">
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Slug</th>
                            <th>Descripción</th>
                            <th>Full access</th>
                            <th colspan="3"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)
                        <tr>

                            
                            <td> {{$role->id}} </td>
                            <td> {{$role->nombre}} </td>
                            <td> {{$role->slug}} </td>
                            <td> {{$role->descripcion}} </td>
                            <td> {{$role['full-access']}} </td>
                            <td> <a  href="{{ route('roles.show', $role->id) }}"><i class="tim-icons icon-zoom-split"></i></a> </td>
                            <td> <a href="{{ route('roles.edit', $role->id) }}"><i class="tim-icons icon-settings"></i></a> </td>
                            <td> 
                                
                                <form action="{{route('roles.destroy', $role->id)}}" method="POST">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"></button>
                                </form>
                            </td>
                           
                        </tr>
                        @endforeach
                    </tbody>
                </table>


        </div>
      </div>
</div>
@endsection