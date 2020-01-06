<div class="form-group">
    {{ Form::label('name', 'Nombre de la categoría') }}
    {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'required'=> 'required'] ) }}
</div>
@if($errors->has('name'))
    <label class="text-danger">{{$errors->first('name')}} </label>
@endif

<div class="form-group">
    {{ Form::label('description', 'Descripción') }}
    {{ Form::textarea('description', null, ['class' => 'form-control', 'required'=> 'required']) }}
</div>
@if($errors->has('description'))
    <label class="text-danger">{{$errors->first('description')}} </label>
@endif

<div class="form-group">
    {{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
    <button class="btn btn-danger">Cancel</button>
</div>
