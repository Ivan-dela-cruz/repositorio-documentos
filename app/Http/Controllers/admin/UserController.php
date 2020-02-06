<?php

namespace App\Http\Controllers\admin;

use App\User;
use http\Exception\InvalidArgumentException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use File;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = User::orderBy('id', 'DESC')->paginate(3);

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([

            'last_name' => 'required|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/u',
            'name' => 'required|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/u',
            'email' => 'required|string|email|max:255|unique:users',
            'born' => 'required',
            'password' => 'required',

        ]);


        //CREAMOS UN NUEVO OBJETO USUARIO
        $user = new User();
        //ASIGNACION DE VALORES A LOS ATRIBUTOS DE LA CLASE USER
        $user->name = $request->name;;
        $user->last_name = $request->last_name;
        $user->description = $request->description;
        $user->gender = $request->gender;
        $user->born = $request->born;
        $user->email = $request->email;

        //CIFRADO DE LA CONTRASEÑA
        $user->password = Hash::make($request->password);
        //GUARADAR LOS DATOS EN LA TABLA USUARIOS
        $user->save();


        $ruta_archivo = "vacio";
        //OBTENEMOS EL NOMBRE QUE LLEVARA LOS ARCHIVOS  EN BASE AL TITULO DE la foto PERO SIN ESPACIOS

        $nombreArchivos = Str::slug($request->name, '-');
        if ($request->file('image')) {

            $archivo = $request->file('image');
            $nombre_archivo = 'profile-' . time() . '.' . $archivo->getClientOriginalExtension();
            $r2 = Storage::disk('photos')->put(utf8_decode($nombre_archivo), \File::get($archivo));
            $ruta_archivo = "storage/photo/" . $nombre_archivo;
        } else {
            $ruta_archivo = "#";
        }

        /*$file = $request->file('image');

         // Generate a file name with extension
         $fileName = 'profile-'.time().'.'.$file->getClientOriginalExtension();

         // Save the file
         $path = $file->storeAs('files', $fileName); */
        $user->image = $ruta_archivo;
        $user->save();

        $rol = $request->role_id;
        if ($rol == 1) {
            $user->assignRole('admin');
        } else {
            $user->assignRole('user');
        }
        return redirect()->route('users.create');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id)->delete();

        return back()->with('info', 'Eliminado correctamente');
    }


    public function registerUser()
    {

        return view('user.user.register');
    }

    public function profileUser()
    {

        return view('user.user.profile');
    }

    public function RegisterNewUser(Request $request)
    {
        $request->validate([

            'last_name' => 'required|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/u',
            'name' => 'required|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/u',
            'email' => 'required|string|email|max:255|unique:users',
            'born' => 'required',
            'password' => 'required',

        ]);


        //CREAMOS UN NUEVO OBJETO USUARIO
        $user = new User();
        //ASIGNACION DE VALORES A LOS ATRIBUTOS DE LA CLASE USER
        $user->name = $request->name;;
        $user->last_name = $request->last_name;
        $user->description = $request->description;
        $user->gender = $request->gender;
        $user->born = $request->born;
        $user->email = $request->email;

        //CIFRADO DE LA CONTRASEÑA
        $user->password = Hash::make($request->password);
        //GUARADAR LOS DATOS EN LA TABLA USUARIOS
        $user->save();


        $ruta_archivo = "vacio";
        //OBTENEMOS EL NOMBRE QUE LLEVARA LOS ARCHIVOS  EN BASE AL TITULO DE la foto PERO SIN ESPACIOS

        $nombreArchivos = Str::slug($request->name, '-');
        if ($request->file('image')) {

            $archivo = $request->file('image');
            $nombre_archivo = 'profile-' . time() . '.' . $archivo->getClientOriginalExtension();
            $r2 = Storage::disk('photos')->put(utf8_decode($nombre_archivo), \File::get($archivo));
            $ruta_archivo = "storage/photo/" . $nombre_archivo;
        } else {
            $ruta_archivo = "#";
        }

        $user->image = $ruta_archivo;
        $user->save();

        $user->assignRole('user');

        return redirect()->route('login');
    }
}
