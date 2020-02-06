@extends('admin.base.base')

@section('title')
    Registro de documentos
@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('vendors/select2/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/select2-bootstrap-theme/select2-bootstrap.min.css')}}">
@endsection
@section('navigation')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-center dashboard-header flex-wrap mb-3 mb-sm-0">
                    <h5 class="mr-4 mb-0 font-weight-bold">Panel de control</h5>
                    <div class="d-flex align-items-baseline dashboard-breadcrumb">
                        <p class="text-muted mb-0 mr-1 hover-cursor">Documentos</p>
                        <i class="mdi mdi-chevron-right mr-1 text-muted"></i>
                        <p class="text-muted mb-0 mr-1 hover-cursor">Nuevo</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Crear nuevo documento</h4>
                {!! Form::open(['route' => 'documents.store', 'files' => true]) !!}
                @csrf
                @include('admin.documents.partials.form')

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection


