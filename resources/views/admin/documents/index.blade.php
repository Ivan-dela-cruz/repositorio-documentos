@extends('admin.base.base')

@section('title')
    Lista de documentos
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
                        <p class="text-muted mb-0 mr-1 hover-cursor">Listado</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Documenos registrados</h4>

                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>
                                PDF
                            </th>
                            <th>
                                Título
                            </th>
                            <th>
                                Categoría
                            </th>
                            <th>
                                Estado
                            </th>
                            <th width="20">
                                Acciones
                            </th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($documents as $document)
                            <tr>
                                <td class="py-1">


                                    <a href="{{ route('documents.show', $document->id) }}" class="">
                                        <img src="{{asset('images/pdf.png')}}" alt="image"/>
                                    </a>


                                </td>
                                <td>
                                    {{$document->name}}
                                </td>
                                <td>
                                    {{-- <div class="progress">
                                         <div class="progress-bar bg-success" role="progressbar"
                                              style="width: 25%" aria-valuenow="25" aria-valuemin="0"
                                              aria-valuemax="100"></div>
                                     </div>--}}
                                    {{$document->category->name}}
                                </td>
                                <td>
                                    {{$document->status}}
                                </td>
                                <td width="20">

                                    <a href="{{ route('documents.edit', $document->id) }}"
                                       class="btn btn-sm btn-success">
                                        <i class="mdi mdi-folder-edit menu-icon"></i>
                                        <span class="menu-title">Editar</span>
                                    </a>
                                    {!! Form::open(['route' => ['documents.destroy', $document->id], 'method' => 'DELETE']) !!}
                                    <button class="btn btn-sm btn-danger">
                                        <i class="mdi mdi-delete menu-icon"></i>
                                        <span class="menu-title">Borrar</span>
                                    </button>
                                    {!! Form::close() !!}
                                </td>
                            </tr>

                        @endforeach

                        </tbody>
                    </table>
                    {{ $documents->render() }}
                </div>
            </div>
        </div>
    </div>
@endsection
