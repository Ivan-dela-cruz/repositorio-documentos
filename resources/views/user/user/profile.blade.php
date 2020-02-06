@extends('user.base.base')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="border-bottom text-center pb-4">
                                <img src="{{ Auth::user()->image}}" alt="profile"
                                     class="img-lg rounded-circle mb-3"/>
                                <div class="mb-3">
                                    <h3>{{ Auth::user()->name }} {{ Auth::user()->last_name }}</h3>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <a href="#" class="btn btn-success mr-1">Editar</a>
                                    <a class="btn btn-success" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Cerrar sesión
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="d-block d-md-flex justify-content-between mt-4 mt-md-0">
                                <div class="text-center mt-4 mt-md-0">
                                    <div class="mt-4 py-5 border-top border-bottom">
                                        <ul class="nav profile-navbar">
                                            <li class="nav-item">
                                                <a class="nav-link" href="#">
                                                    <i class="mdi mdi-account-outline"></i>
                                                    {{ Auth::user()->gender }}
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#">
                                                    <i class="mdi mdi-newspaper"></i>
                                                    {{ Auth::user()->born }}
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#">
                                                    <i class="mdi mdi-email"></i>
                                                    {{ Auth::user()->email }}
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#">
                                                    <i class="mdi mdi-attachment"></i>
                                                    {{ Auth::user()->description }}
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection