@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body p-0">
                    <table class="table table-striped projects">
                        <tbody>
                        @forelse ($messages as $message)
                            <tr>
                                <td>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <img src="{{asset('img/profile/'.$message->sender->profilePicture)}}" class="img-fluid mx-auto d-block">
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <a href="{{ route('viewMovie',$message->sender->user_id)}}"><h3>{{$message->sender->fullname}}</h3></a>
                                                <p>Posted at : {{$message->created_at}}</p>
                                                <p>Message : {{$message->message}}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-1"></div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <form action="{{ route('deleteMessage',$message->message_id)}}" method="get" style="display: inline-block;">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger btn-flat btn-edit" onclick="return confirm('Are you sure you want to delete message from {{$message->sender->fullname}}?')">
                                                        Delete
                                                    </button>
                                                </form>  
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p>No Message </p>
                                        </div>
                                    </div>
                                </td>
                            </tr>                            
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row justify-content-center">{{$messages->links()}}</div>

@endsection