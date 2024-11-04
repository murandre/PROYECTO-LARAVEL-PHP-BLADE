<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gestión de Gimnasio</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Gestión de Gimnasio</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    @auth
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('socios.index') ? 'active' : '' }}" href="{{ route('socios.index') }}">Socios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('entrenadores.index') ? 'active' : '' }}" href="{{ route('entrenadores.index') }}">Entrenadores</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('rutinas.index') ? 'active' : '' }}" href="{{ route('rutinas.index') }}">Rutinas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('pagos.index') ? 'active' : '' }}" href="{{ route('pagos.index') }}">Pagos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('equipos.index') ? 'active' : '' }}" href="{{ route('equipos.index') }}">Equipos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('inscripciones.index') ? 'active' : '' }}" href="{{ route('inscripciones.index') }}">Inscripciones</a>
                        </li>
                    @endauth
                </ul>
                <ul class="navbar-nav ms-auto">
                    @guest
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('registro') ? 'active' : '' }}" href="{{ route('registro') }}">Registro</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('login') ? 'active' : '' }}" href="{{ route('login') }}">Login</a>
                        </li>
                    @endguest
                    @auth
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button class="btn btn-link nav-link">Logout</button>
                            </form>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
