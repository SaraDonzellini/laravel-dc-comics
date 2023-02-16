@extends('layouts/app')

@section('main-content')
    <section class="container">
        <div class="row">
            <div class="col-12">
                <form method="POST" action="{{ route('admin.comics.store') }}">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" class="form-control" name="title">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" rows="2" name="description"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Cover</label>
                        <input type="text" class="form-control" name="thumb">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Price</label>
                        <input type="text" class="form-control" name="price">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Series</label>
                        <input type="text" class="form-control" name="series">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Sale Date</label>
                        <input type="text" class="form-control" name="sale_date">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Type</label>
                        <input type="text" class="form-control" name="type">
                    </div>
                    <button type="submit" class="btn btn-secondary">Create new entry</button>
                </form>

            </div>
        </div>
    </section>
@endsection