@extends('template')
@section('content')
<div class="row">
    <div class="col-md-12">
    <h2>Movie Search</h2>
        <form action="/movie" method="post">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Search Movie</label>
            <input type="email" class="form-control" name="movie" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>

  <button type="submit" class="btn btn-primary mt-3">Submit</button>
</form>
</div>
</div>

@isset ($movies)
<h3>Result</h3>
<div class="row">
@foreach ($movie->Search as $row)
    <div class="card" style="width: 18rem;">
        <img src="{{$row->Poster}}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{$row->Title}} ({{$row->Year}})</h5>
                <a href="#" class="btn btn-primary">Details</a>
                @auth
                <p class="card-text">Massimo is de fijnste leerkracht die ik ooit heb gehad! Hij is een echte Legend!</p>
                <a href="/store/{{$row->imdbID}}" class="btn btn-primary">Add to favies</a>
                @endauth

            </div>
    </div>


@endforeach
</div>
@endisset

@endsection