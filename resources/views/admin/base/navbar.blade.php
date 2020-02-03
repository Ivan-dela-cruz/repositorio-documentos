<ul class="nav">
    <li class="nav-item">
        <a class="nav-link" href="index.html">
            <i class="mdi mdi-shield-half-full menu-icon"></i>
            <span class="menu-title">Panel de control</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false"
           aria-controls="ui-basic">
            <i class="mdi mdi-checkbox-blank-circle-outline menu-icon"></i>
            <span class="menu-title">Usuarios</span>
            <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic">
            <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link"
                                        href="{{route('users.create')}}">Nuevo</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('users.index')}}">Listado</a>
                </li>

            </ul>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-advanced" aria-expanded="false"
           aria-controls="ui-advanced">
            <i class="mdi mdi-palette menu-icon"></i>
            <span class="menu-title">Categorías</span>
            <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-advanced">
            <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="{{route('categories.create')}}">Nuevo</a>
                </li>
                <li class="nav-item"><a class="nav-link"
                                        href="{{route('categories.index')}}">Listado</a></li>
            </ul>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#editors" aria-expanded="false"
           aria-controls="editors">
            <i class="mdi mdi-pencil menu-icon"></i>
            <span class="menu-title">Documentos</span>
            <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="editors">
            <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="{{route('documents.create')}}">Nuevo</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('documents.index')}}">Archivos</a>
                </li>
            </ul>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#editors" aria-expanded="false"
           aria-controls="editors">
            <i class="mdi mdi-account-off menu-icon"></i>
            <span class="menu-title">Sesión</span>
            <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="editors">
            <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>


        </div>
    </li>


</ul>

