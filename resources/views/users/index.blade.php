@extends('layouts.app', ['pageSlug' => 'users'])

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-chart">
            <div class="card-header ">
                <div class="row">
                    <div class="col-sm-6 text-left">
                        <h5 class="card-category">Opciones de administrador</h5>
                        <h2 class="card-title">Gestionar Usuarios</h2>
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
        {{--<a class="btn btn-primary btn-block" href="{{route('users.create')}}">Nuevo</a>--}}

            <div class="table-responsive table-hover">
                <table class="table tablesorter" id="">
                    <thead class=" text-primary">
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Role(s)</th>
                            
                            <th colspan="3"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        
                        <tr>

                            
                            <td> {{$user->id}} </td>
                            <td> {{$user->name}} </td>
                            <td> {{$user->email}} </td>
                            <td> 
                                
                                @if (isset($user->roles[0]->nombre))
                                {{$user->roles[0]->nombre}}
                                @else
                                    No tiene un rol asignado
                                @endif
                                    
                                
                                
                            </td>
                            
                            <td> <a  href="{{ route('user.show', $user->id) }}"><i class="tim-icons icon-zoom-split"></i></a> </td>
                            <td> <a href="{{ route('user.edit', $user->id) }}"><i class="tim-icons icon-settings"></i></a> </td>
                            <td> 
                                
                                <form action="{{route('user.destroy', $user->id)}}" method="POST">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"><i class="tim-icons icon-simple-remove"></i></button>
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