@extends('layouts/app')

@section('main-content')
<section class="container">
  <div class="row">
    <div class="col-12">
      <div class="card d-flex text-center">
        <div class="card-title">
          <h2>
            {{$comic->title}}
          </h2>
        </div>
        <div class="card-image">
          <img src="{{$comic->thumb}}" alt="{{$comic->title}}" class="img-fluid">
        </div>
        <div class="card-title">
          <h3>
            {{$comic->price}}&euro;
          </h3>
        </div>
        <div class="card-title">
          <h4>
            {{$comic->series}}
          </h4>
        </div>
        <div class="card-title text-uppercase">
          <h5>
            {{$comic->type}}
          </h5>
        </div>
        <div class="card-text">
          <p>
            {{$comic->description}}
          </p>
        </div>
      </div>
    </div>
  </div>
</section>



@endsection