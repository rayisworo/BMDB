@extends('layouts.app')

@section('content')
<div class="container">
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
                                            <img src="{{asset('img/profile/'.$movie->image)}}" class="img-fluid mx-auto d-block">
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h3>{{$movie->title}}</h3>
                                                <p>{{$movie->genre_id}}</p>
                                                <p>{{$movie->description}}</p>
                                                <p>{{$movie->rating}}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-1"></div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- @if(Auth::user()->user_id == $user->user_id) --}}
                                                    <form action="#" method="get" style="display: inline-block;"> 
                                                        @csrf

                                                        <button type="submit" class="btn btn-success btn-flat btn-edit">
                                                            Saved
                                                        </button>
                                                    </form>                                       
                                                {{-- @endif --}}
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