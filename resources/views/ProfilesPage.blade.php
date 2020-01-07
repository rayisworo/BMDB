@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body p-0">
                    <table class="table table-striped projects">
                        <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <img src="{{asset('img/profile/'.$user->profilePicture)}}" class="img-fluid mx-auto d-block">
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h3>{{$user->fullname}}</h3>
                                                <p>{{$user->email}}</p>
                                                <p>{{$user->address}}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-1"></div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                @if(Auth::user()->user_id == $user->user_id)
                                                    <form action="{{route('profileEdit',$user->user_id)}}" method="get" style="display: inline-block;"> 
                                                        @csrf

                                                        <button type="submit" class="btn btn-success btn-flat btn-edit">
                                                            Update Profile
                                                        </button>
                                                    </form>
                                                @elseif(Auth::user()->user_id != $user->user_id)
                                                    <form action="#" method="get" style="display: inline-block;">
                                                        @csrf
                                                        <button type="submit" class="btn btn-success btn-flat btn-edit">
                                                            Message
                                                        </button>
                                                    </form>                                        
                                                @endif
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
<div class="row justify-content-center">{{$users->links()}}</div>

@endsection



