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


        $request->validate([
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
            'title.min:2' => 'Il titolo deve essere di almeno due caratteri.',
            'description.required' => 'La descrizione è obbligatoria.',
            'description.min:10' => 'La descrizione deve essere di almeno dieci caratteri.',
            'thumb.required' => 'La cover è obbligatoria.',
            'thumb.url' => 'La cover deve essere una URL valida.',
            'price.required' => 'Il prezzo è obbligatorio.',
            'price.min:3' => 'Il prezzo deve essere di almeno 3 caratteri.',
            'series.required' => 'La Serie è obbligatoria.',
            'series.min:2' => 'La Serie deve essere di almeno 2 caratteri.',
            'sale_date.required' => 'La data di uscita è obbligatoria.',
            'sale_date.min:2' => 'La data di uscita deve essere di almeno 2 caratteri.',
            'type.required' => 'Il tipo è obbligatorio.',
            'type.min:2' => 'Il tipo deve essere di almeno 2 caratteri.',
        ]
    );


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

        $request->validate([
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
            'title.min:2' => 'Il titolo deve essere di almeno due caratteri.',
            'description.required' => 'La descrizione è obbligatoria.',
            'description.min:10' => 'La descrizione deve essere di almeno dieci caratteri.',
            'thumb.required' => 'La cover è obbligatoria.',
            'thumb.url' => 'La cover deve essere una URL valida.',
            'price.required' => 'Il prezzo è obbligatorio.',
            'price.min:3' => 'Il prezzo deve essere di almeno 3 caratteri.',
            'series.required' => 'La Serie è obbligatoria.',
            'series.min:2' => 'La Serie deve essere di almeno 2 caratteri.',
            'sale_date.required' => 'La data di uscita è obbligatoria.',
            'sale_date.min:2' => 'La data di uscita deve essere di almeno 2 caratteri.',
            'type.required' => 'Il tipo è obbligatorio.',
            'type.min:2' => 'Il tipo deve essere di almeno 2 caratteri.',
        ]);


        return redirect()->route('admin.comics.show', $comic->id)->with('message', "$comic->title has been modified")->with('alert-type', 'success');
    }

    public function destroy(Comic $comic)
    {
        $comic->delete();
        return redirect()->route('admin.index')->with('message', "$comic->title has been deleted")->with('alert-type', 'danger');
    }
}