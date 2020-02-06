<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from www.urbanui.com/datavizui/template/demo/vertical-default-light/pages/samples/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 11 Aug 2019 21:20:20 GMT -->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>DatavizUI Admin</title>
    <!-- base:css -->
    <link rel="stylesheet" href="{{asset('vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/css/vendor.bundle.base.css')}}">

    <link rel="stylesheet" href="{{asset('css/vertical-layout-light/style.css')}}">

    <link rel="shortcut icon" href="{{asset('images/favicon.png')}}"/>


    <link rel="stylesheet" href="{{asset('vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/css/vendor.bundle.base.css')}}">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="http://www.urbanui.com/"/>
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('css/vertical-layout-light/style.css')}}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{asset('images/favicon.png')}}"/>


    <link rel="stylesheet" href="{{asset('vendors/summernote/dist/summernote-bs4.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/quill/quill.snow.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/simplemde/simplemde.min.css')}}">
</head>

<body>
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth px-0">
            <div class="row w-100 mx-0">
                <div class="col-lg-4 mx-auto">
                    <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                        <div class="brand-logo">
                            <img src="{{asset('images/logo.svg')}}" alt="logo">
                        </div>
                        <h4>¿Nuevo aquí?</h4>
                        <h6 class="font-weight-light">Registrarse es fácil. Solo toma unos pocos pasos</h6>
                        {!! Form::open(['route' => 'resgiter-user', 'files' => true]) !!}
                        <div class="form-group">
                            {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name','placeholder'=>'Nombres']) }}
                        </div>
                        @if($errors->has('name'))
                            <label class="text-danger">{{$errors->first('name')}} </label>
                        @endif
                        <div class="form-group">
                            {{ Form::text('last_name', null, ['class' => 'form-control', 'id' => 'last_name','placeholder'=>'Apellidos']) }}
                        </div>
                        @if($errors->has('last_name'))
                            <label class="text-danger">{{$errors->first('last_name')}} </label>
                        @endif
                        <div class="form-group">
                            {{Form::select('gender',array(
                                       'Masculino' => 'Masculino',
                                       'Femenino' => 'Femenino'
                                       ),null,['class'=>'form-control','id'=>'gender'])}}
                        </div>
                        <div class="form-group">
                            {{ Form::email('email', null, ['class' => 'form-control', 'id' => 'email','placeholder'=>'Email']) }}
                        </div>
                        @if($errors->has('email'))
                            <label class="text-danger">{{$errors->first('email')}} </label>
                        @endif
                        <div class="form-group">
                            {{ Form::text('description', null, ['class' => 'form-control', 'id' => 'description','placeholder'=>'Descripción']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::date('born', null, ['class' => 'form-control', 'id' => 'born','placeholder'=>'Fecha nacimientos']) }}
                        </div>
                        @if($errors->has('born'))
                            <label class="text-danger">{{$errors->first('born')}} </label>
                        @endif
                        <div class="form-group">
                            {{ Form::file('image',  ['class' => 'file-upload-default','placeholder'=>'Fotografía']) }}
                            {{---<input type="file" name="img[]" class="file-upload-default">--}}
                            <div class="input-group col-xs-12">
                                <input type="text" class="form-control file-upload-info" disabled
                                       placeholder="Upload Image">
                                <span class="input-group-append">
                                     <button class="file-upload-browse btn btn-primary"
                                             type="button">Subir foto</button>
                                    </span>
                            </div>

                        </div>
                        <div class="form-group">
                            {{ Form::password('password', ['class' => 'form-control', 'id' => 'password','placeholder'=>'Contraseña']) }}
                            <label id="lb_pass" hidden class="form-check-label text-danger">
                               La contraseña debe contener minímo 6 carácteres
                            </label>
                        </div>
                        <div class="form-group">
                            {{ Form::password('password2', ['class' => 'form-control', 'id' => 'password2','placeholder'=>'Confirmar contraseña']) }}
                            <label id="lb_pass2" hidden class="form-check-label  text-danger">
                                Las contraseñas no coinciden
                            </label>
                        </div>
                        <div class="mb-4">
                            <div class="form-check">
                                <label class="form-check-label text-muted">
                                    <input type="checkbox" class="form-check-input">
                                    Acepto todos los términos y condiciones
                                </label>
                            </div>
                        </div>
                        <div class="mt-3">
                            <input disabled="disabled" id="btnguardar" type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn"
                              value="REGISTRAR"/>
                        </div>
                        <div class="text-center mt-4 font-weight-light">
                            ¿Ya tienes una cuenta? <a href="{{route('login')}}" class="text-primary">Iniciar sesión</a>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- base:js -->
<script src="{{asset('vendors/js/vendor.bundle.base.js')}}"></script>
<!-- endinject -->
<!-- inject:js -->
<script src="{{asset('js/off-canvas.js')}}"></script>
<script src="{{asset('js/hoverable-collapse.js')}}"></script>
<script src="{{asset('js/template.js')}}"></script>
<script src="{{asset('js/settings.js')}}"></script>
<script src="{{asset('js/todolist.js')}}"></script>


<script src="{{asset('vendors/js/vendor.bundle.base.js')}}"></script>
<script src="{{asset('js/off-canvas.js')}}"></script>
<script src="{{asset('js/hoverable-collapse.js')}}"></script>
<script src="{{asset('js/template.js')}}"></script>
<script src="{{asset('js/settings.js')}}"></script>
<script src="{{asset('js/todolist.js')}}"></script>
<script src="{{asset('vendors/chart.js/Chart.min.js')}}"></script>
<script src="{{asset('js/dashboard.js')}}"></script>


<script src="{{asset('vendors/typeahead.js/typeahead.bundle.min.js')}}"></script>
<script src="{{asset('vendors/select2/select2.min.js')}}"></script>
<script src="{{asset('js/file-upload.js')}}"></script>
<script src="{{asset('js/typeahead.js')}}"></script>
<script src="{{asset('js/select2.js')}}"></script>


<script src="{{asset('vendors/summernote/dist/summernote-bs4.min.js')}}"></script>
<script src="{{asset('vendors/tinymce/tinymce.min.js')}}"></script>
<script src="{{asset('vendors/quill/quill.min.js')}}"></script>
<script src="{{asset('vendors/simplemde/simplemde.min.js')}}"></script>
<script src="{{asset('js/editorDemo.js')}}"></script>
<script src="{{asset('jquery/jquery-3.1.1.min.js')}}"></script>
<script>
    $(document).ready(function () {

    });
    $('#password').keyup(function () {
        var password1 = $('#password').val();
        if(password1.length<6){
            $('#lb_pass').removeAttr('hidden')
        }
        else {
            $('#lb_pass').attr('hidden','hidden');
        }
    });
    $('#password2').keyup(function () {
       var password1 = $('#password').val();
       if(password1==$(this).val()){

           $('#lb_pass2').removeClass('text-danger');
           $('#lb_pass2').addClass('text-success');
           $('#lb_pass2').text("completado");
           $('#btnguardar').removeAttr('disabled')
       }
       else {
           $('#lb_pass2').removeAttr('hidden')
           $('#lb_pass2').removeClass('text-success');
           $('#lb_pass2').addClass('text-danger');
           $('#lb_pass2').text(" Las contraseñas no coinciden");
           $('#btnguardar').attr('disabled','disabled')
       }
    });

</script>
<!-- endinject -->
</body>


<!-- Mirrored from www.urbanui.com/datavizui/template/demo/vertical-default-light/pages/samples/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 11 Aug 2019 21:20:20 GMT -->
</html>
