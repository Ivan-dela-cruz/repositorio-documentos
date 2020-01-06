@extends('admin.base.base')

@section('title')
    Revisar
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
                        <p class="text-muted mb-0 mr-1 hover-cursor">Revisar</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="faq-section">
                        <div class="container-fluid bg-success py-2">
                            <p class="mb-0 text-white">Section 1</p>
                        </div>
                        <div id="accordion-1" class="accordion">
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <h1 class="mb-0">
                                        <a data-toggle="collapse" data-target="#collapseOne"
                                           aria-expanded="true" aria-controls="collapseOne">
                                           {{$document->name}}
                                        </a>
                                    </h1>
                                </div>
                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                     data-parent="#accordion-1">
                                    <div class="card-body">
                                        <p class="mb-0">{{$document->description}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingTwo">
                                    <h5 class="mb-0">
                                        <a data-toggle="collapse" data-target="#collapseTwo"
                                           aria-expanded="false" aria-controls="collapseTwo">
                                             Contenido
                                        </a>
                                    </h5>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                     data-parent="#accordion-1">
                                    <div class="card-body">
                                        <p class="mb-0">{{$document->body}}.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingThree">
                                    <h5 class="mb-0">
                                        <a data-toggle="collapse" data-target="#collapseThree"
                                           aria-expanded="false" aria-controls="collapseThree">
                                            Vista previa
                                        </a>
                                    </h5>
                                </div>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                     data-parent="#accordion-1">
                                    <div class="card-body">
                                        <iframe width="800px" height="600px" src="{{url($document->file)}}" frameborder="0"></iframe>


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
