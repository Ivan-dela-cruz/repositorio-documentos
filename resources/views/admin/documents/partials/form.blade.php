{{ Form::hidden('user_id', auth()->user()->id) }}
<div class="form-group">
    {{ Form::label('id_category', 'Categorías') }}
    {{ Form::select('id_category', $categories, null, ['class' => 'form-control']) }}
</div>
@if($errors->has('id_category'))
    <label class="text-danger">{{$errors->first('id_category')}} </label>
@endif
<div class="form-group">
    {{ Form::label('name', 'Nombre del documento') }}
    {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) }}
</div>
@if($errors->has('name'))
    <label class="text-danger">{{$errors->first('name')}} </label>
@endif
<div class="form-group">
    {{ Form::label('description', 'Resumen') }}
    {{ Form::textarea('description', null, ['class' => 'form-control', 'id' => 'simpleMde']) }}
</div>
@if($errors->has('description'))
    <label class="text-danger">{{$errors->first('description')}} </label>
@endif
<div class="form-group">
    {{ Form::label('file', 'Documento') }}
    {{ Form::file('file',  ['class' => 'file-upload-default']) }}
    {{---<input type="file" name="img[]" class="file-upload-default">--}}
    <div class="input-group col-xs-12">
        <input type="text" class="form-control file-upload-info" disabled
               placeholder="Upload Image">
        <span class="input-group-append">
            <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
        </span>
    </div>

</div>
@if($errors->has('file'))
    <label class="text-danger">{{$errors->first('file')}} </label>
@endif


<div class="form-group">
    {{ Form::label('body', 'Contenido') }}
    {{ Form::textarea('body', null, ['class' => 'form-control','id'=>'summernoteExample']) }}
</div>



@if($errors->has('body'))
    <label class="text-danger">{{$errors->first('body')}} </label>
@endif
<div class="form-group">
    {{ Form::label('slug', 'Estado:') }}
    <label>
        {{ Form::radio('status', 'COMPLETADO') }} Completado
    </label>
    <label>
        {{ Form::radio('status', 'PROCESO') }} Proceso
    </label>
    <label>
        {{ Form::radio('status', 'BORRADOR') }} Borrador
    </label>
</div>
@if($errors->has('status'))
    <label class="text-danger">{{$errors->first('status')}} </label>
@endif
<div class="form-group">
    {{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
</div>

