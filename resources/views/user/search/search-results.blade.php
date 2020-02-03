@extends('user.base.base')
@section('title')
    Inicio
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-2">
            <table class="table table-hover table-bordered">
                <thead>
                <tr>
                    <th>Categorías</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td><a href="{{route('query-category',0)}}">Ver todo</a></td>
                </tr>
                @foreach($categories as $category)
                    <tr>
                        <td><a href="{{route('query-category',$category->id)}}">{!! $category->name !!}</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-lg-10">
            <div class="card">
                <div class="card-body">
                    <div class="row">

                        <div class="col-12">
                            <form action="#">
                                <div class="form-group d-flex">
                                    <input type="text" class="form-control" placeholder="Search Here"
                                           value="Urbanui">
                                    <button type="submit" class="btn btn-primary ml-3">Search</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-12 mb-5">
                            <h2>Resultados de la búsqueda para <u class="ml-2">"Urbanui"</u></h2>
                            <p class="text-muted">Aproximadamente ({{$documents->count()}}) resultados</p>
                        </div>

                        @foreach($documents as $document)
                            <div class="col-12 results">
                                <div class="pt-4 border-bottom">
                                    <a class="d-block h4" href="#">{{$document->name}}</a>
                                    <a class="page-url text-primary" href="#">{{$document->category->name}}</a>
                                    <p class="page-description mt-1 w-75 text-muted">{{$document->description}}</p>
                                </div>
                            </div>
                        @endforeach
                        {{$documents->render()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
