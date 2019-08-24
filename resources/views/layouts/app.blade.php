<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Legacy') }}</title>

    <!-- Scripts -->
    {{--<script src="{{ asset('js/app.js') }}"></script>--}}
    <!-------CDN includes-------->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>
    <!--======================--->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/fullcalendar.css')}}">

</head>
<body>
    <div id="app">
        <div class="row">
            <div class="" style="width: 100%;">
                <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                    <div class="container">
                        <a class="navbar-brand" href="{{ Auth()->user() ? url('/dashboard') : url('/login') }}">
                            <img src="{{ asset('Logo/legacylogo.png') }}" width="512" height="90" class="d-inline-block align-top col-sm-12 col-md-12 col-lg-12" alt="">
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <!-- Left Side Of Navbar -->
                            <ul class="navbar-nav mr-auto">

                            </ul>

                            <!-- Right Side Of Navbar -->
                            <ul class="navbar-nav ml-auto">
                                <!-- Authentication Links -->
                                @guest
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                    @if (Route::has('register'))
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                        </li>
                                    @endif
                                @else
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::user()->name }} <span class="caret"></span>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="/dashboard">Dashboard</a>
                                            <a class="dropdown-item {{Auth::user()->privilege_type !== 'admin' ? 'collapse' : ''}}" href="/dashboard">{{Auth::user()->privilege_type === 'admin' ? 'Manage Users' : ''}}</a>
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                @endguest
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>

        <div class="container">
            @if(Auth::user())
                @include('inc/navbar')
            @endif
            <br />
            @include('inc/messages')
            @yield('content')

        </div>
    </div>


   {{-- <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>--}}
    <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
    <script>

        //let itemsToRemove = 'Source,About,Format,Styles,Blockquote,Indent,Outdent,BulletedList,NumberedList,RemoveFormat,Superscript,Subscript,Maximize,SpecialChar,HorizontalRule,Image,Anchor,PasteFromWord,PasteText';
        let itemsToRemove = '';

        CKEDITOR.replace( 'article-ckeditor1', {
            removeButtons: itemsToRemove
            // The rest of options...
        } );

        CKEDITOR.replace( 'article-ckeditor2', {
            removeButtons: itemsToRemove
        } );

        CKEDITOR.replace( 'article-ckeditor3', {
            removeButtons: itemsToRemove
        } );

        CKEDITOR.replace( 'article-ckeditor4', {
            removeButtons: itemsToRemove
        } );

        CKEDITOR.replace( 'article-ckeditor5', {
            removeButtons: itemsToRemove
        } );

        CKEDITOR.replace( 'article-ckeditor6', {
            removeButtons: itemsToRemove
        } );

        CKEDITOR.replace( 'article-ckeditor7', {
            removeButtons: itemsToRemove
        } );

        CKEDITOR.replace( 'article-ckeditor8', {
            removeButtons: itemsToRemove
        } );

        CKEDITOR.replace( 'article-ckeditor9', {
            removeButtons: itemsToRemove
        } );
    </script>
</body>
</html>
