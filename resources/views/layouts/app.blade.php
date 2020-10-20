<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'City Jumper Web') }}</title>
        
        <!-- Favicon -->
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('black') }}/img/apple-icon.png">
        <link rel="icon" type="image/png" href="{{ asset('black') }}/img/favicon.png">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
        <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
        <!-- Icons -->
        <link href="{{ asset('black') }}/css/nucleo-icons.css" rel="stylesheet" />
        <!-- CSS -->
        <link href="{{ asset('black') }}/css/black-dashboard.css?v=1.0.0" rel="stylesheet" />
        <link href="{{ asset('black') }}/css/theme.css" rel="stylesheet" />

        <style>
            body{
                background-image: url("https://www.xtrafondos.com/wallpapers/luces-neon-en-perspectiva-3470.jpg");
                background-color: black;
            }
            .alado{
                background-color: cornflowerblue;
            }


            /* Checkbox de roles */
            .che{
                font-size: 13px;
            }
            
            ul.ks-cboxtags {
                list-style: none;
                padding: 1px;
            }
            ul.ks-cboxtags li{
            display: inline;
            }
            ul.ks-cboxtags li label{
                display: inline-block;
                background-color: rgba(255, 255, 255, .9);
                border: 2px solid rgba(139, 139, 139, .3);
                color: #adadad;
                border-radius: 25px;
                white-space: nowrap;
                margin: 3px 0px;
                -webkit-touch-callout: none;
                -webkit-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
                -webkit-tap-highlight-color: transparent;
                transition: all .2s;
            }

            ul.ks-cboxtags li label {
                padding: 8px 12px;
                cursor: pointer;
            }

            ul.ks-cboxtags li label::before {
                display: inline-block;
                font-style: normal;
                font-variant: normal;
                text-rendering: auto;
                -webkit-font-smoothing: antialiased;
                font-family: "Font Awesome 5 Free";
                font-weight: 900;
                font-size: 12px;
                padding: 2px 6px 2px 2px;
                content: "\f067";
                transition: transform .3s ease-in-out;
            }

            ul.ks-cboxtags li input[type="checkbox"]:checked + label::before {
                content: "\f00c";
                transform: rotate(-360deg);
                transition: transform .3s ease-in-out;
            }

            ul.ks-cboxtags li input[type="checkbox"]:checked + label {
                border: 2px solid #ffffff;
                background-color: #da4fd1;;
                color: #fff;
                transition: all .2s;
            }

            ul.ks-cboxtags li input[type="checkbox"] {
            display: absolute;
            }
            ul.ks-cboxtags li input[type="checkbox"] {
            position: absolute;
            opacity: 0;
            }
            ul.ks-cboxtags li input[type="checkbox"]:focus + label {
            border: 2px solid #e9a1ff;
            }

             /* Radio buttons pulseras */

            .button-label {
            
            padding: 40px;
            margin: 0.1em;
            cursor: pointer;
            color: black;
            border-radius: 2em;
            background: #efefef;
            transition: 0.10s;
            }


            .button-label:hover {
                background: #2ECC71;
                color: aliceblue;
                
            }

            #pulsera:checked + .button-label {
            background: #2ECC71;
            color: #efefef;
            }
            #pulsera:checked + .button-label:hover {
                background: darkgreen;
                color: #adadad;
            }
            

            .hidden {
            display: none;
            }
            
        </style>
    </head>
    
    <body class="{{ $class ?? '' }}">
        
        @auth()
            
                <div class="wrapper">
                    @include('layouts.navbars.sidebar')
                        <div class="main-panel">
                            @include('layouts.navbars.navbar')
                                <div class="content">
                                    <div id="app">
                                    @yield('content')
                                    </div>
                                </div>
                                    @include('layouts.footer')
                        </div>
                </div>
                                {{--<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>--}}
            
            <script src="{{asset('js/app.js')}}"></script>
                
                        
        @else
            
                @include('layouts.navbars.navbar')
                    <div class="wrapper wrapper-full-page">
                        <div class="full-page {{ $contentClass ?? '' }}">
                            <div class="content">
                                <div class="container">
                                    <div id="app">
                                    @yield('content')
                                    </div>
                                </div>
                            </div>
                            @include('layouts.footer')
                        </div>
                    </div>
            
            <script src="{{asset('js/app.js')}}"></script>
        @endauth 
         

{{-- <script>
                $(document).ready(function() {
                    $().ready(function() {
                        $sidebar = $('.sidebar');
                        $navbar = $('.navbar');
                        $main_panel = $('.main-panel');

                        $full_page = $('.full-page');

                        $sidebar_responsive = $('body > .navbar-collapse');
                        sidebar_mini_active = true;
                        white_color = false;

                        window_width = $(window).width();

                        fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

                        $('.fixed-plugin a').click(function(event) {
                            if ($(this).hasClass('switch-trigger')) {
                                if (event.stopPropagation) {
                                    event.stopPropagation();
                                } else if (window.event) {
                                    window.event.cancelBubble = true;
                                }
                            }
                        });

                        $('.fixed-plugin .background-color span').click(function() {
                            $(this).siblings().removeClass('active');
                            $(this).addClass('active');

                            var new_color = $(this).data('color');

                            if ($sidebar.length != 0) {
                                $sidebar.attr('data', new_color);
                            }

                            if ($main_panel.length != 0) {
                                $main_panel.attr('data', new_color);
                            }

                            if ($full_page.length != 0) {
                                $full_page.attr('filter-color', new_color);
                            }

                            if ($sidebar_responsive.length != 0) {
                                $sidebar_responsive.attr('data', new_color);
                            }
                        });

                        $('.switch-sidebar-mini input').on("switchChange.bootstrapSwitch", function() {
                            var $btn = $(this);

                            if (sidebar_mini_active == true) {
                                $('body').removeClass('sidebar-mini');
                                sidebar_mini_active = false;
                                blackDashboard.showSidebarMessage('Sidebar mini deactivated...');
                            } else {
                                $('body').addClass('sidebar-mini');
                                sidebar_mini_active = true;
                                blackDashboard.showSidebarMessage('Sidebar mini activated...');
                            }

                            // we simulate the window Resize so the charts will get updated in realtime.
                            var simulateWindowResize = setInterval(function() {
                                window.dispatchEvent(new Event('resize'));
                            }, 180);

                            // we stop the simulation of Window Resize after the animations are completed
                            setTimeout(function() {
                                clearInterval(simulateWindowResize);
                            }, 1000);
                        });

                        $('.switch-change-color input').on("switchChange.bootstrapSwitch", function() {
                                var $btn = $(this);

                                if (white_color == true) {
                                    $('body').addClass('change-background');
                                    setTimeout(function() {
                                        $('body').removeClass('change-background');
                                        $('body').removeClass('white-content');
                                    }, 900);
                                    white_color = false;
                                } else {
                                    $('body').addClass('change-background');
                                    setTimeout(function() {
                                        $('body').removeClass('change-background');
                                        $('body').addClass('white-content');
                                    }, 900);

                                    white_color = true;
                                }
                        });
                    });
                });

                
                
                $(function () {
                $('[data-toggle="tooltip"]').tooltip()
                });
</script>--}}
    
<script src="{{ asset('black') }}/js/core/jquery.min.js"></script>
<script src="{{ asset('black') }}/js/core/popper.min.js"></script>
<script src="{{ asset('black') }}/js/core/bootstrap.min.js"></script>
<script src="{{ asset('black') }}/js/plugins/perfect-scrollbar.jquery.min.js"></script>
<script src="{{ asset('black') }}/js/plugins/bootstrap-notify.js"></script>
<script src="{{ asset('black') }}/js/black-dashboard.min.js?v=1.0.0"></script>
<script src="{{ asset('black') }}/js/theme.js"></script>

        
</body>
    
</html>
