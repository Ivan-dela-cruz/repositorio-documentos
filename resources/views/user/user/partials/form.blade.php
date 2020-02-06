
<div class="form-group">
    {{ Form::label('name', 'Nombres') }}
    {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) }}
</div>
@if($errors->has('name'))
    <label class="text-danger">{{$errors->first('name')}} </label>
@endif
<div class="form-group">
    {{ Form::label('last_name', 'Apellidos') }}
    {{ Form::text('last_name', null, ['class' => 'form-control', 'id' => 'last_name']) }}
</div>
@if($errors->has('last_name'))
    <label class="text-danger">{{$errors->first('last_name')}} </label>
@endif
<div class="form-group">
    {{ Form::label('gender', 'Género') }}
    {{Form::select('gender',array(
               'Masculino' => 'Masculino',
               'Femenino' => 'Femenino'
               ),null,['class'=>'form-control','id'=>'gender'])}}
</div>
<div class="form-group">
    {{ Form::label('email', 'Email') }}
    {{ Form::email('email', null, ['class' => 'form-control', 'id' => 'email']) }}
</div>
@if($errors->has('email'))
    <label class="text-danger">{{$errors->first('email')}} </label>
@endif
<div class="form-group">
    {{ Form::label('description', 'Descripción') }}
    {{ Form::text('description', null, ['class' => 'form-control', 'id' => 'description']) }}
</div>

<div class="form-group">
    {{ Form::label('born', 'Fecha de nacimiento') }}
    {{ Form::date('born', null, ['class' => 'form-control', 'id' => 'born']) }}
</div>
@if($errors->has('born'))
    <label class="text-danger">{{$errors->first('born')}} </label>
@endif
<div class="form-group">
    {{ Form::label('image', 'Imagen') }}
    {{ Form::file('image',  ['class' => 'file-upload-default']) }}
    {{---<input type="file" name="img[]" class="file-upload-default">--}}
    <div class="input-group col-xs-12">
        <input type="text" class="form-control file-upload-info" disabled
               placeholder="Upload Image">
        <span class="input-group-append">
            <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
        </span>
    </div>

</div>
<div class="form-group">
    {{ Form::label('password', 'Contraseña') }}
    {{ Form::password('password', ['class' => 'form-control', 'id' => 'password']) }}
</div>
@if($errors->has('password'))
    <label class="text-danger">{{$errors->first('password')}} </label>
@endif
<div class="form-group">
    {{ Form::submit('Guardar', ['class' => 'btn btn-primary mr-2']) }}
    <a href="{{route('profile-user')}}" class="btn btn-danger">Cancel</a>
</div>


