<?php

namespace App\Http\Controllers\user;

use App\Category;
use App\Documents;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DocumentsUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = trim($request->get('query'));
        if ($query != '') {
            $documents = Documents::orderBy('id', 'DESC')
                ->where('name', 'like', '%' . $query . '%')->paginate(3);
            $categories = Category::all();
            return view('user.search.search-results', compact('documents', 'categories','query'));
        }
        else{
            $query ="";
            $categories = Category::all();
            $documents = Documents::orderBy('id', 'DESC')->paginate(3);

            return view('user.search.search-results', compact('documents', 'categories','query'));
        }


       // $documents = Documents::orderBy('id', 'DESC')->paginate(3);
       // $categories = Category::all();


    }


    public function queryCategory($id)
    {
        if ($id != 0) {
            $documents = Documents::orderBy('id', 'DESC')->where('id_category', $id)->paginate(3);
        } else {
            $documents = Documents::orderBy('id', 'DESC')->paginate(3);
        }

        $categories = Category::all();
        $query ="";

        return view('user.search.search-results', compact('documents', 'categories','query'));
    }

    public function downloadDocument($id)
    {
        $document = Documents::find($id);
        $rutaPdf = $document->file;
        return response()->download($rutaPdf, $document->name . ".pdf");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if ($id != 0) {
            $document = Documents::find($id);
        }
        $categories = Category::all();
        $query ="";

        return view('user.search.show', compact('document', 'categories','query'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
