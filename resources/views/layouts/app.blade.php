<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'MediaTech') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        @guest

                        @else
                        @if (Auth::user()->admin)
                        <li class="nav-item {{ Route::is('user.index') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('user.index')}}">Utilisateurs</a>
                        </li>
                        <li class="nav-item {{ Route::is('statistic.index') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('statistic.index')}}">Statistiques</a>
                        </li>
                        <li class="nav-item {{ Route::is('category.index') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('category.index')}}">Catégories</a>
                        </li>
                        @endif
                        <li class="nav-item {{ Route::is('product.index') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('product.index')}}">Produits</a>
                        </li>
                        <li class="nav-item {{ Route::is('loan.index') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('loan.index')}}">Emprunts</a>
                        </li>

                        <!-- Search bar -->
                        <li class="nav-item">
                            <form action="{{ route('search')}}" method="POST">
                                {{ csrf_field() }}
                                <div class="input-group">
                                    <input type="text" class="form-control" name="search" placeholder="Recherche produit"> <span class="input-group-btn">
                                        <button type="submit" class="btn btn-default">
                                            <span class="fa fa-search"></span>
                                        </button>
                                    </span>
                                </div>
                            </form>
                        </li>
                        @endguest
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Se connecter</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">S'enregistrer</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Se déconnecter
                                    </a>
                                    <a class="dropdown-item" href="{{ route('user.profil')}}"> {{ __('Profil') }} </a>

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

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>