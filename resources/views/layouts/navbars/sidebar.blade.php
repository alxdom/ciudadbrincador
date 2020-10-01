<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
            @php
                $nombres = explode(" ", Auth::user()->name);
                $acronimo = "";
                foreach ($nombres as $n) {
                    $acronimo .= $n[0];
                }
            @endphp
            <a href="#" class="simple-text logo-mini">{{ $acronimo }}</a>
            <a href="#" class="simple-text logo-normal">{{ Auth::user()->name }}</a>
        </div>
        <ul class="nav">

            {{--HOME--}}
            <li @if ($pageSlug == 'home') class="active " @endif>
                <a href="{{ route('home') }}">
                    <i>

                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-house-door" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M7.646 1.146a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 .146.354v7a.5.5 0 0 1-.5.5H9.5a.5.5 0 0 1-.5-.5v-4H7v4a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .146-.354l6-6zM2.5 7.707V14H6v-4a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v4h3.5V7.707L8 2.207l-5.5 5.5z"/>
                            <path fill-rule="evenodd" d="M13 2.5V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                          </svg>

                    </i>
                    <p>{{ __('Home') }}</p>
                </a>
            </li>

            @can('haveaccess', 'dashboard.index')
            {{--DASHBOARD--}}
            <li @if ($pageSlug == 'dashboard') class="active " @endif>
                <a href="{{ route('panel') }}">
                    <i class="tim-icons icon-chart-pie-36"></i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>
            @endcan


            {{--EVENTOS--}}
            <li @if ($pageSlug == 'evento') class="active " @endif>
                <a href="{{ route('evento.index') }}">
                    <i>

                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-calendar4-event" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M14 2H2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1zM2 1a2 2 0 0 0-2 2v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2H2z"/>
                            <path fill-rule="evenodd" d="M14 2H2a1 1 0 0 0-1 1v1h14V3a1 1 0 0 0-1-1zM2 1a2 2 0 0 0-2 2v2h16V3a2 2 0 0 0-2-2H2z"/>
                            <path fill-rule="evenodd" d="M3.5 0a.5.5 0 0 1 .5.5V1a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 .5-.5zm9 0a.5.5 0 0 1 .5.5V1a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 .5-.5z"/>
                            <rect width="2" height="2" x="11" y="7" rx=".5"/>
                          </svg>

                    </i>
                    <p>{{ __('Eventos') }}</p>
                </a>
            </li>

            @can('haveaccess', 'controlAcceso.index')
            {{--CONTROL ACCESO--}}
            <li @if ($pageSlug == 'controlAcceso') class="active " @endif>
                <a href="{{ route('controlAcceso.index') }}">
                    <i>
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-door-open" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M1 15.5a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13a.5.5 0 0 1-.5-.5zM11.5 2H11V1h.5A1.5 1.5 0 0 1 13 2.5V15h-1V2.5a.5.5 0 0 0-.5-.5z"/>
                            <path fill-rule="evenodd" d="M10.828.122A.5.5 0 0 1 11 .5V15h-1V1.077l-6 .857V15H3V1.5a.5.5 0 0 1 .43-.495l7-1a.5.5 0 0 1 .398.117z"/>
                            <path d="M8 9c0 .552.224 1 .5 1s.5-.448.5-1-.224-1-.5-1-.5.448-.5 1z"/>
                          </svg>
                    </i>
                    <p>{{ __('Area de registro') }}</p>
                </a>
            </li>
            @endcan

            
            {{--CONTROL ACCESO--}}
            <li @if ($pageSlug == 'asignar') class="active " @endif>
                <a href="#">
                    <i>
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-file-check" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4 0h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2zm0 1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H4z"/>
                            <path fill-rule="evenodd" d="M10.854 6.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 8.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                          </svg>
                    </i>
                    <p>{{ __('Asignar pulsera') }}</p>
                </a>
            </li>
            

            {{--OPCIONES DE ADMINISTRADOR--}}   
            @can('haveaccess', 'role.index')
            <li>
            <a data-toggle="collapse" href="#laravel-examples" aria-expanded="true">
                <i class="fab fa-laravel" ></i>
                <span class="nav-link-text" >{{ __('Opciones de administrador') }}</span>
                <b class="caret mt-1"></b>
            </a>
            <div class="collapse show" id="laravel-examples">
                <ul class="nav pl-4">
                    <li @if ($pageSlug == 'roles') class="active " @endif>
                        <a href="{{ route('roles.index')  }}">
                            <i>

                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-slash-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                    <path fill-rule="evenodd" d="M11.854 4.146a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708-.708l7-7a.5.5 0 0 1 .708 0z"/>
                                  </svg>

                            </i>
                            <p>{{ __('Gestionar roles') }}</p>
                        </a>
                    </li>
                    <li @if ($pageSlug == 'users') class="active " @endif>
                        <a href="{{ route('user.index')  }}">
                            <i class="tim-icons icon-single-02"></i>
                            <p>{{ __('Gestionar usuarios') }}</p>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        @endcan   



            
        </ul>
    </div>
</div>
