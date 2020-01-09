@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-left">
                        <h2>Manage Movies</h2>
                    </div>
                    <a class="btn btn-primary btn-flat float-right" href="{{ route('addMovie')}}" >
                        <span class=""></span>
                        Add Movie
                    </a>
                </div>
                <div class="card-body">
                <table id="movieView" class="table table-bordered table-hover display nowrap">
                    <thead class="theadcolor">
                    <tr>
                    <th>#</th>
                    <th>Posted By</th>
                    <th>Genre</th>
                    <th>Title</th>
                    <th>Picture</th>
                    <th>Description</th>
                    <th>Rating</th>
                    <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($movies as $i=>$movie)
                    <tr>
                        <?php $i+1; ?>
                        <td>{{$i}}</td>
                        <td>{{$movie->user->fullname}}</td>
                        <td>{{$movie->genre->name}}</td>
                        <td>{{$movie->title}}</td>
                        <td>
                            <img src="{{asset('img/movie/'.$movie->image)}}" height="10%" width="10%">
                        </td>
                        <td>{{$movie->description}}</td>
                        <td>{{$movie->rating}}</td>
                        <td>
                        <a class="btn btn-sm btn-warning text-white btn-accView" href="{{ route('editMovie',$movie->movie_id)}}">
                            <span>Edit</span>
                        </a>
                        <a class="btn btn-sm btn-danger btn-accView" href="{{ route('deleteMovie',$movie->movie_id)}}" onclick="return confirm('Are you sure you want to delete {{$movie->title}}?')">
                            <span>Delete</span>
                        </a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
  <div class="row justify-content-center">{{$movies->links()}}</div>
    
@endsection
      