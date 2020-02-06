@extends('user.base.base')
@section('content')
    <div class="col-10 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Registro de nuevo usuario</h4>
                {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'PUT', 'files' => true]) !!}
                @csrf
                @csrf
                @include('user.user.partials.form')

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection