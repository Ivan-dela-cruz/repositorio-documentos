<nav class="navbar top-navbar col-lg-12 col-12 p-0">
    <div class="container">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
            <a class="navbar-brand brand-logo" href="../../index.html"><img
                        src="{{asset('images/logo-white.svg')}}" alt="logo"/></a>
            <a class="navbar-brand brand-logo-mini" href="../../index.html"><img
                        src="{{asset('images/logo-mini.svg')}}" alt="logo"/></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">

            <ul class="navbar-nav navbar-nav-right">



                <li class="nav-item nav-profile dropdown">
                    @guest()
                        <a class="nav-link" href="{{route('login')}}" data-toggle="dropdown" id="profileDropdown">
                            <img src="{{asset('images/demo/boxed-layout.jpg')}}" alt="profile"/>
                        </a>
                        <a href="{{route('login')}}" class="caret text-white">  Iniciar sesión  </a>
                        <a class="nav-link" href="{{route('login')}}" data-toggle="dropdown" id="profileDropdown">
                            <img src="{{asset('images/user.png')}}" alt="profile"/>
                        </a>
                        <a href="{{route('register-user')}}" class="caret text-white">  Registrarse  </a>
                    @else
                        @if(Auth::user()->image==null)
                            <a class="nav-link" href="#" data-toggle="dropdown" id="profileDropdown">
                                <img src="{{asset('images/user.png')}}" alt="profile"/>
                            </a>
                            <span class="caret">  {{ Auth::user()->name }}   </span>
                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                                 aria-labelledby="profileDropdown">
                                <a class="dropdown-item">
                                    <i class="mdi mdi-settings text-primary"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="mdi mdi-logout text-primary"></i>
                                    Cerrar sesión
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        @else
                            <a class="nav-link" href="#" data-toggle="dropdown" id="profileDropdown">
                                <img src="{{Auth::user()->image}}" alt="profile"/>
                            </a>
                            <span class="caret">  {{ Auth::user()->name }}   </span>
                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                                 aria-labelledby="profileDropdown">
                                <a class="dropdown-item">
                                    <i class="mdi mdi-settings text-primary"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="mdi mdi-logout text-primary"></i>
                                    Cerrar sesión
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        @endif

                    @endguest



                </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="horizontal-menu-toggle">
                <span class="mdi mdi-menu"></span>
            </button>
        </div>
    </div>
</nav>
