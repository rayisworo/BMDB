@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <form class="formControl">
                <div class="input-group mb-3 d-flex flex-wrap ">
                  <input placeholder="Search by Movie Title or Genre" type="text" class="form-control" name="search" id="search">
                  <div class="input-group-append">
                      <button class="btn btn-secondary input-group-text" type="submit">
                          Search
                      </button>
                  </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body p-0">
                    <table class="table table-striped projects">
                        <tbody>
                        @foreach ($movies as $movie)
                            <tr>
                                <td>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <img src="{{asset('img/movie/'.$movie->image)}}" class="img-fluid mx-auto d-block">
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <a href="{{ route('viewMovie',$movie->movie_id)}}"><h3>{{$movie->title}}</h3></a>
                                                <p>{{$movie->genre->name}}</p>
                                                <p>{{$movie->description}}</p>
                                                <p>{{$movie->rating}}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-1"></div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                @forelse ($saves as $save)
                                                    
                                                @empty
                                                    <form action="{{ route('saveMovie',$movie->movie_id)}}" method="get" style="display: inline-block;"> 
                                                        @csrf

                                                        <button type="submit" class="btn btn-success btn-flat btn-edit">
                                                            Saved
                                                        </button>
                                                    </form> 
                                                @endforelse
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row justify-content-center">{{$movies->links()}}</div>

@endsection