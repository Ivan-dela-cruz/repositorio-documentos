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

                        <div class="col-10">

                            {!! Form::open(['route' => 'user-documents', 'method'=>'GET','autocomplete'=>'off','role'=>'search']) !!}
                            <div class="form-group d-flex">
                                <input name="query" id="inputOrden" type="text" class="form-control"
                                       placeholder="Buscar aquí" value="{{$query}}">

                                <button class="btnSearchOrden btn btn-primary ml-3" type="submit">Buscar</button>
                            </div>
                            {!! Form::close() !!}


                        </div>


                        @if($documents->count()>0)
                            <div class="col-12 mb-5">
                                <h4>Resultados de la búsqueda para "{{$query}}"</h4>
                                <p class="text-muted">Aproximadamente ({{$documents->count()}}) resultados</p>
                            </div>
                            @foreach($documents as $document)
                                <div class="col-12 results">
                                    <div class="pt-4 border-bottom">
                                        <a class="d-block h4"
                                           href="{{route('show-category',$document->id)}}">{{$document->name}}</a>
                                        <a class="page-url text-primary"
                                           href="{{route('query-category',$document->category->id)}}">{{$document->category->name}}</a>
                                        <p>{{$document->description}}</p>
                                    </div>
                                </div>
                            @endforeach
                            {{$documents->render()}}
                        @else
                            <div class="col-12 mb-5">
                                <h2>No se encontrarón artículos relacionados<u class="ml-2"></u></h2>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
