@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body p-0">
                    <table class="table table-striped projects">
                        <tbody>
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
                            @forelse ($comments as $comment)
                                <tr>
                                    <td>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <img src="{{asset('img/profile/'.$comment->user->profilePicture)}}" class="img-fluid mx-auto d-block">
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    @guest
                                                        <h3>{{$comment->user->fullname}}</h3>
                                                    @else
                                                        @if (Auth::user()->user_id == $comment->user->user_id)
                                                            <a href="{{ route('profileEdit',$comment->user->user_id)}}"><h3>{{$comment->user->fullname}}</h3></a>
                                                        @else
                                                            <a href="#"><h3>{{$comment->user->fullname}}</h3></a>
                                                        @endif 
                                                    @endguest
                                                    <p>Comment at {{$comment->created_at}}</p>
                                                    <p>{{$comment->comment}}</p>
                                                </div>
                                            </div>
                                            <div class="col-md-1"></div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    @guest
                                                    @else
                                                        @if(Auth::user()->user_id == $comment->user_id)
                                                            <form action="{{ route('deleteComment',$comment->comment_id)}}" method="get" style="display: inline-block;"> 
                                                                @csrf
                                                                <button type="submit" class="btn btn-success btn-flat btn-edit" onclick="return confirm('Are you sure you want to delete this comment?')">
                                                                    Delete
                                                                </button>
                                                            </form>                                       
                                                        @endif
                                                    @endguest
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td>
                                        <div class="row">
                                            <tr>
                                                <td>
                                                    No Comment
                                                </td>
                                            </tr>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse 
                            <tr>
                                <td>
                                    <div class="row">
                                        <tr>
                                            <td>
                                                <form action="{{ route('storeComment',$comment->movie->movie_id)}}" method="post">
                                                    @csrf
                                                    <textarea name="comment" id="comment" class="form-control" cols="30" rows="10" placeholder="Comment here" required></textarea>
                                                    <button type="submit">Comment</button>
                                                </form>
                                            </td>
                                        </tr>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection