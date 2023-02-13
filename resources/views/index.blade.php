@extends('layouts/app')

@section('main-content')
<section class="container">
    <div class="row">
        <div class="col-12">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Title</th>
                        <th scope="col">Series</th>
                        <th scope="col">Price</th>
                        <th scope="col">...</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($comics as $comic)
                        <tr>
                            <th>{{ $comic->id }}</th>
                            <td>{{ $comic->title }}</td>
                            <td>{{ $comic->series }}</td>
                            <td>{{ $comic->price }}</td>
                            <td>
                                <a href="{{ route('comics.show', $comic->id)}}" class="btn btn-primary">Show</a>
                            </td>
                        </tr>
                    @empty
                    <h2>
                        Non ci sono fumetti da mostrare
                    </h2>
                    @endforelse
        
                </tbody>
            </table>

        </div>
    </div>
</section>
@endsection
