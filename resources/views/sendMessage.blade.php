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
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="row">
                                        <tr>
                                            <td>
                                                <form action="{{ route('storeMessage',$user->user_id)}}" method="post">
                                                    @csrf
                                                    <textarea name="message" id="message" class="form-control" cols="30" rows="10" placeholder="Message" required></textarea>
                                                    <button type="submit">Send Message</button>
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