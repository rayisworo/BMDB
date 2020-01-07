<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'fullname' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed', 'alpha_num'],
            'image' => ['required','mimes:jpeg,png,jpg'],
            'gender' => ['required'],
            'address' => ['required'],
            'dob ' => ['date'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $request = Request();
        // dd($request->hasFile('image'));

        $user =  User::create([
            'fullname' => $data['fullname'],
            'role' => 'member',
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'gender' => $data['gender'],
            'address' => $data['address'],
            'dob' => $data['dob'],
        ]);

        $extension = $request->file('image')->getClientOriginalExtension(); 
        $name = $user->fullname;
        $names = explode(" ",strtoupper($name));
        $inisial = "";
        foreach($names as $n){
            $inisial .=$n[0];
        }
        $create_path = public_path('img/profile/');
        if(!File::isDirectory($create_path)){
            File::makeDirectory($create_path, 0777, true, true);
        }
        $file_name = 'pp'.$inisial.$user->user_id.'.'.$extension;
        $img = Image::make($request->file('image')->getRealPath());
        $img->save('img/profile/'.$file_name, 80);
        $user->profilePicture = $file_name;
        $user->save();
        return $user;
    }
}
