@extends('layouts/app')

@section('main-content')
<section class="container">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-title">
          {{$comic->title}}
        </div>
        <div class="card-image">
          <img src="{{$comic->thumb}}" alt="{{$comic->title}}" class="img-fluid">
        </div>
        <div class="card-text">
          {{$comic->title}}
        </div>
      </div>
    </div>
  </div>
</section>



@endsection