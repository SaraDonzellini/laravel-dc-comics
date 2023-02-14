<?php

namespace App\Http\Controllers;

use App\Models\Comic;
use Illuminate\Http\Request;

class ComicController extends Controller
{
    public function index()
    {
        $comics = Comic::all();
        return view('admin/index', compact('comics'));
    }

    public function show(Comic $comic)
    {

        return view('admin.show', compact('comic'));
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $newComic = new Comic();
        $newComic->fill($data);
        $newComic->save();


        return redirect()->route('admin.show', $newComic->id);
    }
}