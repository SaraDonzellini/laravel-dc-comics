@extends('layouts/app')

@section('main-content')
    <section class="container">
        <div class="row">
            @if (session('message'))
                <div class="alert alert-{{ session('alert-type') }}">
                    {{ session('message') }}
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>
                                {{ $error }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="col-12">
                <form method="POST" action="{{ route('admin.comics.update', $comic->id) }}">
                    @csrf
                    @method('PUT')


                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" class="form-control" name="title" value="{{ old('title') ?? $comic->title }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" rows="2" name="description">{{ old('description') ?? $comic->description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Cover</label>
                        <input type="text" class="form-control" name="thumb" value="{{ old('thumb') ?? $comic->thumb }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Price</label>
                        <input type="text" class="form-control" name="price" value="{{ old('price') ?? $comic->price }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Series</label>
                        <input type="text" class="form-control" name="series" value="{{ old('series') ?? $comic->series }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Sale Date</label>
                        <input type="text" class="form-control" name="sale_date" value="{{ old('sale_date') ?? $comic->sale_date }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Type</label>
                        <input type="text" class="form-control" name="type" value="{{ old('type') ?? $comic->type }}">
                    </div>
                    <button type="submit" class="btn btn-secondary">Create new entry</button>
                </form>

            </div>
        </div>
    </section>
@endsection
