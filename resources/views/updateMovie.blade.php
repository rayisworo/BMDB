@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Movie') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('updateMovie',$movie->movie_id) }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{$movie->title}}" required autocomplete="title" autofocus placeholder="Title">
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <select class="custom-select @error('genre') is-invalid @enderror" name="genre" required>
                                  <option value="" selected>Genre</option>
                                  @forelse ($genres as $genre)
                                    @if ($genre->genre_id == $movie->genre_id)
                                        <option value="{{$genre->genre_id}}" selected>{{$genre->name}}</option>
                                    @else
                                        <option value="{{$genre->genre_id}}">{{$genre->name}}</option>
                                    @endif
                                  @empty
                                    <option value="" disabled>Tidak ada genre</option>                                      
                                  @endforelse
                                </select>
                            </div>
                            @error('genre')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                            <textarea id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" required autocomplete="description" placeholder="Description" required>{{$movie->description}}</textarea>
                            </div>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="rating" type="text" class="form-control @error('rating') is-invalid @enderror" name="rating" required autocomplete="rating" autofocus placeholder="Rating" value="{{$movie->rating}}">
                            </div>
                            @error('rating')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>                     
                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="custom-file">
                                    <input type="file" name="image" accept="image/*" id="image" class="custom-file-input form-control {{ $errors->has('image') ? 'is-invalid' : '' }}" 
                                    required onchange="changeName(this);">
                                    <label for="image" class="custom-file-label filename" id="custom-file-label">{{__('Choose File')}}</label>
                                </div>
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary form-control">
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script >
    function changeName(obj){
        var name = obj.value;
        var idx = name.lastIndexOf("\\");
        $(".filename").html(name.substr(idx+1, name.length-idx));
    }
</script>
@endsection

@section('extra-js')

@endsection