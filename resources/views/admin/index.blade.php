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
                            <th scope="col">Type</th>
                            <th scope="col">Price</th>
                            <th scope="col"><a href="{{ route('admin.create') }}" class="btn btn-secondary">Create new
                                    entry</a></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($comics as $comic)
                            <tr>
                                <th>{{ $comic->id }}</th>
                                <td>{{ $comic->title }}</td>
                                <td>{{ $comic->series }}</td>
                                <td>{{ $comic->type }}</td>
                                <td>{{ $comic->price }}</td>
                                <td>
                                    <a href="{{ route('admin.show', $comic->id) }}" class="btn btn-primary">Show</a>
                                    <a href="{{ route('admin.edit', $comic->id) }}" class="btn btn-warning">Edit</a>
                                    <form class="d-inline" action="{{route('admin.delete', $comic->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
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
