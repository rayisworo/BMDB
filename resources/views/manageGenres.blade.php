@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-left">
                        <h2>Manage Genres</h2>
                    </div>
                    <a class="btn btn-primary btn-flat float-right" href="{{ route('addGenre')}}" >
                        <span class=""></span>
                        Add Genre
                    </a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                <table id="movieView" class="table table-bordered table-hover display nowrap">
                    <thead class="theadcolor">
                        <tr>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($genres as $genre)
                    <tr>
			            <td>{{ $genre->name}}</td>
                        <td>
                        <a class="btn btn-sm btn-warning text-white btn-accView" href="{{ route('editGenre',$genre->genre_id)}}">
                            <span>Edit</span>
                        </a>
                        <a class="btn btn-sm btn-danger btn-accView" href="{{ route('deleteGenre',$genre->genre_id)}}" onclick="return confirm('Are you sure you want to delete {{$genre->name}}?')">
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
  <div class="row justify-content-center">{{$genres->links()}}</div>
    
@endsection
      