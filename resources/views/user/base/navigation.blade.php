<nav class="bottom-navbar">
    <div class="container">
        <ul class="nav page-navigation">
            <li class="nav-item">
                <a class="nav-link" href="{{route('documents.index')}}">
                    <i class="mdi mdi-shield-half-full menu-icon"></i>
                    <span class="menu-title">Panel de control</span>
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
            @endguest



        </ul>
    </div>
</nav>
