<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-66QFE9RG6T"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-66QFE9RG6T');
</script>
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


    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

    <!--======================--->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/fullcalendar.css')}}">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    {{--------------------------------Date Picker------------------------------}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    {{--------------------------------------------------------------------------}}
</head>
<body>
    <div id="app">
        <div class="row">
            <div class="" style="width: 100%;">
                <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                    <div class="container">
                        <a class="navbar-brand" href="{{ Auth()->user() ? url('/dashboard') : url('/login') }}">
                            <img src="{{ asset('public/Logo/legacylogo.png') }}" width="512" height="90" class="d-inline-block align-top col-sm-12 col-md-12 col-lg-12" alt="">
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
                                    {{--@if (Route::has('register'))
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                        </li>
                                    @endif--}}
                                @else
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::user()->name }} <span class="caret"></span>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="/dashboard">Dashboard</a>
                                            <a class="dropdown-item {{Auth::user()->privilege_type !== 'admin' ? 'collapse' : ''}}" href="/users/manage_users">{{Auth::user()->privilege_type === 'admin' ? 'Manage Users' : ''}}</a>
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
    <script>
        UPLOADCARE_PUBLIC_KEY = 'e9c52880a8af766d0549';
    </script>
    <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
    <script>

        //let itemsToRemove = 'Source,About,Format,Styles,Blockquote,Indent,Outdent,BulletedList,NumberedList,RemoveFormat,Superscript,Subscript,Maximize,SpecialChar,HorizontalRule,Image,Anchor,PasteFromWord,PasteText';
        let itemsToRemove = 'Source,About';
        let filebrowserBrowseUrl = "{{asset('vendor/unisharp/laravel-ckeditor/kcfinder/browse.php?opener=ckeditor&type=files')}}";
        let filebrowserImageBrowseUrl = "{{asset('vendor/unisharp/laravel-ckeditor/kcfinder/browse.php?opener=ckeditor&type=images')}}";
        let filebrowserFlashBrowseUrl = "{{asset('vendor/unisharp/laravel-ckeditor/kcfinder/browse.php?opener=ckeditor&type=flash')}}";
        let filebrowserUploadUrl = "{{asset('vendor/unisharp/laravel-ckeditor/kcfinder/upload.php?opener=ckeditor&type=files')}}";
        let filebrowserImageUploadUrl = "{{asset('vendor/unisharp/laravel-ckeditor/kcfinder/upload.php?opener=ckeditor&type=images')}}";
        let filebrowserFlashUploadUrl = "{{asset('vendor/unisharp/laravel-ckeditor/kcfinder/upload.php?opener=ckeditor&type=flash')}}";

        CKEDITOR.replace( 'article-ckeditor1', {
            filebrowserBrowseUrl : filebrowserBrowseUrl,
            filebrowserImageBrowseUrl: filebrowserImageBrowseUrl,
            filebrowserFlashBrowseUrl: filebrowserFlashBrowseUrl,
            filebrowserUploadUrl: filebrowserUploadUrl,
            filebrowserImageUploadUrl: filebrowserImageUploadUrl,
            filebrowserFlashUploadUrl: filebrowserFlashUploadUrl,
            removeButtons: itemsToRemove
            // The rest of options...
        } );

        CKEDITOR.replace( 'article-ckeditor2', {
            filebrowserBrowseUrl : filebrowserBrowseUrl,
            filebrowserImageBrowseUrl: filebrowserImageBrowseUrl,
            filebrowserFlashBrowseUrl: filebrowserFlashBrowseUrl,
            filebrowserUploadUrl: filebrowserUploadUrl,
            filebrowserImageUploadUrl: filebrowserImageUploadUrl,
            filebrowserFlashUploadUrl: filebrowserFlashUploadUrl,
            removeButtons: itemsToRemove
        } );

        CKEDITOR.replace( 'article-ckeditor3', {
            filebrowserBrowseUrl : filebrowserBrowseUrl,
            filebrowserImageBrowseUrl: filebrowserImageBrowseUrl,
            filebrowserFlashBrowseUrl: filebrowserFlashBrowseUrl,
            filebrowserUploadUrl: filebrowserUploadUrl,
            filebrowserImageUploadUrl: filebrowserImageUploadUrl,
            filebrowserFlashUploadUrl: filebrowserFlashUploadUrl,
            removeButtons: itemsToRemove
        } );

        CKEDITOR.replace( 'article-ckeditor4', {
            filebrowserBrowseUrl : filebrowserBrowseUrl,
            filebrowserImageBrowseUrl: filebrowserImageBrowseUrl,
            filebrowserFlashBrowseUrl: filebrowserFlashBrowseUrl,
            filebrowserUploadUrl: filebrowserUploadUrl,
            filebrowserImageUploadUrl: filebrowserImageUploadUrl,
            filebrowserFlashUploadUrl: filebrowserFlashUploadUrl,
            removeButtons: itemsToRemove
        } );

        CKEDITOR.replace( 'article-ckeditor5', {
            filebrowserBrowseUrl : filebrowserBrowseUrl,
            filebrowserImageBrowseUrl: filebrowserImageBrowseUrl,
            filebrowserFlashBrowseUrl: filebrowserFlashBrowseUrl,
            filebrowserUploadUrl: filebrowserUploadUrl,
            filebrowserImageUploadUrl: filebrowserImageUploadUrl,
            filebrowserFlashUploadUrl: filebrowserFlashUploadUrl,
            removeButtons: itemsToRemove
        } );

        CKEDITOR.replace( 'article-ckeditor6', {
            filebrowserBrowseUrl : filebrowserBrowseUrl,
            filebrowserImageBrowseUrl: filebrowserImageBrowseUrl,
            filebrowserFlashBrowseUrl: filebrowserFlashBrowseUrl,
            filebrowserUploadUrl: filebrowserUploadUrl,
            filebrowserImageUploadUrl: filebrowserImageUploadUrl,
            filebrowserFlashUploadUrl: filebrowserFlashUploadUrl,
            removeButtons: itemsToRemove
        } );

        CKEDITOR.replace( 'article-ckeditor7', {
            filebrowserBrowseUrl : filebrowserBrowseUrl,
            filebrowserImageBrowseUrl: filebrowserImageBrowseUrl,
            filebrowserFlashBrowseUrl: filebrowserFlashBrowseUrl,
            filebrowserUploadUrl: filebrowserUploadUrl,
            filebrowserImageUploadUrl: filebrowserImageUploadUrl,
            filebrowserFlashUploadUrl: filebrowserFlashUploadUrl,
            removeButtons: itemsToRemove
        } );

        CKEDITOR.replace( 'article-ckeditor8', {
            filebrowserBrowseUrl : filebrowserBrowseUrl,
            filebrowserImageBrowseUrl: filebrowserImageBrowseUrl,
            filebrowserFlashBrowseUrl: filebrowserFlashBrowseUrl,
            filebrowserUploadUrl: filebrowserUploadUrl,
            filebrowserImageUploadUrl: filebrowserImageUploadUrl,
            filebrowserFlashUploadUrl: filebrowserFlashUploadUrl,
            removeButtons: itemsToRemove
        } );

        CKEDITOR.replace( 'article-ckeditor9', {
            filebrowserBrowseUrl : filebrowserBrowseUrl,
            filebrowserImageBrowseUrl: filebrowserImageBrowseUrl,
            filebrowserFlashBrowseUrl: filebrowserFlashBrowseUrl,
            filebrowserUploadUrl: filebrowserUploadUrl,
            filebrowserImageUploadUrl: filebrowserImageUploadUrl,
            filebrowserFlashUploadUrl: filebrowserFlashUploadUrl,
            removeButtons: itemsToRemove
        } );

        CKEDITOR.replace( 'article-ckeditor10', {
            filebrowserBrowseUrl : filebrowserBrowseUrl,
            filebrowserImageBrowseUrl: filebrowserImageBrowseUrl,
            filebrowserFlashBrowseUrl: filebrowserFlashBrowseUrl,
            filebrowserUploadUrl: filebrowserUploadUrl,
            filebrowserImageUploadUrl: filebrowserImageUploadUrl,
            filebrowserFlashUploadUrl: filebrowserFlashUploadUrl,
            removeButtons: itemsToRemove
        } );

        CKEDITOR.replace( 'article-ckeditor11', {
            filebrowserBrowseUrl : filebrowserBrowseUrl,
            filebrowserImageBrowseUrl: filebrowserImageBrowseUrl,
            filebrowserFlashBrowseUrl: filebrowserFlashBrowseUrl,
            filebrowserUploadUrl: filebrowserUploadUrl,
            filebrowserImageUploadUrl: filebrowserImageUploadUrl,
            filebrowserFlashUploadUrl: filebrowserFlashUploadUrl,
            removeButtons: itemsToRemove
        } );
    </script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>
</body>
</html>
