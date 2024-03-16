<!doctype html>
<html lang="pt-br" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <title>{{ $title }} - Brulve</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    {{ $links  ?? '' }}
</head>
<body>
<header>
    <nav class="navbar bg-body-tertiary">
        <div class="container">
            <a class="navbar-brand ps-3" href="#">Brulve</a>
            <button class="navbar-toggler me-3" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasNavbar"
                    aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar"
                 aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="btn btn-primary nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                               aria-expanded="false">
                                <i class="bi bi-person-circle me-1"></i>
                                Perfil
                            </a>
                            <ul class="dropdown-menu text-center">
                                <li><p class="dropdown-item" href="#">{{ Auth::user()->name }}</p></li>
                                <li><a class="dropdown-item text-warning"
                                       href="{{ route('users.edit', Auth::user()->id) }}">Editar usuário</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item text-danger" href="{{ route('logout') }}">Sair</a></li>
                            </ul>
                        </li>
                        <li class="nav-item mt-2">
                            <a class="col-12 btn btn-outline-secondary" href="/">Início</a>
                        </li>
                        <li class="nav-item mt-2">
                            <a class="col-12 btn btn-outline-secondary" href="{{ route('clients.index') }}">Clientes</a>
                        </li>
                        <li class="nav-item mt-2">
                            <a class="col-12 btn btn-outline-secondary" href="{{ route('users.index') }}">Sistema</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>
<main class="container">
    {{ $slot }}
</main>
</body>
</html>
