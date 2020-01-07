@extends('layouts.app')

@section('content')
<div class="container">
    <div>
        <form class="form-inline" action="/home">
            <i class="fas fa-search" aria-hidden="true"></i>
            <input class="form-control form-control-sm ml-3 w-75" type="text" placeholder="Search by Movie title or genre" aria-label="Search" name="search">
        </form>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @foreach ($films as $film)
                <div class="card">
                    <div class="row no-gutters">
                        <div class="col">
                            <div class="card-block px-2">
                                <!-- jgn lupa bikin bookmark button -->
                                <img src="{{$film->image}}" alt="$film->image" style="height: 100px; width: 100px">
                                <a href="/movieDetail/{{$film->id}}"><h4 class="card-title text-primary">{{ $film->title }}</h4></a>
                                <p class="card-text">{{ $film->category }}</p>
                                <p class="card-text">{{ $film->description}}</p>
                                <p class="card-text">{{ $film->rating }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</div>

{{$films->links()}}

@endsection
@section('footer')
    <nav class="row bg-dark text-light" style="width: 100%; height: 4em; text-align: center; justify-content: center; display: flex; align-items: center;">
        <div style="text-align: center;">
            (c) 2019 Copyright <span style="color: yellow;">BMDB.com</span>
        </div>
    </nav>
@endsection



