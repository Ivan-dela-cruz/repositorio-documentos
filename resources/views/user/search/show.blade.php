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
                        <div class="col-12 results">
                            <div class="pt-4 border-bottom">
                                <h1 class="d-block h3">{{$document->name}}</h1>
                                <a class="page-url text-primary"
                                   href="{{route('query-category',$document->category->id)}}">{{$document->category->name}}</a>
                                <hr>
                                <h3 class="d-block h4">Resumen</h3>
                                <p>{!! $document->description !!}</p>
                                <hr>
                                <h3 class="d-block h4">Contenido</h3>
                                <p>{!!  $document->body!!}</p>
                                @guest()
                                @else
                                    <hr>
                                    <a href="{{route('download-document',$document->id)}}" class="btn btn-success btn-lg align-bottom"><i class="mdi mdi-download"></i>
                                        Descargarchivo pdf
                                    </a>
                                @endguest
                                <hr>
                                <iframe width="850px" height="600px" src="{{url($document->file)}}" frameborder="0"></iframe>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
