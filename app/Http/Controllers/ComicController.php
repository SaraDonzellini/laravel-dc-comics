<?php

namespace App\Http\Controllers;

use App\Models\Comic;
use Illuminate\Http\Request;

class ComicController extends Controller
{
    public function index()
    {
        $comics = Comic::all();
        return view('admin.index', compact('comics'));
    }

    public function show(Comic $comic)
    {

        return view('admin.comics.show', compact('comic'));
    }

    public function create()
    {
        return view('admin.comics.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $newComic = new Comic();
        $newComic->fill($data);
        $newComic->save();


        return redirect()->route('admin.comics.show', $newComic->id)->with('message', "$newComic->title has been created")->with('alert-type', 'info');
    }

    public function edit($id)
    {
        $comic = Comic::findOrFail($id);
        return view('admin.comics.edit', compact('comic'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $comic = Comic::findOrFail($id);
        $comic->update($data);

        return redirect()->route('admin.comics.show', $comic->id)->with('message', "$comic->title has been modified")->with('alert-type', 'success');
    }

    public function destroy(Comic $comic)
    {
        $comic->delete();
        return redirect()->route('admin.index')->with('message', "$comic->title has been deleted")->with('alert-type', 'danger');
    }
}