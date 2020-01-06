@extends('admin.base.base')

@section('title')
    Lista de categorías
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
                        <p class="text-muted mb-0 mr-1 hover-cursor">Categoría</p>
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
                <h3 class="card-title">Categorias registradas</h3>
                <hr>
                <a href="{{route('categories.create')}}" class="btn btn-success btn-sm align-content-end">
                    <i class="mdi mdi-plus menu-icon"></i>
                    <span class="menu-title">Agregar</span>
                </a>
                <div class="table-responsive">
                    <table id="order-listing" class="table">
                        <thead>
                        <tr>

                            <th>
                                Nombre
                            </th>
                            <th>
                                Url
                            </th>
                            <th>
                                Descripción
                            </th>
                            <th>
                                Fecha de alta
                            </th>
                            <th>
                                Fecha de modificación
                            </th>
                            <th>
                               Acciones
                            </th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($categories as $category)
                            <tr>
                                <td>
                                    {{$category->name}}
                                </td>
                                <td>
                                    {{$category->slug}}
                                </td>
                                <td>
                                    {{$category->description }}
                                </td>
                                <td>
                                    {{$category->created_at}}
                                </td>
                                <td>
                                    {{$category->updated_at}}
                                </td>
                                <td>
                                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-success">
                                        <i class="mdi mdi-folder-edit menu-icon"></i>
                                        <span class="menu-title">Editar</span>
                                    </a>
                                    {!! Form::open(['route' => ['categories.destroy', $category->id], 'method' => 'DELETE']) !!}
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
                    {{ $categories->render() }}
                </div>

            </div>
        </div>
    </div>
@endsection
