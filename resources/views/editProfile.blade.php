@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Profile') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('profileUpdate',$user->user_id) }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="fullname" type="text" class="form-control @error('fullname') is-invalid @enderror" name="fullname" value="{{$user->fullname}}" required autocomplete="fullname" autofocus placeholder="Fullname">
                                @error('fullname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$user->email}}" required autocomplete="email" placeholder="Email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password" placeholder="Password" required>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password" placeholder="Comfirm Password" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="custom-control custom-radio custom-control-inline" id="gender">
                                    <input class="custom-control-input" type="radio" id="male" name="gender" value="male" required>
                                    <label for="male" class="custom-control-label">Laki-laki</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input class="custom-control-input" type="radio" id="female" value="female" name="gender">
                                    <label for="female" class="custom-control-label">Perempuan</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <textarea id="address" type="text" class="form-control" name="address" required autocomplete="address" placeholder="Address">{{$user->address}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12"> 
                                <input type="date" data-provide="datepicker" class="form-control" name="dob" id="dob" required value="{{$user->dob}}">
                            </div>
                        </div>                        
                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="custom-file">
                                    <input type="file" name="image" accept="image/*" id="image" class="custom-file-input form-control {{ $errors->has('image') ? 'is-invalid' : '' }}" onchange="changeName(this);" required>
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
                                    {{ __('Register') }}
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