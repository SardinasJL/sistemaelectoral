<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <a class="navbar-brand" href="#">SISTEMA ELECTORAL</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link {{  Request::is('/') ? 'active' : ''}}" href="{{ url("/") }}">Inicio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{  Request::is('mesas') ? 'active' : ''}}" href="{{ url("mesas") }}">Mesas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{  Request::is('integrantes') ? 'active' : ''}}" href="{{ url("integrantes") }}">Integrantes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{  Request::is('actas') ? 'active' : ''}}" href="{{ url("actas") }}">Actas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{  Request::is('users') ? 'active' : ''}}" href="{{ url("users") }}">Usuarios</a>
            </li>
        </ul>

        <form action="{{ url("logout") }}" method="post" class="form-inline my-2 my-lg-0">
        {{ csrf_field() }}
            <!---<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">--->
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Cerrar sesión</button>
        </form>

    </div>
</nav>
