@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-left">
                        <h2>Manage Users</h2>
                    </div>
                    <a class="btn btn-primary btn-flat float-right" href="{{ route('addUser')}}" >
                        <span class=""></span>
                        Add User
                    </a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                <table id="movieView" class="table table-bordered table-hover display nowrap">
                    <thead class="theadcolor">
                    <tr>
                    <th>#</th>
                    <th>Fullname</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Gender</th>
                    <th>Address</th>
                    <th>Profile Picture</th>
                    <th>DOB</th>
                    <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{$user->user_id}}</td>
                        <td>{{$user->fullname}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->role}}</td>
                        <td>{{$user->gender}}</td>
                        <td>{{$user->address}}</td>
                        <td>
                            <img src="{{asset('img/profile/'.$user->profilePicture)}}" height="10%" width="10%">
                        </td>
                        <td>{{$user->dob}}</td>
                        <td>
                        <a class="btn btn-sm btn-warning text-white btn-accView" href="{{ route('editUser',$user->user_id)}}">
                            <span>Edit</span>
                        </a>
                        <a class="btn btn-sm btn-danger btn-accView" href="{{ route('deleteUser',$user->user_id)}}" onclick="return confirm('Are you sure you want to delete {{$user->fullname}}?')">
                            <span>Delete</span>
                        </a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                </div>
                <!-- /.card-body -->
            {{-- </div> --}}
            <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
    </div>
  <div class="row justify-content-center">{{$users->links()}}</div>
    
@endsection
      