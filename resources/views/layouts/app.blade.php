<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="d-flex flex-column flex-lg-row h-lg-full bg-surface-secondary">
    <!-- Vertical Navbar -->
    <nav class="navbar show navbar-vertical h-lg-screen navbar-expand-lg px-0 py-3 navbar-light bg-white border-bottom border-bottom-lg-0 border-end-lg" id="navbarVertical">
        <div class="container-fluid">
            <!-- Toggler -->
            <button class="navbar-toggler ms-n2" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarCollapse" aria-controls="sidebarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Brand -->
            <a class="navbar-brand py-lg-2 mb-lg-5 px-lg-12 me-0" href="#">
                <center><img src="/img/assinebem-colorido.svg" alt="..."></center>
            </a>
            <!-- User menu (mobile) -->
            <div class="navbar-user d-lg-none">
                <!-- Dropdown -->
                <div class="dropdown">
                    <!-- Toggle -->
                    <a href="#" id="sidebarAvatar" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="avatar bg-warning rounded-circle text-white">
                        {{Auth::user()->name[0]}}
                    </a>
                    <!-- Menu -->
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="sidebarAvatar">
                        <a href="#" class="dropdown-item">Perfil</a>
                        <hr class="dropdown-divider">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item">Sair</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidebarCollapse">
                <!-- Navigation -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('home')}}">
                            <i class="fas fa-tachometer-alt"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('agenda.index')}}">
                            <i class="fas fa-users"></i> Agenda
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('documento.index')}}">
                            <i class="fas fa-file-upload"></i> Documentos
                        </a>
                    </li>
                </ul>
                <!-- Divider -->
                <hr class="navbar-divider my-5 opacity-20">
                <!-- Push content down -->
                <div class="mt-auto"></div>
                <!-- User (md) -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item"><i class="fas fa-cog"></i> Sair</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Main content -->
    <div class="h-screen flex-grow-1 overflow-y-lg-auto">

         <!-- Header -->
        <header class="bg-surface-primary border-bottom pt-4 navbar-dark bg-dark" >
            <div class="container-fluid">
                <div class="mb-npx">
                    <div class="row align-items-center">
                        <div class="col-sm-6 col-12 mb-4 mb-sm-0">
                            <!-- Title -->
                            <h1 class="h2 mb-0 ls-tight" style="color: white;">
                                @yield('title')
                            </h1>
                        </div>
                        <!-- Actions -->
                        <div class="mobile-nao-aparece col-sm-6 col-12 text-sm-end" >
                            <div class="mx-n1">
                                <div class="dropdown">

                                    <!-- Toggle -->
                                    <a href="#" id="sidebarAvatar" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="avatar bg-warning rounded-circle text-white">
                                        {{Auth::user()->name[0]}}
                                    </a>

                                    <!-- Menu -->
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="sidebarAvatar">
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit" class="dropdown-item">Sair</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Nav -->
                    <ul class="nav nav-tabs mt-4 overflow-x border-0"></ul>
                </div>
            </div>
        </header>

        <!-- Main -->
        <main class="py-4">
            @if (empty(env('ASSINE_BEM_TOKEN')))
                <div class="alert alert-danger" role="alert" style="margin: 25px;">
                    Preencha o ASSINE_BEM_TOKEN no arquivo .env
                </div>
            @endif

            @if (empty(env('ASSINE_BEM_SECRET')))
                <div class="alert alert-danger" role="alert" style="margin: 25px;">
                    Preencha o ASSINE_BEM_SECRET no arquivo .env
                </div>
            @endif
            @yield('content')
        </main>
    </div>
</div>
</body>
</html>
