<nav class="bottom-navbar">
    <div class="container">
        <ul class="nav page-navigation">
            <li class="nav-item">
                <a class="nav-link" href="{{route('documents.index')}}">
                    <i class="mdi mdi-shield-half-full menu-icon"></i>
                    <span class="menu-title">Panel de control</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('user-documents')}}">
                    <i class="mdi mdi-file-document menu-icon"></i>
                    <span class="menu-title">Artículos</span>
                </a>
            </li>

            @guest()

            @else
                <li class="nav-item">
                    <a href="{{route('profile-user')}}" class="nav-link">
                        <i class="mdi mdi-file-document-box-outline menu-icon"></i>
                        <span class="menu-title">Mi perfil</span>
                        <i class="menu-arrow"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <i class="mdi mdi-file-document menu-icon"></i>
                        <span class="menu-title">Cerrar sesión</span>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            @endguest



        </ul>
    </div>
</nav>
