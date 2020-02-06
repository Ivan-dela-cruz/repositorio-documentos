<?php

namespace App\Http\Controllers\admin;

use App\Category;
use App\Document;
use App\Documents;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use File;

class DocumentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $id = Auth::id();
        $user = User::find($id);
        $rol = $user->roles->implode('name', ', ');

        if ($rol=='admin'){
            $documents = Documents::orderBy('id', 'DESC')->paginate(3);
            return view('admin.documents.index', compact('documents'));
        }
        if ($rol=='user'){

            $documents = Documents::orderBy('id', 'DESC')->where('id_user',$id)->paginate(3);
            return view('admin.documents.index', compact('documents'));
        }





    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('name', 'ASC')->pluck('name', 'id');

        return view('admin.documents.create', compact('categories'));

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
            'id_category' => 'required|integer',
            'name' => 'required',
            'description' => 'required',
            'body' => 'required',
            'status' => 'required|in:BORRADOR,COMPLETADO,PROCESO',
            'file' => 'file|mimes:pdf',
        ]);

        //CREAMOS UN NUEVO DOCUMENTO
        $document = new Documents();
        $document->id_category = $request->id_category;
        $document->id_user = $request->user_id;
        $document->name = $request->name;
        $document->slug = Str::slug($request->name, '-');
        $document->description = $request->description;
        $document->body = $request->body;
        $document->status = $request->status;
        $document->save();


        $ruta_archivo = "vacio";
        //OBTENEMOS EL NOMBRE QUE LLEVARA LOS ARCHIVOS  EN BASE AL TITULO DE la foto PERO SIN ESPACIOS
        $nombreArchivos = Str::slug($request->name, '-');
        if ($request->file('file')) {

            $archivo = $request->file('file');
            $nombre_archivo = $nombreArchivos . "-" . time() . '.' . $archivo->getClientOriginalExtension();
            $r2 = Storage::disk('documents')->put(utf8_decode($nombre_archivo), \File::get($archivo));
            $ruta_archivo = "storage/documents/" . $nombre_archivo;
        } else {
            $ruta_archivo = "#";
        }
        $document->file = $ruta_archivo;
        $document->save();

        return redirect()->route('documents.index')->with('info', 'Entrada creada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $document = Documents::find($id);

        return view('admin.documents.show', compact('document'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $document = Documents::find($id);

        $categories = Category::orderBy('name', 'ASC')->pluck('name', 'id');
        return view('admin.documents.edit', compact('categories', 'document'));
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
        $request->validate([
            'id_category' => 'required|integer',
            'name' => 'required',
            'description' => 'required',
            'body' => 'required',
            'status' => 'required|in:BORRADOR,COMPLETADO,PROCESO',
            'file' => 'file|mimes:pdf',
        ]);

        //CREAMOS UN NUEVO DOCUMENTO
        $document = Documents::find($id);
        $document->id_category = $request->id_category;
        $document->id_user = $request->user_id;
        $document->name = $request->name;
        $document->slug = Str::slug($request->name, '-');
        $document->description = $request->description;
        $document->body = $request->body;
        $document->status = $request->status;
        $document->save();



        $ruta_archivo = "vacio";
        //OBTENEMOS EL NOMBRE QUE LLEVARA LOS ARCHIVOS  EN BASE AL TITULO DE la foto PERO SIN ESPACIOS
        $nombreArchivos = Str::slug($request->name, '-');
        if ($request->file('file')) {
            $this->deletePdf($document->id);
            $archivo = $request->file('file');
            $nombre_archivo = $nombreArchivos . "-" . time() . '.' . $archivo->getClientOriginalExtension();
            $r2 = Storage::disk('documents')->put(utf8_decode($nombre_archivo), \File::get($archivo));
            $ruta_archivo = "storage/documents/" . $nombre_archivo;
            $document->file = $ruta_archivo;
            $document->save();
        }


        return redirect()->route('documents.index')->with('info', 'Entrada actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $document = Documents::find($id);
        $this->deletePdf($document->id);
        $document->delete();


        return back()->with('info', 'Eliminado correctamente');
    }

    public function deletePdf($id)
    {
        $document = Documents::find($id);
        $url_pdf = $document->file;
        $rs = File::delete($url_pdf);
        $document->file = "";
        $document->save();
    }
}
