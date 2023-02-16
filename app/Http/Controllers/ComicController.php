<?php

namespace App\Http\Controllers;

use App\Models\Comic;
use Illuminate\Http\Request;

class ComicController extends Controller
{
    public function getValidated(Request $request)
    {
        return $request->validate([
            'title' => 'required|string|min:2|max:255',
            'description' => 'required|string|min:10',
            'thumb' => 'required|url|max:255',
            'price' => 'required|string|min:3|max:8',
            'series' => 'required|string|min:2|max:50',
            'sale_date' => 'required|string|min:2|max:20',
            'type' => 'required|string|min:2|max:30',
        ],
        [
            'title.required' => 'Il titolo è obbligatorio.',
            'title.min' => 'Il titolo deve essere di almeno due caratteri.',
            'title.max' => 'Il titolo non deve essere più di 255 caratteri.',
            'description.required' => 'La descrizione è obbligatoria.',
            'description.min' => 'La descrizione deve essere di almeno dieci caratteri.',
            'thumb.required' => 'La cover è obbligatoria.',
            'thumb.url' => 'La cover deve essere una URL valida.',
            'thumb.max' => 'La cover deve essere una URL valida e non deve essere più di 255 caratteri.',
            'price.required' => 'Il prezzo è obbligatorio.',
            'price.min' => 'Il prezzo deve essere di almeno 3 caratteri.',
            'price.max' => 'Il prezzo non deve essere più di 8 caratteri.',
            'series.required' => 'La Serie è obbligatoria.',
            'series.min' => 'La Serie deve essere di almeno 2 caratteri.',
            'series.max' => 'La Serie non deve essere più di 50 caratteri.',
            'sale_date.required' => 'La data di uscita è obbligatoria.',
            'sale_date.min' => 'La data di uscita deve essere di almeno 2 caratteri.',
            'sale_date.max' => 'La data di uscita non deve essere più di 20 caratteri.',
            'type.required' => 'Il tipo è obbligatorio.',
            'type.min' => 'Il tipo deve essere di almeno 2 caratteri.',
            'type.max' => 'Il tipo non deve essere più di 30 caratteri.',
        ]);
    }
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
        $this->getValidated($request);
        
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
        $this->getValidated($request);
        
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